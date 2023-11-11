<?php 
include('../dataacess/DBConnector.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>


<div class="header">
<section class="flex">
    <a href="dashboard.php">Admin Panel</a>
    <nav class="navbar">
        <a href="dashboard.php">Home</a>
        <a href="products_update.php">Products</a>
        <a href="aboutus_update.php">About Us</a>
        <a href="info_update.php">Company</a>
        <a href="news_update.php">News</a>

    </nav>

 <div class="icons">
            <id id="user-btn" class="fas fa-user"> </id>


    </div>
    <div class="profile">
        <?php 
        $select_profile = $connection->prepare("SELECT * FROM `Admin` WHERE AdminID = ?");
        $select_profile ->execute();
        $result= $select_profile->get_result();
    ?>
        <a href="update_profile.php" class="btn" >Update Profile</a>
    </div>
</section>
</div>
</body>
</html>