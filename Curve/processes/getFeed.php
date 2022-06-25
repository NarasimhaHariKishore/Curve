 <?php
    include('./processes/db.php');

            $sql = "SELECT * FROM posts ";
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
                        $id = $row['post_id'];
                    ?>  
                            <form id="dh" method="post" action="blog.php">
                                <div class="w3-third w3-margin" style="max-width: 320px">
                                    <input type="hidden" name="<?php echo $id; ?>">

                                    <div class="w3-card-4">
                                        <img src="./userImages/<?php echo $row['user_id'] ?>/<?php echo $image; ?>" style="width:100%;max-height: 200px" alt="" class="w3-margin-bottom">
                                            <div class="w3-container">
                                                <h3><?php echo $blog_title; ?></h3>
                                                <p class="w3-opacity">Mathematics</p>
                                                <p style="overflow: hidden;height: 50px;"><?php echo $blog_intro; ?></p>
                                            </div>
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