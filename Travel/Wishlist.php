<?php include("partial_code/nav.php"); ?>

<section class="Recomended">
        <H1>WishList</H1>
        
        <div class="container">
            
            <?php 
                $sql = "SELECT * FROM wishlist_table";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $ID = $rows['ID'];
                        $Title = $rows['Title'];
                        $Photos = $rows['Photo'];
                        $Discription = $rows['Discription'];
                        $Location = $rows['Locations'];
                        $Place_ID = $rows['Place_ID'];
                        ?>
                        <div class="Recomend-list raisedbox">
                        <a href="<?php echo SITEURL ;?>place_page.php?id=<?php echo $ID ;?>">
                        <div class="imagee">
                            <img src="<?php echo SITEURL ;?>img/places/<?php echo $Photos;?>" width="100%" class="img-curve" >
                        </div>
                        <div class="disc">
                            <h4 class="text-center"><?php echo $Title ;?></h4>
                            <p class="text-center">Location :
                                        <?php 
                                            $sql2 = "SELECT * FROM location_table WHERE ID=$Location";
                                            $res1 = mysqli_query($conn,$sql2);
                                            $row = mysqli_fetch_assoc($res1);
                                            $L_Title = $row['Location'];
                                            echo $L_Title;
                                        ?>
                            </p>
                            <div class="disp">
                                <p class="diss text-justify">
                                    <?php echo $Discription ;?>
                                </p>
                            </div>
                              
                        </div>    
                        </a>
                        <a href="<?php echo SITEURL ;?>add.php?id=<?php echo $Place_ID ;?>" class="btn-book">
                            Add Now
                        </a>      
                        <a href="<?php echo SITEURL ;?>del_like.php?id=<?php echo $ID ;?>" class="btn-wislist">
                        <img src="https://img.icons8.com/nolan/40/recycle-bin.png"/>
                        </a>
                        </div>
                        
                        <?php
                    }
                } 
            ?> 
            <div class="clearfix"></div>
        </div>  
    </section>