let actuallyGalleryID = 1;
function galleryHandle() {
  $("body").on("mouseenter", ".imageslot", function() {
    $(this)
      .find(".screen-gallery-hide")
      .fadeIn(200);
  });

  $("body").on("mouseleave", ".imageslot", function() {
    $(this)
      .find(".screen-gallery-hide")
      .fadeOut(100);
  });

  $("body").on("click", ".gallery-remove", function() {
    galleryRemove(
      $(this)
        .parents(".imageslot")
        .first()
    );
  });

  $("body").on("click", ".gallery-edit", function() {
    $("#editGallery").modal("show");
  });

  $("body").on("click", ".add-new-gallery-item", function() {
    galleryAdd("", true);
  });


  $("body").on("click", "button[data-galleryID]", function () {
      $("button[data-galleryID].active").removeClass("active");
      $(this).addClass("active");
      galleryChange($(this).attr("data-galleryID"));
  })
  galleryLoadAll();
}

function galleryLoadAll() {
  galleryAjaxLoad("*", function(d) {
    $.each(d["objects"], function() {
      let u = document.location.origin + "/images/NormalPC/gallery1/" + this["path"];
      let e = galleryAdd(u, undefined);
      $(e).attr("data-galleryItemID", this["ID"]);
      $(e).attr("data-galleryContainsID", this["galleryID"]);
      if(this["galleryID"] != actuallyGalleryID)
        $(e).addClass("collapse");
    });
  });
}

function galleryChange(ID) {
    $("[data-galleryContainsID=" + actuallyGalleryID + "]").fadeOut(100);
    $("[data-galleryContainsID=" + ID + "]").fadeIn(100);
    actuallyGalleryID = ID;
}

function galleryAdd(imgurl, AJAX) {
  let promiseWait = null;
  if (AJAX) {
    var file_data = $("#inputGalleryFile").prop("files")[0];
    var form_data = new FormData();
    form_data.append("file", file_data);
    promiseWait = galleryAjaxUploadFile(form_data);
    Promise.all([promiseWait]).then(function(fileName) {
      imgurl = document.location.origin + "/images/NormalPC/gallery1/" + fileName;
      let d = {
        path: fileName.toString(),
        description: $("#inputGalleryDescriptionCreate").val(),
        galleryID: actuallyGalleryID
      };
      galleryAjaxAdd(d, () => {});
    });
    $("#addGallery").modal('hide');
  }
  Promise.all([promiseWait]).then(function() {
    let newGallery = $(".never-used-gallery-slot").clone();
    $(newGallery).removeClass("never-used-gallery-slot");
    $(newGallery).insertBefore($(".never-used-gallery-slot"));
    $(newGallery)
      .find("img")
      .attr("src", imgurl);
    $(newGallery).fadeIn(1000);
    return newGallery;
  });
}

function galleryRemove(el) {
  $(el).fadeOut(300);
  galleryAjaxRemove($(el).attr("data-galleryItemID"));
}

function galleryAjaxLoad(ID, callback) {
  $.ajax({
    url: "PizzaCore/AJAX/Gallery/gallery_load.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
      else {
        callback(jsonRealData);
      }
    }
  });
}

function galleryAjaxAdd(data, callback) {
  $.ajax({
    url: "PizzaCore/AJAX/Gallery/gallery_add.php",
    type: "POST",
    data: data,
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false)
        //shortcut !jsonRealData['allowed'] didn't work :(
        ajax_is_allowed();
      else {
        callback(jsonRealData["object"]);
      }
    }
  });
}

function galleryAjaxRemove(ID) {
  $.ajax({
    url: "PizzaCore/AJAX/Gallery/gallery_remove.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}

function galleryAjaxUpdate(ID, data) {
  $.ajax({
    url: "PizzaCore/AJAX/Gallery/gallery_update.php",
    type: "POST",
    data: { ID: ID, data: data },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) ajax_is_allowed();
    }
  });
}

function galleryAjaxUploadFile(file) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Gallery/gallery_upload.php",
      type: "POST",
      data: file,
      cache: false,
      contentType: false,
      processData: false,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["alllowed"] === false) ajax_is_allowed();
        else {
          resolve(jsonRealData['filename']);
        }
      }
    });
  });
}
