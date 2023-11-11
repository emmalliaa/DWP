<?php
include('admin_header.php');

session_start();
echo $admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('Location:admin_login.php');
}

?>

<body>
    
</body>
</html>
