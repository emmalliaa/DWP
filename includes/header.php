<?php 
include('../config/config.php');
include('../dataacess/DBConnector.php'); 

if(isset($_SESSION['CustomerID'])){
   $customer_id = $_SESSION['CustomerID'];
}else 
    $customer_id = '';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css"> 
</head>
<header class="header">
    <section class="flex">
            <a href="home.php" class="logo">coffee</a>

            <nav class="navbar">
                <a href="home.php">home</a>
                <a href="menu.php">menu</a>
                <a href="orders.php">orders</a>
                <a href="contact.php">contact</a>
            </nav>

            <div class="icons">

                <a href="search.php" > <i class="fas fa-search"></i> </a>
                <a href="cart.php"> <i class="fas fa-shopping-cart "></i><span>() </span> </a>
                <div id="user-btn" class="fas fa-user"> </div>
                <div id="menu-btn" class="fas fa-bars"> </div>

            </div>
            <div class="profile">
            <?php
            $select_profile = $connection->prepare("SELECT * FROM `Customer` WHERE CustomerID= ? ");
            $select_profile->bind_param("i", $customer_id);
            $select_profile->execute();
            $result = $select_profile->get_result();

            if ($result->num_rows > 0) {
                $fetch_profile = $result->fetch_assoc();
                
            ?>
        <p class="name"><?= $fetch_profile['name']; ?></p>
        <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="logout.php" onclick="return confirm('Logout from this website?');" class="delete-btn">Logout</a>
        </div>

        <?php
        }
        else{
        ?>
            <p class="name">Please login first</p>
            <a href="login.php" class="btn">Login</a>
        <?php
        }
        
        
        ?>
            <p class="account"> <a href="login.php">Login</a> or <a href="register.php">Register</a> </p>
</div>
    </section>

</header>












<script src="../assets/js/script.js"></script>
</body>
</html>