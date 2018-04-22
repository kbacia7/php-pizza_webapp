<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="PizzaFonts/fonts.css"/>
    <link rel="icon" href="images/pizzaicon.png">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="rwd.css" />
    <script src="jquery-3-2-1.js"></script>
    <link rel="stylesheet" href="animate.css" />
    <script src="bootstrap-notify.js"></script>
    <script src="xregexp.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="PizzaJS/MenuItem.js"></script>
    <script src="PizzaJS/MenuCategory.js"></script>
    <script src="PizzaJS/Error.js"></script>
    <script src="PizzaJS/Config.js"></script>
    <script src="PizzaJS/Paginator.js"></script>
    <script src="PizzaJS/Notification.js"></script>
    <script src="PizzaJS/Gallery.js"></script>
    <script src="PizzaJS/ContactMessage.js"></script>
    <script src="PizzaJS/ContactRoom.js"></script>
    <script src="PizzaJS/User.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ładowanie...</title>
</head>
<body>

   
    <!-- Modals -->
    <div class="block1">
        <div class="container-fluid h-100">
            <div class="row  h-100 justify-content-center align-items-center">
            
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills list-cards-links">
                            <li class="nav-item">
                                <a class="nav-link active" data-redirect="home" href="#">Strona główna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-redirect="config_manager" href="#">Konfiguracja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-redirect="menu_manager" href="#" id="menu">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-redirect="gallery_manager" href="#">Galeria</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" data-redirect="user_manager" href="#">Użytkownicy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-redirect="mail_manager" href="#">Kontakt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-redirect="notification_manager" href="#">Powiadomienia</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" style="max-height: 400px; overflow-y: auto">
                        <div class="container">
                            <div class="row main-place">
                            <img src='/images/loading.gif' class='loading d-block mx-auto'/>
                            <div class="d-none"id="global-loading-hide">
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
                                    <div id="menu_manager"> <!-- MENU --> </div>
                                    <div id="config_manager"></div>
                                    <div id="gallery_manager"></div>
									<div id="user_manager"></div>
                                    <div id="mail_manager"></div>									
                                    <div id="notification_manager"></div>
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
        $("#config_manager").load("admin_config.php");
        $("#menu_manager").load("admin_menu.php");
        $("#gallery_manager").load("admin_gallery.php");
		$("#user_manager").load("admin_user.php");
        $("#mail_manager").load("admin_contact.php");
        $("#notification_manager").load("admin_notification.php");
        errorsTemplatesAjaxLoad().then(function (templates) {
            errorsTemplates = templates;
            errorsLoopInit();
            hideUnused();
            userAjaxIsAdmin();
            configHandle();
            menuItemHandle();
            notificationHandle();
            galleryHandle();
            userHandle();
            contactRoomHandle();
            configAjaxLoad().then(function (o) {
                configSetForm(o);
                menuCategoryHandle().then(function() {
                    $("#waitDialog").modal('hide');
                    paginatorInit({
                        "globalselector": ".global-menu-root:has([data-categoryid])",
                        "globalselectorname": ".global-menu-root",
                        "visiblesel": "[data-categoryid]:visible",
                        "nextpage": ".paginator-next-page",
                        "prevpage": ".paginator-prev-page",
                        "element": "[data-categoryid]"
                    });
                    
                    $(".list-cards-links .nav-link").on("click", function() {
                        subsite_change($(this).attr("data-redirect"));
                    });

                    $("body").on('change', ".menu-price-input, .menu-name-input, .menu-title-position-input", function() {
                        $(this).attr("value", $(this).val());
                    });
                    globalLoadingScreenRemove();
                });
            });
            
        });
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

    function hideUnused()
    {
        $("#main_start > div").not(".active_element").css("display", "none");
    }

    function inputSetLastValue(input, value)
    {
        $(input).attr('data-prev_value', value);
    }

    function inputRestoreLastValue(input)
    {
        $(input).val($(input).attr('data-prev_value'));
    }

    function globalLoadingScreenRemove() 
    {
        return new Promise(function(resolve) {
        $(".loading").fadeOut(1200, function() {
            $(".loading").remove();
            $("#global-loading-hide").contents().appendTo($(".main-place"));
            resolve();
        });
        });
    }
    </script> 
</body>
</html>