<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <style>
        [data-dialog="true"] label,
        input {
            display: block;
        }

        [data-dialog="true"] input.text {
            margin-bottom: 12px;
            width: 95%;
            padding: .4em;
        }

        [data-dialog="true"] fieldset {
            padding: 0;
            border: 0;
        }

        [data-dialog="true"] h1 {
            font-size: 1.2em;
            margin: .6em 0;
        }

        [data-dialog="true"] div#users-contain {
            width: 350px;
            margin: 20px 0;
        }

        [data-dialog="true"] div#users-contain table {
            margin: 1em 0;
            border-collapse: collapse;
            width: 100%;
        }

        [data-dialog="true"]div#users-contain table td,
        div#users-contain table th {
            border: 1px solid #eee;
            padding: .6em 10px;
            text-align: left;
        }

        [data-dialog="true"] .ui-dialog .ui-state-error {
            padding: .3em;
        }

        [data-dialog="true"] .validateTips {
            border: 1px solid transparent;
            padding: 0.3em;
        }

        [data-dialog="true"] .error {
            color: #FF0000;
            font-weight: bold;
        }
    </style>
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
    <title>Your pizzeria</title>
</head>

<body>
    <div class="block1">
        <div class="header">
            <h1 id="header-title">asYour pizzeria</h1>
        </div>
    </div>
    <div class="block2">
        <p id="block2-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo vel purus interdum ultrices. Suspendisse sit
            amet aliquam sem. Pellentesque vel nibh nisl. Nulla sed neque sit amet quam ultricies porttitor at vitae mauris.
            Donec nec magna et nisl ullamcorper mattis sodales at est</p>
        <div class="gallery">
            <div class="galleryview">
                <img id="left" class="arrow" src="images/arrow.png" />
                <img id="right" class="arrow" src="images/arrow.png" />
                <div class="galleryimages">
                 <!--   <img id="active" src="images/4k+/gallery1/pizza-block2_gallery1.jpeg" srcset="images/smartphone/gallery1/pizza-block2_gallery1.jpeg 210w, 
                         images/tablets/gallery1/pizza-block2_gallery1.jpeg 390w,
                         images/laptops/gallery1/pizza-block2_gallery1.jpeg 500w,
                         images/NormalPC/gallery1/pizza-block2_gallery1.jpeg 669w,
                         images/FullHD2K/gallery1/pizza-block2_gallery1.jpeg 735w,
                         images/4k+/gallery1/pizza-block2_gallery1.jpeg 1186w" sizes="(max-width: 599px) 210px, (min-width: 600px) and (max-width: 900px) 390px, (min-width: 901px) and (max-width: 1359px) 500px, (min-width: 1360px) and (max-width: 1919px) 669px, (min-width: 1920px) and (max-width: 2199px) 735px, (min-width: 2200px) 1186px"
                        data-description="Nunc id semper leo. Cras dictum vulputate libero, nec dictum felis. Etiam rhoncus viverra velit ut mollis. Sed consectetur accumsan turpis, sed semper erat mattis eu1_1_!_1"
                    />-->
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
                <p class="textarr paginator-prev-page" style="float: left">
                    <</p>
                        <p class="textarr paginator-next-page" style="float: right">></p>
            </div>
            <div class="add-new-category-button"></div>
        </div>
    </div>
    <div class="block4">
        <p id="block4-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo vel purus interdum ultrices. Suspendisse sit
            amet aliquam sem. Pellentesque vel nibh nisl. Nulla sed neque sit amet quam ultricies porttitor at vitae mauris.
            Donec nec magna et nisl ullamcorper mattis sodales at est. Aliquam iaculis scelerisque sem, eu faucibus justo
            dictum quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis et
            risus tortor</p>

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

    <div id="dialog" title="Logowanie" data-dialog="true">
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
                    swipeMenuItems();
                    swipeMenuItemsData();
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

                    //Add last gallery image with first
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
                });
            });

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
        });



        /*
            Function Name: mapLoad
            Arguments: 0
            This function loads the google map and insert in element with class .map (the default is div.map in block 5)
        */
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

        /*
            Function Name: gallSwipeLeft
            Arguments: 0
            Changes photos to next in the gallery after click arrow (div.block2)
        */
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

        /*
            Function Name: gallSwiperRight
            Arguments: 0
            Changes photos to prev in the gallery after click arrow (div.block2)
        */
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

        /*
            Function Name: fadeImageGallery
            Arguments: 0
            Changes photos in the gallery (div.block4)
        */
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

        /*
            Function Name: swipeMenuItemsData
            Arguments: 0
            Add swipe the pages of the .menuitem
        */
        function swipeMenuItemsData() {
            if ($(".menuitem > ul > li").find(":hidden").not("script").length > 0) {
                var specialID = 0;
                $(".menuitem").each(function () {
                    $(this).attr("data-specialMenuID", specialID);
                    specialID++;
                });
              
               $(".menuitem").on("swiperight", function (ev) {
                   nextMenuItemPage(ev.target);
                });

               $(".textarr").on("click", function (ev) {
                   if ($(ev.target).text() == ">")
                   {
                       nextMenuItemPage($(ev.target).parent(".menuitem"));
                   }
                   else if ($(ev.target).text() == "<")
                   {
                       prevMenuItemPage($(ev.target).parent(".menuitem"));
                   }
               });

               $(".menuitem").on("swipeleft", function (ev) {
                   prevMenuItemPage(ev.target);
               });
            }        
        }

        /*
            Function Name: swipeMenuItems
            Arguments: 0
            Add move the finger of items .menuitem
        */
        function swipeMenuItems()
        {
            if ($(".menuitem").find(":hidden").not("script").length > 0) { //if any hidden .menuitem exists
               
                //Next menu items
                $(".fade_screen").on("swiperight", function (ev) { 
                    paginatorNextPage();
                });

                //Prev menu items
                $(".fade_screen").on("swipeleft", function (ev) {
                    paginatorPrevPage();
                });
            }
        }

        /*
            Function Name: nextMenuItemPage
            Arguments: 1
            Arguments 0: ev - Element that calls a function
            Function loads the next menu page
        */
        function nextMenuItemPage(ev) {
            var ulThis = $(ev).find("ul");
            var menuItemID = $(ev).attr("data-specialMenuID");
           /* if (savedData[menuItemID] != undefined) {
                var minIndexElements = savedData[menuItemID][3] * savedData[menuItemID][1].length;
                if (minIndexElements < savedData[menuItemID][0].length) {
                    ulThis.fadeOut("fast", function () {
                        var arrayElements = savedData[menuItemID][0].slice(minIndexElements, minIndexElements + savedData[menuItemID][1].length);
                        ulThis.html(getHTMLFromArray(arrayElements, 'li'));
                        savedData[menuItemID][3]++;
                        $(ev.target).find("ul > li").css("display", "block");
                        ulThis.fadeIn("fast");
                    });
                }
            }*/
        }

         /*
            Function Name: prevMenuItemPage
            Arguments: 1
            Arguments 0: ev - Element that calls a function
            Function loads the previous menu page
        */
        function prevMenuItemPage(ev) {
            var ulThis = $(ev).find("ul");
            var menuItemID = $(ev).attr("data-specialMenuID");
        /*    if (savedData[menuItemID] != undefined) {
                var minIndexElements = (savedData[menuItemID][3] - 1) * savedData[menuItemID][1].length;
                if (savedData[menuItemID][3] > 1) {
                    ulThis.fadeOut("fast", function () {
                        var arrayElements = savedData[menuItemID][0].slice(minIndexElements - savedData[menuItemID][1].length, minIndexElements);
                        ulThis.html(getHTMLFromArray(arrayElements, 'li'));
                        savedData[menuItemID][3]--;
                        $(ev.target).find("ul > li").css("display", "block");
                        ulThis.fadeIn("fast");
                    });
                }
            }*/
        }

        /*
            Function Name: getHTMLFromArray
            Arguments: 2
            Arguments 0: arr - Array with data
            Arguments 1 (optional): addEl - The element to which the code from the array will be entered
            Joins array elements and adds them to the element specified in the second argument
        */
        function getHTMLFromArray(arr, addEl = "") {
            var i = 0;
            var htmlSrc = "";
            while (arr[i] !== undefined) {
                var addHTML = $(arr[i]).html();
                if (addEl !== "") {
                    addHTML = '<' + addEl + '>' + $(arr[i]).html() + '</' + addEl + '>';
                }
                htmlSrc += addHTML;
                i++;
            }
            return htmlSrc;
        }

        /*
            Function Name: minLength
            Arguments: 1
            Arguments 0: selector - Selector for elements
            Returns the smallest number of display elements
        */
        function minLength(selector) {
            var minLen = 100;
            $(selector).each(function () {
                var thisElShow = $(this).find("ul > li").filter(function () {
                    return $(this).css('display').toLowerCase().indexOf('none') == -1
                }).length;
                if (thisElShow < minLen) {
                    minLen = thisElShow;
                }
            });
            return minLen;
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
    </script>
   

</body>
</html>