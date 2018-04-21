var errorTypes = {
  SUCCESS: 0,
  WARNING: 1,
  ERROR: 2  
};
var notifyColors = ['success', 'warning', 'danger', 'danger'];
var errorsTemplates = [];
var errorsId = {
	//Menu category
    MenuCategory_NoData: 0,
    MenuCategory_NoTitle: 1,
    MenuCategory_NoExists: 2,
    MenuCategory_RemoveSuccess: 3,
    MenuCategory_UpdateSuccess: 4,
    MenuCategory_CreateSuccess: 5,
	
	//Menu item
    MenuItem_NoData: 6,
    MenuItem_NoTitle: 7,
    MenuItem_NoExists: 8,
    MenuItem_NoValidTitle: 9,
    MenuItem_NoValidPrice: 10,
    MenuItem_RemoveSuccess: 11,
    MenuItem_UpdateSuccess: 12,
    MenuItem_CreateSuccess: 13,
	
	//Config
    Config_UpdateSuccess: 14,
    Config_PizzeriaNull: 15,
	Config_PizzeriaNoValid: 16,
    Config_PizzeriaTooLong: 17,
    Config_PizzeriaLocationEmpty: 18,
    Config_PizzeriaLocationFormat: 19,
    Config_TelephoneEmpty: 20,
    Config_TelephoneFormat: 21,
    Config_IconInvalid: 22,
    Config_IconSizeTooMuch: 23,
	Config_CurrencyEmpty: 24,
    Config_CurrencyTooLong: 25,
    Config_GalleryOneEmpty: 26,
    Config_GalleryTwoEmpty: 27,
	
	//Gallery
    Gallery_ImageDescriptionEmpty: 28,
    Gallery_ImageSize: 29,
    Gallery_ImageExtension: 30,
    Gallery_ImageUploaded: 31,
	
	//Notification
	Notification_SendSuccess: 32,
    Notification_TitleInvalidChars: 34,
    Notification_TitleEmpty: 35,
    Notification_TitleTooLong: 36,
    Notification_DescriptionEmpty: 37,
    
    //User
    User_NoExists: 38,
    User_NoData: 39,
    User_NullAdmin: 40,
    User_NullFirstName: 41,
    User_NullLastName: 42,
    User_NoValidFirstName: 43,
    User_NoValidLastName: 44,
    User_NullPassword: 45,
    User_NullLogin: 46,
    User_LoginInvalidChars: 47,
    User_CreateSuccess: 48,
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
