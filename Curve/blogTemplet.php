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

    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="./css/blog.css">
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
    </header><br><br><br>

        <?php include('./processes/alerts.php'); ?>
	<div class="mar">
        <form action="./processes/post.php" method="POST" enctype="multipart/form-data">
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
                                <input type="hidden" name="user" value="<?php echo $row['user_name'];?>">


                				<label for="title">Title</label><br>		
            					<input id="title" type="text" name="title" value="Blog Title"><br>
                                
                                <label for="intro">Introduction</label>        
                				<textarea id="intro" name="intro" rows="4" cols="100" ></textarea><br>

                                <label for="content">Description</label>
                                <textarea id="content" name="content" rows="20" cols="100" ></textarea><br>

                                <label for="summary">Summary</label>
                				<textarea  id="summary" name="summary" rows="4" cols="100"></textarea><br>

                                <input id="file" type="file" name="post_image">
                                <label for="file">Select Image</label><br>

                				<button class="fa fa-edit" type="submit" name="blog">&nbsp;Post</button>
                			<?php
                        }
                    }
                }
            ?>
		</form>
    </div>
</body>
</html>