<?php
// $cart = '';
// $totalPrice = 0;

$cartRowTemplate = '<tr data-id="$id" name="$foodItem" class="cart-item">
                        <td>$foodItem</td>
                        <td>$price</td>
                    </tr>';

// $cartRowsHTML = "";

for ($i = 0; $i < count($_SESSION['CART']); $i++) {
    // $cart .= ' <tr data-id="' . $_SESSION['CART'][$i]['id'] . '"name="' . $_SESSION['CART'][$i]['foodItem'] . '" class="cart-item"> <td>'
    //     . $_SESSION['CART'][$i]['foodItem'] . '</td> <td>' . $_SESSION['CART'][$i]['price'] . '</td></tr> ';

    $vars = array(
        '$id' => $_SESSION['CART'][$i]['id'],
        '$foodItem' => $_SESSION['CART'][$i]['foodItem'],
        '$price' => $_SESSION['CART'][$i]['price']
    );

    $cartRowsHTML .= strtr($cartRowTemplate, $vars);

    $totalPrice += $_SESSION['CART'][$i]['price'];
}
