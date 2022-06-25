<?php
    session_start();
    include('./processes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curve</title>

    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/w3.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    
</head>
<body class="showcase">
    <header>
        <h1>Curve</h1>
        <nav>
            <ul>
                <li><a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:100px;">Login</a></li>
                <li><a href="#" onclick="document.getElementById('id02').style.display='block'" style="width:100px;">Register</a></li>
            </ul>
        </nav>
    </header>

    <br><br>
    
    <?php include('./processes/alerts.php'); ?>

    <br><br><br><br>
    <!-- content -->
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:700px;">
        <h2>Curve is a Web Community</h2>
        <p>A place where one can share and discover the stories. Stories of us all, that inspires transforms and revoultionize.</p>
    </div>

    <div id="id01" class="modal">
        <form class="content animate" method="post" action="./processes/login.php">
            <h3>Login Form</h3>
            <input class="w3-input" type="email" name="userEmail" placeholder="Enter Email">
            <input class="w3-input" type="password" name="userPassword" placeholder="Enter Password">
            <br>
            <button type="submit" name="login_user">Login</button>
        </form>
    </div>
    <div id="id02" class="modal">
        <form class="content animate" method="post" action="./processes/reg.php">
            <h3>Signup Form</h3>
            <input class="w3-input" type="text" name="userName" placeholder="Username">
            <input class="w3-input" type="email" name="userEmail" placeholder="E-Mail">
            <input class="w3-input" type="password" name="userPassword" placeholder="Enter Password">
            <br>
            <button type="submit" name="reg_user">Signup</button>
        </form>
    </div>
    <!-- scripts -->
    <script>
        // modals
        window.onclick = function(event) 
            {
                if (event.target == document.getElementById('id01')) {
                    document.getElementById('id01').style.display = "none";
                }
                else if (event.target == document.getElementById('id02')) {
                    document.getElementById('id02').style.display = "none";
                }
                else if (event.target == document.getElementById('menu')) {
                    document.getElementById('menu').style.width = "0";
                }
            }
    </script>
</body>
</html>