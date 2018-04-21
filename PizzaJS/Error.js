var errorTypes = {
  SUCCESS: 0,
  WARNING: 1,
  ERROR: 2  
};
var notifyColors = ['success', 'warning', 'danger', 'danger'];
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
    MenuItem_EmptyData: 6,
    MenuItem_EmptyTitle: 7,
    MenuItem_DoesntExists: 8,
    MenuItem_InvalidTitle: 9,
    MenuItem_InvalidPrice: 10,
    MenuItem_RemoveComplete: 11,
    MenuItem_UpdateComplete: 12,
    MenuItem_CreateComplete: 13,
	
	//Config
    Config_UpdateComplete: 14,
    Config_EmptyPizzeriaName: 15,
	Config_InvalidPizzeriaName: 16,
    Config_LongPizzeriaName: 17,
    Config_EmptyPizzeriaLocation: 18,
    Config_InvalidPizzeriaLocation: 19,
    Config_EmptyTelephone: 20,
    Config_InvalidTelephone: 21,
    Config_InvalidIconEx: 22,
    Config_InvalidIconSize: 23,
	Config_EmptyCurrency: 24,
    Config_LongCurrency: 25,
    Config_EmptyGalleryOne: 26,
    Config_EmptyGalleryTwo: 27,
	
	//Gallery
    Gallery_EmptyImageDescription: 28,
    Gallery_InvalidImageSize: 29,
    Gallery_InvalidImageEx: 30,
    Gallery_ImageUploadedComplete: 31,
	
	//Notification
	Notification_SendComplete: 32,
    Notification_TitleInvalidChars: 34,
    Notification_EmptyTitle: 35,
    Notification_TitleTooLong: 36,
    Notification_EmptyMessage: 37,
    Notification_EmptyData: 99,
    
    //User
    User_DoesntExists: 38,
    User_EmptyData: 39,
    User_EmptyAdmin: 40,
    User_EmptyFirstName: 41,
    User_EmptyLastName: 42,
    User_InvalidFirstName: 43,
    User_InvalidLastName: 44,
    User_EmptyPassword: 45,
    User_EmptyLogin: 46,
    User_InvalidLogin: 47,
    User_CreateComplete: 48,

    //Contact Messages
    ContactMessage_DoesntExists: 49,
    ContactMessage_EmptyMessage: 50,
    ContactMessage_EmptyAuthor: 51,
    ContactMessage_EmptyRoom: 52,
    ContactMessage_CreateComplete: 53,

    //Contact Room
    ContactRoom_DoesntExists: 54,
    ContactRoom_EmptyTitle: 55,
    ContactRoom_EmptyOwner: 56,
    ContactRoom_InvalidTitle: 57,
    ContactRoom_CreateComplete: 58,
}

function errorsLoopInit() {
    setInterval(() => {
      errorsHandle();        
    }, 1000);
}

function errorsHandle() {
    errorsAjaxLoad().then(function (errors) {
        $.each(errors, function () {
            displayError(this);
        });
    });
}

function displayError(errorObj) {
    if(errorObj == undefined) return;
    $.notify({
        // options
        title: "<b>" + errorObj.title + "</b><br/>",
        message: errorObj.description 
    },{
        // settings
        newest_on_top: true,
        type: notifyColors[errorObj.code],
        placement: {
            from: "top",
            align: "center"
        },
    });
    
}

function errorsAjaxLoad() { 
    return new Promise(function(resolve) {
        $.ajax({
            url: "PizzaCore/AJAX/Error/errorhandle.php",
            type: "POST",
            complete: function (jData) {
                var jsonRealData = JSON.parse(jData['responseText']);
                resolve(jsonRealData['errors']);
            }
        });
    });
}

function errorsTemplatesAjaxLoad() { 
    return new Promise(function(resolve) {
        $.ajax({
            url: "PizzaCore/AJAX/Error/errortemplates.php",
            type: "POST",
            complete: function (jData) {
                var jsonRealData = JSON.parse(jData['responseText']);
                resolve(jsonRealData['templates']);
            }
        });
    });
}
