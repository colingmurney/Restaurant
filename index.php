<?php
include 'include/config.php';

$cart = '';
$totalPrice = 0;

if (isset($_SESSION['CART'])) {
    include 'include/utils/sessionCart.php';
}

?>

<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script type="module" src="static/js/index.js" defer></script>
</head>

<body>
    <div class="return-container">
        <form action="descriptions.php">
            <input type="submit" value="Menu Descriptions" class="btn-template back-btn">
        </form>
        <h1 style="text-align: center;">Colin's Restaurant</h1>
    </div>

    <div class="page-content">

        <div class="container">
            <h4 style="text-align: center;">Cart</h4>
            <table class="orderlist" id="food-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price (CAD)</th>
                    </tr>
                </thead>
                <tbody id="food-tbody">
                    <?php echo $cart ?>
                    <tr class="total">
                        <th class="food">Total ($)</th>
                        <th class="price"><?php echo $totalPrice ?></th>
                    </tr>
                </tbody>
            </table>
            <div class="form-button-container">
                <h3 id="cart-empty-msg">
                    Please add at least 1 main food item to your order.
                </h3>
                <button class="btn2">Go to Add-Ons</button>
                <div id="hidden_form_container" style="display:none;"></div>
            </div>
        </div>

        <div class="menu">
            <!-- Row 1 -->
            <div class="grid-row">

                <!-- Burger -->
                <div class="item" data-id="1">
                    <div class="item-parent" name="Burger" data-id="1" value="15">
                        <img class="increment" src="static/images/burger.jpg" alt="Burger">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Burger $15</h3>
                        </div>
                    </div>
                </div>

                <!-- Poutine -->
                <div class="item" data-id="2">
                    <div class="item-parent" name="Poutine" data-id="2" value="9">
                        <img class="increment" src="static/images/poutine.jpg" alt="Poutine">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Poutine $9</h3>
                        </div>
                    </div>
                </div>

                <!-- French Fries -->
                <div class="item" data-id="3">
                    <div class="item-parent" name="French Fries" value="7" data-id="3">
                        <img class="increment" src="static/images/french-fries.jpg" alt="French Fries">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>French Fries $7</h3>
                        </div>
                    </div>
                </div>

                <!-- Nachos -->
                <div class="item" data-id="4">
                    <div class="item-parent" name="Nachos" value="10" data-id="4">
                        <img class="increment" src="static/images/nachos.jpg" alt="Nachos">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Nachos $10</h3>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Row 2-->
            <div class="grid-row">

                <!-- Steak -->
                <div class="item" data-id="5">
                    <div class="item-parent" name="Steak" value="25" data-id="5">
                        <img class="increment" src="static/images/steak.jpg" alt="Steak">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment" name="Steak" value="25" data-id="5">+</button>
                            <h3>Steak $25</h3>
                        </div>
                    </div>
                </div>

                <!-- Greek Salad -->
                <div class="item" data-id="6">
                    <div class="item-parent" name="Greek Salad" value="12" data-id="6">
                        <img class="increment" src="static/images/greek-salad.jpg" alt="Salad">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Greek Salad $12</h3>
                        </div>
                    </div>
                </div>

                <!-- Club Sandwich -->
                <div class="item" data-id="7">
                    <div class="item-parent" name="Club Sandwich" value="14" data-id="7">
                        <img class="increment" src="static/images/club-sandwich.jpg" alt="Club Sandwich">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment" name="Club Sandwich" value="14" data-id="7">+</button>
                            <h3>Club Sandwich $14</h3>
                        </div>
                    </div>
                </div>

                <!-- Pasta -->
                <div class="item" data-id="8">
                    <div class="item-parent" name="Pasta" value="11" data-id="8">
                        <img class="increment" src="static/images/pasta.jpg" alt="Pasta">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Pasta $11</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include 'include/footer.php' ?>
</body>

</html>