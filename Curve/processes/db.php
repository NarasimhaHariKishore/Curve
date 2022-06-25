 <?php
    $host = "localhost";  
    $user = "root";  
    $password = '';  
      
    $connection = mysqli_connect($host, $user, $password);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $sql = " CREATE DATABASE IF NOT EXISTS curve ";


    if (mysqli_query($connection, $sql)) {
        echo "";
    }

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "curve";

   $connection = new mysqli($servername, $username, $password, $dbname);

   if ($connection->connect_error) {
     die("Connection failed: " . $connection->connect_error);
   }

   
      $tab1 = "CREATE TABLE IF NOT EXISTS users (
        `user_id` INT(6) AUTO_INCREMENT PRIMARY KEY ,
        `user_name` varchar(25) NOT NULL,
        `email` varchar(50) NOT NULL,
        `user_image` varchar(250) NOT NULL,
        `password` varchar(10) NOT NULL
      )";

      $tab2 = "CREATE TABLE IF NOT EXISTS posts (
        `post_id` int(11) NOT NULL,
        `user_id` int(12) NOT NULL,
        `user` varchar(25) NOT NULL,
        `title` varchar(50) NOT NULL,
        `post_image` varchar(250) NOT NULL,
        `intro` varchar(3000) NOT NULL,
        `content` varchar(5000) NOT NULL,
        `summary` varchar(3000) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      )";

   if ($connection->query($tab1) === TRUE) {
     echo "";
   } else {
     echo "Error creating table: " . $connection->error;
   }
   if ($connection->query($tab2) === TRUE) {
     echo "";
   } else {
     echo "Error creating table: " . $connection->error;
   }
?>