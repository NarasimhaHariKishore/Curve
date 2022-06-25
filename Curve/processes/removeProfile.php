<?php
session_start();


if(isset($_POST['removeProfile'])){
    
    include('db.php');


    $loggedInUser = $_SESSION['user_id'];


    $sql = "DELETE FROM users WHERE user_id='$loggedInUser'";


    $result  = mysqli_query($connection,$sql);

    if($result){

        if(isset($_SESSION['user_image'])){
            $removeImageFromDirectory = '../userImages/'.$_SESSION['user_id'].'/'.$_SESSION['user_image'];

            unlink($removeImageFromDirectory);
            unset($_SESSION['user_image']);
            unset($_SESSION['user_id']);
        }
        
        session_destroy();
        header('Location:../index.php?success=userProfileRemoved');
        exit;
    }

}



?>