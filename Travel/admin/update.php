<?php include("partial_code/admin_nav.php"); ?>

<section class="Add">
        <div class="container">
            <h2 class="main" >Update</h2>
            <?php
                $ID =$_GET['id'];
                $sql1="SELECT * FROM places_table WHERE id=$ID";
                $res1=mysqli_query($conn,$sql1);
                if($res1==TRUE)
                {
                    $count = mysqli_num_rows($res1);
                    $slno = 1;
                    if($count==1)
                    {
                        $rows=mysqli_fetch_assoc($res1);
                        $Title=$rows['Title'];
                        $Discription=$rows['Discription'];
                        $Imagee=$rows['Photo'];
                        $Location=$rows['Locations'];
                        $Offers=$rows['Offers'];
                        $Active=$rows['Active'];
                    }
                }
            ?>
            <form action="" method="POST">
                <table class="tbl">
                    <tr>
                        <td class="tbl-25">Title</td>
                        <td><input type="text" name="Title" value="<?php echo $Title; ?>"></td>
                    </tr>
                    <tr>
                        <td class="tbl-25">Discription</td>
                        <td>
                        <textarea name="Discription" cols="30" rows="4"><?php echo $Discription; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl-25">Image</td>
                        <td><input type="text" name="Imagee" value="<?php echo $Imagee; ?>"></td>
                    </tr>
                    <tr>
                    
                    <td class ="tbl-25">Location</td>
                        <td>
                        <select name ="Location" >
                        <?php
                            //display all active category
                            $sql2 = "SELECT * FROM location_table";
                            $res2 = mysqli_query($conn,$sql2);

                            $count =  mysqli_num_rows($res2);
                            
                            if($count>0)
                            {
                                while($row = mysqli_fetch_assoc($res2))
                                {
                                    $L_ID = $row['ID'];
                                    $L_Title = $row['Location'];
                                    ?>
                                    <option <?php if($L_Title==$Location){echo "selected";} ?> value =" <?php echo $L_ID; ?> "> <?php echo $L_Title; ?> </option>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <option value="0">NO Category</option>
                                <?php
                            }
                        ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl-25">Offers</td>
                        <td>
                            <input <?php if($Offers=="Yes"){echo "checked";} ?> type="radio" name="Offers" value="Yes" > Yes
                            <input <?php if($Offers=="No"){echo "checked";} ?> type="radio" name="Offers" value="No" > No
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl-25">Active</td>
                        <td>
                            <input <?php if($Active=="Yes"){echo "checked";} ?> type="radio" name="Active" value="Yes">Yes
                            <input <?php if($Active=="No"){echo "checked";} ?> type="radio" name="Active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $ID; ?>">
                            <input type="submit" name="submit" value="Update" class="submit_btn">
                        </td>
                    </tr>

                </table>
            </form>
            
            
        </div>
    </section>
    <!-- category end -->
    <?php
        if(isset($_POST['submit']))
        {
            // get data from  form
            $ID=$_POST['id'];
            $Title=$_POST['Title'];
            $Discription=$_POST['Discription'];
            $Imagee=$_POST['Imagee'];
            $Location=$_POST['Location'];
            $Offers=$_POST['Offers'];
            $Active=$_POST['Active'];

            // save to data base
            $sql = "UPDATE places_table SET 
                Title='$Title',
                Discription='$Discription',
                Photo='$Imagee',
                Locations='$Location',
                Offers='$Offers',
                Active='$Active'
                WHERE ID='$ID'
            ";

            $res = mysqli_query($conn,$sql);

            if($res==TRUE)
            {
                echo '<script type="text/javascript">';
                echo ' window.location="http://localhost/nee/admin/admin.php"'; 
                echo '</script>';
            }
        }
    ?>