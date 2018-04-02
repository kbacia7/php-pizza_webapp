function galleryHandle() {
  $("body").on("mouseenter", ".imageslot", function() {
    $(this).find(".screen-gallery-hide").fadeIn(200);
  });

  $("body").on("mouseleave", ".imageslot", function() {
    $(this).find(".screen-gallery-hide").fadeOut(100);
  });

  $("body").on("click", ".gallery-remove", function() {
    galleryRemove($(this).parents(".imageslot").first());
  });

  $("body").on("click", ".gallery-edit", function() {
    $("#editGallery").modal('show');
  });

  $("body").on("click", ".add-new-gallery-item", function() {
    
    // galleryAdd()
  });

  galleryLoadAll();
}

function galleryLoadAll() {
    galleryAjaxLoad("*", function(d) {
        $.each(d['objects'], function() {
            let e = galleryAdd(this['path']);
            $(e).attr("data-galleryItemID", this['ID']);
        });
        
    });
}

function galleryAdd(imgurl, AJAX) {
    if(AJAX) {
        var file_data = $('#inputGalleryFile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        galleryAjaxUploadFile(file_data);
        let d = {
            path: "",
            description: $("#inputGalleryDescription").val()
        }
        galleryAjaxAdd(d);
    }
    let newGallery = $(".never-used-gallery-slot").clone();
    $(newGallery).removeClass("never-used-gallery-slot");
    $(newGallery).insertBefore($(".never-used-gallery-slot"));
    $(newGallery).find("img").attr('src', imgurl);
    $(newGallery).fadeIn(1000);
    return newGallery;
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
        complete: function (jData) {
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
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
        complete: function (jData) {
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false) //shortcut !jsonRealData['allowed'] didn't work :(
                ajax_is_allowed();
            else {
                callback(jsonRealData['object']);
            }
        }
    });
}

function galleryAjaxRemove(ID) {
    $.ajax({
        url: "PizzaCore/AJAX/Gallery/gallery_remove.php",
        type: "POST",
        data: { ID: ID },
        complete: function (jData) {
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
        }
    });
}

function galleryAjaxUpdate(ID, data) {
    $.ajax({
        url: "PizzaCore/AJAX/Gallery/gallery_update.php",
        type: "POST",
        data: { ID: ID, data: data },
        complete: function (jData) {
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
        }
    });
}

function galleryUploadFile(file) {
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
        else 
        {
            //TODO: Get file name, return url
        }
      }
    });
  }