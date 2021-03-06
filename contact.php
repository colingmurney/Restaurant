<?php

include 'include/config.php';
include 'include/classes/ContactReason.php';
include 'include/classes/Customer.php';
include 'include/classes/ContactForm.php';

// initialize error msg and pre-populated fields variables
$errorMsg = $name = $email = $reasonId = $body = "";

if (isset($_POST['CONTACT'])) {
    // once form is submitted, copy contact details to session and check if customer exists
    $_SESSION['CONTACT'] = $_POST['CONTACT'];
    $customerId = Customer::getCustomerIdByEmailStatic($conn, trim($_SESSION['CONTACT']['email']));

    if ($customerId == NULL) {
        // customer email is not in database from a previous order, display error message
        $errorMsg .= "We have not completed an order for a customer with the email: " . $_SESSION['CONTACT']['email'];
        // Pre-fill the inputs in the case of submission error
        [
            "name" => $name, "email" => $email, "reason" => $reasonId, "body" => $body

        ] = $_SESSION['CONTACT'];
    } else {
        // create a new contact form record
        $contactFormObj = new ContactForm($conn, $_SESSION['CONTACT']['body'], $_SESSION['CONTACT']['reason'], $customerId);
        if ($contactFormObj->createNewContactForm()) {
            $_SESSION['CONTACT-SUCCESS'] = true;
            header("Location: contact-success.php");
            unset($_POST);
            exit();
        } else {
            $errorMsg .= "There was an error processing your contact form. Please try again.";
            // Pre-fill the inputs in the case of submission error
            [
                "name" => $name, "email" => $email, "reason" => $reasonId, "body" => $body

            ] = $_SESSION['CONTACT'];
        }
    }
}

// retrieve contact reason options
$contactReasonObj = new ContactReason($conn);
$contactReasonArray = $contactReasonObj->getAllContactReasons();

// generate options for from dropdown
$contactReasonTemplate = '<option value="$reasonId" $selected>$reason</option>';
$contactReasonsHTML = "";
foreach ($contactReasonArray as $reason) {
    $vars = array(
        '$reasonId' => $reason['reason_id'],
        '$selected' => ($reasonId === $reason['reason_id'] ? "selected" : ""),
        '$reason' => $reason['reason']
    );

    $contactReasonsHTML .= strtr($contactReasonTemplate, $vars);
}
$contactReasonDefault = '<option value=""' . (empty($reasonId) ? "selected" : "") . 'disabled></option>';

// clear the conact post variable
// unset($_POST['CONTACT']);

// Destroy the session
session_destroy();
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
                        <?php echo $contactReasonDefault . $contactReasonsHTML ?>
                    </select>
                </div>
                <div class="col" style="margin-top: 20px; width: 90%;">
                    <label>Please briefly provide details of your order experience</label>
                    <textarea id="body" style="width: 100%; min-height: 100px" name="CONTACT[body]"><?php echo $body ?></textarea>
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
    <!-- footer -->
    <?php include 'include/footer.php' ?>
</body>

</html>