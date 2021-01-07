<?php
include 'include/config.php';
include 'include/classes/MenuItem.php';

$menuItemObj = new MenuItem($conn);
$itemsHTML = $menuItemObj->getAllMenuItems();

?>

<html>

<head>
    <title>Full menu</title>
</head>
<link rel="stylesheet" href="static/css/style.css">

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
    </div>

    <h1 style="text-align: center; margin-top: 5px;">Our Offerings</h1>

    <div class="container-payment">
        <dl>
            <?php echo $itemsHTML ?>
            <!-- <div class="description">
                <dt>Burger</dt>
                <dd>A 1/2 lb patty of ground beef topped with cheese, bacon, lettuce, tomato, dill pickle, mayo & fried onions.</dd>
            </div>

            <div class="description">
                <dt>Poutine</dt>
                <dd>Hand cut fries & mozzarella cheese with homemade beef or turkey gravy.</dd>
            </div>

            <div class="description">
                <dt>French Fries</dt>
                <dd>Served with homemade sweet chili or curry mayo.</dd>
            </div>

            <div class="description">
                <dt>Nachos</dt>
                <dd>
                    Homemade seasoned tortilla chips generously topped with cheddar & mozzarella cheese, onions, tomatoes, jalapenos & olives.
                    Served with salsa & sour cream.
                </dd>
            </div>

            <div class="description">
                <dt>Steak</dt>
                <dd>
                    All of our steaks are wet aged and hand cut here at the Mic Mac Bar and Grill and lightly dusted in our secret spice.
                    We charbroil our steaks to your liking. Do yourself a favour and try them all!
                </dd>
            </div>

            <div class="description">
                <dt>Greek Salad</dt>
                <dd>Hand tossed with lettuce, cucumber, red onion & tomato. Topped with feta & kalamata olives.</dd>
            </div>

            <div class="description">
                <dt>Club Sandwich</dt>
                <dd>
                    House roasted turkey, bacon, lettuce, tomato & mayo, sandwiched between three slices of toasted white or whole
                    wheat bread. Served with your choice of side. A classic!
                </dd>
            </div>

            <div class="description">
                <dt>Pasta</dt>
                <dd>
                    Fresh homemade Italian pasta. Finished with freshly grated parmesan and parsley.
                    Served with bacon-crusted garlic cheese bread.
                </dd>
            </div> -->
        </dl>
    </div>
    <div class="footer">
        <p>
            <a class="contact-us" href="contact.html">Contact Us</a>
            <span style="font-weight: bold; font-size: 30px; margin: 0 20px 0 20px">|</span>
            <a class="contact-us" href="about.html">About Us</a>
        </p>
        <address>1050 Peel Street, Montreal QC, Canada</address>
        <p>Colin's Restaurant Inc &copy;</p>
    </div>
</body>

</html>