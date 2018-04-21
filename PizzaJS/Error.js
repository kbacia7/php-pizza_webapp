var errorTypes = {
  SUCCESS: 0,
  WARNING: 1,
  ERROR: 2
};
var notifyColors = ["success", "warning", "danger", "danger"];
var errorsTemplates = [];
var errorsId = {
  //Menu category
  MenuCategory_EmptyData: 0,
  MenuCategory_EmptyTitle: 1,
  MenuCategory_DoesntExists: 2,
  MenuCategory_RemoveComplete: 3,
  MenuCategory_UpdateComplete: 4,
  MenuCategory_CreateComplete: 5,

  //Menu item
  MenuItem_EmptyData: 100,
  MenuItem_EmptyTitle: 101,
  MenuItem_DoesntExists: 102,
  MenuItem_InvalidTitle: 103,
  MenuItem_InvalidPrice: 104,
  MenuItem_RemoveComplete: 105,
  MenuItem_UpdateComplete: 106,
  MenuItem_CreateComplete: 107,

  //Config
  Config_UpdateComplete: 200,
  Config_EmptyPizzeriaName: 201,
  Config_InvalidPizzeriaName: 202,
  Config_LongPizzeriaName: 203,
  Config_EmptyPizzeriaLocation: 204,
  Config_InvalidPizzeriaLocation: 205,
  Config_EmptyTelephone: 206,
  Config_InvalidTelephone: 27,
  Config_InvalidIconEx: 208,
  Config_InvalidIconSize: 209,
  Config_EmptyCurrency: 210,
  Config_LongCurrency: 211,
  Config_EmptyGalleryOne: 212,
  Config_EmptyGalleryTwo: 213,

  //Gallery
  Gallery_EmptyImageDescription: 300,
  Gallery_InvalidImageSize: 301,
  Gallery_InvalidImageEx: 302,
  Gallery_ImageUploadedComplete: 303,

  //Notification
  Notification_SendComplete: 400,
  Notification_EmptyTitle: 401,
  Notification_EmptyMessage: 402,
  Notification_EmptyData: 403,

  //User
  User_DoesntExists: 500,
  User_EmptyData: 501,
  User_EmptyAdmin: 502,
  User_EmptyFirstName: 503,
  User_EmptyLastName: 504,
  User_InvalidFirstName: 505,
  User_InvalidLastName: 506,
  User_EmptyPassword: 507,
  User_EmptyLogin: 508,
  User_InvalidLogin: 509,
  User_CreateComplete: 510,

  //Contact Messages
  ContactMessage_DoesntExists: 600,
  ContactMessage_EmptyMessage: 601,
  ContactMessage_EmptyAuthor: 602,
  ContactMessage_EmptyRoom: 603,
  ContactMessage_CreateComplete: 604,

  //Contact Room
  ContactRoom_DoesntExists: 700,
  ContactRoom_EmptyTitle: 701,
  ContactRoom_EmptyOwner: 702,
  ContactRoom_InvalidTitle: 703,
  ContactRoom_CreateComplete: 704
};

function errorsLoopInit() {
  setInterval(() => {
    errorsHandle();
  }, 1000);
}

function errorsHandle() {
  errorsAjaxLoad().then(function(errors) {
    $.each(errors, function() {
      displayError(this);
    });
  });
}

function displayError(errorObj) {
  if (errorObj == undefined) return;
  $.notify(
    {
      // options
      title: "<b>" + errorObj.title + "</b><br/>",
      message: errorObj.description
    },
    {
      // settings
      newest_on_top: true,
      type: notifyColors[errorObj.code],
      placement: {
        from: "top",
        align: "center"
      }
    }
  );
}

function errorsAjaxLoad() {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Error/errorhandle.php",
      type: "POST",
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        resolve(jsonRealData["errors"]);
      }
    });
  });
}

function errorsTemplatesAjaxLoad() {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Error/errortemplates.php",
      type: "POST",
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        resolve(jsonRealData["templates"]);
      }
    });
  });
}
