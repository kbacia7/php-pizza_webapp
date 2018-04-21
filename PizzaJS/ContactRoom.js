/* MAIN */
function contactRoomHandle() {
  $("body").on("click", ".contact-remove-conversation", function() {
    contactRoomRemove(
      $(this)
        .parents(".nav-link")
        .first()
    );
  });

  $("body").on("click", ".contact-send", function() {
    contactMessageAdd($(document), undefined, true);
    $(this)
      .parents("form")
      .first()
      .find("#inputContact")
      .val("");
  });
  contactRoomLoadAll();
}

function contactRoomLoadAll() {
  return new Promise(function(resolve) {
    var actions = [];
    contactRoomAjaxLoad("*").then(function(data) {
      actions = data["objects"].map(contactRoomLoad);
      Promise.all(actions).then(function(rIDs) {
        rIDs.map(contactMessageLoadAll);
        resolve(actions);
      });
    });
  });
}

function contactRoomLoad(o) {
  return new Promise(function(resolve) {
    let dA = contactRoomAdd($(document), o);
    let eTab = dA[0];
    let tPane = dA[1];
    $(eTab).attr("id", "v-pills-conversation-tab" + o["ID"]);
    $(eTab).attr("href", "#v-pills-conversation" + o["ID"]);
    $(eTab).attr("aria-controls", "v-pills-conversation" + o["ID"]);
    $(eTab)
      .find("span.contact-tab-title")
      .text(o["title"] + " (#" + o["ID"] + ")");
    $(eTab).attr("data-roomID", o["ID"]);

    $(tPane).attr("id", "v-pills-conversation" + o["ID"]);
    $(tPane).attr("aria-labelledby", "v-pills-conversation-tab" + o["ID"]);
    $(tPane).attr("data-roomID", o["ID"]);

    resolve(o["ID"]);
  });
}

function contactRoomAdd(parent, objectRoom) {
  let cloneNewContactRoomTab = $(parent)
    .find(".never-use-contact-tab")
    .clone();
  $(cloneNewContactRoomTab)
    .removeClass("never-use-contact-tab")
    .removeClass("d-none")
    .insertBefore($(".never-use-contact-tab").first());

  let cloneNewContactRoom = $(parent)
    .find(".never-use-contact-tab-pane")
    .clone();

  $(cloneNewContactRoom)
    .removeClass("never-use-contact-tab-pane")
    .removeClass("d-none")
    .insertBefore($(".never-use-contact-tab-pane").first());
  return [cloneNewContactRoomTab, cloneNewContactRoom];
}

function contactRoomRemove(element) {
  let aID = $(element).attr("data-roomID");
  $("a.nav-link[href$='" + aID + "']").tab("dispose");
  $("div.tab-pane[aria-labelledby$='" + aID + "']").tab("dispose");
  contactRoomAjaxRemove(aID);

  $("div.tab-pane[aria-labelledby$='" + aID + "']").remove();
  $(element).remove();
}

/* AJAX */
function contactRoomAjaxAdd(data, callback) {
  $.ajax({
    url: "PizzaCore/AJAX/ContactRoom/contactroom_add.php",
    type: "POST",
    data: data,
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
      else {
        callback(jsonRealData["object"]);
      }
    }
  });
}

function contactRoomAjaxLoad(ID) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/ContactRoom/contactroom_load.php",
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

function contactRoomAjaxRemove(ID) {
  $.ajax({
    url: "PizzaCore/AJAX/ContactRoom/contactroom_remove.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}
