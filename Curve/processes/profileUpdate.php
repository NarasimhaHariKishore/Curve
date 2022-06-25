<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);

if(isset($_POST['update']))
{

        include('db.php');

         $userNewName  =    $_POST['updateUserName'];
         $userNewEmail =    $_POST['userEmail'];
         $userImage    =   $_FILES['userImage'];
         $userId       =  $_POST['userId'];

        if(!empty($userNewName) && !empty($userNewEmail))
        {            
            $imageName = $userImage ['name'];
            $fileType  = $userImage['type'];
            $fileSize  = $userImage['size'];
            $fileTmpName = $userImage['tmp_name'];
            $fileError = $userImage['error'];

            $fileImageData = explode('/',$fileType);
            $fileExtension = $fileImageData[count($fileImageData)-1];

            
            if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg')
            {
                //Process Image
                
                if($fileSize < 5000000){
                    //var_dump(basename($imageName));

                    if (!is_dir("../userImages/".$userId)) {
                        mkdir("../userImages/".$userId."/", 0777);
                    }

                    $fileNewName = "../userImages/".$userId."/".$imageName;
                    
                    $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
                    
                    if($uploaded)
                    {
                        $loggedInUser = $_SESSION['user_name'];
                        
                        $sql = "UPDATE users SET user_name = '$userNewName', email ='$userNewEmail', user_image='$imageName' WHERE user_name = '$loggedInUser'";

                        $results = mysqli_query($connection,$sql);
                        

                        if ($results) 
                        {
                            $_SESSION['user_image'] = isset($imageName) ? $imageName : null;
                            $_SESSION['user_name'] = isset($userNewName) ? $userNewName : null;
                            $_SESSION['user_id'] = isset($userId) ? $userId : null;

                            header('Location:../userProfile.php?success=userUpdated');
                            exit;
                        }
                    }
            }
            else
            {
                header('Location:../userProfile.php?error=invalidFileSize');
                exit;
            }
            exit;
            }else{
                header('Location:../userProfile.php?error=invalidFileType');
                exit;
            }
        }
        else
        {
            header('Location:../userProfile.php?error=emptyNameAndEmail');
            exit;
        }        
}

?>