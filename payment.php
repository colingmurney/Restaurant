<?php

include 'include/config.php';
include 'include/classes/Province.php';
// include 'include/utils/paymentRedirect.php';
$provinceObj = new Province($conn);
$provincesHTML = $provinceObj->getAllProvinces();

if (!isset($_POST['cart']) && !(isset($_SESSION['PAYMENT']) && isset($_SESSION['CART']))) {
    header('Location: addOns.php');
} else if (isset($_POST['cart'])) {
    $_SESSION['CART'] = $_POST['cart'];
}

?>

<html>

<head>
    <title>Payment</title>
</head>
<link rel="stylesheet" href="static/css/style.css">

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
        <form action="addOns.php">
            <input type="submit" value="Back" class="btn-template back-btn">
        </form>

    </div>
    <div>
        <h1 style="text-align: center;">Payment Information</h1>
    </div>
    <div class="container-payment">
        <form method="post" action="checkout.php">
            <div class="row">
                <div class="col">
                    <h3>Billing Address</h3>
                    <label>Full Name</label>
                    <input type="text" id="name" name="PAYMENT[name]">
                    <label>Email</label>
                    <input type="text" id="email" name="PAYMENT[email]">
                    <label>Address</label>
                    <input type="text" id="address" name="PAYMENT[address]">
                    <label>City</label>
                    <input type="text" id="city" name="PAYMENT[city]">
                    <div class="row">
                        <div class="col">
                            <label>Province</label>
                            <select id="province" name="PAYMENT[province]">
                                <?php echo $provincesHTML ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Postal Code</label>
                            <input type="text" id="postal" name="PAYMENT[postal]">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3>Payment</h3>
                    <label>Name on Card</label>
                    <input type="text" id="cardname" name="PAYMENT[cardname]">
                    <label>Credit card number</label>
                    <input type="text" id="cardnumber" name="PAYMENT[cardnumber]">
                    <label>Exp Month</label>
                    <input type="text" id="expmonth" name="PAYMENT[expmonth]">

                    <div class="row">
                        <div class="col">
                            <label>Exp Year</label>
                            <input type="text" id="expyear" name="PAYMENT[expyear]">
                        </div>
                        <div class="col">
                            <label>CVV</label>
                            <input type="text" id="cvv" name="PAYMENT[cvv]">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Continue to Checkout" class="btn">
        </form>
    </div>
    <?php include 'include/footer.php' ?>
</body>

</html>