function userHandle() {
    $("body").on("click", "#sendEmail", function() {
        userGuestCreate();
    });
}

function userIsValid() {
    return new Promise(function(resolve) {
        userAjaxLogin({
            login:  getParameterByName("mail"),
            password:  getParameterByName("key")
        }).then(function() {
            resolve();
        });
    });
}

function userGuestCreate() {
    let d = {
        firstName: $("#firstName").val(),
        lastName: $("#lastName").val(),
        eMail: $("#mail").val(),
        topic: $("#topic").val(),
        message: $("#message_form").val()
    }
    userAjaxAdd(d);
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
                resolve(jsonRealData);
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