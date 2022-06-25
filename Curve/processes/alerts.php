<div class="w3-center">
    <?php
        if(isset($_GET['error']))
        {
            if($_GET['error'] == 'emptyName')
            {
                ?>
                    <big id="box">Name is required</big>
                <?php
            }
            else if($_GET['error'] == 'noDF')
            {
                ?>
                    <big id="box">No Entries</big>
                <?php
            }
            else if($_GET['error'] == 'emptyEmail')
            {
                ?>
                    <big id="box">Email is required</big>
                <?php
            }
            else if($_GET['error'] == 'emptyPassword')
            {
                ?>
                    <big id="box">Password is required</big>
                <?php
            }
            else if($_GET['error'] == 'invalidEmail')
            {
                ?>
                    <big id="box">Email is invalid</big>
                <?php
            }
            elseif ($_GET['error'] == 'mismatch') 
            {
                ?>
                    <big id="box">Passwords do not match</big>
                <?php
            }
           elseif ($_GET['error'] == 'userloginFailed') 
            {
                ?>
                    <big id="box">Login failed</big>
                <?php
            }
            elseif ($_GET['error'] == 'usernameExists') 
            {
                ?>
                    <big id="box">Username Exists</big>
                <?php                
            }
            elseif ($_GET['error'] == 'emailExists') 
            {
                ?>
                    <big id="box">Email Exists</big>
                <?php                
            }
            else if($_GET['error'] == 'userCreateFailed')
            {
                ?>
                    <big id="box">Something went wrong</big>
                <?php
            }
            else if($_GET['error'] == 'invalidFileSize')
            {
                ?>
                    <big id="box">File size invalid</big>
                <?php
            } 
            else if($_GET['error'] == 'invalidFileType')
            {
                ?>
                    <big id="box">File size invalid</big>
                <?php
            }
            else if($_GET['error'] == 'passwordMismatch')
            {
                ?>
                    <big id="box">Invalid Password for UserId</big>
                <?php
            }
            else if($_GET['error'] == 'emptyNameAndEmail')
            {
                ?>
                    <big id="box">Empty Name or Email</big>
                <?php
            }        
        }
        else if(isset($_GET['success']))
        {
            if($_GET['success'] == 'userCreated')
            {
                ?>
                    <big id="box">User signed up successfully</big>
                <?php
            }
        }


        if(isset($_GET['success']))
        {
            if($_GET['success'] == 'loggedOut')
            {
                ?>
                    <big id="box">Logged out successfully </big>
                <?php
            }
            else if($_GET['success'] == 'loggedIn')
            {
                ?>
                    <big id="box">Logged in successfully </big>
                <?php
            }
            else if($_GET['success'] == 'userUpdated')
            {
                ?>
                    <big id="box">Profile Updated </big>
                <?php
            }
            else if($_GET['success'] == 'userImageRemoved')
            {
                ?>
                    <big id="box">Image removed Successfully</big>
                <?php
            }
             else if($_GET['success'] == 'userProfileRemoved')
            {
                ?>
                    <big id="box">User Account removed Successfully</big>
                <?php
            }
            else if($_GET['success'] == 'posted')
            {
                ?>
                    <big id="box">Blog Posted</big>
                <?php
            }
        }
    ?>
</div>

    <script>
        // error boxes
        var box = document.getElementById('box');
            function fadeOut(ele, speed)
            {
                if (!ele.style.opacity)
                {
                    ele.style.opacity=1;
                }
                setInterval(function()
                        {
                            ele.style.opacity-=0.02;
                        },speed/50);
                }
            fadeOut(box,3000);
    </script>


                        

                           
                     
  
                       
                



                        
                    