import disableDecrement from "./disbleDecrement";

export default function updateCart(itemButton) {
  const tbodyRef = document.querySelector("#food-tbody");
  const totalPrice = tbodyRef.querySelector(".total").querySelector(".price");

  if (itemButton.innerHTML === "+") {
    const newRow = tbodyRef.insertRow(0); // insert as first tbody row
    newRow.setAttribute("name", itemButton.name);
    newRow.setAttribute("class", "cart-item");
    newRow.setAttribute("data-id", itemButton.dataset.id);

    const newCellFood = newRow.insertCell(0); // insert as first column
    const newCellPrice = newRow.insertCell(-1); // insert as last column

    const newTextFood = document.createTextNode(itemButton.name);
    const newTextPrice = document.createTextNode(itemButton.value);

    newCellFood.appendChild(newTextFood);
    newCellPrice.appendChild(newTextPrice);

    totalPrice.innerHTML =
      parseInt(totalPrice.innerHTML) + parseInt(itemButton.value);
  } else if (itemButton.innerHTML === "-") {
    const trRef = tbodyRef.getElementsByTagName("tr");

    for (let i = 0; i < trRef.length; i++) {
      if (trRef[i].getAttribute("name") === itemButton.name) {
        tbodyRef.deleteRow(i);
        totalPrice.innerHTML =
          parseInt(totalPrice.innerHTML) - parseInt(itemButton.value);
        break;
      }
    }
  }
  disableDecrement();
}
