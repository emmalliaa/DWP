<?php
include('../includes/header.php');
include_once('../config/config.php');

if (isset($_SESSION['CustomerID'])) {
    $customer_id = $_SESSION['CustomerID'];
} else {
    $customer_id = '';
}

if (isset($message)) {

    foreach ($message as $msg) {
        echo '
        <div class="message">
        <span>' . $msg . '</span>
        </div>
        ';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $fname = $_POST['FirstName'];
        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        $lname = $_POST['LastName'];
        $lname = filter_var($lname, FILTER_SANITIZE_STRING);
        $pass = $_POST['pass'];
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $email = $_POST['Email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $num = $_POST['Number'];
        $num = filter_var($num, FILTER_SANITIZE_STRING);

        $select_customer = $connection->prepare("SELECT * FROM `Customer` WHERE Email = ? OR Phone = ?");
        $select_customer->bind_param("ss", $email, $num);
        $select_customer->execute();
        $result = $select_customer->get_result();

        if ($result->num_rows > 0) {
            $message[] = 'Email or Number is already in use';
        } else {

            try {
                $insert_customer = $connection->prepare("INSERT INTO `Customer` (FirstName, LastName, Password, Email, Phone) VALUES (?, ?, ?, ?, ?)");
                $insert_customer->bind_param("sssss", $fname, $lname, $pass, $email, $num);
                $insert_customer->execute();
                $select_customer = $connection->prepare("SELECT * FROM `Customer` WHERE Email = ? OR Phone = ?");
                $select_customer->bind_param("ss", $email, $num);
                $select_customer->execute();
                $result = $select_customer->get_result();


                if ($result->num_rows > 0) {
                    $message[] = 'Email or Number is already in use';
                } else {
                    $insert_customer = $connection->prepare("INSERT INTO `Customer` (FirstName, LastName, Password, Email, Phone) VALUES (?, ?, ?, ?, ?)");
                    $insert_customer->bind_param("sssss", $fname, $lname, $pass, $email, $num);

                    if ($insert_customer->execute()) {
                        $confirm_customer = $connection->prepare("SELECT * FROM `Customer` WHERE Email = ? AND Password = ?");
                        $confirm_customer->bind_param("ss", $email, $pass);
                        $confirm_customer->execute();
                        $row = [];
                        $confirm_customer->bind_result($row['CustomerID']);
                        $confirm_customer->fetch();

                        if ($confirm_customer->num_rows > 0) {

                            $_SESSION['CustomerID'] = $row['CustomerID'];
                            $message[] = 'Registered Successfully';
                        }

                        $confirm_customer->close();
                    } else {
                        $message[] = 'Registration failed';
                    }

                    $insert_customer->close();
                }

                $select_customer->close();

            } catch (\Exception $e) {
                echo "Error : " . $e->getMessage();
            }
        }
    }
}
?>

<section class="form-container">

    <form action="" method="post">
        <input type="text" name="FirstName" placeholder="First Name" required class="box">
        <input type="text" name="LastName" placeholder="Last Name" required class="box">
        <input type="password" name="pass" maxlenght="20" required placeholder="enter password" class="box"
            oninput="this.value = this.value.replace(/\s/g,'')">
        <input type="email" name="Email" placeholder="Email" required class="box">
        <input type="number" name="Number" placeholder="Phone Number" required class="box">
        <input type="submit" value="register now" name="submit" class="btn">
        <p>Already have an account? <a href="login.php">Login</a> </p>




    </form>


</section>