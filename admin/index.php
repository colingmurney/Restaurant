<?php
include '../include/config.php';
include '../include/classes/ContactForm.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

?>

<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <?php include 'include/header.php' ?>

    <!-- Page content -->
    <div class="main">
        Put some summary stats for index page... <br /><br />
        Total Sales Revenue, table of sales per item,
        number of contact forms still pending, sales per province table,
        sales per item type, top 5 customers with their total purchases,
        top choice for each item type
    </div>
</body>

</html>