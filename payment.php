<?php

include 'include/config.php';
include 'include/classes/Province.php';

if (!isset($_POST['cart']) && !(isset($_SESSION['PAYMENT']) && isset($_SESSION['CART']))) {
    header('Location: addOns.php');
    exit();
} else if (isset($_POST['cart'])) {
    $_SESSION['CART'] = $_POST['cart'];
}

$paymentError = "";
if (isset($_SESSION['PAYMENT-ERROR'])) {
    $paymentError .= '<h4 style="color: red;">' . $_SESSION['PAYMENT-ERROR'] . '</h4>';
}

$name = $email = $city = $address = $postal = $provinceId = $cardName = $cardNumber = $expMonth = $expYear = $cvv = "";

if (isset($_SESSION['PAYMENT'])) {
    [
        "name" => $name, "email" => $email, "city" => $city, "address" => $address,
        "postal" => $postal, "province" => $provinceId, "cardname" => $cardName,
        "cardnumber" => $cardNumber, "expmonth" => $expMonth, "expyear" => $expYear, "cvv" => $cvv
    ] = $_SESSION['PAYMENT'];
}

$provinceObj = new Province($conn);
$provincesArray = $provinceObj->getAllProvinces();

$provincesHTML = "";
foreach ($provincesArray as $province) {
    $provincesHTML .= '<option value="' . $province['province_id'] . '" '  . ($provinceId === $province['province_id'] ? "selected" : "") . '>' . $province['province_name']
        . '</option>';
}
$provinceDefault = '<option value=""' . (empty($provinceId) ? "selected" : "") . 'disabled></option>';

//create expiry month options
$expMonths = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
$expMonthsHTML = "";
foreach ($expMonths as $month) {
    $expMonthsHTML .= '<option value="' . $month . '" ' . ($expMonth === $month ? "selected" : "") . '>' . $month
        . '</option>';
}
$expMonthDefault = '<option value=""' . (empty($expMonth) ? "selected" : "") . 'disabled></option>';

//create expiry year options
$expYears = array('2021', '2022', '2023', '2024', '2025');
$expYearsHTML = "";
foreach ($expYears as $year) {
    $expYearsHTML .= '<option value="' . $year . '" ' . ($expYear === $year ? "selected" : "") . '>' . $year
        . '</option>';
}
$expYearDefault = '<option value=""' . (empty($expYear) ? "selected" : "") . 'disabled></option>';

// remove server error message on page refresh
unset($_SESSION['PAYMENT-ERROR']);
?>

<html>

<head>
    <title>Payment</title>
</head>
<link rel="stylesheet" href="static/css/style.css">
<script type="module" src="static/js/payment.js" defer></script>

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
        <form action="addOns.php">
            <input type="submit" value="Back" class="btn-template back-btn">
        </form>

    </div>
    <div style="text-align: center;">
        <h1>Payment Information</h1>
        <?php echo $paymentError ?>
    </div>
    <div class="container-payment">
        <form method="post" action="checkout.php" id="payment-form">
            <div class="row">
                <div class="col">
                    <h3>Delivery Address</h3>
                    <label>Name</label>
                    <input type="text" id="name" class="payment-input" name="PAYMENT[name]" value="<?php echo $name ?>">
                    <label>Email</label>
                    <input type="text" id="email" class="payment-input" name="PAYMENT[email]" value="<?php echo $email ?>">
                    <label>Address</label>
                    <input type="text" id="address" class="payment-input" name="PAYMENT[address]" value="<?php echo $address ?>">
                    <label>City</label>
                    <input type="text" id="city" class="payment-input" name="PAYMENT[city]" value="<?php echo $city ?>">
                    <div class="row">
                        <div class="col">
                            <label>Province</label>

                            <select id="province" class="payment-input" name="PAYMENT[province]">
                                <?php echo $provinceDefault . $provincesHTML ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Postal Code</label>
                            <input type="text" id="postal" class="payment-input" name="PAYMENT[postal]" value="<?php echo $postal ?>">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3>Payment Details</h3>
                    <label>Name on Card</label>
                    <input type="text" id="cardname" class="payment-input" name="PAYMENT[cardname]" value="<?php echo $cardName ?>">
                    <label>Credit Card Number</label>
                    <input type="text" id="cardnumber" class="payment-input" name="PAYMENT[cardnumber]" value="<?php echo $cardNumber ?>">
                    <label>Exp Month</label>
                    <select id="expmonth" class="payment-input" name="PAYMENT[expmonth]">

                        <?php echo $expMonthDefault . $expMonthsHTML ?>
                    </select>

                    <div class="row">
                        <div class="col">
                            <label>Exp Year</label>
                            <select id="expyear" class="payment-input" name="PAYMENT[expyear]">
                                <?php echo $expYearDefault . $expYearsHTML ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>CVV</label>
                            <input type="text" id="cvv" class="payment-input" name="PAYMENT[cvv]" value="<?php echo $cvv ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center;" id="validation-errors">
                <div id="name-msg" class="validation-msg">Name cannot contain numbers or special characters. Minimum 2 characters.</div>
                <div id="email-msg" class="validation-msg">Please enter a valid email address.</div>
                <div id="address-msg" class="validation-msg">Address must only contain alphanumeric characters.</div>
                <div id="city-msg" class="validation-msg">Please enter a valid city.</div>
                <div id="province-msg" class="validation-msg">Please select the province.</div>
                <div id="postal-msg" class="validation-msg">Please enter a valid postal code (ex: A3C 8T5).</div>
                <div id="cardname-msg" class="validation-msg">Card name must be the full name of the cardholder.</div>
                <div id="cardnumber-msg" class="validation-msg">Please enter a valid credit card number.</div>
                <div id="expmonth-msg" class="validation-msg">Please select your card's expiry month.</div>
                <div id="expyear-msg" class="validation-msg">Please select your card's expiry year.</div>
                <div id="cvv-msg" class="validation-msg">Please enter a valid CVV.</div>
            </div>

        </form>
        <button class="btn">Continue to Checkout</button>
    </div>
    <?php include 'include/footer.php' ?>
</body>

</html>