function userHandle() {
  $("body").on("click", "#sendEmail", function() {
    userGuestCreate();
  });

  $("body").on("click", "#userSaveButton", function() {
    let tForm = $(this).parents("form").first();
    if (!$(this).attr("data-isSaveButton")) {
      $(this).attr("data-isSaveButton", true);
      $(this).text("Zapisz");
      $(tForm).find(":disabled").prop("disabled", false);
    } else {
      $(tForm).find("input").prop("disabled", true);
      userUpdate(tForm);
      $(this).text("Edytuj");
      $(this).attr("data-isSaveButton", false);

    }
  });
}

function userIsValid() {
  return new Promise(function(resolve, reject) {
    let k = window.atob(getParameterByName("key")).split("|");

    userAjaxLogin({
      login: k[1],
      password: k[0]
    }).then(function() {
      resolve();
    }).catch(function() {
      reject();
    });
  });
}

function userUpdate(form) {
  let fName = $("input#inputUserFirstName").val();
  let d = {
    firstName: fName

  }
  //Data validate here
  userAjaxUpdate(d);
}

function userGuestCreate() {
  let d = {
    firstName: $("#firstName").val(),
    lastName: $("#lastName").val(),
    eMail: $("#mail").val(),
    topic: $("#topic").val(),
    message: $("#message_form").val(),
    captcharesponse: $(".g-recaptcha-response").val()
  }
  userAjaxAdd(d);
}

function userAjaxUpdate(data) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/User/user_update.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData['responseText']);
        resolve(jsonRealData['object']);
      }
    });
  });
}

function userAjaxAdd(data) {
  $.ajax({
    url: "PizzaCore/AJAX/User/user_create.php",
    type: "POST",
    data: data
  });
}

function userAjaxLogin(data) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/User/login_valid.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData['responseText']);
        if (jsonRealData["complete"])
          resolve(jsonRealData);
        else
          reject();
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
        var jsonRealData = JSON.parse(jData['responseText']);
        resolve(jsonRealData['object']);
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
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}