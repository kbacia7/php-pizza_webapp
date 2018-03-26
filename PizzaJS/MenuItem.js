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
        console.log("check~");
        let elementToRemove = $(this).parents(".list-group-item").first();
        menuItemRemove(elementToRemove);
    });

    $("body").on('click', ".no-remove-menu", function() {
        $(this).parents(".remove-menu-content").first().fadeOut(300);
    });
    
    $("body").on('click', '.remove-menu-item-button', function() {
        console.log("check~");
        $(this).siblings(".remove-menu-content").first().fadeIn(300);
    });
}


function menuItemLoad(parent, id) {
    menuItemAjaxLoad({ "parent": id }, function (data) {
        $(data['objects']).each(function () {
            console.log(this);
            let e = menuItemAdd(parent);
            $(e).find(".menu-name-input").first().val(this['title']);
            $(e).find(".menu-name-input").first().text(this['title']);
        
            $(e).find(".menu-name-price").first().val(this['price']);
            $(e).find(".menu-name-price").first().text(this['price']);
            
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
        displayError(errorsTemplates[errorsId.MenuItem_NoValidTitle]);
    else if (!is_valid_menu_price(newPrice))
        displayError(errorsTemplates[errorsId.MenuItem_NoValidPrice]);
}

function menuItemCancelEdit(item, restore) {
    let parentRoot = $(item).parents(".list-group-item").first();
    let inputTitleMenu = $(parentRoot).find(".menu-name-input");
    let inputPriceMenu = $(parentRoot).find(".menu-price-input");

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
    let aPrice = $(badgePrice).text().slice(0, -1);
    let inputTitleMenu = $(parentRoot).find(".menu-name-input");
    let aTitle = $(inputTitleMenu).val();

    if (is_valid_menu_title(aTitle)) 
        input_set_prev_value(inputTitleMenu, aTitle); 

    if(is_valid_menu_price(aPrice)) 
        input_set_prev_value(newMenuPriceInput, aPrice);

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
        menuItemAjaxAdd(dataAdd, function(data) {
            $(cloneNewMenu).attr("data-itemid", data['ID']);
        });
    }
    return cloneNewMenu;
}

function menuItemAjaxAdd(data, callback) //data - {title: "title", price: 3.95, "parent": 1}
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
               callback(jsonRealData['object']);

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