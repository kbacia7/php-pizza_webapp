/* Main */
function userHandle() {
  $("body").on("click", "#sendEmail", function() {
    userGuestCreate();
  });

  $("body").on("click", "#userSaveButton", function() {
    let tForm = $(this)
      .parents("form")
      .first();
    if (!$(this).attr("data-isSaveButton")) {
      $(this).attr("data-isSaveButton", true);
      $(this).text("Zapisz");
      $(tForm)
        .find(":disabled")
        .prop("disabled", false);
    } else {
      $(tForm)
        .find("input")
        .prop("disabled", true);
      $(this).removeAttr("data-isSaveButton");
      $(this).text("Edytuj");
      userUpdate(tForm);
    }
  });

  $("body").on("click", ".user-remove-account", function() {
    userRemove(
      $(this)
        .parents(".nav-link")
        .first()
    );
  });

  $("body").on("click", "#create-user", function() {
    let d = {
      firstName: "Nowy",
      lastName: "Uzytkownik",
      login: "Nowy_" + userRandomString(5),
      password: userRandomString(50),
      admin: false
    };
    userAjaxAdd(d).then(function(jData) {
      userLoad(jData);
    });
  });
  userLoadAll();
}

function userLoadAll() {
  return new Promise(function(resolve) {
    var actions = [];
    userAjaxLoad("*").then(function(data) {
      data["objects"].map(userLoad);
    });
  });
}

function userLoad(o) {
  return new Promise(function(resolve) {
    let dA = userAdd($(document));
    let eTab = dA[0];
    let tPane = dA[1];
    $(eTab).attr("id", "v-pills-user-tab" + o["ID"]);
    $(eTab).attr("href", "#v-pills-user" + o["ID"]);
    $(eTab).attr("aria-controls", "v-pills-user" + o["ID"]);
    $(eTab)
      .find("span.user-tab-title")
      .text(o["login"] + " (#" + o["ID"] + ")");
    $(eTab).attr("data-roomID", o["ID"]);

    $(tPane).attr("id", "v-pills-user" + o["ID"]);
    $(tPane).attr("aria-labelledby", "v-pills-user-tab" + o["ID"]);
    $(tPane).attr("data-roomID", o["ID"]);

    $(tPane)
      .find("#inputUserFirstName")
      .val(o["firstName"]);
    $(tPane)
      .find("#inputUserLastName")
      .val(o["lastName"]);
    $(tPane)
      .find("#inputUserLogin")
      .val(o["login"]);
    $(tPane)
      .find("#inputUserAdmin")
      .prop("checked", parseInt(o["admin"]));

    resolve(o["ID"]);
  });
}

function userAdd(parent) {
  let cloneNewUserTab = $(parent)
    .find(".never-use-user-tab")
    .clone();
  $(cloneNewUserTab)
    .removeClass("never-use-user-tab")
    .removeClass("d-none")
    .insertBefore($(".never-use-user-tab").first());

  let cloneNewUserPage = $(parent)
    .find(".never-use-user-tab-pane")
    .clone();

  $(cloneNewUserPage)
    .removeClass("never-use-user-tab-pane")
    .removeClass("d-none")
    .insertBefore($(".never-use-user-tab-pane").first());
  return [cloneNewUserTab, cloneNewUserPage];
}

function userUpdate(form) {
  let ID = $(form)
    .parents(".tab-pane")
    .first()
    .attr("data-roomID");
  let fName = $(form)
    .find("input#inputUserFirstName")
    .val();
  let lName = $(form)
    .find("input#inputUserLastName")
    .val();
  let login = $(form)
    .find("input#inputUserLogin")
    .val();
  let password = $(form)
    .find("input#inputUserPassword")
    .val();
  let admin =
    $(form)
      .find("input#inputUserAdmin")
      .prop("checked") == false
      ? 0
      : 1;
  let d = {
    firstName: fName,
    lastName: lName,
    login: login,
    password: password,
    admin: admin
  };
  let e = userIsValid(d);
  if (e == undefined) {
    userAjaxUpdate(ID, d);
    $("input#inputUserPassword").val("");
  } else {
    displayError(e);
  }
}

