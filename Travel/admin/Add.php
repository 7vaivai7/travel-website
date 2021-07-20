<?php include("partial_code/admin_nav.php"); ?>
<section class="Add">
        <div class="container">
            <h2 class="main">Add </h2>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl">
                    <tr>
                        <td class="tbl-25">Title</td>
                        <td><input type="text" name="Title" placeholder="enter title"></td>
                    </tr>
                    <tr>
                        <td class="tbl-25">Description</td>
                        <td><textarea name="Discription" cols="30" rows="5" placeholder="enter Discription"></textarea></td>
                    </tr>
                    <tr>
                        <td class="tbl-25">Image</td>
                        <td><input type="file" name="Imagee" ></td>
                    </tr>
                    <tr>
                        <td class ="tbl-25">Location</td>
                        <td>
                        <select name ="Location" >
                        <?php
                            //display all active category
                            $sql1 = "SELECT * FROM location_table";
                            $res = mysqli_query($conn,$sql1);

                            $count =  mysqli_num_rows($res);
                            
                            if($count>0)
                            {
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $ID = $row['ID'];
                                    $L_Title = $row['Location'];
                                    ?>
                                    <option value =" <?php echo $ID;?> "> <?php echo $L_Title; ?> </option>
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
                            <input type="radio" name="Offers" value="Yes">Yes
                            <input type="radio" name="Offers" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td class="tbl-25">Active</td>
                        <td>
                            <input type="radio" name="Active" value="Yes">Yes
                            <input type="radio" name="Active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Add " class="submit_btn">
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
            if(isset($_POST['Offers']))
            {
                $Offers=$_POST['Offers'];
            }
            else
            {
                $Offers="No";
            }
            if(isset($_POST['Active']))
            {
                $Active=$_POST['Active'];
            }
            else
            {
                $Active="No";
            }
            if(isset($_FILES['Imagee']['name']))
            {
                $Imagee=$_FILES['Imagee']['name'];

                if($Imagee!="")
                {
                $ext = end(explode('.' , $Imagee));
                $Imagee = "place_".rand(000,999).'.'.$ext;

                $source_path = $_FILES['Imagee']['tmp_name'];
                $destination_path = "../img/places/".$Imagee;

                $uplaod = move_uploaded_file($source_path,$destination_path);

                }
                
            }
            else
            {
                $Imagee="";
            }
            // get data from  form
           $Title=$_POST['Title'];
           $Discription=$_POST['Discription'];
           $Location=$_POST['Location'];
           
           
            // save to data base
            $sql = "INSERT INTO places_table SET 
                Title='$Title',
                Photo='$Imagee',
                Discription='$Discription',
                Locations=$Location,
                Offers='$Offers',
                Active='$Active'
            ";

            $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

            if($res == TRUE)
            {
                echo '<script type="text/javascript">';
                echo ' window.location="http://localhost/nee/admin/admin.php"'; 
                echo '</script>';
            }
        }
        
    ?>
    