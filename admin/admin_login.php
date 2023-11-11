<?php

include('../dataacess/DBConnector.php'); 



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $stmt = $connection->prepare("SELECT * FROM `Admin` WHERE AdminUsername = ? AND AdminPass = ?");
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fetch_admin_id = $result->fetch_assoc();
        $_SESSION['admin_id'] = $fetch_admin_id['adminID'];
        header('location:dashboard.php');
    } else {
        $message[] = 'Incorrect username or password';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>



<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '
        <div class="message">
        <span>' . $msg . '</span>
        </div>
        ';
    }
}
 
?>


<section class="form-container">
<form action="" method="post">
    <h3>Admin Login</h3>
    <input type="text" name="name" maxlenght="20" required placeholder="enter username" class="box" oninput="this.value = this.value.replace(/\s/g,'')">
    <input type="password" name="pass" maxlenght="20" required placeholder="enter password" class="box" oninput="this.value = this.value.replace(/\s/g,'')">
    <input type="submit" value="Login" name="submit" class="btn">

</form>

</section>


</body>
</html>