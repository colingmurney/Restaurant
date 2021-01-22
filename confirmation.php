<?php
include 'include/config.php';
include 'include/classes/Customer.php';
include 'include/classes/FoodOrder.php';

if (!isset($_SESSION['PAYMENT']) || !isset($_POST['totalPrice'])) {
    // redirect to payment if payment information is not in session, or use is not coming checkout
    header('Location: payment.php');
}

// simple backend validation incase the frontend validation fails
foreach ($_SESSION['PAYMENT'] as $input) {

    if (empty($input)) {
        $_SESSION['PAYMENT-ERROR'] = "There was an error processing your payment Information. Please try again.";
        header('Location: payment.php');
        exit();
    }
}

// destruct payment information array
[
    "name" => $name, "email" => $email, "city" => $city, "address" => $address,
    "postal" => $postal, "province" => $provinceId
] = $_SESSION['PAYMENT'];

/* Start transaction */
mysqli_begin_transaction($conn);
/* Turn autocommit off */
mysqli_autocommit($conn, false);

$orderId;

try {
    // retrieve or create customer
    $customerObj = new Customer($conn, $name, strtolower($email), $city, $address, $postal, $provinceId);
    $customerId = $customerObj->getCustomerIdByEmail();
    if ($customerId == NULL) {
        $customerId = $customerObj->createNewCustomer();
    }

    // create new food order
    $currentDate = date('Y-m-d H:i:s');
    $FoodOrderObj = new FoodOrder($conn, $currentDate, 2);
    $FoodOrderObj = new FoodOrder($conn, $currentDate, $customerId);
    $orderId = $FoodOrderObj->createNewFoodOrder();

    // create new record for each item in order
    foreach ($_SESSION['CART'] as $value) {
        $FoodOrderObj->createNewOrderItem($orderId, $value['id']);
    }

    // commit transaction
    mysqli_commit($conn);
} catch (mysqli_sql_exception $exception) {
    // rollback transaction and redirect with error message
    mysqli_rollback($conn);
    $_SESSION['PAYMENT-ERROR'] = "There was an error processing your payment Information. Please try again.";
    header('Location: payment.php');
    exit();
}

mysqli_close($conn);

// generate order details with ref number
$nameOnCard = trim($_SESSION['PAYMENT']['cardname']);
$email = trim($_SESSION['PAYMENT']['email']);
$totalPrice = $_POST['totalPrice'];
$cardNumber = trim($_SESSION['PAYMENT']['cardnumber']);
$last4Digits = substr($cardNumber, -4);

// Unset all of the session variables
$_SESSION = array();
$_POST = array();

// Destroy the session
session_destroy();

?>

<html>

<head>
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script type="module" src="static/js/confirmation.js" defer></script>
</head>


<body>
    <div class="return-container">
        <!-- home button -->
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
    </div>
    <div>
        <h1 style="text-align: center;">Order Details & Confirmation</h1>
        <div style="text-align: center;" class="container-payment">
            <h3>Order Confirmation Number: <span style="color:blue; font-style: italic;">#<?php echo $orderId ?></span></h3>
            <p id="ready-time">Thank you for your order! Your food will be delivered by </p>
            <p style="text-align: left;">
                As a local business, we appreciate your support, including your feedback.
                If you're not 100% satisfied with your online food ordering experience with Colin's Restaurant,
                please conatct us <a style="text-decoration: none;font-weight: bold; color: blue;" href="contact.php">here.</a>
            </p>
            <table>
                <tbody>
                    <tr>
                        <td>Name on Card</td>
                        <td><?php echo $nameOnCard ?></td>
                    </tr>
                    <tr>
                        <td>Card Number</td>
                        <td>**** **** **** <?php echo $last4Digits ?></td>
                    </tr>
                    <tr>
                        <td>Contact Email</td>
                        <td><?php echo $email ?></td>
                    </tr>
                    <tr>
                        <td>Total (Tax Included)</td>
                        <td>$<?php echo $totalPrice ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php include 'include/footer.php' ?>

</body>

</html>