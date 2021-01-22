import disableDecrement from "../js/utils/disableDecrement.js";

// tests if displayDecrement function displays decrement button for items
// that are in a cart and hides it for items that are not in cart
test("should hide or display decrement button", () => {
  // create two food items and set object attributes
  const burger = {
    id: "1",
    name: "Burger",
    price: "15",
  };

  const poutine = {
    id: "2",
    name: "Poutine",
    price: "10",
  };

  // put one food item in cart and all in the menu
  document.body.innerHTML = `
    <table>
    <tbody id="food-tbody">
        <tr class="cart-item" name="" data-id="${burger.id}">
            <td>${burger.name}</td>
            <td>${burger.price}</td>
        </tr> 
    </tbody>
    </table>

    <div class="menu">
      <div class="item">
        <div class="item-parent" name="${burger.name}" data-id="${burger.id}" value="${burger.price}">
          <button class="itemButton decrement">-</button>
          <button class="itemButton increment">+</button>
        </div>
      </div>

      <div class="item">
        <div class="item-parent" name="${poutine.name}" data-id="${poutine.id}" value="${poutine.price}">
          <button class="itemButton decrement">-</button>
          <button class="itemButton increment">+</button>
        </div>
      </div>
    </div>
  `;

  // call function
  disableDecrement();

  const menuItems = document.querySelectorAll(".item");

  // get decrements for both menu items
  const burgerDecrementButton = menuItems[0].querySelector(".decrement");
  const poutineDecrementButton = menuItems[1].querySelector(".decrement");

  // get the display style for each decrement button
  const burgerDecrementDisplay = burgerDecrementButton.style.display;
  const poutineDecrementDisplay = poutineDecrementButton.style.display;

  // check display against expected
  expect(burgerDecrementDisplay).toBe("block");
  expect(poutineDecrementDisplay).toBe("none");
});
