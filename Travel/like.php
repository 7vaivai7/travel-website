
<?php 
    include('config/constants.php');
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
            } 
    $sql = "INSERT INTO wishlist_table SET 
    Title='$Title',
    Photo='$Photos',
    Discription='$Discription',
    Locations='$Location',
    Place_ID='$ID'
    ";

    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if($res==TRUE)
    {
        echo '<script type="text/javascript">';
        echo ' window.location="http://localhost/nee/index.php"'; 
        echo '</script>';
    }
?>