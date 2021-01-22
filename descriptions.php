<?php
include 'include/config.php';
include 'include/classes/MenuItem.php';

// retrieve menu items and their descriptions
$menuItemObj = new MenuItem($conn);
$items = $menuItemObj->getTypeOneMenuItems();

// generate html for item descriptions
$itemTemplate = '<div class="description">
                    <dt>$item</dt>
                    <dd>$itemDetails</dd>
                </div>';

$itemsHTML = "";
foreach ($items as $item) {
    $vars = array(
        '$item' => $item['item'],
        '$itemDetails' => $item['item_details']
    );
    $itemsHTML .= strtr($itemTemplate, $vars);
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
    <!-- footer -->
    <?php include 'include/footer.php' ?>
</body>

</html>