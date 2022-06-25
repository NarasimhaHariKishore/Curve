<?php
session_start();

if(isset($_POST['reg_user'])){
    
    include('db.php');

    if(empty($_POST['userName'])){
        header('Location:../index.php?error=emptyName');
        exit;
    }
    if(empty($_POST['userEmail'])){
        header('Location:../index.php?error=emptyEmail');
        exit;
    }
    if(empty($_POST['userPassword'])){
        header('Location:../index.php?error=emptyPassword');
        exit;
    }


    if(!empty($_POST['userName']) && !empty($_POST['userEmail']) && !empty($_POST['userPassword'])){

        //Checking valid email
        if(!filter_var($_POST['userEmail'],FILTER_VALIDATE_EMAIL)){
            header('Location:../index.php?error=invalidEmail');
            exit;
        }

        $userName = mysqli_real_escape_string($connection,strip_tags($_POST['userName']));
        $userEmail = mysqli_real_escape_string($connection,strip_tags($_POST['userEmail']));
        $userPassword = mysqli_real_escape_string($connection,$_POST['userPassword']);

        ini_set("SMTP","smtp.gmail.com");
        ini_set("smtp_port","587");

        $to_email = $userEmail;
        $subject = "Simple Email Test via PHP";
        $body = "Thank you for resgistration $userName";
        $headers = "From: saibommavaram@gmail.com";

        $sql = "INSERT INTO users (user_name,email,password) VALUES ('$userName','$userEmail','$userPassword')";

        $inserted = mysqli_query($connection,$sql);

        if($inserted){

            mail($to_email, $subject, $body, $headers);

            $_SESSION['user_name'] = $userName;

            header('Location:../home.php?success=userCreated');
            exit;
        }else{
            header('Location:../index.php?error=userCrateFailed');
            exit;
        }
    }

}