<?php include("config/constants.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dream</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/other.css">
</head>
<body>
     <!-- Header/Nav -->
     <header class="header">  
        <a href="index.php" class="logo"><h2 class="logo">OffTrack</h2></a>
        <ul class="h-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="MyTrip.php">My Trips</a></li>
            <li><a href="Wishlist.php">Wishlist</a></li>
        </ul>
        <div class="find">
            <form action="<?php echo SITEURL;?>search.php" method="POST">
                <table>
                    <tr>
                        <td>
                            <input type="text" placeholder="Search.." name="search">
                        </td>
                        <td>
                        <input type="submit" name="submit" value="Search " class="submit_btn">
                        </td>
                    </tr>
                </table>
                
                
            </form>
        </div>
</header>
    <!-- Header/Nav -->
</body>
</html>