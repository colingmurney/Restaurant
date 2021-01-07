<?php
session_start();

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
            <button class="btn2">Go to Add-Ons</button>
            <div id="hidden_form_container" style="display:none;"></div>
        </div>

        <!-- Row 1 -->
        <div class="grid-row">
            <div class="item Burger">
                <img src="static/images/burger.jpg" alt="Burger">
                <div>
                    <button class="itemButton" name="Burger" value="15" data-id="1">-</button>
                    <button class="itemButton" name="Burger" value="15" data-id="1">+</button>
                    <h3>Burger $15</h3>
                </div>
                <!-- <p>Burger description</p> -->
            </div>
            <div class="item Poutine">
                <img src="static/images/poutine.jpg" alt="Poutine">
                <div>
                    <button class="itemButton" name="Poutine" value="9" data-id="2">-</button>
                    <button class="itemButton" name="Poutine" value="9" data-id="2">+</button>
                    <h3>Poutine $9</h3>
                </div>
                <!-- <p>Poutine description</p> -->
            </div>
            <div class="item FrenchFries">
                <img src="static/images/french-fries.jpg" alt="French Fries">
                <div>
                    <button class="itemButton" name="French Fries" value="7" data-id="3">-</button>
                    <button class="itemButton" name="French Fries" value="7" data-id="3">+</button>
                    <h3>French Fries $7</h3>
                </div>
                <!-- <p>Sweet Potato Fries description</p> -->
            </div>
            <div class="item Nachos">
                <img src="static/images/nachos.jpg" alt="Nachos">
                <div>
                    <button class="itemButton" name="Nachos" value="10" data-id="4">-</button>
                    <button class="itemButton" name="Nachos" value="10" data-id="4">+</button>
                    <h3>Nachos $10</h3>
                </div>
                <!-- <p>Nachos description</p> -->
            </div>
        </div>

        <!-- Row 2-->
        <div class="grid-row">
            <div class="item Steak">
                <img src="static/images/steak.jpg" alt="Steak">
                <div>
                    <button class="itemButton" name="Steak" value="25" data-id="5">-</button>
                    <button class="itemButton" name="Steak" value="25" data-id="5">+</button>
                    <h3>Steak $25</h3>
                </div>
                <!-- <p>Steak description</p> -->
            </div>
            <div class="item GreekSalad">
                <img src="static/images/greek-salad.jpg" alt="Salad">
                <div>
                    <button class="itemButton" name="Greek Salad" value="12" data-id="6">-</button>
                    <button class="itemButton" name="Greek Salad" value="12" data-id="6">+</button>
                    <h3>Greek Salad $12</h3>
                </div>
                <!-- <p>Greek Salad description</p> -->
            </div>
            <div class="item ClubSandwich">
                <img src="static/images/club-sandwich.jpg" alt="Club Sandwich">
                <div>
                    <button class="itemButton" name="Club Sandwich" value="14" data-id="7">-</button>
                    <button class="itemButton" name="Club Sandwich" value="14" data-id="7">+</button>
                    <h3>Club Sandwich $14</h3>
                </div>
                <!-- <p>Club Sandwich description</p> -->
            </div>
            <div class="item Pasta">
                <img src="static/images/pasta.jpg" alt="Pasta">
                <div>
                    <button class="itemButton" name="Pasta" value="11" data-id="8">-</button>
                    <button class="itemButton" name="Pasta" value="11" data-id="8">+</button>
                    <h3>Pasta $11</h3>
                </div>
                <!-- <p>Pasta description</p> -->
            </div>
        </div>
    </div>

    <?php include 'include/footer.php' ?>
</body>

</html>