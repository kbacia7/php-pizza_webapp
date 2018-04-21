let actuallyGalleryID = 1;
let galleryAllowedImgTypes = [
  "image/png",
  "image/bmp",
  "image/jpg",
  "image/jpeg"
];
let isAnyActive = [false, false];

/* MAIN */
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
    $("#editGallery")
      .find("#inputGalleryDescription")
      .first()
      .val(
        $(this)
          .parents("[data-galleryItemDesc]")
          .first()
          .attr("data-galleryItemDesc")
      );
    $("#editGallery").attr(
      "data-displayID",
      $(this)
        .parents("[data-galleryItemID]")
        .first()
        .attr("data-galleryItemID")
    );
  });

  $("body").on("click", ".add-new-gallery-item", function() {
    $("#addGallery").modal("hide");
    galleryAdd(null, true).catch(function() {
      return;
    });
  });

  $("body").on("click", "#galleryAddImg", function() {
    if (actuallyGalleryID == 2) {
      $("#inputGalleryDescriptionCreate").prop("disabled", true);
    } else $("#inputGalleryDescriptionCreate").prop("disabled", false);
    $("#addGallery").modal("show");
  });

  $("body").on("click", "button[data-galleryID]", function() {
    $("button[data-galleryID].active").removeClass("active");
    $(this).addClass("active");
    galleryChange($(this).attr("data-galleryID"));
  });

  $("body").on("click", "#galleryUpdateSave", function() {
    $("#editGallery").modal("hide");
    galleryUpdate($("[data-displayID]").attr("data-displayID"));
  });
  galleryLoadAll();
}

function galleryLoadAll() {
  galleryAjaxLoad("*").then(function(d) {
    $.each(d["objects"], function() {
      galleryAdd(this, undefined)
        .then(function(rArray) {
          let o = rArray[0];
          let e = rArray[1];
          if (o.galleryID != actuallyGalleryID) $(e).css("display", "none");
        })
        .catch(function() {});
    });
  });
}

function galleryLoadAllHome() {
  return new Promise(function(resolve) {
    let promises = [];
    galleryAjaxLoad("*").then(function(data) {
      promises = data["objects"].map(galleryAddHome);
      resolve(promises);
    });
  });
}

function galleryChange(ID) {
  $("[data-galleryContainsID=" + actuallyGalleryID + "]").css(
    "display",
    "none"
  );
  $("[data-galleryContainsID=" + ID + "]").fadeIn(100);
  actuallyGalleryID = ID;
}

function galleryUpdate(ID) {
  $("[data-galleryitemid=" + ID + "]").attr(
    "data-galleryItemDesc",
    $("#inputGalleryDescription").val()
  );
  galleryAjaxUpdate(ID, { description: $("#inputGalleryDescription").val() });
}

function galleryAdd(galleryObj, AJAX) {
  let e = null;
  let mustWait = false;
  let d = {};
  return new Promise(function(resolve, reject) {
    let promiseWait = [];
    if (AJAX) {
      d = {
        path: "",
        description: $("#inputGalleryDescriptionCreate").val(),
        galleryID: actuallyGalleryID
      };
      e = galleryIsValid(d);
      var file_data = $("#inputGalleryFile").prop("files")[0];
      var form_data = new FormData();
      form_data.append("file", file_data);
      form_data.append("galleryID", actuallyGalleryID);
      let vImg = galleryIsValidImg(file_data);
      if (vImg == undefined && e == undefined) {
        promiseWait.push(galleryAjaxUploadFile(form_data));
        Promise.all(promiseWait).then(function(fileName) {
          d = {
            path: fileName.toString(),
            description: $("#inputGalleryDescriptionCreate").val(),
            galleryID: actuallyGalleryID
          };
          e = galleryIsValid(d);
          if (e == undefined) {
            mustWait = true;
          } else return displayError(e);
        });
      } else {
        displayError(vImg);
        displayError(e);
      }
    }

    Promise.all(promiseWait).then(function() {
      if (mustWait)
        promiseWait.push(
          galleryAjaxAdd(d).then(function(o) {
            galleryObj = o;
          })
        );
      Promise.all(promiseWait).then(function() {
        if (galleryObj != null) {
          let newGallery = $(".never-used-gallery-slot").clone();
          let imgurl =
            document.location.origin +
            "/images/NormalPC/gallery" +
            galleryObj.galleryID +
            "/" +
            galleryObj.path;
          $(newGallery).removeClass("never-used-gallery-slot");
          $(newGallery).insertBefore($(".never-used-gallery-slot"));
          $(newGallery)
            .find("img")
            .attr("src", imgurl);
          $(newGallery).attr("data-galleryItemDesc", galleryObj.description);
          $(newGallery).attr("data-galleryItemID", galleryObj.ID);
          $(newGallery).attr("data-galleryContainsID", galleryObj.galleryID);
          $(newGallery).fadeIn(1000);
          resolve([galleryObj, newGallery]);
        } else reject();
      });
    });
  });
}

