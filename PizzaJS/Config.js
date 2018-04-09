function configHandle() {
  $("body").on("click", "#configSaveButton", function() {
    configSave();
  });
}

function configSetForm(configObject) {
  $("#inputName").val(configObject['title']);
  $("#inputLocation").val(configObject['position']);
  $("#inputMoney").val(configObject['cashChar']);
  $("#inputNumber").val(configObject['contactNumber']);
  $("#inputGallery1").val(configObject['descriptionGallery1']);
  $("#inputGallery2").val(configObject['descriptionGallery2']);
  document.title = configObject['title'];
}

function configSetData(configObject) {
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "a5e6cf68-890a-4add-94b6-97f470fa200d",
      autoRegister: false,
      notifyButton: {
        enable: true,
      },
    });
  });
  $("#block2-description").text(configObject['descriptionGallery1']);
  $("#block4-description").text(configObject['descriptionGallery2']);
  $("#header-title").text(configObject['title']);
  $("#contact-number").text(configObject['contactNumber']);
  document.title = configObject['title'];
  $.ajax({
    url: "https://maps.googleapis.com/maps/api/geocode/json?latlng="+ configObject['position'].trim() + "&key=AIzaSyBSsAa2ivZ1xAMJgfAMBlvCtcLjEAdiWb4",
    type: "GET",
    complete: function(jData) {
        let jsonRealData = JSON.parse(jData["responseText"]);
        let address = jsonRealData['results'][0]['formatted_address'].split(",");
        $("#street-location").text(address[0]);
        $("#city-location").text(address[1]);
    }
  });
}

function configSave() {
  let title = $("#inputName").val();
  let pos = $("#inputLocation").val();
  let c = $("#inputMoney").val();
  let d1g = $("#inputGallery1").val();
  let d2g = $("#inputGallery2").val();
  let cN = $("#inputNumber").val();
  if(title.length <= 0)
	displayError(errorsTemplates[errorsId.Config_PizzeriaNull]);
  else if(title.length > 30)
	displayError(errorsTemplates[errorsId.Config_PizzeriaTooLong]);  
  else if(is_valid_menu_title(title))
    displayError(errorsTemplates[errorsId.Config_PizzeriaNoValid]);  
  else {
  var file_data = $('#inputIcon').prop('files')[0];   
  var form_data = new FormData();                  
  form_data.append('file', file_data);
  let d = {
    title:  title,
    position: pos,
    cashChar: c,
    descriptionGallery1: d1g,
    descriptionGallery2: d2g,
    contactNumber: cN
  }
  configAjaxUpdate(d);
  if(file_data !== undefined)
    configUploadIcon(form_data);
  }
}

function configAjaxLoad() {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Config/config_load.php",
      type: "POST",
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["alllowed"] === false) ajax_is_allowed();
        else {
          resolve(jsonRealData['objects']);
        }
      }
    });
  });
}

function configUploadIcon(icon) {
  $.ajax({
    url: "PizzaCore/AJAX/Config/config_icon.php",
    type: "POST",
    data: icon,
    cache: false,
    contentType: false,
    processData: false,
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}

function configAjaxUpdate(data) {
  $.ajax({
    url: "PizzaCore/AJAX/Config/config_update.php",
    type: "POST",
    data: { data: data },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}

