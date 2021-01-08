<?php
if (!isset($_POST['cart']) && !(isset($_SESSION['PAYMENT']) && isset($_SESSION['CART']))) {
    header('Location: addOns.php');
} else if (isset($_POST['cart'])) {
    $_SESSION['CART'] = $_POST['cart'];
}
