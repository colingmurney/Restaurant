<?php
include 'include/config.php';
include 'include/utils/renderMenuItems.php';

// initialize cart
$cartRowsHTML = '';
$totalPrice = 0;

if (isset($_SESSION['CART'])) {
    // pre-populate the cart
    include 'include/utils/sessionCart.php';
}

//generate menu items html
$menuRows = renderMenuItems($conn, true);
?>

<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script type="module" src="static/js/index.js" defer></script>
</head>

<body>
    <div class="return-container">
        <!-- Home button -->
        <form action="descriptions.php">
            <input type="submit" value="Menu Descriptions" class="btn-template back-btn">
        </form>
        <h1 style="text-align: center;">Colin's Restaurant</h1>
    </div>

    <div class="page-content">
        <?php include 'include/utils/cart.php' ?>

        <div class="menu">
            <!-- Row 1 -->
            <div class="grid-row">
                <?php echo $menuRows[0] ?>
            </div>

            <!-- Row 2-->
            <div class="grid-row">
                <?php echo $menuRows[1] ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>
</body>

</html>