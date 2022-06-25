<?php
    session_start();
    include('./processes/db.php');

    if(isset($_SESSION['user_name']))
    {
        // echo "Welcome ".$_SESSION['user_name'] 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curve</title>

    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/w3.css">
    <link rel="script" type="text/javascript" href="./css/Jquery/3.6.0/jquery.min.js">
    <style type="text/css">
        header{ color: #05386b; min-height:70px; }

        header a{ color: #05386b; text-decoration:none; text-transform: uppercase; font-size:16px; }

        header li{ float:left; display:inline; margin: 40px 30px; font-weight:bold; }

        header h1{ margin:40px 60px; float:left; }

        header nav{ float:right; }

        header a:hover{ color:#ccc; font-weight:bold; }
    </style>
</head>
<body>
    <header>
        <h1>Curve</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="userProfile.php">User Profile</a></li>
                <li><a href="./processes/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="w3-row">
        <div class="w3-container w3-content w3-center" style="max-width:1250px">
             <?php include('./processes/alerts.php'); ?>
             <br>
            <!-- Automatic Slideshow Images -->
            <div class="w3-margin w3-white">
                <div class="mySlides w3-display-container w3-center">
                    <img src="./img/arch.png" style="width:100%">
                        <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                            <h3>Discover</h3>
                            <p><b>Find the Articles from all around the world!</b></p>   
                        </div>
                </div>
                <div class="mySlides w3-display-container w3-center">
                    <img src="./img/inspire.png" style="width:100%">
                        <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                            <h3>Get Inspired</h3>
                            <p><b>Mold your thoughts and create something new,something different.</b></p>    
                        </div>
                </div>
                <div class="mySlides w3-display-container w3-center">
                    <img src="./img/shaare.png" style="width:100%">
                        <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                            <h3>Share</h3>
                            <p><b>Help the others by sharing your own Stories</b></p>    
                        </div>
                </div>
            </div>

            <!-- Grids -->
            <div class="w3-content w3-row-padding" id="about" style="max-width:1100px">
                <div class="w3-center w3-padding-64">
                    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Articles</span>
                </div>

            <?php   include('./processes/getFeed.php'); ?>

            </div>
        </div>
    </div>



    <!-- arrow -->
    <div class="w3-display-bottomright  w3-margin" style="position: fixed;">
        <a href="#" class="w3-button w3-black"><i class="fa fa-arrow-up"></i></a>
    </div>

    <!-- footer -->
    <footer class="w3-container w3-padding-32 w3-light-grey w3-center">
        <div class="w3-xlarge w3-section">
                <i class="fa fa-facebook-official w3-hover-opacity"></i>
                <i class="fa fa-instagram w3-hover-opacity"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                <i class="fa fa-twitter w3-hover-opacity"></i>
        </div>
    </footer>

    <script>
        
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function carousel() 
        {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) 
            {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 5000);    
        }
    </script>

</body>
</html>
 
        <?php
    }
?>