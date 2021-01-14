<?php
include 'include/config.php';
include 'include/utils/renderMenuItems.php';

$cart = '';
$totalPrice = 0;

if (!isset($_SESSION['CART']) && !isset($_POST['cart'])) {
    header('Location: index.php');
    exit();
} else if (isset($_POST['cart'])) {
    $_SESSION['CART'] = $_POST['cart'];
}

include 'include/utils/sessionCart.php';

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
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
        <h1 style="text-align: center;">Add Ons</h1>
    </div>

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <div class="cart cart-addons">
            <h4 style="text-align: center;">Cart</h4>
            <table class="orderlist" id="food-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price (CAD)</th>
                    </tr>
                </thead>
                <tbody id="food-tbody">
                    <?php echo $cart ?>
                    <tr class="total">
                        <th class="food">Total ($)</th>
                        <th class="price"><?php echo $totalPrice ?></th>
                    </tr>
                </tbody>
            </table>
            <div class="form-button-container">
                <button class="btn2">Proceed to Pay</button>
                <div id="hidden_form_container" style="display:none;"></div>
            </div>
        </div>

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

    <?php include 'include/footer.php' ?>
</body>

</html>