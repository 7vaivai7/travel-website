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
                                <img src="<?php echo SITEURL ;?>img/places/<?php echo $Photos;?>" width="100%" class="img-curve" >
                            </div>
                            <h4 class="text-center"><?php echo $Title ;?></h4>
                                <p class="text-center">Location :
                                    <?php 
                                    $sql2 = "SELECT * FROM location_table WHERE ID=$Location";
                                    $res2 = mysqli_query($conn,$sql2);
                                    $row1 = mysqli_fetch_assoc($res2);
                                    $L_Title = $row1['Location'];
                                    echo $L_Title;
                                    ?>
                                </p>
                                <div class="disp">
                                    <p class="diss text-justify">
                                        <?php echo $Discription ;?>
                                    </p>
                                </div>
                        <?php
                } 
            ?>
    </div>
    <div class="exp">
        <div class="dete">
            <form action="" method="POST" enctype="multipart/form-data">    
                <table class="tbl">
                    <tr>
                        <td class="tbl-25">Name</td>
                        <td><input type="text" name="Name" ></td>
                    </tr>
                    <br>
                    <tr>
                        <td class="tbl-25">Date</td>
                        <td><input type="date" name="Date" ></td>
                    </tr>
                    <br>
                    <tr>
                        <td class="tbl-25">Review</td>
                        <td>
                        <textarea name="Review" cols="50" rows="7"></textarea>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td class="tbl-25">Image</td>
                        <td><input type="file" name="Photoo" ></td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Add" class="submit_btn">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php
        if(isset($_POST['submit']))
        {
            if(isset($_FILES['Photoo']['name']))
            {
                $Photo=$_FILES['Photoo']['name'];
            }
            
            // get data from  form
            $Name=$_POST['Name'];
            $Date=$_POST['Date'];
            $Review=$_POST['Review'];

            // save to data base
            $sql = "INSERT INTO review_table SET 
                Namee='$Name',
                Datee='$Date',
                Review='$Review',
                Photo='$Photo'
                
            ";

            $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

            if($res == TRUE)
            {
                echo '<script type="text/javascript">';
                echo ' window.location="http://localhost/nee/index.php"'; 
                echo '</script>';
            }
        }
    ?>