<!-- cart html for index and add-ons -->

<div class="cart cart-index">
    <h4 style="text-align: center;">Cart</h4>
    <table class="orderlist" id="food-table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price (CAD)</th>
            </tr>
        </thead>
        <tbody id="food-tbody">
            <?php echo $cartRowsHTML ?>
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
        <!-- hidden container to attach form to on page submit -->
        <div id="hidden_form_container" style="display:none;"></div>
    </div>
</div>