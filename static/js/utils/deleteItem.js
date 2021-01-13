import disableDecrement from "./disbleDecrement";

export default function updateCart2(itemButton) {
  const tbodyRef = document.querySelector("#food-tbody");
  const totalPrice = tbodyRef.querySelector(".total").querySelector(".price");

  //get item-parent
  const parent = itemButton.closest(".item-parent");

  const trRef = tbodyRef.getElementsByTagName("tr");

  for (let i = 0; i < trRef.length; i++) {
    if (trRef[i].getAttribute("name") === parent.getAttribute("name")) {
      tbodyRef.deleteRow(i);
      totalPrice.innerHTML =
        parseInt(totalPrice.innerHTML) - parseInt(parent.getAttribute("value"));
      break;
    }
  }

  disableDecrement();
}
