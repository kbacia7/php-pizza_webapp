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
    <script src="PizzaJS/Config.js"></script>
    <script src="PizzaJS/User.js"></script>
    <script src="PizzaJS/ContactMessage.js"></script>
    <script src="PizzaJS/ContactRoom.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Your pizzeria</title>
</head>
<body>



    <div class="block1">
        <div class="container-fluid h-100">
        
            <div class="row  h-100 justify-content-center align-items-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body" style="max-height: 400px; overflow-y: auto">
                        <div class="container">
                            <div class="row">
                                <div class="col-12" id="main_start">
                                    <div id="mail_manager"></div>
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
            $("#mail_manager").load("user_contact.php");
            configAjaxLoad().then(function (o) {
                userIsValid().then(function() {
                    configSetData(o);
                    contactRoomHandle();
                });
            });        
    });

    
    </script>
</body>
</html>