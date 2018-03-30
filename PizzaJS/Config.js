function configSetForm(configObject) {
  $("#inputName").val(configObject['title']);
  $("#inputLocation").val(configObject['position']);
  $("#inputMoney").val(configObject['cashChar']);
  $("#inputGallery1").val(configObject['descriptionGallery1']);
  $("#inputGallery2").val(configObject['descriptionGallery2']);
}

function configSetData(configObject) {
  $("#block2-description").text(configObject['descriptionGallery1']);
  $("#block4-description").text(configObject['descriptionGallery2']);
  document.title = configObject['title'];
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

function configAjaxUpdate(data) {
  $.ajax({
    url: "PizzaCore/AJAX/Config/config_update.php",
    type: "POST",
    data: { ID: 1, data: data },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}
