<?php

// cart row/item template
$cartRowTemplate = '<tr data-id="$id" name="$foodItem" class="cart-item">
                        <td>$foodItem</td>
                        <td>$price</td>
                    </tr>';

// generate cart with items in session cart variable
for ($i = 0; $i < count($_SESSION['CART']); $i++) {
    $vars = array(
        '$id' => $_SESSION['CART'][$i]['id'],
        '$foodItem' => $_SESSION['CART'][$i]['foodItem'],
        '$price' => $_SESSION['CART'][$i]['price']
    );
    // variables are initialized on php pages where function is called
    $cartRowsHTML .= strtr($cartRowTemplate, $vars);
    $totalPrice += $_SESSION['CART'][$i]['price'];
}
