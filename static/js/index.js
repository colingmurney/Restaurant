import hiddenFrom from "./utils/hiddenForm";
import disableDecrement from "./utils/disbleDecrement";
import updateCart from "./utils/updateCart";

disableDecrement();

const itemButtons = document.querySelectorAll(".itemButton");
itemButtons.forEach((itemButton) => {
  itemButton.addEventListener("click", () => {
    updateCart(itemButton);
  });
});

document.querySelector(".btn2").addEventListener("click", () => {
  hiddenFrom(true);
});

//need function like disableDecrement but for the Go to Add-Ons button