function galleryAddHome(galleryObj) {
  return new Promise(function(resolve) {
    let classStr = ".never-used-gallery-slot-g" + galleryObj.galleryID;
    let newGallery = $(classStr).clone();
    let imgurl =
      document.location.origin +
      "/images/NormalPC/gallery" +
      galleryObj.galleryID +
      "/" +
      galleryObj.path;
    $(newGallery).removeClass(classStr.substr(1));
    $(newGallery).insertBefore($(classStr));
    let sImg = $(newGallery);
    let aSrc = $(sImg).attr("src");
    let nSrc = aSrc.replace(/\[FILENAME\]/g, galleryObj.path);
    $(sImg).attr("src", nSrc);

    aSrc = $(sImg).attr("srcset");
    nSrc = aSrc.replace(/\[FILENAME\]/g, galleryObj.path);
    $(sImg).attr("srcset", nSrc);
    $(sImg).attr("data-description", galleryObj.description);

    if (isAnyActive[galleryObj.galleryID - 1]) $(sImg).removeAttr("id");
    isAnyActive[galleryObj.galleryID - 1] = true;
    resolve(sImg);
  });
}

function galleryRemove(el) {
  $(el).remove();
  galleryAjaxRemove($(el).attr("data-galleryItemID"));
}

/* Validation */
function galleryIsValid(obj) {
  if (obj.galleryID > 2 && obj.galleryID < 1)
    return errorsTemplates[errorsId.Gallery_InvalidGalleryID];
  if (obj.description.length <= 0 && obj.galleryID == 1)
    return errorsTemplates[errorsId.Gallery_EmptyImageDescription];
  return undefined;
}

function galleryIsValidImg(img) {
  if (galleryAllowedImgTypes.indexOf(img.type) == -1)
    return errorsTemplates[errorsId.Gallery_InvalidImageEx];
  else if (img.size > 10 * 1024 * 1024)
    return errorsTemplates[errorsId.Gallery_InvalidImageSize];
  return undefined;
}

/* AJAX */
function galleryAjaxLoad(ID) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Gallery/gallery_load.php",
      type: "POST",
      data: { ID: ID },
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

function galleryAjaxAdd(data) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/Gallery/gallery_add.php",
      type: "POST",
      data: data,
      complete: function(jData) {
        var jsonRealData = JSON.parse(jData["responseText"]);
        if (jsonRealData["alllowed"] === false)
          //shortcut !jsonRealData['allowed'] didn't work :(
          userAjaxIsAdmin();
        else {
          resolve(jsonRealData["object"]);
        }
      }
    });
  });
}

function galleryAjaxRemove(ID) {
  $.ajax({
    url: "PizzaCore/AJAX/Gallery/gallery_remove.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
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
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
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
        if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
        else {
          resolve(jsonRealData["filename"]);
        }
      }
    });
  });
}
