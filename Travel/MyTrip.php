<?php include("partial_code/nav.php"); ?>

<section class="Recomended">
        <H1>My Trips</H1>
        
        <div class="container">
            
            <?php 
                $sql = "SELECT * FROM review_table";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $ID = $rows['ID'];
                        $Name = $rows['Namee'];
                        $Photos = $rows['Photo'];
                        $Review = $rows['Review'];
                        $Date = $rows['Datee'];

                        ?>
                        <div class="Recomend-list raisedbox">
                        <div class="imagee">
                            <img src="<?php echo SITEURL ;?>img/mine/<?php echo $Photos;?>" width="100%" class="img-curve" >
                        </div>
                        <div class="disc">
                            <h4 class="text-center"><?php echo $Name ;?></h4>
                            
                        </div>
                        <h4>My Experiance</h4>
                        <h5 class="text-center"><?php echo $Date ;?></h5>
                        <div class="disp">
                                <p class="diss text-justify">
                                    <?php echo $Review ;?>
                                </p>
                            </div>
                        </div>
                        
                        <?php
                    }
                } 
            ?> 
            <div class="clearfix"></div>
        </div>  
    </section>