let savedAuthorsByID = {};
function contactMessageLoadAll(room) {
  return new Promise(function(resolve) {
    var actions = [];
    contactMessageAjaxLoad({"roomID": room}).then(function(data) {
      actions = data["objects"].map(contactMessageLoad);
      resolve(actions);
    });
  });
}

function contactMessageLoad(o) {
  return new Promise(function(resolve) {
    let e = contactMessageAdd($(document), o["roomID"], false);
    if(savedAuthorsByID[o["author"]] == undefined) {
    userAjaxGetName({ID: o["author"]}).then(function(userData) {
      savedAuthorsByID[o["author"]] = userData;
      $(e).find(".message-author-name").text(savedAuthorsByID[o["author"]]["firstName"] + " " + savedAuthorsByID[o["author"]]["lastName"]);
      });
    }
    else
      $(e).find(".message-author-name").text(savedAuthorsByID[o["author"]]["firstName"] + " " + savedAuthorsByID[o["author"]]["lastName"]);
      
    $(e).find(".message-message").text(o["message"]);
    $(e).find(".message-author-date").text(o["dateSend"]);
    resolve(o["ID"]);
  });
}

function contactMessageAdd(parent, roomID, AJAX) {
  let thisRoom = null;
  if(roomID == undefined)
    thisRoom = $(parent).find(".tab-pane.active");
  else 
    thisRoom = $(parent).find("div.tab-pane[aria-labelledby$='" + roomID + "']");
  let cloneNewContactMessage = $(thisRoom).find(".never-use-contact-room-message-template").clone();
  $(cloneNewContactMessage)
    .removeClass("never-use-contact-room-message-template")
    .removeClass("d-none")
    .insertBefore($(thisRoom).find(".never-use-contact-room-message-template"));
  if(AJAX) {
      let d = {
        message: $(thisRoom).find("form textarea").first().val(),
        room: $(thisRoom).attr("aria-labelledby").slice(-1)
      }
      contactMessageAjaxAdd(d).then(function(data) {
        $(cloneNewContactMessage).find(".message-author-name").text(savedAuthorsByID[data["author"]]["firstName"] + " " + savedAuthorsByID[data["author"]]["lastName"]);
        $(cloneNewContactMessage).find(".message-message").text(data["message"]);
        $(cloneNewContactMessage).find(".message-author-date").text(data["dateSend"]);

      });
  }
  return cloneNewContactMessage;
}

function contactMessageAjaxAdd(data) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/ContactMessage/contactmessage_add.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["alllowed"] === false) ajax_is_allowed();
        else {
          resolve(jsonRealData['object']);
        }
      }
    });
  });
}

function contactMessageAjaxLoad(ID) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/ContactMessage/contactmessage_load.php",
      type: "POST",
      data: { ID: ID },
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["alllowed"] === false) ajax_is_allowed();
        else {
          resolve(jsonRealData);
        }
      }
    });
  });
}