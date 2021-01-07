<?php
session_start();

$cart = '';
$totalPrice = 0;

if (isset($_POST['cart'])) {
    $_SESSION['CART'] = $_POST['cart'];
    include 'include/utils/sessionCart.php';
} else {
    header('Location: index.php');
}

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

            <button class="btn2">Proceed to Pay</button>
            <div id="hidden_form_container" style="display:none;"></div>
        </div>


        <!-- Row 1 -->
        <div class="grid-row">
            <p class="item-type">Drinks</p>
            <div class="item Pepsi" id="test">
                <img src="static/images/pepsi.jpg" alt="Pepsi">
                <div>
                    <button class="itemButton" name="Pepsi" value="3" data-id="9">-</button>
                    <button class="itemButton" name="Pepsi" value="3" data-id="9">+</button>
                    <h3>Pepsi $3</h3>
                </div>

            </div>
            <div class="item Water">
                <img src="static/images/water.jpg" alt="water">
                <div>
                    <button class="itemButton" name="Water" value="2" data-id="10">-</button>
                    <button class="itemButton" name="Water" value="2" data-id="10">+</button>
                    <h3>Water $2</h3>
                </div>
            </div>
            <div class="item Beer">
                <img src="static/images/beer.jpg" alt="beer">
                <div>
                    <button class="itemButton" name="Beer" value="5" data-id="11">-</button>
                    <button class="itemButton" name="Beer" value="5" data-id="11">+</button>
                    <h3>Beer $5</h3>
                </div>

            </div>
            <div class="item Wine">
                <img src="static/images/wine.jpg" alt="wine">
                <div>
                    <button class="itemButton" name="Wine" value="7" data-id="12">-</button>
                    <button class="itemButton" name="Wine" value="7" data-id="12">+</button>
                    <h3>Wine $7</h3>
                </div>
            </div>
        </div>

        <!-- Row 2-->
        <div class="grid-row">
            <p class="item-type">Extras</p>
            <div class="item Bacon">
                <img src="static/images/bacon.jpg" alt="bacon">
                <div>
                    <button class="itemButton" name="Bacon" value="4" data-id="13">-</button>
                    <button class="itemButton" name="Bacon" value="4" data-id="13">+</button>
                    <h3>Bacon $4</h3>
                </div>

            </div>
            <div class="item Tomato">
                <img src="static/images/tomato.png" alt="bacon">
                <div>
                    <button class="itemButton" name="Tomato" value="2" data-id="14">-</button>
                    <button class="itemButton" name="Tomato" value="2" data-id="14">+</button>
                    <h3>Tomato $2</h3>
                </div>

            </div>
            <div class="item Cheese">
                <img src="static/images/cheese.jpg" alt="cheese">
                <div>
                    <button class="itemButton" name="Cheese" value="3" data-id="15">-</button>
                    <button class="itemButton" name="Cheese" value="3" data-id="15">+</button>
                    <h3>Cheese $3</h3>
                </div>

            </div>
            <div class="item Mushrooms">
                <img src="static/images/mushrooms.jpg" alt="mushrooms">
                <div>
                    <button class="itemButton" name="Mushrooms" value="2" data-id="16">-</button>
                    <button class="itemButton" name="Mushrooms" value="2" data-id="16">+</button>
                    <h3>Mushrooms $2</h3>
                </div>

            </div>
        </div>
    </div>

    <?php include 'include/footer.php' ?>
</body>

</html>