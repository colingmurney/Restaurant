<?php

include '../include/config.php';
include '../include/classes/AdminLogin.php';

if (isset($_POST['logout'])) {
    session_destroy();
}

if (isset($_SESSION['username'])) {
    header('Location: index.php?username=' . $_SESSION['username']);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $adminObj = new AdminLogin($conn, $_POST['username'], $_POST['password']);

    //query for the username given
    $admin = $adminObj->getAdminByUsername();

    if ($admin == NULL) {
        $_POST = array();
        header('Location: login.php?username=' . $_POST['username']);
    }

    if (password_verify($adminObj->getHashedPassword(), $admin['hashed_password'])) {
        $_SESSION['username'] = $_POST['username'];
        header('Location: index.php?username=' .  $_POST['username']);
    } else {
        header('Location: login.php?username=' . $_POST['username']);
    }
}

$username = "";
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}

?>

<html>

<head>
    <title>Staff Sign In</title>
</head>

<body>
    <!-- Login form with method="post" and action="staff.php" -->
    <form method="post" action="#">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $username ?>" />
        <label for="password">Password</label>
        <input type="password" name="password" />
        <input type="submit" value="Login">
        <p>Please contact your customer service representative for access to your sites admin panel.</p>
    </form>

</body>

</html>