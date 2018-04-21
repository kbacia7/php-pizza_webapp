/* Main */
function notificationHandle() {
  $("body").on("click", "#notificationSend", function() {
    notificationSend();
  });
}

function notificationSend() {
  let d = {
    title: $("#inputNotificationTitle").val(),
    message: $("#inputNotificationMessage").val()
  };
  let e = notificationIsValid(d);
  notificationAjaxSend(d);
}

/* Validation */
function notificationIsValid(obj) {
  if (obj == null) return errorsTemplates[errorsId.ContactMessage_EmptyMessage];
  else if (obj.title.length <= 0)
    return errorsTemplates[errorsId.ContactMessage_EmptyMessage];
  else if (obj.message.length <= 0)
    return errorsTemplates[errorsId.ContactMessage_EmptyMessage];
  return undefined;
}

/* Ajax */
function notificationAjaxSend(data) {
  $.ajax({
    url: "PizzaCore/AJAX/Notification/notification_send.php",
    type: "POST",
    data: { data: data },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}
