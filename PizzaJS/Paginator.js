var paginatorPage = 1;
var paginatorGlobalElements = null;
var paginatorGlobalElName="";
var paginatorIsVisibleSel = "";
var paginatorNextPageSel = "";
var paginatorPrevPageSel = "";
var paginatorElement = "";

function paginatorInit(settings) {
    paginatorGlobalElements = settings['globalselector'];
    paginatorGlobalElName = settings['globalselectorname'];
    paginatorIsVisibleSel = settings['visiblesel'];
    paginatorNextPageSel = settings['nextpage'];
    paginatorPrevPageSel = settings['prevpage'];
    paginatorElement = settings['element'];

    $(paginatorGlobalElements).css("display", "none");
    //$("[data-categoryid]").parents(".global-menu-root").css("display", "none");
    paginatorShowCategories(1, 3);

    $("body").on("click", paginatorNextPageSel/*".paginator-next-page"*/, () => {
        paginatorNextPage();
    });

    $("body").on("click", paginatorPrevPageSel, () => {
        paginatorPrevPage();
    });
}

function paginatorPrevPage() {
    if(paginatorPage > 1)
        paginatorSetPage(paginatorPage - 1);
}

function paginatorNextPage() {
    if(paginatorPage * 3 < $(paginatorElement).length)
        paginatorSetPage(paginatorPage + 1);
}

function paginatorSetPage(page) {
    let categories = $(paginatorElement).length;
    $(paginatorGlobalElements).css("display", "none");
    paginatorPage = page;
    let minID = ((paginatorPage - 1) * 3) + 1;
    let maxID = paginatorPage * 3;
    paginatorShowCategories(minID, maxID);
}


function paginatorShowCategories(a, b) {
    let categoryNumber = 1;
    let categories = $(paginatorElement);
    $.each(categories, function() {
        if(categoryNumber >= a && categoryNumber <= b)
            $(this).parents(paginatorGlobalElName).fadeIn(1000);
        categoryNumber++;
    });
}

function paginatorMoveLastPage() {
    let categories = $(paginatorElement).length;
    let lastPage = Math.ceil(categories / 3);
    paginatorSetPage(lastPage);
}

function paginatorIsLastPage() {
    let categories = $(paginatorElement).length;
    let lastPage = Math.ceil(categories / 3);
    if(paginatorPage == lastPage)
        return true;
    else 
        return false;
}

function paginatorCategoriesOnPage() {
    return $(paginatorIsVisibleSel/*"[data-categoryid]:visible"*/).length;
}