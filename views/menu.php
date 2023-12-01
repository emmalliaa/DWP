<?php
include('../includes/header.php');


$sql = "SELECT * FROM `Product`";
$result = mysqli_query($connection, $sql);







?>

<div class="heading">
    <h3>Our menu</h3>
    <p><a href="home.php">home</a><span> / menu</span> </p>
</div>
<h1>Coffee</h1>

<div class="box-container">


    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <form action="" method="post" class="box">
            <img src="<?php echo $row["ImageURL"]; ?> " alt="">
            <a href="#" class="cat">Coffee</a>
            <div class="name">
                <?php echo $row["ProductName"]; ?>
            </div>
            <div class="description">
                <?php echo $row["Description"]; ?>
            </div>
            <div class="flex">
                <div class="price"><span>
                        <?php echo $row["ProductPrice"]; ?>
                    </span>DKK</div>
                <input type="number" name="qty" class="qty" min="1" max="99" value="1"
                    onkeypress="if(this.value.lenght == 2)return false;">
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> Add to cart</button>
            </div>
        </form>



        <?php

    }
    ;
    ?>
</div>

<?php
include('../includes/footer.php');
?>