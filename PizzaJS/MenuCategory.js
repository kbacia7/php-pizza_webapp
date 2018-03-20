function menuCategoryHandle() {
    $("body").on('click', '.menu-title-position', function () {
        menuCategoryEditMode($(this));
    });

    $("body").on("click", '.menu-title-position-cancel-edit', function () {
        menuCategoryCancelEdit($(this));
    });

    $("body").on("click", '.menu-title-position-save-edit', function () {
        menuCategorySaveEdit($(this));
    });

    $("body").on("click", ".add-menu-category", function() {
        menuCategoryAdd($(document), true);
    });

    menuLoadAll();
    console.log("handle");
}

function menuLoadAll() {
    menuCategoryAjaxLoad("*", function(data) {
        $(data['objects']).each(function() {
            let e = menuCategoryAdd($(document));
            $(e).find(".menu-title-position").text(this['title']);
			$(e).find("ul.list-group").first().attr("data-categoryID", this['ID']);
            console.log(this);
            menuItemLoad($(e).find("ul.list-group").first(), this['ID']);
        });
    });
    
}

function menuCategoryEditMode(item) {
    let parentRoot = $(item).parents(".list-group-item").first();
    $(parentRoot).find(".edit-mode-menu-buttons").fadeIn(300);
    let menuTitleInput = $(parentRoot).find(".menu-title-position-input").first();

    input_set_prev_value(menuTitleInput);

    let actuallyTitle = $(parentRoot).find(".menu-title-position").first();
    let titleText = $(actuallyTitle).text();
    $(menuTitleInput).val(titleText);
    $(actuallyTitle).css("display", "none");
    $(menuTitleInput).fadeIn(200);
}

function menuCategoryAdd(parent, AJAX) {
    let cloneNewMenuCategory = $(parent).find(".menu-category-hidden").clone();
    let addNewButton = $(parent).find(".add-new-category-button").first();
    $(cloneNewMenuCategory).removeClass("menu-category-hidden").insertBefore(addNewButton);
    $(cloneNewMenuCategory).fadeIn(300);

    if(AJAX)
    { 
        let dataAdd = {
            title: $(cloneNewMenuCategory).find(".menu-title-position").text(),
        }
        console.log(dataAdd);
        menuCategoryAjaxAdd(dataAdd);
    }
    return cloneNewMenuCategory;
}

function menuCategoryCancelEdit(item) {
    let parentRoot = $(item).parents(".list-group-item").first();
    let menuTitleInput = $(parentRoot).find(".menu-title-position-input");
    $(menuTitleInput).fadeOut(200);
    restore_prev_value(menuTitleInput);
    $(parentRoot).find(".menu-title-position").fadeIn(200);
    $(parentRoot).find(".edit-mode-menu-buttons").fadeOut(100);
}

function menuCategorySaveEdit(item) {
    let parentRoot = $(item).parents(".list-group-item").first();
    let newTitle = $(parentRoot).find(".menu-title-position-input").attr("value");
    $(parentRoot).find(".menu-title-position").text(newTitle);
	menuCategoryAjaxUpdate($(parentRoot).parents("ul.list-group").attr("data-categoryid"), {"title": newTitle});
    menuCategoryCancelEdit(item);
}

function menuCategoryAjaxAdd(data) //data - {title: "title"}
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
                //error handle?

            }
        }
    });
}

function menuCategoryAjaxLoad(ID, callback) {
    $.ajax({
        url: "PizzaCore/AJAX/MenuCategory/menucategory_load.php",
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