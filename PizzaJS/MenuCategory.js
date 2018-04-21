/* MAIN */
function menuCategoryHandle() {
  $("body").on("click", ".menu-title-position", function() {
    menuCategoryEditMode($(this));
  });

  $("body").on("click", ".menu-title-position-cancel-edit", function() {
    menuCategoryCancelEdit($(this), true);
  });

  $("body").on("click", ".menu-title-position-save-edit", function() {
    menuCategorySaveEdit($(this));
  });

  $("body").on("click", ".add-menu-category", function() {
    menuCategoryAdd($(document), true);
  });

  $("body").on("click", ".remove-menu-category-button", function() {
    $(this)
      .siblings(".remove-menucategory-content")
      .first()
      .fadeIn(300);
  });

  $("body").on("click", ".no-remove-menucategory", function() {
    $(this)
      .parents(".remove-menucategory-content")
      .first()
      .fadeOut(300);
  });

  $("body").on("click", ".remove-menucategory", function() {
    let elementToRemove = $(this)
      .parents(".global-menu-root")
      .first();
    menuCategoryRemove(elementToRemove);
  });

  return new Promise(function(resolve) {
    menuLoadAll().then(() => {
      resolve();
    });
  });
}

function menuLoadAll() {
  return new Promise(function(resolve) {
    var actions = [];
    menuCategoryAjaxLoad("*").then(function(data) {
      actions = data["objects"].map(menuCategoryLoad);
      resolve(actions);
    });
  });
}

function menuCategoryLoad(o) {
  return new Promise(function(resolve) {
    let e = menuCategoryAdd($(document));
    $(e)
      .find(".menu-title-position")
      .text(o["title"]);
    $(e)
      .find("ul.list-group")
      .first()
      .attr("data-categoryID", o["ID"]);
    menuItemLoad(
      $(e)
        .find("ul.list-group")
        .first(),
      o["ID"]
    );
    resolve(o["ID"]);
  });
}

function menuCategoryEditMode(item) {
  let parentRoot = $(item)
    .parents(".list-group-item")
    .first();
  $(parentRoot)
    .find(".trash-icon")
    .fadeOut(100);
  $(parentRoot)
    .find(".edit-mode-menu-buttons")
    .fadeIn(300);
  let menuTitleInput = $(parentRoot)
    .find(".menu-title-position-input")
    .first();
  let actuallyTitle = $(parentRoot)
    .find(".menu-title-position")
    .first();
  let titleText = $(actuallyTitle).text();

  if (menuItemIsValidTitle(titleText))
    inputSetLastValue(menuTitleInput, titleText);

  $(menuTitleInput).val(titleText);
  $(actuallyTitle).css("display", "none");
  $(menuTitleInput).fadeIn(200);
}

function menuCategoryAdd(parent, AJAX) {
  let cloneNewMenuCategory = $(parent)
    .find(".menu-category-hidden")
    .clone();
  let addNewButton = $(parent)
    .find(".add-new-category-button")
    .first();
  $(cloneNewMenuCategory)
    .removeClass("menu-category-hidden")
    .insertBefore(addNewButton);
  if (AJAX) {
    let dataAdd = {
      title: $(cloneNewMenuCategory)
        .find(".menu-title-position")
        .text()
    };
    menuCategoryAjaxAdd(dataAdd, function(d) {
      $(cloneNewMenuCategory)
        .find("ul")
        .first()
        .attr("data-categoryID", d["ID"]);
      if (!paginatorIsLastPage()) paginatorMoveLastPage();
      $(cloneNewMenuCategory).fadeIn(300);
    });
  } else $(cloneNewMenuCategory).fadeIn(300);
  return cloneNewMenuCategory;
}

function menuCategoryRemove(element) {
  $(element).fadeOut(400);
  $(element).remove();
  if (paginatorCategoriesOnPage() == 0) paginatorPrevPage();
  menuCategoryAjaxRemove(
    $(element)
      .find("ul")
      .first()
      .attr("data-categoryid")
  );
}

function menuCategoryCancelEdit(item, restore) {
  let parentRoot = $(item)
    .parents(".list-group-item")
    .first();
  let menuTitleInput = $(parentRoot).find(".menu-title-position-input");
  $(menuTitleInput).fadeOut(200);

  if (restore) inputRestoreLastValue(menuTitleInput);

  $(parentRoot)
    .find(".menu-title-position")
    .fadeIn(200);
  $(parentRoot)
    .find(".trash-icon")
    .fadeIn(300);
  $(parentRoot)
    .find(".edit-mode-menu-buttons")
    .fadeOut(100);
}

function menuCategorySaveEdit(item) {
  let parentRoot = $(item)
    .parents(".list-group-item")
    .first();
  let newTitle = $(parentRoot)
    .find(".menu-title-position-input")
    .attr("value");
  let inputTitle = $(parentRoot).find(".menu-title-position-input");
  let catID = $(parentRoot)
    .parents("ul.list-group")
    .attr("data-categoryid");
  let o = {
    title: newTitle
  };
  let err = menuCategoryIsValid(o);
  if (err == undefined) {
    $(parentRoot)
      .find(".menu-title-position")
      .text(newTitle);
    menuCategoryAjaxUpdate(catID, o);
    menuCategoryCancelEdit(item, false);
  } else displayError(err);
}

/* Validation */
function menuCategoryIsValidTitle(title) {
  return XRegExp("^[\\p{L},' ']+$").test(title);
}

function menuCategoryIsValid(object) {
  if (object.title.length <= 0)
    return errorsTemplates[errorsId.MenuCategory_EmptyTitle];
  if (!menuCategoryIsValidTitle(object.title))
    return errorsTemplates[errorsId.MenuCategory_EmptyTitle];
  if (object == null) return errorsTemplates[errorsId.MenuCategory_EmptyData];
  return undefined;
}

/* ajax */
function menuCategoryAjaxAdd(
  data,
  callback 
) {
  $.ajax({
    url: "PizzaCore/AJAX/MenuCategory/menucategory_add.php",
    type: "POST",
    data: data,
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false)
        userAjaxIsAdmin();
      else {
        callback(jsonRealData["object"]);
      }
    }
  });
}

function menuCategoryAjaxLoad(ID) {
  return new Promise(function(resolve) {
    $.ajax({
      url: "PizzaCore/AJAX/MenuCategory/menucategory_load.php",
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

function menuCategoryAjaxRemove(ID) {
  $.ajax({
    url: "PizzaCore/AJAX/MenuCategory/menucategory_remove.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
    }
  });
}

function menuCategoryAjaxUpdate(ID, data) {
  $.ajax({
    url: "PizzaCore/AJAX/MenuCategory/menucategory_update.php",
    type: "POST",
    data: { ID: ID, data: data },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
    }
  });
}
