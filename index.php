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
    <link href="https://fonts.googleapis.com/css?family=Courgette|Montserrat|Roboto|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.0/css/swiper.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3BFv03xXDii2HzbPZraRkHvSEnb9rCMg">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="jquery-mobile.js"></script> <!-- Only touch support -->
    <script
		  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
		  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
		  crossorigin="anonymous">
	</script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Your pizzeria</title>
</head>
<body>
    <div class="block1">
        <div class="header">
            <h1>asYour pizzeria</h1>
        </div>
    </div>
    <div class="block2">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo vel purus interdum ultrices. Suspendisse sit amet aliquam sem. Pellentesque vel nibh nisl. Nulla sed neque sit amet quam ultricies porttitor at vitae mauris. Donec nec magna et nisl ullamcorper mattis sodales at est</p>
        <div class="gallery">
            <div class="galleryview">
                <img id="left" class="arrow" src="images/arrow.png" />
                <img id="right" class="arrow" src="images/arrow.png" />
                <div class="galleryimages">
                    <img id="active" src="images/4k+/gallery1/pizza-block2_gallery1.jpeg" srcset="images/smartphone/gallery1/pizza-block2_gallery1.jpeg 210w, 
                         images/tablets/gallery1/pizza-block2_gallery1.jpeg 390w,
                         images/laptops/gallery1/pizza-block2_gallery1.jpeg 500w,
                         images/NormalPC/gallery1/pizza-block2_gallery1.jpeg 669w,
                         images/FullHD2K/gallery1/pizza-block2_gallery1.jpeg 735w,
                         images/4k+/gallery1/pizza-block2_gallery1.jpeg 1186w" 
                         sizes="(max-width: 599px) 210px, (min-width: 600px) and (max-width: 900px) 390px, (min-width: 901px) and (max-width: 1359px) 500px, (min-width: 1360px) and (max-width: 1919px) 669px, (min-width: 1920px) and (max-width: 2199px) 735px, (min-width: 2200px) 1186px" 
                         data-description="Nunc id semper leo. Cras dictum vulputate libero, nec dictum felis. Etiam rhoncus viverra velit ut mollis. Sed consectetur accumsan turpis, sed semper erat mattis eu1_1_!_1"/>
                    <img src="images/4k+/gallery1/pizza-block2_gallery2.jpeg" srcset="images/smartphone/gallery1/pizza-block2_gallery2.jpeg 210w, 
                         images/tablets/gallery1/pizza-block2_gallery2.jpeg 390w,
                         images/laptops/gallery1/pizza-block2_gallery2.jpeg 500w,
                         images/NormalPC/gallery1/pizza-block2_gallery2.jpeg 669w,
                         images/FullHD2K/gallery1/pizza-block2_gallery2.jpeg 735w,
                         images/4k+/gallery1/pizza-block2_gallery2.jpeg 1186w" 
                         sizes="(max-width: 599px) 210px, (min-width: 600px) and (max-width: 900px) 390px, (min-width: 901px) and (max-width: 1359px) 500px, (min-width: 1360px) and (max-width: 1919px) 669px, (min-width: 1920px) and (max-width: 2199px) 735px, (min-width: 2200px) 1186px" 
                         data-description="Nunc id semper leo. Cras dictum vulputate libero, nec dictum felis. Etiam rhoncus viverra velit ut mollis. Sed consectetur accumsan turpis, sed semper erat mattis eu2@@@@2"/>
                    <img src="images/4k+/gallery1/pizza-block2_gallery3.jpeg" srcset="images/smartphone/gallery1/pizza-block2_gallery3.jpg 210w, 
                         images/tablets/gallery1/pizza-block2_gallery3.jpg 390w,
                         images/laptops/gallery1/pizza-block2_gallery3.jpg 500w,
                         images/NormalPC/gallery1/pizza-block2_gallery3.jpg 669w,
                         images/FullHD2K/gallery1/pizza-block2_gallery3.jpg 735w,
                         images/4k+/gallery1/pizza-block2_gallery3.jpg 1186w" 
                         sizes="(max-width: 599px) 210px, (min-width: 600px) and (max-width: 900px) 390px, (min-width: 901px) and (max-width: 1359px) 500px, (min-width: 1360px) and (max-width: 1919px) 669px, (min-width: 1920px) and (max-width: 2199px) 735px, (min-width: 2200px) 1186px" 
                         data-description="Nunc id semper leo. Cras dictum vulputate libero, nec dictum felis. Etiam rhoncus viverra velit ut mollis. Sed consectetur accumsan turpis, sed semper erat mattis eu3333"/>
                </div>

                
            </div>
            <p id="desc">Nunc id semper leo. Cras dictum vulputate libero, nec dictum felis. Etiam rhoncus viverra velit ut mollis. Sed consectetur accumsan turpis, sed semper erat mattis eu</p>
        </div>
    </div>
    <div class="block3">
        <div class="fade"></div>
        <div class="menu">
                <div class="menuitem">
                    <h1>Category 1</h1>
                    <ul class="slider">
                        <li>
                            <p class="item">Item 1</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 2</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 3</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 4</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 5</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 6</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 7</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 8</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 9</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 10</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 11</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 12</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 13</p>
                            <p class="price">10$</p>
                        </li>
                        <li>
                            <p class="item">Item 14</p>
                            <p class="price">10$</p>
                        </li>
                    </ul>
                    <p class="textarr"><</p>
                    <p class="textarr">></p> 
                </div>
            
            <div class="menuitem">
                <h1>Category 2</h1>
                <ul>
                    <li>
                        <p class="item">Item 1</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 2</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 3</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 4</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 5</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 6</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 7</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 8</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 9</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 10</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 11</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 12</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 13</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 14</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 15</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 16</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 17</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 18</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 19</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 20</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 21</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 22</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 23</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 24</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 25</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 26</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 27</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 28</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 29</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 30</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 31</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 32</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 33</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 34</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 35</p>
                        <p class="price">10$</p>
                    </li>
                </ul>
                <p class="textarr"><</p>
                <p class="textarr">></p> 
            </div>
            <div class="menuitem">
                <h1>Category 3</h1>
                <ul>
                    <li>
                        <p class="item">Item 1</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 2</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 3</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 4</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 5</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 6</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 7</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 8</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 9</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 10</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 11</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 12</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 13</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 14</p>
                        <p class="price">10$</p>
                    </li>
                </ul>
                <p class="textarr"><</p>
                <p class="textarr">></p> 
            </div>
            <div class="menuitem">
                <h1>Category 4</h1>
                <ul>
                    <li>
                        <p class="item">Item 1</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 2</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 3</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 4</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 5</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 6</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 7</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 8</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 9</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 10</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 11</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 12</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 13</p>
                        <p class="price">10$</p>
                    </li>
                    <li>
                        <p class="item">Item 14</p>
                        <p class="price">10$</p>
                    </li>
                </ul>
                <p class="textarr"><</p>
                <p class="textarr">></p> 
            </div>
            </div>
    </div>
    <div class="block4">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo vel purus interdum ultrices. Suspendisse sit amet aliquam sem. Pellentesque vel nibh nisl. Nulla sed neque sit amet quam ultricies porttitor at vitae mauris. Donec nec magna et nisl ullamcorper mattis sodales at est. Aliquam iaculis scelerisque sem, eu faucibus justo dictum quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis et risus tortor</p>
        <img id="active" src="images/4k+/gallery2/restaurant-block4_gallery1.jpg" srcset="images/smartphone/gallery2/restaurant-block4_gallery1.jpg 440w,
             images/tablets/gallery2/restaurant-block4_gallery1.jpg 586w,
             images/laptops/gallery2/restaurant-block4_gallery1.jpg 884w,
             images/NormalPC/gallery2/restaurant-block4_gallery1.jpg 1248w,
             images/FullHD2K/gallery2/restaurant-block4_gallery1.jpg 1430w,
             images/4k+/gallery2/restaurant-block4_gallery1.jpg 1800w" 
                         sizes="(max-width: 599px) 440px, (min-width: 600px) and (max-width: 900px) 586px, (min-width: 901px) and (max-width: 1359px) 884px, (min-width: 1360px) and (max-width: 1919px) 1248px, (min-width: 1920px) and (max-width: 2199px) 1430px, (min-width: 2200px) 1800px"  />

        <img src="images/4k+/gallery2/restaurant-block4_gallery2.jpg" srcset="images/smartphone/gallery2/restaurant-block4_gallery2.jpg 440w,
             images/tablets/gallery2/restaurant-block4_gallery2.jpg 586w,
             images/laptops/gallery2/restaurant-block4_gallery2.jpg 884w,
             images/NormalPC/gallery2/restaurant-block4_gallery2.jpg 1248w,
             images/FullHD2K/gallery2/restaurant-block4_gallery2.jpg 1430w,
             images/4k+/gallery2/restaurant-block4_gallery2.jpg 1800w"
             sizes="(max-width: 599px) 440px, (min-width: 600px) and (max-width: 900px) 586px, (min-width: 901px) and (max-width: 1359px) 884px, (min-width: 1360px) and (max-width: 1919px) 1248px, (min-width: 1920px) and (max-width: 2199px) 1430px, (min-width: 2200px) 1800px" />

        <img src="images/4k+/gallery2/restaurant-block4_gallery3.jpg" srcset="images/smartphone/gallery2/restaurant-block4_gallery3.jpg 440w,
             images/tablets/gallery2/restaurant-block4_gallery3.jpg 586w,
             images/laptops/gallery2/restaurant-block4_gallery3.jpg 884w,
             images/NormalPC/gallery2/restaurant-block4_gallery3.jpg 1248w,
             images/FullHD2K/gallery2/restaurant-block4_gallery3.jpg 1430w,
             images/4k+/gallery2/restaurant-block4_gallery3.jpg 1800w"
             sizes="(max-width: 599px) 440px, (min-width: 600px) and (max-width: 900px) 586px, (min-width: 901px) and (max-width: 1359px) 884px, (min-width: 1360px) and (max-width: 1919px) 1248px, (min-width: 1920px) and (max-width: 2199px) 1430px, (min-width: 2200px) 1800px" />


    </div>
    <div class="block5">
        <div class="fade"></div>
        <div class="boxes">
            <div class="boxmsg">
                <h1>Contact</h1>
				<?php
					if(isset($_POST['button']))
					{
						$fName = $_POST['firstName'];
						$lName = $_POST['lastName'];
						$m = $_POST['mail'];
						$topic = $_POST['topic'];
						$val = $_POST['val'];
						if($val != null && $topic != null && $m != null && $lName != null && $fName != null)
						{
							echo "<h1>Dziękujemy za maila, odpowiemy najszybciej jak to możliwe!</h1>";
							mail($m, "Kontakt", "Dziękujemy za chęć skontaktowania się z naszą pizzerią panie {$fName} {$lName}. Dołożymy wszelkich starań aby jak najszybciej odpowiedzieć", "From: sender@pizzeriatemplate.cba.pl");
						}
					}
				?>
                <form method="POST">
                    <div class="input">
                        <p>First Name</p>
                        <input name="firstName" type="text" required />
                    </div>
                    <div class="input">
                        <p>Last Name</p>
                        <input name="lastName" type="text" required />
                    </div>
                    <div class="input">
                        <p>E-mail</p>
                        <input name="mail" type="email" required />
                    </div>
                    <div class="input">
                        <p>Topic</p>
                        <input name="topic" type="text" required />
                    </div>
                    <div class="input">
                        <p>Message</p>
                        <textarea name="val" required></textarea>
                    </div>
                    <div class="input">
                        <input name="button" type="submit" value="SEND" />
                    </div>
                </form>
            </div>
            <div class="boxmsg">
                <div class="map"></div>

                <div class="contact">
                    <p>Arts District 9</p>
                    <p>Los Angeles</p>
                    <p>(48)939 923 111</p>
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
        /*
            OPTIONS

            FIXED_MENU_ITEM = All .menuitem have the same height (true/false)
            SHOW_HELP_ARROWS = Shows the arrows to change the .menuitem pages (true/false)
            secGallimg = Second to change image in .block4 (int)
        */
        var FIXED_MENU_ITEM = true, SHOW_HELP_ARROWS = true;
        var secGallImg = 3;
        
        var savedData = new Array(); //[Menu item ID] => [0] = Full HTML Code (with hidden <li> etc) [1] = HTML code removed elements after swipe [2] = HTML code didnt display normally [3] = Page number
        var imgGallWidth = 0;
        var slideImg = 1;
        var blockArrow = false;
        var firstSrcImg = {};
        var dialog;
        $(window).resize(function () { location.reload(); }); //Reload page after resize because 
        $(document).ready(function () {
            setSettings().then(function () {
                mapLoad();
                swipeMenuItems();
                swipeMenuItemsData();
                
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
							$.ajax({
								url: "PizzaCore/AJAX/User/login_valid.php",
								type: "POST",
								data: serializeDataForm,
								complete: function(jData) {
									console.log(jData);
									var jsonRealData = JSON.parse(jData['responseText']);
                                    if(jsonRealData['complete'])
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
        function mapLoad() {
            var pizzeria = new google.maps.LatLng(34.046919, -118.256752); //Pizzeria position on Google Map
            var map = new google.maps.Map(document.getElementsByClassName('map')[0], { //Create Map
                zoom: 17,
                center: pizzeria
            });
            var marker = new google.maps.Marker({ //Add marker to map
                position: pizzeria,
                map: map,
                title: 'Your pizzeria' //Pizzeria name
            });
        }

        /*
            Function Name: setSettings 
            Arguments: 0
            Function load the settings (from the variables at the top of the code) and configures the web page
        */
        function setSettings() {
            return new Promise(function (resolve, reject) { //Add .done()
                if (FIXED_MENU_ITEM) {
                    var mL = minLength(".menuitem");
                    $(".menuitem ul li:not(:nth-of-type(-n+" + mL + "))").css("display", "none");
                    resolve();
                }

                if (SHOW_HELP_ARROWS) {
                    $(".menuitem").each(function () {
                        if ($(this).find("ul > li").last().css("display") == "none") {
                            $(this).find(".textarr").css("display", "inline-block");
                        }
                    });
                    resolve();
                }
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
                var heightMenuItem = $(".textarr:visible").parent(".menuitem").outerHeight();
                var specialID = 0;
                $(".menuitem").each(function () {
                    $(this).attr("data-specialMenuID", specialID);
                    var ulThis = $(this).find("ul");
                    savedData[specialID] = new Array();
                    savedData[specialID][0] = ulThis.find("li");
                    savedData[specialID][1] = $(ulThis).find("li").filter(function () {
                        return $(this).css('display').toLowerCase().indexOf('none') == -1
                    });
                    savedData[specialID][2] = $(ulThis).find("li").filter(function () {
                        return $(this).css('display').toLowerCase().indexOf('none') > -1
                    });
                    savedData[specialID][3] = 1;
                    specialID++;
                });

               $(".menuitem").css("height", heightMenuItem);
              
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
            var saveMenuItems = new Array();
            saveMenuItems[0] = $(".menuitem"); //All elements .menuitem
            saveMenuItems[1] = 1; //Current page
            saveMenuItems[2] = $(".menuitem:visible"); //Visible elements .menuitem
            var minIndex = saveMenuItems[2].length * saveMenuItems[1];
            if ($(".menuitem").find(":hidden").not("script").length > 0) { //if any hidden .menuitem exists

                //Next menu items
                $(".fade").on("swiperight", function (ev) { 
                    saveMenuItems[2] = $(".menuitem:visible");
                    if ($(ev.target).children(".menu") != undefined && $(".menuitem:hidden").length > 0) {
                        var showItems = saveMenuItems[2];
                        showItems.fadeOut("fast", function () { 
                            var elToPage = saveMenuItems[0].slice(minIndex, minIndex + saveMenuItems[2].length);
                            elToPage.fadeIn("fast"); 
                        });
                        saveMenuItems[1]++;
                    }
                });

                //Prev menu items
                $(".fade").on("swipeleft", function (ev) {
                    saveMenuItems[2] = $(".menuitem:visible");                 
                    minIndex = (saveMenuItems[1] - 1) * saveMenuItems[2].length;
                    if ($(ev.target).children(".menu") != undefined && saveMenuItems[1] > 1) {
                        var showItems = saveMenuItems[2];
                        showItems.fadeOut("fast", function () {
                            var elToPage = saveMenuItems[0].slice(minIndex - saveMenuItems[2].length, minIndex);
                            elToPage.fadeIn("fast");
                        });     
                        saveMenuItems[1]--;
                    }
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
            if (savedData[menuItemID] != undefined) {
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
            }
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
            if (savedData[menuItemID] != undefined) {
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
            }
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
    </script>
   

</body>
</html>