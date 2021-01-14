<?php
include '../include/config.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

echo "Login successful or active session";

?>

<html>

<head>
    <title>Staff Sign In</title>
</head>

<body>
    <form method="post" action="login.php">
        <input type="hidden" name="logout" />
        <input type="submit" value="Logout" />
    </form>
    <!-- staff section of the website will include functionality
    such changing an item to not currently availble and
    viewing/responding to customer complaints -->

    <!-- Side bar with options to go to complaints, menu items, etc -->
</body>

</html>