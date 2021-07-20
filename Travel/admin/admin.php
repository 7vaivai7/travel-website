<?php include("partial_code/admin_nav.php"); ?>

<section class="display">
        <div class="container">
            <h2 class="main" >DashBoard</h2>
            <br><br>
            <table class="tbl">
                <tr>
                    <th>Sl No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Discription</th>
                    <th>Location</th>
                    <th>Offers</th>
                    <th>Active</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM places_table ";
                    $res = mysqli_query($conn,$sql);

                    if($res==TRUE)
                    {
                        $rows = mysqli_num_rows($res);
                        $slno = 1;
                        if($rows>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $ID=$rows['ID'];
                                $Imagee=$rows['Photo'];
                                $Title=$rows['Title'];
                                $Discription=$rows['Discription'];
                                $Location=$rows['Locations'];
                                $Offers=$rows['Offers'];
                                $Active=$rows['Active'];

                                ?>
                                <tr>
                                    <td><?php echo $slno++?></td>
                                    <td>
                                        <?php
                                        if($Imagee!="")
                                        {
                                            ?>
                                            <img src ="<?php echo SITEURL; ?>img/places/<?php echo $Imagee; ?>" width="100px">
                                            <?php
                                        }
                                        else
                                        {
                                            echo "No Image";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $Title?></td>
                                    <td><?php echo $Discription?></td>
                                    <td>
                                        <?php 
                                            $sql2 = "SELECT * FROM location_table WHERE ID=$Location";
                                            $res1 = mysqli_query($conn,$sql2);
                                            $row = mysqli_fetch_assoc($res1);
                                            $L_Title = $row['Location'];
                                            echo $L_Title;
                                        ?>
                                    </td>
                                    <td><?php echo $Offers?></td>
                                    <td><?php echo $Active?></td>
                                    <td>
                                        <a class="update" href="<?php echo SITEURL;?>admin/update.php?id=<?php echo $ID;?>">Update</a>
                                        <a class="dele" href="<?php echo SITEURL;?>admin/del.php?id=<?php echo $ID;?>"> Delete</a>
                                    </td>
                                </tr>
                                <?php

                            }
                        }
                        
                    }
                ?>
                
                
                
            </table>
            
        </div>
</section>