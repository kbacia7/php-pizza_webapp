var paginatorPage = 1;

function paginatorInit() {
    $("[data-categoryid]").parents(".global-menu-root").css("display", "none");
    paginatorShowCategories(1, 3);

    $("body").on("click", ".paginator-next-page", () => {
        paginatorNextPage();
    });

    $("body").on("click", ".paginator-prev-page", () => {
        paginatorPrevPage();
    });
}

function paginatorPrevPage() {
    if(paginatorPage > 1)
        paginatorSetPage(paginatorPage - 1);
}

function paginatorNextPage() {
    if(paginatorPage * 3 < $("[data-categoryid]").length)
        paginatorSetPage(paginatorPage + 1);
}

function paginatorSetPage(page) {
    let categories = $("[data-categoryid]").length;
    $("[data-categoryid]").parents(".global-menu-root").css("display", "none");
    paginatorPage = page;
    let minID = ((paginatorPage - 1) * 3) + 1;
    let maxID = paginatorPage * 3;
    paginatorShowCategories(minID, maxID);
}


function paginatorShowCategories(a, b) {
    let categoryNumber = 1;
    let categories = $("[data-categoryid]");
    $.each(categories, function() {
        if(categoryNumber >= a && categoryNumber <= b)
            $(this).parents(".global-menu-root").fadeIn(1000);
        categoryNumber++;
    });
}

function paginatorMoveLastPage() {
    let categories = $("[data-categoryid]").length;
    let lastPage = Math.ceil(categories / 3);
    paginatorSetPage(lastPage);
}

function paginatorIsLastPage() {
    let categories = $("[data-categoryid]").length;
    let lastPage = Math.ceil(categories / 3);
    if(paginatorPage == lastPage)
        return true;
    else 
        return false;
}

function paginatorCategoriesOnPage() {
    return $("[data-categoryid]:visible").length;
}