function userRemove(tab) {
  let id = $(tab).attr("data-roomid");
  $("#v-pills-user" + id).remove();
  $(tab).remove();
  userAjaxRemove(id);
}

function userGuestCreate() {
  let d = {
    firstName: $("#firstName").val(),
    lastName: $("#lastName").val(),
    eMail: $("#mail").val(),
    topic: $("#topic").val(),
    message: $("#message_form").val(),
    captcharesponse: $(".g-recaptcha-response").val()
  };
  userAjaxRegister(d).then(function(jData) {
    $("form")[0].reset();
    $("#insert-errors-here").text("Dziękujemy za kontakt, sprawdź swoja skrzynkę email!");
  })
  .catch(function() {
    $("#insert-errors-here").text("Coś poszło nie tak, czy wypełniłeś wszystkie pola prawidłowo?");
  });
}

/* Validation */
function userIsValidConnected() {
  return new Promise(function(resolve, reject) {
    let k = window.atob(getParameterByName("key")).split("|");

    userAjaxLogin({
      login: k[1],
      password: k[0]
    })
      .then(function() {
        resolve();
      })
      .catch(function() {
        reject();
      });
  });
}

function userIsValid(obj) {
  if (obj == null) return errorsTemplates[errorsId.User_DoesntExists];
  else if (obj.admin !== 1 && obj.admin !== 0)
    return errorsTemplates[errorsId.User_EmptyAdmin];
  else if (obj.firstName.length <= 0)
    return errorsTemplates[errorsId.User_EmptyFirstName];
  else if (obj.lastName.length <= 0)
    return errorsTemplates[errorsId.User_EmptyLastName];
  else if (obj.login.length < 5)
    return errorsTemplates[errorsId.User_EmptyLogin];
  else if (!userIsValidName(obj.firstName))
    return errorsTemplates[errorsId.User_InvalidFirstName];
  else if (!userIsValidName(obj.lastName))
    return errorsTemplates[errorsId.User_InvalidLastName];
  else if (obj.password.length > 0 && obj.password.length < 5)
    return errorsTemplates[errorsId.User_EmptyPassword];
  else if (!/^[a-zA-Z0-9_.@]*$/.test(obj.login))
    return errorsTemplates[errorsId.User_InvalidLogin];
  return undefined;
}

function userIsValidName(name) {
  return XRegExp(/^[\s\p{L}]+$/u).test(name);
}

/* AJAX */
function userAjaxUpdate(ID, data) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/User/user_update.php",
      type: "POST",
      data: { ID: ID, data: data },
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        resolve(jsonRealData["object"]);
      }
    });
  });
}

function userAjaxRemove(ID) {
  $.ajax({
    url: "PizzaCore/AJAX/User/user_remove.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}

function userAjaxAdd(data) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: "PizzaCore/AJAX/User/user_create_admin.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["complete"]) resolve(jsonRealData["object"]);
        else 
          reject();
      }
    });
  });
}

function userAjaxRegister(data) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      url: "PizzaCore/AJAX/User/user_create.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["complete"]) resolve(jsonRealData["object"]);
        else 
          reject();
      }
    });
  });
}

function userAjaxLogin(data) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/User/login_valid.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["complete"]) resolve(jsonRealData);
        else reject();
      }
    });
  });
}

function userAjaxGetName(data) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/User/user_info.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        resolve(jsonRealData["object"]);
      }
    });
  });
}

function userAjaxLoad(ID) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/User/user_load.php",
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

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function userRandomString(length) {
  let chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  var result = "";
  for (var i = length; i > 0; --i)
    result += chars[Math.floor(Math.random() * chars.length)];
  return result;
}
