import disableDecrement from "./disableDecrement";

// function deletes an instance of the menu item selected from the cart

const deleteItem = (itemButton) => {
  // get cart table and total price element
  const tbodyRef = document.querySelector("#food-tbody");
  const totalPrice = tbodyRef.querySelector(".total").querySelector(".price");

  // get the parent element with class="item-parent"
  const parent = itemButton.closest(".item-parent");

  // search cart for item that was decremented
  const trRef = tbodyRef.getElementsByTagName("tr");
  for (let i = 0; i < trRef.length; i++) {
    if (trRef[i].getAttribute("name") === parent.getAttribute("name")) {
      // delete row
      tbodyRef.deleteRow(i);
      // decrement the carts total price element
      totalPrice.innerHTML =
        parseInt(totalPrice.innerHTML) - parseInt(parent.getAttribute("value"));
      // break out of loop so only one instance of item is removed from cart
      break;
    }
  }

  // call displayDecrement to update display of decrement button
  disableDecrement();
};

// exports.deleteItem = deleteItem;
export default deleteItem;
