import hiddenFrom from "./utils/hiddenForm";
import disableDecrement from "./utils/disableDecrement";
import addItem from "./utils/addItem";
import deleteItem from "./utils/deleteItem";

// display decrement buttons for items already in cart on page load
disableDecrement();

// add event listener to .increment elements to add item to cart on click
const incrementItems = document.querySelectorAll(".increment");
incrementItems.forEach((item) => {
  item.addEventListener("click", () => {
    addItem(item);
  });
});

// add event listener to .decrement elements to remove item from cart on click
const decrementItems = document.querySelectorAll(".decrement");
decrementItems.forEach((item) => {
  item.addEventListener("click", () => {
    deleteItem(item);
  });
});

// add event listener to page submit button that creates hidden form on click
document.querySelector(".btn2").addEventListener("click", () => {
  // isIndex is true
  hiddenFrom(true);
});
