function menuCategoryHandle() {
    $("body").on('click', '.menu-title-position', function () {
        menuCategoryEditMode($(this));
    });

    $("body").on("click", '.menu-title-position-cancel-edit', function () {
        menuCategoryCancelEdit($(this), true);
    });

    $("body").on("click", '.menu-title-position-save-edit', function () {
        menuCategorySaveEdit($(this));
    });

    $("body").on("click", ".add-menu-category", function () {
        menuCategoryAdd($(document), true);
    });

    $("body").on("click", ".remove-menu-category-button", function () {
        $(this).siblings(".remove-menucategory-content").first().fadeIn(300);
    });

    $("body").on('click', ".no-remove-menucategory", function () {
        $(this).parents(".remove-menucategory-content").first().fadeOut(300);
    });

    $("body").on("click", ".remove-menucategory", function () {
        let elementToRemove = $(this).parents(".global-menu-root").first();
        menuCategoryRemove(elementToRemove);
    });

    menuLoadAll();
    console.log("handle");
}

function menuLoadAll() {
    return new Promise(function(resolve) {
        var actions = [];
        menuCategoryAjaxLoad("*").then(function(data) {
            actions = data['objects'].map(menuCategoryLoad);
            resolve(actions);
        });
    });
}

function menuCategoryLoad(o) {
    return new Promise(function(resolve) {
        let e = menuCategoryAdd($(document));
        $(e).find(".menu-title-position").text(o['title']);
        $(e).find("ul.list-group").first().attr("data-categoryID", o['ID']);
        console.log(o);
        menuItemLoad($(e).find("ul.list-group").first(), o['ID']);
        resolve(o['ID']);
    });
}

function menuCategoryEditMode(item) {
    let parentRoot = $(item).parents(".list-group-item").first();
    $(parentRoot).find(".edit-mode-menu-buttons").fadeIn(300);
    let menuTitleInput = $(parentRoot).find(".menu-title-position-input").first();
    let actuallyTitle = $(parentRoot).find(".menu-title-position").first();
    let titleText = $(actuallyTitle).text();

    if (is_valid_menu_title(titleText)) 
        input_set_prev_value(menuTitleInput, titleText);

   
    $(menuTitleInput).val(titleText);
    $(actuallyTitle).css("display", "none");
    $(menuTitleInput).fadeIn(200);
}

function menuCategoryAdd(parent, AJAX) {
    let cloneNewMenuCategory = $(parent).find(".menu-category-hidden").clone();
    let addNewButton = $(parent).find(".add-new-category-button").first();
    $(cloneNewMenuCategory).removeClass("menu-category-hidden").insertBefore(addNewButton);
    $(cloneNewMenuCategory).fadeIn(300);

    if (AJAX) {
        let dataAdd = {
            title: $(cloneNewMenuCategory).find(".menu-title-position").text(),
        }
        menuCategoryAjaxAdd(dataAdd, function (d) {
            console.log(d);
            $(cloneNewMenuCategory).find("ul").first().attr("data-categoryID", d['ID']);
        });
    }
    return cloneNewMenuCategory;
}

function menuCategoryRemove(element) {

    $(element).fadeOut(400);
    let pointCount = 0;
    let categoriesArray = $(element).find("li");
    console.log(categoriesArray.length);
    function menuCategoryRemoveLoop()  //async -> sync
    {
        if (pointCount < categoriesArray.length - 1) {
            if ($(categoriesArray[pointCount]).attr("data-itemid") !== undefined)
                menuItemAjaxRemove($(categoriesArray[pointCount]).attr("data-itemid"));
            pointCount++;
            menuCategoryRemoveLoop();
        }
        else
            menuCategoryAjaxRemove($(element).find("ul").first().attr("data-categoryid"));
    }
    menuCategoryRemoveLoop();
}


function menuCategoryCancelEdit(item, restore) {
    let parentRoot = $(item).parents(".list-group-item").first();
    let menuTitleInput = $(parentRoot).find(".menu-title-position-input");
    $(menuTitleInput).fadeOut(200);

    if(restore)
        restore_prev_value(menuTitleInput);

    $(parentRoot).find(".menu-title-position").fadeIn(200);
    $(parentRoot).find(".edit-mode-menu-buttons").fadeOut(100);
}

function menuCategorySaveEdit(item) {
    let parentRoot = $(item).parents(".list-group-item").first();
    let newTitle = $(parentRoot).find(".menu-title-position-input").attr("value");
    let inputTitle = $(parentRoot).find(".menu-title-position-input");
    if(is_valid_menu_title(newTitle))
    {
        $(parentRoot).find(".menu-title-position").text(newTitle);
        menuCategoryAjaxUpdate($(parentRoot).parents("ul.list-group").attr("data-categoryid"), { "title": newTitle });
        menuCategoryCancelEdit(item, false);
    }
    else 
        displayError(errorsTemplates[errorsId.MenuItem_NoValidTitle]);
    
}

function menuCategoryAjaxAdd(data, callback) //data - {title: "title"}
{
    $.ajax({
        url: "PizzaCore/AJAX/MenuCategory/menucategory_add.php",
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

function menuCategoryAjaxLoad(ID) {
    return new Promise(function(resolve) {
        $.ajax({
            url: "PizzaCore/AJAX/MenuCategory/menucategory_load.php",
            type: "POST",
            data: { ID: ID },
            complete: function (jData) {
                var jsonRealData = JSON.parse(jData['responseText']);
                if (jsonRealData['alllowed'] === false)
                    ajax_is_allowed();
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

function menuCategoryAjaxUpdate(ID, data) {
    $.ajax({
        url: "PizzaCore/AJAX/MenuCategory/menucategory_update.php",
        type: "POST",
        data: { ID: ID, data: data },
        complete: function (jData) {
            console.log(jData);
            var jsonRealData = JSON.parse(jData['responseText']);
            if (jsonRealData['alllowed'] === false)
                ajax_is_allowed();
            else {
                console.log(jsonRealData);
            }
        }
    });
}