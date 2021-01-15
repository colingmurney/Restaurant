<?php
include '../include/config.php';
include '../include/classes/ContactForm.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

// default is to display customers alphebetically 
// options to search backwards 
// options to search by number of orders

?>

<html>

<head>
    <title>Customers</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <?php include 'include/header.php' ?>

    <!-- Page content -->
    <div class="main">

    </div>
</body>

</html>