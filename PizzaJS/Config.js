function configSetForm(configObject) {
  $("#inputName").val(configObject['title']);
  $("#inputLocation").val(configObject['position']);
  $("#inputMoney").val(configObject['cashChar']);
  $("#inputGallery1").val(configObject['descriptionGallery1']);
  $("#inputGallery2").val(configObject['descriptionGallery2']);
  document.title = configObject['title'];
}

function configSetData(configObject) {
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
