<?php
include '../include/config.php';
include '../include/classes/ContactForm.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

?>

<html>

<head>
    <title>Modify Menu</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <?php include 'include/header.php' ?>

    <!-- Page content -->
    <div class="main">

    </div>
</body>

</html>