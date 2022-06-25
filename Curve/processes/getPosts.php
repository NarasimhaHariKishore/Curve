 <?php
    include('./processes/db.php');

            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM posts WHERE user_id='$id'";
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
                        $user=$row['user'];
                        $id = $row['post_id'];

                    ?>
                    <form id="dh" method="post" action="blog.php">

                        <div class="w3-content w3-container w3-padding-64">
                            <div class="w3-container w3-card w3-white w3-round w3-margin"><br>

                                <img src="./userImages/<?php echo $_SESSION['user_id'] ?>/<?php echo $_SESSION['user_image'] ?> " alt="" class="w3-left w3-circle w3-margin-right" style="width:50px;">
                                <span class="w3-right w3-opacity">1 min</span>
                                <h4><?php echo $_SESSION['user_name'] ?></h4><br>
                                <h3><?php echo $blog_title; ?></h3>
                                <hr class="w3-clear">
                                <div class="w3-row-padding" style="margin:0 -16px">
                                    <div>
                                        <img src="./userImages/<?php echo $blog_id ?>/<?php echo $image; ?>" style="width:100%;max-height: 350px;" alt="" class="w3-margin-bottom">
                                    </div>
                                    <p><?php echo $blog_intro; ?></p>          
                                </div>


                                <button type="button" class="w3-button w3-theme-d1 w3-left" style="float: none;margin: 0;"><i class="fa fa-thumbs-up"></i> &nbsp;Like</button> 
                                <button type="button" class="w3-button w3-theme-d2 w3-right" style="float: none;margin: 0;"><i class="fa fa-comment"></i> &nbsp;Comment</button> 
                                <button type="submit" name="postId" value="<?php echo $id ?>">Visit</button>

                            </div>
                        </div>
                    </form>
                    <?php
                    }
                }
            }
            else
            {
                ?>
                    <div class="w3-content w3-container w3-padding-64" style="text-align: center;">
                        <div class="w3-container   w3-round w3-margin">
                            <?php    echo "  No Posts Yet"; ?>                
                        </div>
                    </div>                
                <?php
            }
        ?>        