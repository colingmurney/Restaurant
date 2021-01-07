<?php

for ($i = 0; $i < count($_SESSION['CART']); $i++) {
    $cart .= ' <tr data-id="' . $_SESSION['CART'][$i]['id'] . '"name="' . $_SESSION['CART'][$i]['foodItem'] . '" class="cart-item"> <td>'
        . $_SESSION['CART'][$i]['foodItem'] . '</td> <td>' . $_SESSION['CART'][$i]['price'] . '</td></tr> ';

    $totalPrice += $_SESSION['CART'][$i]['price'];
}
