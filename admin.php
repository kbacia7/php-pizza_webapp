<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style>
		[data-dialog="true"] label, input { display:block; }
		[data-dialog="true"] input.text { margin-bottom:12px; width:95%; padding: .4em; }
		[data-dialog="true"] fieldset { padding:0; border:0; }
		[data-dialog="true"] h1 { font-size: 1.2em; margin: .6em 0; }
		[data-dialog="true"] div#users-contain { width: 350px; margin: 20px 0; }
		[data-dialog="true"] div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		[data-dialog="true"]div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		[data-dialog="true"] .ui-dialog .ui-state-error { padding: .3em; }
		[data-dialog="true"] .validateTips { border: 1px solid transparent; padding: 0.3em; }
		[data-dialog="true"] .error { color: #FF0000; font-weight: bold; }
	</style>
    <link rel="icon" href="images/pizzaicon.png">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="rwd.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="animate.css" />
    <script src="bootstrap-notify.js"></script>
    <script src="xregexp.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Courgette|Montserrat|Roboto|Pacifico" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="PizzaJS/MenuItem.js"></script>
    <script src="PizzaJS/MenuCategory.js"></script>
    <script src="PizzaJS/Error.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Your pizzeria</title>
</head>
<body>

   
    <!-- Modals -->
    <!-- Wait Modal -->
    <div class="modal" id="waitDialog" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Ładowanie...</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block1">
        <div class="container-fluid h-100">
        
            <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-redirect="home" href="#">Strona główna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-redirect="menu_manager" href="#" id="menu">Menu</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style="max-height: 400px; overflow-y: auto">
                        <div class="container">
                            <div class="row">
                                <div class="col-12" id="main_start">
                                    <div id="home" class="active_element"> <!-- Strona Główna-->
                                        <h4 class="text-center">Panel administracyjny</h4>
                                        <p class="m-0">W panelu administratora można:</p>
                                        <div class="ml-4">
                                            <ul>
                                                <li>Zarządzać menu</li>
                                                <li>Zarządzać galerią</li>
                                                <li>Odpowiadać na maile</li>
                                                <li>Wysyłać szybkie powiadomienia</li>
                                                <li>I wiele innych...!</li>
                                            </ul>
                                        </div>
                                        <p>Ponadto cała komunikacja odbywa się poprzez AJAX, toteż nie jest wymagane przeładowywanie strony!</p>
                                    </div>
                                    <div id="menu_manager"> <!-- MENU -->
                                        <h4 class="text-center">Menu</h4>
                                        <p class="m-0 text-center">W tym miejscu możesz zarządzać menu, zmieniać elementy menu, aktualizować i usuwać!</p>
                                        <div class="row">
                                            <div class="col-4 mt-3 global-menu-root menu-category-hidden" style="display: none">
                                                <ul class="list-group">
                                                    <li class="list-group-item list-group-item-primary">
                                                        <span class="menu-title-position">Nazwa menu</span>
                                                        <input type="text" class="form-control invisible-input collapse menu-title-position-input"/> 
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
                                                                        <input type="text" class="form-control invisible-input menu-name-input" value="Nowy element"/>
                                                                    </span> 
                                                                </div>
                                                                <div class="col-3">
                                                                    <span class="float-right menu-price"><span class="badge badge-pill badge-primary">4.99$</span></span>
                                                                    <input type="text" class="form-control invisible-input collapse menu-price-input" value="4.99$"/>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>  
            </div>
            </div>
        </div>
    </div>     
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        errorsTemplatesAjaxLoad().then(function (templates) {
            console.log(templates);
            errorsTemplates = templates;
            hide_unused();
            ajax_is_allowed();
            menuItemHandle();
            menuCategoryHandle();

            $(".nav-link").on("click", function() {
                subsite_change($(this).attr("data-redirect"));
            });

            $("body").on('change', ".menu-price-input, .menu-name-input, .menu-title-position-input", function() {
                $(this).attr("value", $(this).val());
            });

        })
    });

    function subsite_change(new_subsite)
    {
        $(".active_element").fadeOut("fast", function() {
            let thisID = $(this).attr("id");
            $("a[data-redirect='"+ thisID +"']").removeClass("active");
            $(this).removeClass("active_element");
            $("#main_start > div").css("display", "none");
            $("#" + new_subsite).fadeIn("fast", function() {
                $("a[data-redirect='"+ new_subsite +"']").addClass("active");
                $(this).addClass("active_element");
            });
        });     
    }

    function hide_unused()
    {
        $("#main_start > div").not(".active_element").css("display", "none");
    }

    function input_set_prev_value(input, value)
    {
        $(input).attr('data-prev_value', value);
    }

    function restore_prev_value(input)
    {
        $(input).val($(input).attr('data-prev_value'));
    }

    function is_valid_menu_title(text)
    {
        return (XRegExp("^[\\p{L},' ']+$")).test(text);
    }

    function is_valid_menu_price(text)
    {
        return /^(\d{1,3})?(,?\d{3})*(\.\d{2})?$/.test(text);
    }

    function ajax_is_allowed()
    {
        $("#waitDialog").modal('show');
        $.ajax({
		    url: "PizzaCore/AJAX/User/login_allowed.php",
            type: "POST",
    		data: {allowed: "check"},
		    complete: function(jData) {
                var jsonRealData = JSON.parse(jData['responseText']);
                if(!jsonRealData['allow'])
                    window.location = "index.php";
                else 
                    $("#waitDialog").modal('hide');
			}
        });
    }
    </script>
</body>
</html>