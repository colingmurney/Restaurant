<?php
include 'include/config.php';
include 'include/classes/Customer.php';
session_start();

print_r($_SESSION['PAYMENT']);

if (!isset($_SESSION['PAYMENT'])) {
    header('Location: payment.php');
}

/* Start transaction */
mysqli_begin_transaction($conn);

try {
    [
        "name" => $name, "email" => $email, "city" => $city, "address" => $address,
        "postal" => $postal, "province" => $provinceId
    ] = $_SESSION['PAYMENT'];

    $customerObj = new Customer($conn, $name, $email, $city, $address, $postal, $provinceId);

    $id = $customerObj->getCustomerIdByEmail();
    if ($id == NULL) {
        echo "Returned null";
    } else {
        echo "customer Id for email in session: " . $id;
    }



    mysqli_commit($conn);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);

    throw $exception;
}
//fetch customer with given email
//if array is null, create a new customer with Payment info
//get customerId of fetched or new customer(LAST_INSERT_ID())
//create new order using customerId and current DateTime
//get OrderId (LAST_INSERT_ID())
//for every item in $cartFoodItems, create new order_item using OrderId and the menu_item_id
// * for above, need to figure out way to store food_item Id's in session as well
// * also this should actually all be done as a transaction.. not sure if that is possible outside of MySQL


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