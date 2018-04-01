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
  var file_data = $('#inputIcon').prop('files')[0];   
  var form_data = new FormData();                  
  form_data.append('file', file_data);
  let d = {
    title:  $("#inputName").val(),
    position: $("#inputLocation").val(),
    cashChar: $("#inputMoney").val(),
    descriptionGallery1: $("#inputGallery1").val(),
    descriptionGallery2: $("#inputGallery2").val(),
    contactNumber: $("#inputNumber").val()
  }
  configAjaxUpdate(d);
  if(file_data !== undefined)
    configUploadIcon(form_data);
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

