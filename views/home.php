<?php
include('../includes/header.php');

$sql= "SELECT Limited.ProductID, Limited.StartDate, Limited.EndDate,Product.ProductID, Product.ProductName, Product.ProductPrice, Product.Description, Product.ImageURL
FROM Limited
JOIN Product ON Limited.ProductID = Product.ProductID";
$result = mysqli_query($connection, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css"> 
</head>
<body> 


<!--hero section starts-->

<section class="home" id="home">
    <div class="home-text ">
       <h1>Start your day <br> with coffee</h1>
       <p>Lorem ipsum dolor sit amet consectetur adipisicingatur laborum non veniam quasi voluptatum doloremque praesentium i</p>
       <a href="menu.php" class="btn" >Shop now</a>
    </div>
    <div class="home-img">
        <img src="../assets/img/hero1.png" alt="">
    </div>

</section>

<!--hero section ends-->


<div class="offer">
    <h2> <span class="brown">Weekend</span> special product</h2>
    <p>checkout our weekend special offer</p>
    <div class="product-list">
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="product-item">
            <img src="<?php echo $row["ImageURL"];?>" alt="" srcset="">
            <h3><?php echo $row["ProductName"];?></h3>
            <p><?php echo $row["Description"];?></p>
            <div class="price"><span><?php echo $row["ProductPrice"];?></span>DKK</div>
            <a href="product-url" class="btn">View Details</a>
        </div>
        <?php
            };
        ?>
    </div>

</div>





<!--news section starts-->
<section class="news">
    <img src="" alt="" srcset="">
    <div class="news-cont">
        <h3>Special Christmas offer staring 20th of December</h3>
        <p></p>
    </div>

</section>
<!--news section ends-->


<!--footer section starts-->
<?php include('../includes/footer.php') ?>
<!--footer section ends-->




</body>
</html>