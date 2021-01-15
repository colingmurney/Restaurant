<?php
include '../include/config.php';
include '../include/classes/ContactForm.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

// default is all sales in order of most recent
// can sort by opposite order
// can sort by size of order ($)
?>

<html>

<head>
    <title>Sales</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <?php include 'include/header.php' ?>

    <!-- Page content -->
    <div class="main">

    </div>
</body>

</html>