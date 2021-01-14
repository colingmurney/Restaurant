<?php
include 'include/config.php';
include 'include/utils/renderMenuItems.php';

$cart = '';
$totalPrice = 0;

if (isset($_SESSION['CART'])) {
    include 'include/utils/sessionCart.php';
}

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
        <form action="descriptions.php">
            <input type="submit" value="Menu Descriptions" class="btn-template back-btn">
        </form>
        <h1 style="text-align: center;">Colin's Restaurant</h1>
    </div>

    <div class="page-content">

        <div class="cart cart-index">
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
                <h3 id="cart-empty-msg">
                    Please add at least 1 main food item to your order.
                </h3>
                <button class="btn2">Go to Add-Ons</button>
                <div id="hidden_form_container" style="display:none;"></div>
            </div>
        </div>

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

    <?php include 'include/footer.php' ?>
</body>

</html>