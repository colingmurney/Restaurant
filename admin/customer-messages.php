<?php
include '../include/config.php';
include '../include/classes/ContactForm.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$messages = array();
if (isset($_GET['search']) || isset($_GET['filter'])) {
    $searchMessages = ContactForm::getMessagesSearch($conn, $_GET['search'], $_GET['filter']);
    $messages = array_merge($messages, $searchMessages);
} else {
    $allMessages = ContactForm::getAllMessages($conn);
    $messages = array_merge($messages, $allMessages);
}

$messageTemplate = '<div class="$class">
                        <p><b>Customer: </b>$name</p>
                        <p><b>Email: </b>$email</p>
                        <p><b>Reason: </b>$reason</p>
                        <p><b>Body: </b>$body</p>
                        <form method="get" action="reply.php">
                            <input type="hidden" name="formId" value="$contactFormId">
                            <input type="submit" value="Reply to message">
                        </form>
                    </div>';
$messagesHTML = "";

foreach ($messages as $message) {
    $vars = array(
        '$class' => ($message['is_pending'] == 1 ? "message-pending" : "message-replied"),
        '$name' => $message['customer_name'],
        '$email' => $message['email'],
        '$reason' => $message['reason'],
        '$body' => $message['body'],
        '$contactFormId' => $message['contact_form_id']
    );
    $messagesHTML .= strtr($messageTemplate, $vars);
}

?>

<html>

<head>
    <title>Messages</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script type="module" src="static/js/customerMessages.js" defer></script>
</head>

<body>
    <?php include 'include/header.php' ?>

    <!-- Page content -->
    <div class="main">
        <div>
            <form method="get" action="customer-messages.php">
                <input id="search" type="text" name="search" required>
                <select id="filter" name="filter">
                    <option value="" selected>All Messages</option>
                    <option value="pending">Pending Messages</option>
                    <option value="replied">Replied</option>
                </select>
                <input type="submit" value="Search for message">
            </form>
        </div>
        <?php echo $messagesHTML ?>
    </div>
</body>

</html>