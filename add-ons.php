<?php
include 'include/config.php';

$cart = '';
$totalPrice = 0;

if (!isset($_SESSION['CART']) && !isset($_POST['cart'])) {
    header('Location: index.php');
    exit();
} else if (isset($_POST['cart'])) {
    $_SESSION['CART'] = $_POST['cart'];
}

include 'include/utils/sessionCart.php';
?>

<html>

<head>
    <title>Add Ons</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script type="module" src="static/js/addOns.js" defer></script>
</head>

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
        <h1 style="text-align: center;">Add Ons</h1>
    </div>

    <!-- PAGE CONTENT -->
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
                <button class="btn2">Proceed to Pay</button>
                <div id="hidden_form_container" style="display:none;"></div>
            </div>
        </div>

        <div class="menu">
            <!-- Row 1 -->
            <div class="grid-row" data-id="9">
                <p class="item-type">Drinks</p>

                <!-- Pepsi -->
                <div class="item" id="test">
                    <div class="item-parent" name="Pepsi" value="3" data-id="9">
                        <img class="increment" src="static/images/pepsi.jpg" alt="Pepsi">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Pepsi $3</h3>
                        </div>
                    </div>
                </div>

                <!-- Water -->
                <div class="item" data-id="10">
                    <div class="item-parent" name="Water" value="2" data-id="10">
                        <img class="increment" src="static/images/water.jpg" alt="Water">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Water $2</h3>
                        </div>
                    </div>
                </div>

                <!-- Beer -->
                <div class="item" data-id="11">
                    <div name="Beer" value="5" data-id="11">
                        <img class="increment" src="static/images/beer.jpg" alt="Beer">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Beer $5</h3>
                        </div>
                    </div>
                </div>

                <!-- Wine -->
                <div class="item" data-id="12">
                    <div class="item-parent" name="Wine" value="7" data-id="12">
                        <img class="increment" src="static/images/wine.jpg" alt="Wine">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Wine $7</h3>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Row 2-->
            <div class="grid-row" data-id="13">
                <p class="item-type">Extras</p>

                <!-- Bacon -->
                <div class="item">
                    <div class="item-parent" name="Bacon" value="4" data-id="13">
                        <img class="increment" src="static/images/bacon.jpg" alt="Bacon">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Bacon $4</h3>
                        </div>
                    </div>
                </div>

                <!-- Tomato -->
                <div class="item" data-id="14">
                    <div class="item-parent" name="Tomato" value="2" data-id="14">
                        <img class="increment" src="static/images/tomato.png" alt="Tomato">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Tomato $2</h3>
                        </div>
                    </div>
                </div>

                <!-- Cheese -->
                <div class="item" data-id="15">
                    <div class="item-parent" name="Cheese" value="3" data-id="15">
                        <img class="increment" src="static/images/cheese.jpg" alt="Cheese">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Cheese $3</h3>
                        </div>
                    </div>
                </div>

                <!-- Mushrooms -->
                <div class="item" data-id="16">
                    <div class="increment" name="Mushrooms" value="2" data-id="16">
                        <img class="increment" src="static/images/mushrooms.jpg" alt="mushrooms">
                        <div>
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>Mushrooms $2</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include 'include/footer.php' ?>
</body>

</html>