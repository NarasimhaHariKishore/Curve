<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curve</title>

    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/w3.css">
    <style type="text/css">
      body{
        font: 15px/1.5 Arial, Helvetica,sans-serif;
        padding:0;
        margin:0;
        background-color:#f4f4f4;
      }

      /* Global */
      .container{
        width:85%;
        margin:auto;
        overflow:hidden;
      }

      ul{
        margin:0;
        padding:0;
      }

      .dark{
        padding:15px;
        background:#35424a;
        color:#ffffff;
        margin-top:10px;
        margin-bottom:10px;
      }

      #showcase .imgcontainer{
        margin:auto;
        width:75%;
        min-height:400px;
        background-position: center;
        background-size: cover;
      }
        header{ color: #05386b; min-height:70px; }

        footer{ color: #05386b; min-height:40px; text-align: center; }

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
	
	<br>
	<br>
   <?php
    include('./processes/db.php');

    if(isset($_POST['postId']))
    {

            $post = $_POST['postId'];

            $sql = "SELECT * FROM posts WHERE post_id = '$post'";
            $res = mysqli_query($connection,$sql);
            if ($res) 
            {
                if(mysqli_num_rows($res)>0)
                {
                    while ($row = mysqli_fetch_array($res)) 
                    {   

                        $image = $row['post_image'];
                        $blog_title = $row['title'];
                        $blog_intro = $row['intro'];
                        $blog_id = $row['user_id'];
                        $desc=$row['content'];
                        $sum=$row['summary'];
                    ?>
	
                
                     <section>
                      <div class="container">
                        <h2><?php echo $blog_title; ?></h2>
                        <p class=""><?php echo $blog_intro; ?></p>
                      </div>
                    </section>
                  	
                      <section id="showcase">
                        <div class="imgcontainer" style="background:url(./userImages/<?php echo $row['user_id'] ?>/<?php echo $image; ?>) no-repeat;">
                        </div>
                      </section>
                  	
                  	<section>
                  		<div class="container">
                  		  <p class="dark"><?php echo $desc; ?></p>
                  	  </div>
                  	</section>

                      <section>
                      <div class="container">
                        <p class=""><?php echo $sum; ?></p>
                      </div>
                    </section>
                    <?php
                    }
                }
            }
        }
      ?>
    <footer>
      <p> Curve, Copyright &copy; 2021</p>
    </footer>
  </body>
</html>
