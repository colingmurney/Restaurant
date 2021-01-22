<?php
include 'include/config.php';
include 'include/utils/renderMenuItems.php';

// initialize cart
$cartRowsHTML = '';
$totalPrice = 0;

if (!isset($_SESSION['CART']) && !isset($_POST['cart'])) {
    // redirect to home if no items have been selected
    header('Location: index.php');
    exit();
} else if (isset($_POST['cart'])) {
    // copy cart to session to keep users selection
    $_SESSION['CART'] = $_POST['cart'];
}

// pre-populate the cart
include 'include/utils/sessionCart.php';

//generate menu items html
$menuRows = renderMenuItems($conn, false);
?>

<html>

<head>
    <title>Add Ons</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script type="module" src="static/js/addOns.js" defer></script>
</head>

<body>
    <div class="return-container">
        <!-- Home button -->
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
        <h1 style="text-align: center;">Add Ons</h1>
    </div>

    <div class="page-content">

        <!-- cart -->
        <?php include 'include/utils/cart.php' ?>

        <div class="menu">
            <!-- Row 1 -->
            <div class="grid-row" data-id="9">
                <p class="item-type">Drinks</p>
                <?php echo $menuRows[0] ?>


            </div>

            <!-- Row 2-->
            <div class="grid-row" data-id="13">
                <p class="item-type">Extras</p>
                <?php echo $menuRows[1] ?>

            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'include/footer.php' ?>
</body>

</html>