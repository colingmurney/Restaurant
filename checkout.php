<?php
include 'include/config.php';

if (!(isset($_POST['PAYMENT']) && isset($_SESSION['CART'])) && !(isset($_SESSION['PAYMENT']) && isset($_SESSION['CART']))) {
    // redirect if user is not coming from payment or does not have items in their cart
    header('Location: add-ons.php');
    exit();
} else if (isset($_POST['PAYMENT'])) {
    // copy payment info to session to keep users details
    $_SESSION['PAYMENT'] = $_POST['PAYMENT'];
}

// generate mulit-dimensional associative array with count of each item selected
// calculate total price of order
$cart = $_SESSION['CART'];
$itemsUnique = array();
$totalPrice = 0;
for ($i = 0; $i < count($cart); $i++) {
    $totalPrice += $cart[$i]['price'];
    if (array_key_exists($cart[$i]['foodItem'], $itemsUnique)) {
        $itemsUnique[$cart[$i]['foodItem']]['count'] += 1;
    } else {
        $itemsUnique[$cart[$i]['foodItem']] = array('count' => 1, 'price' => $cart[$i]['price']);
    }
}

// generate html using $itemsUnique array
$tableRowTemplate = '<tr>
                        <td>$key</td>
                        <td>$price</td>
                        <td>$count</td>
                        <td>$totalItemPrice</td>
                    </tr>';
$tableRowsHTML = "";
foreach ($itemsUnique as $key => $value) {
    $vars = array(
        '$key' => $key,
        '$price' => $value['price'],
        '$count' => $value['count'],
        '$totalItemPrice' => ($value['count'] * $value['price']),
    );
    $tableRowsHTML .= strtr($tableRowTemplate, $vars);
}
?>

<html>

<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script type="module" src="static/js/checkout.js" defer></script>
</head>

<body>
    <div class="return-container">
        <!-- home button -->
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
        <!-- back button -->
        <form action="payment.php">
            <input type="submit" value="Back" class="btn-template back-btn">
        </form>
    </div>
    <div>
        <h1 style="text-align: center;">Checkout</h1>
    </div>
    <div class="container-payment">
        <h4 style="text-align: center;">Confirm your order details</h4>
        <table class="orderlist">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- order preview -->
                <?php echo $tableRowsHTML ?>
                <tr class="total">
                    <th>Total</th>
                    <td></td>
                    <td></td>
                    <th id="total-price"><?php echo $totalPrice ?></th>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            <button class="btn">Checkout</button>
            <div id="hidden_form_container" style="display:none;"></div>
        </div>
    </div>
</body>

</html>