import addItem from "../js/utils/addItem";

// tests if addItem add a menu item into the cart
// tests if displayDecrement also meets same expectations from unit test
test("should add Burger to cart", () => {
  // create a food item and set object attributes
  const id = "1";
  const name = "Burger";
  const price = "15";

  // put the food item in menu and create empty cart
  document.body.innerHTML = `
        <div class="menu">
            <div class="item">
                <div class="item-parent" name="${name}" data-id="${id}" value="${price}">
                    <img class="increment" alt="$name">
                    <div class="button-container">
                        <button class="itemButton decrement">-</button>
                        <button class="itemButton increment">+</button>
                    </div>
                </div>
            </div>
        </div>

        <table>
        <tbody id="food-tbody">
            <tr class="total">
                <th class="food">Total ($)</th>
                <th class="price">0</th>
            </tr>
        </tbody>
        </table>
    `;

  // call addItem on click of food item's image
  // call addItem on click of food item's increment button
  const imgBtn = document.querySelector("img.increment");
  const incrementBtn = document.querySelector("button.increment");
  imgBtn.addEventListener("click", addItem(imgBtn));
  incrementBtn.addEventListener("click", addItem(incrementBtn));
  imgBtn.click();
  incrementBtn.click();

  //  get items in cart
  const cart = document.querySelector("#food-tbody");
  const cartItems = cart.querySelectorAll(".cart-item");

  // get both instances of item added to cart
  const cartItemImgButton = cartItems[1];
  const cartItemIncrementButton = cartItems[0];

  // get attributes for both instances of item in cart
  const imgItemName = cartItemImgButton.querySelectorAll("td")[0].innerHTML;
  const incrementItemName = cartItemIncrementButton.querySelectorAll("td")[0]
    .innerHTML;
  const imgItemPrice = cartItemImgButton.querySelectorAll("td")[1].innerHTML;
  const incrementItemPrice = cartItemIncrementButton.querySelectorAll("td")[1]
    .innerHTML;
  const imgItemId = cartItemImgButton.dataset.id;
  const incrementItemId = cartItemIncrementButton.dataset.id;

  // get cart total price and check it equals 2 x the food item price
  const total = cart.querySelector(".total");
  const totalPrice = total.querySelector(".price").innerHTML;
  expect(parseInt(totalPrice)).toBe(2 * parseInt(price));

  // check the item name, price, and data-id for both instances of item in cart
  expect(imgItemName).toBe(name);
  expect(incrementItemName).toBe(name);
  expect(imgItemPrice).toBe(price);
  expect(incrementItemPrice).toBe(price);
  expect(imgItemId).toBe(id);
  expect(incrementItemId).toBe(id);

  //check that the disableDecrement function displayed the decrement button
  const menuDecrementButton = document
    .querySelector(".item")
    .querySelector(".decrement");
  const menuDecrementDisplay = menuDecrementButton.style.display;
  expect(menuDecrementDisplay).toBe("block");
});
