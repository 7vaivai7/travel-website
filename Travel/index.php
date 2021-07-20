<?php include("partial_code/nav.php"); ?>
    <!-- Header/Nav -->
    <div id="slider">
        <a href="#" class="control_next"> </a>
        <a href="#" class="control_prev"> </a>
                <ul>
                    <li>
                        <img src="img/img3.png">
                    </li>
                    <li >
                        <img src="img/img2.jpg">
                    </li>
                    <li>
                        <img src="img/img1.jpg">
                    </li>
                    <li>
                        <img src="img/img4.png">
                    </li>
                    <li>
                        <img src="img/img5.jpg">
                    </li>
                </ul>
    </div>
    <section class="Recomended">
        <H1>Recomended</H1>
        
        <div class="container">
            
            <?php 
                $sql = "SELECT * FROM places_table WHERE Active='Yes' AND Offers='Yes' LIMIT 4";
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
                        <a href="<?php echo SITEURL ;?>add.php?id=<?php echo $ID ;?>" class="btn-book">
                            Add Now
                        </a>      
                        <a href="<?php echo SITEURL ;?>like.php?id=<?php echo $ID ;?>" class="btn-wislist">
                            <img src="https://img.icons8.com/bubbles/40/000000/like.png"/>
                        </a>
                        </div>
                        <?php
                    }
                } 
            ?> 
            <div class="clearfix"></div>
            <a class="text-center" href="<?php echo SITEURL ;?>All_Offers.php">See All</a>
        </div>  
    </section>

    <section class="Popular-Spots">
        <H1>All Spots</H1>
        <div class="container">
            
            <?php 
                $sql = "SELECT * FROM places_table WHERE Active='Yes' LIMIT 12";
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
                        ?>
                        <div class="All-list raisedbox">
                        <a href="<?php echo SITEURL ;?>place_page.php?id=<?php echo $ID ;?>">
                        <div class="imagee">
                            <img src="<?php echo SITEURL ;?>img/places/<?php echo $Photos;?>" width="100%" class="img-curve" >
                        </div>
                        <div class="disc">
                            <h4 class="text-center"><?php echo $Title ;?></h4>
                            <p class="text-center">
                                        <?php 
                                            $sql2 = "SELECT * FROM location_table WHERE ID=$Location";
                                            $res1 = mysqli_query($conn,$sql2);
                                            $row = mysqli_fetch_assoc($res1);
                                            $L_Title = $row['Location'];
                                            echo $L_Title;
                                        ?>    
                            </p>
                            <div class="disp">
                                <p class="dis text-justify">
                                    <?php echo $Discription ;?>
                                </p>
                            </div>  
                        </div>    
                        </a>
                        <a href="<?php echo SITEURL ;?>add.php?id=<?php echo $ID ;?>" class="btn-book">
                            Add Now
                        </a>      
                        <a href="<?php echo SITEURL ;?>like.php?id=<?php echo $ID ;?>" class="btn-wislist">
                            <img src="https://img.icons8.com/bubbles/40/000000/like.png"/>
                        </a>
                        </div>
                        <?php
                    }
                } 
            ?> 
            <div class="clearfix"></div>
            <a class="text-center" href="<?php echo SITEURL ;?>All_Places.php">See All</a>
        </div>  
    </section>  
      
    <!-- footer  start -->
    <?php include("partial_code/footer.php"); ?>
    <!-- footer  end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" > </script>
    <script src="slider.js"></script>
