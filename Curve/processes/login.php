<?php
session_start();


if(isset($_POST['login_user'])){
    
    include('db.php');

    if(empty($_POST['userEmail'])){
        header('Location:../index.php?error=emptyEmail');
        exit;
    }
    if(empty($_POST['userPassword'])){
        header('Location:../index.php?error=emptyPassword');
        exit;
    }


    if(!empty($_POST['userEmail']) && !empty($_POST['userPassword'])){

        //Checking valid email
        if(!filter_var($_POST['userEmail'],FILTER_VALIDATE_EMAIL)){
            header('Location:../index.php?error=invalidEmail');
            exit;
        }

        $userEmail = mysqli_real_escape_string($connection,strip_tags($_POST['userEmail']));
        $userPassword = mysqli_real_escape_string($connection,$_POST['userPassword']);

        $sql = "SELECT * FROM `users` WHERE email='$userEmail'";
        // AND password='$userPassword'
        $userFound = mysqli_query($connection,$sql);

            if($userFound)
            {

                if(mysqli_num_rows($userFound) > 0)
                {
                    while($row = mysqli_fetch_assoc($userFound))
                    {
                        if($userPassword === $row['password'])
                        {
                            $_SESSION['user_name'] = $row['user_name'];
                            $_SESSION['user_image'] = isset($row['user_image']) ? $row['user_image'] : null;
                            $_SESSION['email'] = isset($row['email']) ? $row['email'] : null;
                            $_SESSION['user_id'] = isset($row['user_id']) ? $row['user_id'] : null;

                            header('Location:../home.php?success=loggedIn');
                            exit;
                        }
                    }

                      header('Location:../index.php?error=passwordMismatch');
                        exit;
                }
                else
                {
                    header('Location:../index.php?error=userloginFailed');
                    exit;
                }

            }




    }

}
?>
