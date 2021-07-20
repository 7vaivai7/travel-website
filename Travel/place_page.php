<?php include("partial_code/nav.php"); ?>
<div class="page">
    <div class="details">
            <?php 
                $id=$_GET['id'];
                $sql1 = "SELECT * FROM places_table WHERE ID='$id'";
                $res1 = mysqli_query($conn,$sql1);
                $count = mysqli_num_rows($res1);

                if($count>0)
                {
                    $row=mysqli_fetch_assoc($res1);
                    $ID = $row['ID'];
                    $Title = $row['Title'];
                    $Photos = $row['Photo'];
                    $Discription = $row['Discription'];
                    $Location = $row['Locations'];
                        ?>
                            <div class="imagee">
                                <img src="<?php echo SITEURL ;?>img/places/<?php echo $Photos
                                ;?>" width="100%" class="img-curve" >
                            </div>
                        <?php
                } 
            ?>
    </div>
    <div class="exp">
        <div class="dete">
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
            <a href="<?php echo SITEURL ;?>add.php?id=<?php echo $id ;?>" class="btn-book">
                Add Now
            </a>      
            <a href="<?php echo SITEURL ;?>like.php?id=<?php echo $id ;?>" class="btn-wislist">
                <img src="https://img.icons8.com/bubbles/40/000000/like.png"/>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>