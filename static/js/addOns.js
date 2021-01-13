import hiddenFrom from "./utils/hiddenForm";
import disableDecrement from "./utils/disbleDecrement";
import addItem from "./utils/addItem";
import deleteItem from "./utils/deleteItem";

disableDecrement();

const incrementItems = document.querySelectorAll(".increment");
incrementItems.forEach((item) => {
  item.addEventListener("click", () => {
    addItem(item);
  });
});

const decrementItems = document.querySelectorAll(".decrement");
decrementItems.forEach((item) => {
  item.addEventListener("click", () => {
    deleteItem(item);
  });
});

document.querySelector(".btn2").addEventListener("click", () => {
  hiddenFrom(false);
});
