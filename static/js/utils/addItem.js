import disableDecrement from "./disbleDecrement";

export default function updateCart2(itemButton) {
  const tbodyRef = document.querySelector("#food-tbody");
  const totalPrice = tbodyRef.querySelector(".total").querySelector(".price");

  //get item-parent
  const parent = itemButton.closest(".item-parent");

  const newRow = tbodyRef.insertRow(0); // insert as first tbody row
  newRow.setAttribute("name", parent.getAttribute("name"));
  newRow.setAttribute("class", "cart-item");
  newRow.setAttribute("data-id", parent.dataset.id);

  const newCellFood = newRow.insertCell(0); // insert as first column
  const newCellPrice = newRow.insertCell(-1); // insert as last column

  const newTextFood = document.createTextNode(parent.getAttribute("name"));
  const newTextPrice = document.createTextNode(parent.getAttribute("value"));

  newCellFood.appendChild(newTextFood);
  newCellPrice.appendChild(newTextPrice);

  totalPrice.innerHTML =
    parseInt(totalPrice.innerHTML) + parseInt(parent.getAttribute("value"));

  disableDecrement();
}
