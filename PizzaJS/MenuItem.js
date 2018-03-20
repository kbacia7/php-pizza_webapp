function menuItemHandle() {
    $("body").on('click', ".add-new-menu", function () {
        let parentEl = $(this).parents("ul.list-group").first();
        menuItemAdd(parentEl, true);
    });

    $("body").on('click', ".menu-price, .menu-name-input", function () {
        menuItemEditMode($(this));
    });

    $("body").on('click', ".menu-item-cancel-edit", function () {
        menuItemCancelEdit($(this), true);
    });

    $("body").on('click', ".menu-item-save-edit", function () {
        menuItemSaveEdit($(this));
    });

    $("body").on('click', ".remove-menu", function () {
        let elementToRemove = $(this).parents(".list-group-item").first();
        menuItemRemove(elementToRemove);
    });
}


function menuItemLoad(parent, id) {
    menuItemAjaxLoad({ "parent": id }, function (data) {
        $(data['objects']).each(function () {
            console.log(this);
            let e = menuItemAdd(parent);
            $(e).find(".menu-name-input").first().val(this['title']);
            $(e).find(".menu-name-price").first().val(this['price']);
            $(e).find(".menu-price > .badge").text(this['price'] + "$");
            $(e).attr("data-itemID", this['ID']);
        });
    });
}

function menuItemSaveEdit(item) {
    let parentRoot = $(item).parents(".list-group-item").first();
    let priceInput = $(parentRoot).find(".menu-price-input");
    let titleInput = $(parentRoot).find(".menu-name-input");
    let newPrice = $(priceInput).val();
    let newTitle = $(titleInput).val();
    if (is_valid_menu_title(newTitle) && is_valid_menu_price(newPrice)) {
        $(parentRoot).find(".badge").text(newPrice + "$");
        console.log($(parentRoot).attr("data-itemID"));
        console.log({"title": newTitle, "price": newPrice});
        menuItemAjaxUpdate($(parentRoot).attr("data-itemID"), {"title": newTitle, "price": newPrice});
        menuItemCancelEdit(item, false);
    }
    else if (!is_valid_menu_title(newTitle))
        $(titleInput).addClass('text-danger');
    else if (!is_valid_menu_price(newPrice))
        $(priceInput).addClass('text-danger');
}

function menuItemCancelEdit(item, restore) {
    let parentRoot = $(item).parents(".list-group-item").first();
    let inputTitleMenu = $(parentRoot).find(".menu-name-input");
    let inputPriceMenu = $(parentRoot).find(".menu-price-input");

    $(inputTitleMenu).removeClass("text-danger");
    $(inputPriceMenu).removeClass("text-danger");

    if (restore) {
        restore_prev_value(inputTitleMenu);
        restore_prev_value(inputPriceMenu);
    }

    $(parentRoot).find(".menu-price-input").fadeOut(200);
    $(parentRoot).find(".menu-price > .badge").fadeIn(300);
    $(parentRoot).find(".edit-mode-menu-buttons").fadeOut(100);
    $(parentRoot).find(".trash-icon").fadeIn(300);
}

function menuItemEditMode(item) {
    let parentRoot = $(item).parents(".list-group-item").first();
    $(parentRoot).find(".trash-icon").fadeOut(100);
    $(parentRoot).find(".edit-mode-menu-buttons").fadeIn(300);
    let newMenuPriceInput = $(parentRoot).find(".menu-price-input").first();
    let badgePrice = $(parentRoot).find(".menu-price > .badge").first();
    let aPrice = $(badgePrice).text();
    let inputTitleMenu = $(parentRoot).find(".menu-name-input");
    let aTitle = $(inputTitleMenu).val();

    input_set_prev_value(inputTitleMenu, aTitle);
    input_set_prev_value(newMenuPriceInput, aPrice.slice(0, -1));

    $(newMenuPriceInput).attr("value", aPrice.slice(0, -1));

    $(badgePrice).css("display", "none");
    $(newMenuPriceInput).fadeIn(200);
}

function menuItemRemove(item) {
    $(item).fadeOut(400);
}

function menuItemAdd(parent, ajaxSupport) {
    let cloneNewMenu = $(parent).find(".unused-never-use-menu").clone();
    let addNewButton = $(parent).find(".add-new-menu").parents(".list-group-item").first();
    $(cloneNewMenu).removeClass("unused-never-use-menu").insertBefore(addNewButton);
    $(cloneNewMenu).fadeIn(300);
    if (ajaxSupport) {
        let dataAdd = {
            title: $(cloneNewMenu).find(".menu-name-input").val(),
            price: $(cloneNewMenu).find(".badge").text().slice(0, -1),
            parent: $(parent).attr("data-categoryID")
        }
		console.log(parent);
        menuItemAjaxAdd(dataAdd);
    }
    return cloneNewMenu;
}

function menuItemAjaxAdd(data) //data - {title: "title", price: 3.95, "parent": 1}
{
    $.ajax({
        url: "PizzaCore/AJAX/MenuItem/menuitem_add.php",
        type: "POST",
        data: data,
        complete: function (jData) {
			console.log(jData);
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
            else {
                //error handle?

            }
        }
    });
}

function menuItemAjaxLoad(ID, callback) {
    $.ajax({
        url: "PizzaCore/AJAX/MenuItem/menuitem_load.php",
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

function menuItemAjaxRemove(ID) {
    $.ajax({
        url: "PizzaCore/AJAX/MenuItem/menuitem_remove.php",
        type: "POST",
        data: { ID: ID },
        complete: function (jData) {
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
            else {
                console.log(jsonRealData);
            }
        }
    });
}

function menuItemAjaxUpdate(ID, data) {
    $.ajax({
        url: "PizzaCore/AJAX/MenuItem/menuitem_update.php",
        type: "POST",
        data: { ID: ID, data: data },
        complete: function (jData) {
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
            else {
                console.log(jsonRealData);
            }
        }
    });
}