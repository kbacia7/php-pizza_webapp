var errorTypes = {
  SUCCESS: 0,
  WARNING: 1,
  ERROR: 2  
};

var notifyColors = ['success', 'warning', 'danger', 'danger'];

function errorsHandle() {
    errorsAjaxLoad().then(function (errors) {
        $.each(errors, function () {
            displayError(this);
        });
    });
}

function displayError(errorObj) {
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
