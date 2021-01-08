<?php
include 'include/config.php';
include 'include/classes/Customer.php';
include 'include/classes/FoodOrder.php';

// print_r($_SESSION['PAYMENT']);
// echo "<br/><br/>";
// print_r($_SESSION['CART']);
// echo "<br/><br/>";

if (!isset($_SESSION['PAYMENT'])) {
    header('Location: payment.php');
}

/* Start transaction */
mysqli_begin_transaction($conn);
/* Turn autocommit off */
mysqli_autocommit($conn, false);


try {
    [
        "name" => $name, "email" => $email, "city" => $city, "address" => $address,
        "postal" => $postal, "province" => $provinceId
    ] = $_SESSION['PAYMENT'];

    $customerObj = new Customer($conn, $name, strtolower($email), $city, $address, $postal, $provinceId);

    $customerId = $customerObj->getCustomerIdByEmail();
    if ($customerId == NULL) {
        $customerId = $customerObj->createNewCustomer();
    }

    $currentDate = date('Y-m-d H:i:s');

    $FoodOrderObj = new FoodOrder($conn, $currentDate, 2);
    $FoodOrderObj = new FoodOrder($conn, $currentDate, $customerId);
    $orderId = $FoodOrderObj->createNewFoodOrder();

    foreach ($_SESSION['CART'] as $value) {
        $FoodOrderObj->createNewOrderItem($orderId, $value['id']);
    }

    mysqli_commit($conn);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);

    echo $exception;
}

mysqli_close($conn);
// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

?>

<html>

<head>
    <title>Order Confirmation</title>
</head>
<link rel="stylesheet" href="static/css/style.css">

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
    </div>
    <div>
        <h1 style="text-align: center;">Order Details & Confirmation</h1>
        <div style="text-align: center;" class="container-payment">
            <h3>Order Confirmation Number: <span style="color:blue; font-style: italic;">#4567</span></h3>
            <p>Thank you for your order! Your food will be delivered by 7:00 PM EST</p>
            <p style="text-align: left;">
                As a local business, we appreciate your support, including your feedback.
                If you're not 100% satisfied with your online food ordering experience with Colin's Restaurant,
                please conatct us <a style="text-decoration: none;font-weight: bold; color: blue;" href="contact.php">here.</a>
            </p>
            <table>
                <tbody>
                    <tr>
                        <td>Payent Type</td>
                        <td>Mastercard</td>
                    </tr>
                    <tr>
                        <td>Name on Card</td>
                        <td>Tony Smith</td>
                    </tr>
                    <tr>
                        <td>Card Number</td>
                        <td>**** **** **** 2876</td>
                    </tr>
                    <tr>
                        <td>Contact Email</td>
                        <td>tony.smith@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Total (Tax Included)</td>
                        <td>$32.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>
                <a class="contact-us" href="contact.php">Contact Us</a>
                <span style="font-weight: bold; font-size: 30px; margin: 0 20px 0 20px">|</span>
                <a class="contact-us" href="about.php">About Us</a>
            </p>
            <address>1050 Peel Street, Montreal QC, Canada</address>
            <p>Colin's Restaurant Inc &copy;</p>
        </div>

</body>

</html>