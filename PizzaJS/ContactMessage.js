let savedAuthorsByID = {};
function contactMessageLoadAll(room) {
  return new Promise(function(resolve) {
    var actions = [];
    contactMessageAjaxLoad({ roomID: room }).then(function(data) {
      actions = data["objects"].map(contactMessageLoad);
      resolve(actions);
    });
  });
}

function contactMessageLoad(o) {
  return new Promise(function(resolve) {
    let e = contactMessageAdd($(document), o["roomID"], false);
    if (savedAuthorsByID[o["author"]] == undefined) {
      userAjaxGetName({ ID: o["author"] }).then(function(userData) {
        savedAuthorsByID[o["author"]] = userData;
        $(e)
          .find(".message-author-name")
          .text(
            savedAuthorsByID[o["author"]]["firstName"] +
              " " +
              savedAuthorsByID[o["author"]]["lastName"]
          );
      });
    } else
      $(e)
        .find(".message-author-name")
        .text(
          savedAuthorsByID[o["author"]]["firstName"] +
            " " +
            savedAuthorsByID[o["author"]]["lastName"]
        );

    $(e)
      .find(".message-message")
      .text(o["message"]);
    $(e)
      .find(".message-author-date")
      .text(o["dateSend"]);
    resolve(o["ID"]);
  });
}

function contactMessageIsValid(obj) {
  if (obj == null) return errorsTemplates[errorsId.ContactMessage_DoesntExists];
  else if (obj.message.length <= 0)
    return errorsTemplates[errorsId.ContactMessage_EmptyMessage];
  else if (obj.room.length <= 0)
    return errorsTemplates[errorsId.ContactMessage_EmptyRoom];
  return undefined;
}

function contactMessageAdd(parent, roomID, AJAX) {
  let thisRoom = null;
  let e = undefined;
  let cloneNewContactMessage = null;
  if (roomID == undefined) thisRoom = $(parent).find(".tab-pane.active");
  else
    thisRoom = $(parent).find(
      "div.tab-pane[aria-labelledby$='" + roomID + "']"
    );
  if (AJAX) {
    let d = {
      message: $(thisRoom)
        .find("form textarea")
        .first()
        .val(),
      room: $(thisRoom).attr("data-roomID")
    };
    e = contactMessageIsValid(d);
    if (e == undefined) {
      contactMessageAjaxAdd(d).then(function(data) {
        if (savedAuthorsByID[data["author"]] == undefined) {
          userAjaxGetName({ ID: data["author"] }).then(function(userData) {
            savedAuthorsByID[data["author"]] = userData;
            $(cloneNewContactMessage)
              .find(".message-author-name")
              .text(
                savedAuthorsByID[data["author"]]["firstName"] +
                  " " +
                  savedAuthorsByID[data["author"]]["lastName"]
              );
          });
        } else
          $(cloneNewContactMessage)
            .find(".message-author-name")
            .text(
              savedAuthorsByID[data["author"]]["firstName"] +
                " " +
                savedAuthorsByID[data["author"]]["lastName"]
            );
        $(cloneNewContactMessage)
          .find(".message-message")
          .text(data["message"]);
        $(cloneNewContactMessage)
          .find(".message-author-date")
          .text(data["dateSend"]);
      });
    } else displayError(e);
  }
    if (e == undefined) {
      cloneNewContactMessage = $(thisRoom)
        .find(".never-use-contact-room-message-template")
        .clone();
      $(cloneNewContactMessage)
        .removeClass("never-use-contact-room-message-template")
        .removeClass("d-none")
        .insertBefore(
          $(thisRoom).find(".never-use-contact-room-message-template")
        );
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
          resolve(jsonRealData["object"]);
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
