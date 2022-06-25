<?php
session_start();


	if(isset($_POST['blog']))
	{    
	    include('db.php');

	    $blogTitle  	=    $_POST['title'];
        $blogIntro		=    $_POST['intro'];
        $blogImage    	=    $_FILES['post_image'];
        $blogContent	=	 $_POST['content'];
        $blogSummary	=	 $_POST['summary'];
        $userId         =    $_POST['userId'];
        $user           =    $_POST['user'];

        if(!empty($blogTitle) && !empty($blogIntro) && !empty($blogImage) && !empty($blogContent) && !empty($blogSummary))
        { 
        	$imageName = $blogImage['name'];
            $fileType  = $blogImage['type'];
            $fileSize  = $blogImage['size'];
            $fileTmpName = $blogImage['tmp_name'];
            $fileError = $blogImage['error'];

            $fileImageData = explode('/',$fileType);
            $fileExtension = $fileImageData[count($fileImageData)-1];

            
            if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg')
            {
            	if($fileSize < 5000000)
            	{
                    //var_dump(basename($imageName));
                    if (!is_dir("../userImages/".$userId)) {
                        mkdir("../userImages/".$userId."/", 0777);
                    }

                    $fileNewName = "../userImages/".$userId."/".$imageName;
                    
                    $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
                    
                    if($uploaded)
                    {
                    	$loggedInUser = $_SESSION['user_name'];

                    	$sql = "INSERT INTO posts (user_id,user, title, post_image, intro, content, summary, created_at) VALUES ('$userId','$user', '$blogTitle', '$imageName', '$blogIntro', '$blogContent', '$blogSummary', now())";

                    	$results = mysqli_query($connection,$sql);


                        if ($results) 
                        {
                            $_SESSION['user_id'] = isset($userId) ? $userId : null;
   
                        }
                         header('Location:../userProfile.php?success=posted');
                            exit;
                    }
            	}
	            else
	            {
	                header('Location:../blogTemplet.php?error=invalidFileSize');
	                exit;
	            }
            	exit;
            }
            else{
                header('Location:../blogTemplet.php?error=invalidFileType');
                exit;
            }
        }
        else
        {
            header('Location:../blogTemplet.php?error=emptyNameAndEmail');
            exit;
        }        
	}
?>