<?php

include 'include/config.php';

if (!isset($_SESSION['CONTACT-SUCCESS'])) {
    // redirect if user did not come from a successful contact from submission
    header("Location: contact.php");
}

// Destroy the session
session_destroy();
?>

<html>

<head>
    <title>Contact</title>
</head>
<link rel="stylesheet" href="static/css/style.css">

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
        <h3 style="text-align: center; color:green;">
            Thank you for your feedback! Our team will be in touch with you within 3-5 days.
        </h3>
        <form style="margin-top: 100px;" action="index.php">
            <input type="submit" class="btn" value="Make a New Order" />
        </form>
    </div>
    <!-- footer -->
    <?php include 'include/footer.php' ?>
</body>

</html>