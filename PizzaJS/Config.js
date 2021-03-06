let allowedImgTypes = ["image/png"];
var globalCurrency = "$";
/* MAIN */
function configHandle() {
  $("body").on("click", "#configSaveButton", function() {
    configSave();
  });
  $("body").on("submit", "form", function(e) {
    e.preventDefault();
  });
}

function configSetForm(configObject) {
  $("#inputName").val(configObject["title"]);
  $("#inputLocation").val(configObject["position"]);
  $("#inputMoney").val(configObject["cashChar"]);
  $("#inputNumber").val(configObject["contactNumber"]);
  $("#inputGallery1").val(configObject["descriptionGallery1"]);
  $("#inputGallery2").val(configObject["descriptionGallery2"]);
  document.title = configObject["title"];
  globalCurrency = configObject["cashChar"];
}

function configSetData(configObject, appID, mapKey) {
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: appID,
      autoRegister: false,
      notifyButton: {
        enable: true
      }
    });
  });
  $("#block2-description").text(configObject["descriptionGallery1"]);
  $("#block4-description").text(configObject["descriptionGallery2"]);
  $("#header-title").text(configObject["title"]);
  $("#contact-number").text(configObject["contactNumber"]);
  document.title = configObject["title"];
  globalCurrency = configObject["cashChar"];
  $.ajax({
    url:
      "https://maps.googleapis.com/maps/api/geocode/json?latlng=" +
      configObject["position"].trim() +
      "&key=" + mapKey,
    type: "GET",
    complete: function(jData) {
      let jsonRealData = JSON.parse(jData["responseText"]);
      let address = jsonRealData["results"][0]["formatted_address"].split(",");
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

  var file_data = $("#inputIcon").prop("files")[0];
  var form_data = new FormData();
  form_data.append("file", file_data);

  let d = {
    title: title,
    position: pos,
    cashChar: c,
    descriptionGallery1: d1g,
    descriptionGallery2: d2g,
    contactNumber: cN
  };
  let errors = configIsValidObject(d);
  if (errors != undefined) displayError(errors);
  else {
    configAjaxUpdate(d);
    configSetForm(d);
    menuReload();
    if (file_data !== undefined) {
      let iconErrors = configIsValidIcon(file_data);
      if (iconErrors != undefined) displayError(iconErrors);
      else configUploadIcon(form_data);
    }
  }
}

/* Validation */
function configIsValidObject(cObj) {
  if (cObj.title.length <= 0)
    return errorsTemplates[errorsId.Config_EmptyPizzeriaName];
  else if (cObj.title.length > 30)
    return errorsTemplates[errorsId.Config_LongPizzeriaName];
  else if (!menuItemIsValidTitle(cObj.title))
    return errorsTemplates[errorsId.Config_InvalidPizzeriaName];
  else if (cObj.position.length <= 0)
    return errorsTemplates[errorsId.Config_EmptyPizzeriaLocation];
  else if (!configIsValidLocation(cObj.position))
    return errorsTemplates[errorsId.Config_InvalidPizzeriaLocation];
  else if (cObj.contactNumber.length <= 0)
    return errorsTemplates[errorsId.Config_EmptyTelephone];
  else if (!configIsValidTelephone(cObj.contactNumber))
    return errorsTemplates[errorsId.Config_InvalidTelephone];
  else if (cObj.cashChar.length <= 0)
    return errorsTemplates[errorsId.Config_EmptyCurrency];
  else if (cObj.cashChar.length > 3)
    return errorsTemplates[errorsId.Config_LongCurrency];
  else if (cObj.descriptionGallery1.length <= 0)
    return errorsTemplates[errorsId.Config_EmptyGalleryOne];
  else if (cObj.descriptionGallery2.length <= 0)
    return errorsTemplates[errorsId.Config_EmptyGalleryTwo];
  return undefined;
}

function configIsValidIcon(iconData) {
  if (allowedImgTypes.indexOf(iconData.type) == -1)
    return errorsTemplates[errorsId.Config_InvalidIconEx];
  else if (iconData.size > 100 * 1024)
    return errorsTemplates[errorsId.Config_InvalidIconSize];
  return undefined;
}

function configIsValidLocation(location) {
  return /^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/.test(location);
}

function configIsValidTelephone(tel) {
  return /^\(\d{2}\)\ ?\d{3}-?\d{3}-?\d{3}$/.test(tel);
}

/*AJAX*/
function configAjaxLoad() {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Config/config_load.php",
      type: "POST",
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
        else {
          resolve(jsonRealData);
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
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
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
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
    }
  });
}

function configAjaxReCaptchaKey() {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Config/config_recaptcha.php",
      type: "POST",
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        resolve(jsonRealData["key"]);
      }
    });
  });
}
