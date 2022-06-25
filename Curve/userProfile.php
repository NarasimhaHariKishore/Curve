<?php
    session_start();
    error_reporting(0);
    include('./processes/db.php');
    
    if(isset($_SESSION['user_name']))
    {
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
        
<?php include('./processes/alerts.php'); ?><br>



    <div class="w3-row-padding" >
        <div id="pro">
            <img src="./userImages/<?php echo $_SESSION['user_id'] ?>/<?php echo $_SESSION['user_image'] ?>" style="width: 100%;height:250px;border-radius: 20px;" alt="">
        </div>
        <div  id="info" >
            <h2 class=" w3-container w3-text-black" style="text-transform: capitalize;"><?php echo $_SESSION['user_name'] ?></h2>
            <div class="w3-container">
                <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>&nbsp;<?php echo $_SESSION['email'] ?></p>
                   
                <button class="fa fa-edit" onclick="document.getElementById('id01').style.display='block'" style="width:200px;text-align: center;display:inline;margin: 0 45px;">Update
                </button>                            
                                      
                <form id="op" action="./processes/removeProfileImage.php" method="POST">
                    <button class="fa fa-trash" type="submit" name="removeImage" style="width:200px;">&nbsp;Delete Image</button>
                </form>
                <form id="op" action="./processes/removeProfile.php" method="POST">
                    <button class="fa fa-users" type="submit" name="removeProfile" style="width:200px;">&nbsp;Delete Profile</button>
                </form> 
                <form  id="op">       
                    <button  class="fa fa-edit" style="width:200px;"><a href="blogTemplet.php">&nbsp;Post</a></button>
                </form>
            </div>
        </div>
    </div>            
            
            <?php   include('./processes/getPosts.php'); ?>

    <div id="id01" class="modal">
        <form class="content animate" action="./processes/profileUpdate.php" method="POST" enctype="multipart/form-data">
            <?php
                $user = $_SESSION['user_name'];
                $sql = "SELECT * FROM users WHERE user_name='$user'";
                $res = mysqli_query($connection,$sql);
                if ($res) 
                {
                    if(mysqli_num_rows($res)>0)
                    {
                        while ($row = mysqli_fetch_array($res)) 
                        {
                            ?>  
                                <input type="hidden" name="userId" value="<?php echo $row['user_id'];?>">                                
                                <input class="w3-input" type="text" name="updateUserName" value=" <?php echo $row['user_name']; ?> ">
                                <input class="w3-input" type="email" name="userEmail" value="<?php echo $row['email'];?>">
                                <br><br>
                                <input type="file" name="userImage">
                                <input type="submit" name="update" value="update">
                                <br><br>
                            <?php
                        }
                    }
                }
            ?>
        </form>
                
                
    </div>
    <!-- scripts -->
  
    <script>

          window.onclick = function(event) 
        {
             if (event.target == document.getElementById('id01')) 
             {
                document.getElementById('id01').style.display = "none";
            }
        }
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
</body>
</html>
        <?php
    }
?>