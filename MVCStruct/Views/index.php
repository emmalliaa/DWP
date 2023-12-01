<?php
namespace Views;

use Controllers as C;

include_once('../Controllers/HomeController.php');

$controller = new C\HomeController();


function showAllProducts(C\HomeController $controller)
{
    while ($row = mysqli_fetch_array($controller->getAllFromTable("Product"))) {
        echo "<p>" . $row["ProductName"] . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Hello Emma</h2>

    <?php
    showAllProducts($controller);
    ?>
</body>

</html>