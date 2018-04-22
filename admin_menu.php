<h4 class="text-center">Menu</h4>
<p class="m-0 text-center">Zakładka służy do aktualizowania menu pizzerii. W miejscu tym jak i na stronie głównej na bieżąco wyświetlane są po trzy karty menu, karty te można przewijać strzałkami, natomiast na stronie głównej służy do tego gest przesunięcia</p>
<div class="row">
    <div class="col-4 mt-3 global-menu-root menu-category-hidden" style="display: none">
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">
                <span class="menu-title-position">Nazwa menu</span>
                <input type="text" class="form-control invisible-input collapse menu-title-position-input" />
                <button type="button" class="trash-icon close remove-menu-category-button right-corner" aria-label="Close">
                    <i style="font-size: 0.6em" class="fas fa-trash-alt"></i>
                </button>
                <div class="edit-mode-menu-buttons collapse">
                    <button type="button" class="close menu-title-position-cancel-edit left-corner" aria-label="Close">
                        <i style="font-size: 0.6em" class="fas fa-ban"></i>
                    </button>
                    <button type="button" class="close menu-title-position-save-edit right-corner" aria-label="Close">
                        <i style="font-size: 0.6em" class="fas fa-save"></i>
                    </button>
                </div>
                <div class="remove-menucategory-content collapse">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <button type="button" class="no-remove-menucategory btn btn-success btn-sm mr-2">Zostaw</button>
                        <button type="button" class="remove-menucategory btn btn-danger btn-sm">Usuń</button>
                    </div>
                </div>
            </li>
            <li class="list-group-item unused-never-use-menu" style="display: none !important">
                <button type="button" class="trash-icon close remove-menu-item-button right-corner" aria-label="Close">
                    <i style="font-size: 0.6em" class="fas fa-trash-alt"></i>
                </button>
                <div class="edit-mode-menu-buttons collapse">
                    <button type="button" class="close menu-item-cancel-edit left-corner" aria-label="Close">
                        <i style="font-size: 0.6em" class="fas fa-ban"></i>
                    </button>
                    <button type="button" class="close menu-item-save-edit right-corner" aria-label="Close">
                        <i style="font-size: 0.6em" class="fas fa-save"></i>
                    </button>
                </div>
                <div class="form-group mb-0">
                    <div class="row mt-0-5">
                        <div class="col-9">
                            <span class="float-left">
                                <input type="text" class="form-control invisible-input menu-name-input" value="Nowy element" />
                            </span>
                        </div>
                        <div class="col-3">
                            <span class="float-right menu-price">
                                <span class="badge badge-pill badge-primary">4.99$</span>
                            </span>
                            <input type="text" class="form-control invisible-input collapse menu-price-input" value="4.99$" />
                        </div>
                    </div>
                </div>
                <div class="remove-menu-content collapse">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <button type="button" class="no-remove-menu btn btn-success btn-sm mr-2">Zostaw</button>
                        <button type="button" class="remove-menu btn btn-danger btn-sm">Usuń</button>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <button type="button" class="add-new-menu btn btn-primary btn-sm mr-2">Dodaj nowy element menu</button>
                </div>
            </li>
        </ul>
    </div>
    <div class="add-new-category-button w-100" style="padding-top: 1%">
        <div class="d-flex h-100 justify-content-center align-items-center">
            <button type="button" class="add-menu-category btn btn-primary btn-lg">+</button>
        </div>
    </div>
    <div class="w-100" style="padding-top: 1%">
        <div class="d-flex h-100 justify-content-center align-items-center">
            <h3 class="position-absolute paginator-prev-page" style="top: 0; left: 0;">
                <</h3>
                    <h3 class="position-absolute paginator-next-page" style="top: 0; right: 0;">></h3>
        </div>
    </div>

</div>