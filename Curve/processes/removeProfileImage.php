<?php
session_start();


if(isset($_POST['removeImage'])){
    
    include('db.php');


    $loggedInUser = $_SESSION['user_id'];


    $sql = "UPDATE users SET user_image = NULL WHERE user_id='$loggedInUser'";


    $result  = mysqli_query($connection,$sql);

    if($result){        

        $removeImageFromDirectory = '../userImages/'.$_SESSION['user_id'].'/'.$_SESSION['user_image'];

        unlink($removeImageFromDirectory);
        unset($_SESSION['user_image']);
       // unset($_SESSION['user_id']);

        header('Location:../userProfile.php?success=userImageRemoved');
        exit;
    }

}



?>