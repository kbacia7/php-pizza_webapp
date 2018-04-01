function notificationHandle() {
  $("body").on("click", "#notificationSend", function() {
    notificationSend();
  });
}

function notificationSend() {
  let d = {
    title: $("#inputNotificationTitle").val(),
    message: $("#inputNotificationMessage").val()
  }
  notificationAjaxSend(d);
}


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

