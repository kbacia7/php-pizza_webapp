<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="images/pizzaicon.png">
    <link rel="stylesheet" href="PizzaFonts/fonts.css"/>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="rwd.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.0/css/swiper.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3BFv03xXDii2HzbPZraRkHvSEnb9rCMg">
    </script>
    <script src="jquery-3-2-1.js"></script>
    <script src="jquery-mobile.js"></script>
    <!-- Only touch support -->
    <script src="jquery-ui.min.js">
        </script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
     <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="PizzaJS/MenuItem.js"></script>
    <script src="PizzaJS/MenuCategory.js"></script>
    <script src="PizzaJS/Paginator.js"></script>
    <script src="PizzaJS/Gallery.js"></script>
    <script src="PizzaJS/Config.js"></script>
    <script src="PizzaJS/User.js"></script>
    <title>Ładowanie...</title>
</head>

<body>
    <div id="special-loading-place">
        <img src='/images/loading.gif' class='loading'/>
    </div>
    <div id="hide-all-loading">
    <div class="block1">
        <div class="header">
            <h1 id="header-title">Ładowanie...</h1>
        </div>
    </div>
    <div class="block2">
        <p id="block2-description">Ładowanie...</p>
        <div class="gallery">
            <div class="galleryview">
                <img id="left" class="arrow" src="images/arrow.png" />
                <img id="right" class="arrow" src="images/arrow.png" />
                <div class="galleryimages">
                    <img id="active" class="never-used-gallery-slot-g1" src="images/4k+/gallery1/[FILENAME]" srcset="images/smartphone/gallery1/[FILENAME] 210w, 
                         images/tablets/gallery1/[FILENAME] 390w,
                         images/laptops/gallery1/[FILENAME] 500w,
                         images/NormalPC/gallery1/[FILENAME] 669w,
                         images/FullHD2K/gallery1/[FILENAME] 735w,
                         images/4k+/gallery1/[FILENAME] 1186w" sizes="(max-width: 599px) 210px, (min-width: 600px) and (max-width: 900px) 390px, (min-width: 901px) and (max-width: 1359px) 500px, (min-width: 1360px) and (max-width: 1919px) 669px, (min-width: 1920px) and (max-width: 2199px) 735px, (min-width: 2200px) 1186px"
                        data-description="Nunc id semper leo. Cras dictum vulputate libero, nec dictum felis. Etiam rhoncus viverra velit ut mollis. Sed consectetur accumsan turpis, sed semper erat mattis eu3333"
                    />
                </div>


            </div>
            <p id="desc">Nunc id semper leo. Cras dictum vulputate libero, nec dictum felis. Etiam rhoncus viverra velit ut mollis. Sed
                consectetur accumsan turpis, sed semper erat mattis eu</p>
        </div>
    </div>
    <div class="block3">
        <div class="fade_screen"></div>
        <div class="menu">
            <div class="menuitem menu-category-hidden" style="display: none;">
                <h1 class="menu-title-position">Category 4</h1>
                <ul class="slider list-group">
                    <li class="list-group-item unused-never-use-menu" style="display: none">
                        <p class="item menu-name-input">Item 1</p>
                        <p class="price menu-name-price">10$</p>
                    </li>
                    <li class="list-group-item" style="display: none">
                        <div class="add-new-menu"></div>
                    </li>
                </ul>
            </div>
            <div class="add-new-category-button"></div>
        </div>
    </div>
    <div class="block4">
        <p id="block4-description">Ładowanie...</p>

        <img id="active" class="never-used-gallery-slot-g2" src="images/4k+/gallery2/[FILENAME]" srcset="images/smartphone/gallery2/[FILENAME] 440w,
             images/tablets/gallery2/[FILENAME] 586w,
             images/laptops/gallery2/[FILENAME] 884w,
             images/NormalPC/gallery2/[FILENAME] 1248w,
             images/FullHD2K/gallery2/[FILENAME] 1430w,
             images/4k+/gallery2/[FILENAME] 1800w" sizes="(max-width: 599px) 440px, (min-width: 600px) and (max-width: 900px) 586px, (min-width: 901px) and (max-width: 1359px) 884px, (min-width: 1360px) and (max-width: 1919px) 1248px, (min-width: 1920px) and (max-width: 2199px) 1430px, (min-width: 2200px) 1800px"
        />


    </div>
    <div class="block5">
        <div class="fade_screen"></div>
        <div class="boxes">
            <div class="boxmsg">
                <h1>Kontakt</h1>
                <p id="insert-errors-here"></p>
                    <form method="POST">
                        <div class="input">
                            <p>Imię</p>
                            <input name="firstName" id="firstName" type="text" required />
                        </div>
                        <div class="input">
                            <p>Nazwisko</p>
                            <input name="lastName" id="lastName" type="text" required />
                        </div>
                        <div class="input">
                            <p>E-mail</p>
                            <input name="mail" id="mail" type="email" required />
                        </div>
                        <div class="input">
                            <p>Temat</p>
                            <input name="topic" id="topic" type="text" required />
                        </div>
                        <div class="input">
                            <p>Wiadomość</p>
                            <textarea name="val" id="message_form" required></textarea>
                        </div>
                        <div class="input">
                            <div class="g-recaptcha"></div>
                        </div>
                        <div class="input">
                            <input name="button" id="sendEmail" type="submit" value="Wyślij" />
                        </div>
                    </form>
            </div>
            <div class="boxmsg">
                <div class="map"></div>

                <div class="contact">
                    <p id="street-location">Arts District 9</p>
                    <p id="city-location">Los Angeles</p>
                    <p id="contact-number">(48)939 923 111</p>
                </div>
            </div>
        </div>
    </div>

    <div id="dialog" title="Logowanie" data-dialog="true" style="display: none">
        <p class="validateTips">Aby otrzymać dostep do panelu administratora musisz się zalogować</p>
        <p class="validateTips error"></p>

        <form id="login_form">
            <fieldset>
                <label for="login">Login</label>
                <input type="text" name="login" id="login" class="text ui-widget-content ui-corner-all">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">
            </fieldset>
        </form>
    </div>
    </div>

    <script type="text/javascript">
        var secGallImg = 3;
        var imgGallWidth = 0;
        var slideImg = 1;
        var blockArrow = false;
        var firstSrcImg = {};
        var dialog;
        $(window).resize(function () { location.reload(); }); //Reload page after resize 
        $(document).ready(function () {
            $("form").submit(function(e){
                e.preventDefault();
            });
            loadMenuItems().then(function () {    
                    configAjaxLoad().then(function(o) {
                        configSetData(o);
                        mapLoad(o['title'], o['position'].split(","));
                    });
                    galleryLoadAllHome().then(function(imgs) {
                    $(".never-used-gallery-slot-g1").remove();
                    $(".never-used-gallery-slot-g2").remove();
                    paginatorInit({
                        "globalselector": ".menuitem:has([data-categoryid])",
                        "globalselectorname": ".menuitem",
                        "visiblesel": "[data-categoryid]:visible",
                        "nextpage": "RandomStringDisableUseIt",
                        "prevpage": "RandomStringDisableUseIt",
                        "element": "[data-categoryid]"
                    });
                    reCaptchaLoad();
                    firstSrcImg["src"] = $(".block4 #active").attr("src");
                    firstSrcImg["srcset"] = $(".block4 #active").attr("srcset");
                    imgGallWidth = $("#active").width();
                    $("#desc").text($(".galleryimages img").first().attr("data-description"));


                    var lGimg = $(".galleryimages img").last();
                    lGimg.css("margin-left", -imgGallWidth);
                    lGimg.insertBefore($(".galleryimages img").first());

                    $("#right").click(function () {
                        if (!blockArrow)
                            gallSwipeLeft();
                    });

                    $("#left").click(function () {
                        if (!blockArrow)
                            gallSwiperRight();
                    });

                    setTimeout(fadeImageGallery, secGallImg * 1000);
                    $("body").keypress(function (e) {
                        if(e.which == 76)
                            loginFormOpen();
                    });

                    $("#special-loading-place").fadeTo(1500, 0.0, function() {
                        $("#special-loading-place").remove();
                        $("#hide-all-loading").contents().appendTo($("body"));
                    });

                });
            });

            
        });

        function mapLoad(title, location_) {
            var pizzeria = new google.maps.LatLng(parseFloat(location_[0]), parseFloat(location_[1])); //Pizzeria position on Google Map
            var map = new google.maps.Map(document.getElementsByClassName('map')[0], { //Create Map
                zoom: 17,
                center: pizzeria
            });
            var marker = new google.maps.Marker({ //Add marker to map
                position: pizzeria,
                map: map,
                title: title //Pizzeria name
            });
        }


        function gallSwipeLeft() {
            var active = $("#active");
            var nActive = active.next();

            blockArrow = true;
            var nDesc = nActive.attr("data-description");
            $("#desc").fadeOut("fast", function () {
                $("#desc").text(nDesc);
                $("#desc").fadeIn("fast");
            });
            active.animate({ marginLeft: (-imgGallWidth) }, function () {
                active.removeAttr("id");
                nActive.attr("id", "active");
                active = nActive;
                nActive = active.next();
                if (nActive.length <= 0) {
                    //Add first image in gallery after active (last)
                    var fGimg = $(".galleryimages img").first();
                    fGimg.removeAttr("style");
                    fGimg.insertAfter(active);
                }
                blockArrow = false;
            });
            
        }

        function gallSwiperRight() {
            var active = $("#active");
            var lActive = active.prev();

            blockArrow = true;
            var nDesc = lActive.attr("data-description");
            $("#desc").fadeOut("fast", function () {
                $("#desc").text(nDesc);
                $("#desc").fadeIn("fast");
            });
            lActive.animate({ marginLeft: 0 }, function () {
                active.removeAttr("id");
                lActive.attr("id", "active");
                active = lActive;
                lActive = active.prev();
                if (lActive.length <= 0) {

                    //Add last image in gallery before active (first)
                    var lGimg = $(".galleryimages img").last();
                    lGimg.css("margin-left", -imgGallWidth);
                    lGimg.insertBefore(active);
                }
                blockArrow = false;
            });

        }

        function fadeImageGallery() {
            var totalImgCount = $(".block4 img").length;
            var activeImg = $(".block4 #active"); 
            activeImg.fadeOut("fast", function () {                
                var nextImg = $($(".block4 img")[slideImg]);
                activeImg.attr("srcset", nextImg.attr("srcset"));
                activeImg.attr("src", nextImg.attr("src"));
                if (slideImg >= totalImgCount) {
                    slideImg = 1;
                    activeImg.attr("srcset", firstSrcImg["srcset"]);
                    activeImg.attr("src", firstSrcImg["src"]);
                }
                else
                    slideImg++;
                
                activeImg.fadeIn("fast", function () {
                    setTimeout(fadeImageGallery, secGallImg * 1000);
                });
            });
        }

        function loadMenuItems() {
            return new Promise(function(resolve) {
                menuLoadAll().then(function(i__) {
                    var end = Promise.all(i__);
                    end.then(function() {
                        resolve();
                    });
                });
            });
        }

        function reCaptchaLoad() {
            configAjaxReCaptchaKey().then(function (reKey) {           
                $(".g-recaptcha").attr("data-sitekey", reKey);
                $.getScript( "https://www.google.com/recaptcha/api.js?hl=pl", function( data, textStatus, jqxhr ) {
                });
                userHandle();
          });
        }

        function loginFormOpen() {
            dialog = $( "#dialog" ).dialog({
				autoOpen: false,
				height: 310,
				width: 350,
				modal: true,
				buttons: {
					OK: function() {
						var serializeDataForm  = $("#login_form").serialize();
						if($("#password").val().length <= 0)
							$("#password").addClass("ui-state-error");
						if($("#login").val().length <= 0)
							$("#login").addClass("ui-state-error");
						if($("#password").val().length > 0 && $("#login").val().length > 0)
						{
							userAjaxLogin(serializeDataForm).then(function(jsonData) {
                                if(jsonData['complete'] && jsonData['admin'])
                                {
                                    dialog.dialog("close");
                                    window.location = 'admin.php';
                                }
                                else
                                {
                                    $("#password").addClass("ui-state-error");
                                    $("#login").addClass("ui-state-error");
                                    $(".error").text("Wygląda na to że podałeś nieprawidłowe hasło lub login!");
                                }
                            });
						}
					},
					Anuluj: function() {
						dialog.dialog( "close" );
					}
				},
				close: function() {
				}
			});
            dialog.dialog("open");
        }
    </script>
</body>
</html>