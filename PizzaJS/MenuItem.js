/* Main */
function menuItemHandle() {
  $("body").on("click", ".add-new-menu", function() {
    let parentEl = $(this)
      .parents("ul.list-group")
      .first();
    menuItemAdd(parentEl, true);
  });

  $("body").on("click", ".menu-price, .menu-name-input", function() {
    menuItemEditMode($(this));
  });

  $("body").on("click", ".menu-item-cancel-edit", function() {
    menuItemCancelEdit($(this), true);
  });

  $("body").on("click", ".menu-item-save-edit", function() {
    menuItemSaveEdit($(this));
  });

  $("body").on("click", ".remove-menu", function() {
    let elementToRemove = $(this)
      .parents(".list-group-item")
      .first();
    menuItemRemove(elementToRemove);
  });

  $("body").on("click", ".no-remove-menu", function() {
    $(this)
      .parents(".remove-menu-content")
      .first()
      .fadeOut(300);
  });

  $("body").on("click", ".remove-menu-item-button", function() {
    $(this)
      .siblings(".remove-menu-content")
      .first()
      .fadeIn(300);
  });
}

function menuItemLoad(parent, id) {
  menuItemAjaxLoad({ parent: id }, function(data) {
    $(data["objects"]).each(function() {
      let e = menuItemAdd(parent);
      $(e)
        .find(".menu-name-input")
        .first()
        .val(this["title"]);
      $(e)
        .find(".menu-name-input")
        .first()
        .text(this["title"]);

      $(e)
        .find(".menu-name-price")
        .first()
        .val(this["price"]);
      $(e)
        .find(".menu-name-price")
        .first()
        .text(this["price"]);

      $(e)
        .find(".menu-price > .badge")
        .text(this["price"] + "$");
      $(e).attr("data-itemID", this["ID"]);
    });
  });
}

function menuItemSaveEdit(item) {
  let parentRoot = $(item)
    .parents(".list-group-item")
    .first();
  let priceInput = $(parentRoot).find(".menu-price-input");
  let titleInput = $(parentRoot).find(".menu-name-input");
  let newPrice = $(priceInput).val();
  let newTitle = $(titleInput).val();
  let d = {
    title: newTitle,
    price: newPrice
  };
  let e = menuItemIsValid(d);
  if (e == undefined) {
    $(parentRoot)
      .find(".badge")
      .text(newPrice + "$");
    menuItemAjaxUpdate($(parentRoot).attr("data-itemID"), d);
    menuItemCancelEdit(item, false);
  } else displayError(e);
}

function menuItemCancelEdit(item, restore) {
  let parentRoot = $(item)
    .parents(".list-group-item")
    .first();
  let inputTitleMenu = $(parentRoot).find(".menu-name-input");
  let inputPriceMenu = $(parentRoot).find(".menu-price-input");

  if (restore) {
    inputRestoreLastValue(inputTitleMenu);
    inputRestoreLastValue(inputPriceMenu);
  }

  $(parentRoot)
    .find(".menu-price-input")
    .fadeOut(200);
  $(parentRoot)
    .find(".menu-price > .badge")
    .fadeIn(300);
  $(parentRoot)
    .find(".edit-mode-menu-buttons")
    .fadeOut(100);
  $(parentRoot)
    .find(".trash-icon")
    .fadeIn(300);
}

function menuItemEditMode(item) {
  let parentRoot = $(item)
    .parents(".list-group-item")
    .first();
  $(parentRoot)
    .find(".trash-icon")
    .fadeOut(100);
  $(parentRoot)
    .find(".edit-mode-menu-buttons")
    .fadeIn(300);
  let newMenuPriceInput = $(parentRoot)
    .find(".menu-price-input")
    .first();
  let badgePrice = $(parentRoot)
    .find(".menu-price > .badge")
    .first();
  let aPrice = $(badgePrice)
    .text()
    .slice(0, -1);
  let inputTitleMenu = $(parentRoot).find(".menu-name-input");
  let aTitle = $(inputTitleMenu).val();

  if (menuItemIsValidTitle(aTitle)) inputSetLastValue(inputTitleMenu, aTitle);

  if (menuItemIsValidPrice(aPrice))
    inputSetLastValue(newMenuPriceInput, aPrice);

  $(newMenuPriceInput).attr("value", aPrice);

  $(badgePrice).css("display", "none");
  $(newMenuPriceInput).fadeIn(200);
}

function menuItemRemove(item) {
  $(item).fadeOut(400);
  menuItemAjaxRemove($(item).attr("data-itemid"));
  $(item).remove();
}

function menuItemAdd(parent, ajaxSupport) {
  let cloneNewMenu = $(parent)
    .find(".unused-never-use-menu")
    .clone();
  let addNewButton = $(parent)
    .find(".add-new-menu")
    .parents(".list-group-item")
    .first();
  $(cloneNewMenu)
    .removeClass("unused-never-use-menu")
    .insertBefore(addNewButton);
  $(cloneNewMenu).fadeIn(300);
  if (ajaxSupport) {
    let dataAdd = {
      title: $(cloneNewMenu)
        .find(".menu-name-input")
        .val(),
      price: $(cloneNewMenu)
        .find(".badge")
        .text()
        .slice(0, -1),
      parent: $(parent).attr("data-categoryID")
    };
    menuItemAjaxAdd(dataAdd, function(data) {
      $(cloneNewMenu).attr("data-itemid", data["ID"]);
    });
  }
  return cloneNewMenu;
}

/* Validation */
function menuItemIsValidTitle(title) {
  return XRegExp("^[\\p{L},' ']+$").test(title);
}

function menuItemIsValidPrice(price) {
  return /^(\d{1,3})?(,?\d{3})*(\.\d{2})?$/.test(price);
}

function menuItemIsValid(obj) {
  if (obj == null) return errorsTemplates[errorsId.MenuItem_EmptyData];
  else if (obj.price.length <= 0)
    return errorsTemplates[errorsId.MenuItem_EmptyPrice];
  else if (obj.title.length <= 0)
    return errorsTemplates[errorsId.MenuItem_EmptyTitle];
  else if (!menuItemIsValidPrice(obj.price))
    return errorsTemplates[errorsId.MenuItem_InvalidPrice];
  else if (!menuItemIsValidTitle(obj.title))
    return errorsTemplates[errorsId.MenuItem_InvalidTitle];
  return undefined;
}

/* AJAX */
function menuItemAjaxAdd(data, callback) {
  $.ajax({
    url: "PizzaCore/AJAX/MenuItem/menuitem_add.php",
    type: "POST",
    data: data,
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
      else {
        //error handle?
        callback(jsonRealData["object"]);
      }
    }
  });
}

function menuItemAjaxLoad(ID, callback) {
  $.ajax({
    url: "PizzaCore/AJAX/MenuItem/menuitem_load.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
      else {
        callback(jsonRealData);
      }
    }
  });
}

function menuItemAjaxRemove(ID) {
  $.ajax({
    url: "PizzaCore/AJAX/MenuItem/menuitem_remove.php",
    type: "POST",
    data: { ID: ID },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
    }
  });
}

function menuItemAjaxUpdate(ID, data) {
  $.ajax({
    url: "PizzaCore/AJAX/MenuItem/menuitem_update.php",
    type: "POST",
    data: { ID: ID, data: data },
    complete: function(jData) {
      var jsonRealData = JSON.parse(jData["responseText"]);
      if (jsonRealData["alllowed"] === false) userAjaxIsAdmin();
    }
  });
}
