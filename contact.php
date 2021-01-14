<?php

include 'include/config.php';
include 'include/classes/ContactReason.php';
include 'include/classes/Customer.php';
include 'include/classes/ContactForm.php';

$errorMsg = "";
$successMsg = "";

$name = $email = $reasonId = $body = "";

if (isset($_POST['CONTACT'])) {
    $_SESSION['CONTACT'] = $_POST['CONTACT'];
    $customerId = Customer::getCustomerIdByEmailStatic($conn, trim($_SESSION['CONTACT']['email']));

    if ($customerId == NULL) {
        $errorMsg .= "We have not completed an order for a customer with the email: " . $_SESSION['CONTACT']['email'];
        // Pre-fil the inputs in the case of submission error
        [
            "name" => $name, "email" => $email, "reason" => $reasonId, "body" => $body

        ] = $_SESSION['CONTACT'];
    } else {
        $contactFormObj = new ContactForm($conn, $_SESSION['CONTACT']['body'], $_SESSION['CONTACT']['reason'], $customerId);

        if ($contactFormObj->createNewContactForm()) {
            $_SESSION['CONTACT-SUCCESS'] = true;
            header("Location: contact-success.php");
        } else {
            $errorMsg .= "There was an error processing your contact form. Please try again.";
            // Pre-fil the inputs in the case of submission error
            [
                "name" => $name, "email" => $email, "reason" => $reasonId, "body" => $body

            ] = $_SESSION['CONTACT'];
        }
    }
}

$contactReasonObj = new ContactReason($conn);
$contactReasonArray = $contactReasonObj->getAllContactReasons();

$contactReasonHTML = "";
foreach ($contactReasonArray as $reason) {
    $contactReasonHTML .= '<option value="' . $reason['reason_id'] . '" ' . ($reasonId === $reason['reason_id'] ? "selected" : "") . '>' . $reason['reason']
        . '</option>';
}
$contactReasonDefault = '<option value=""' . (empty($reasonId) ? "selected" : "") . 'disabled></option>';

unset($_POST['CONTACT']);
?>

<html>

<head>
    <title>Contact</title>
</head>
<link rel="stylesheet" href="static/css/style.css">
<script type="module" src="static/js/contact.js" defer></script>

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
    </div>
    <div>
        <h1 style="text-align: center;">Contact Restaurant</h1>
    </div>
    <div class="container-payment">
        <h3 style="text-align: center; color:red;"><?php echo $errorMsg ?></h3>
        <div class="contact-form">
            <form method="post" action="#" id="contact-form">
                <div class="col">
                    <label>Name</label>
                    <input type="text" class="payment-input" id="name" placeholder="Contact Name" name="CONTACT[name]" value="<?php echo $name ?>">
                </div>
                <div class="col">
                    <label>Email</label>
                    <input type="text" class="payment-input" id="email" placeholder="Contact Email" name="CONTACT[email]" value="<?php echo $email ?>">
                </div>
                <div class="col">
                    <label>Reason for contact</label>
                    <select class="payment-input" id="reason" name="CONTACT[reason]">
                        <?php echo $contactReasonDefault . $contactReasonHTML ?>
                    </select>
                </div>
                <div class="col" style="margin-top: 20px;">
                    <label>Please briefly provide details of your order experience</label>
                    <textarea id="body" cols="90" rows="10" name="CONTACT[body]"><?php echo $body ?></textarea>
                </div>

                <div style="text-align: center;" id="validation-errors">
                    <div id="name-msg" class="validation-msg">Name cannot contain numbers or special characters. Minimum 2 characters.</div>
                    <div id="email-msg" class="validation-msg">Please enter a valid email address.</div>
                    <div id="reason-msg" class="validation-msg">Please select a reason for contact.</div>
                    <div id="body-msg" class="validation-msg">Messages must be between 10 and 1000 characters.</div>
                </div>

            </form>
            <div style="margin-top: 20px;">
                <button class="btn">Help us serve you better!</button>
            </div>
        </div>
    </div>
    <?php include 'include/footer.php' ?>
</body>

</html>