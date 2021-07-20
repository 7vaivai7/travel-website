<?php
    include('config/constants.php');

    $ID = $_GET['id'];

    $sql = "DELETE FROM wishlist_table WHERE id=$ID";

    $res = mysqli_query($conn,$sql);

    if($res==TRUE)
    {
        header("location:".SITEURL.'Wishlist.php');
    }

?>