<?php
include 'include/config.php';
include 'include/classes/MenuItem.php';

$menuItemObj = new MenuItem($conn);
$items = $menuItemObj->getTypeOneMenuItems();

$itemsHTML = "";
foreach ($items as $item) {
    $itemsHTML .= '<div class="description"><dt>' . $item['item']
        . '</dt><dd>' . $item['item_details'] . '</dd></div>';
}
?>

<html>

<head>
    <title>Full menu</title>
</head>
<link rel="stylesheet" href="static/css/style.css">

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
    </div>

    <h1 style="text-align: center; margin-top: 5px;">Our Offerings</h1>

    <div class="container-payment">
        <dl>
            <?php echo $itemsHTML ?>
        </dl>
    </div>
    <div class="footer">
        <p>
            <a class="contact-us" href="contact.html">Contact Us</a>
            <span style="font-weight: bold; font-size: 30px; margin: 0 20px 0 20px">|</span>
            <a class="contact-us" href="about.html">About Us</a>
        </p>
        <address>1050 Peel Street, Montreal QC, Canada</address>
        <p>Colin's Restaurant Inc &copy;</p>
    </div>
</body>

</html>