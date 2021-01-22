import disableDecrement from "./disableDecrement";

// function adds an instance of the menu item selected to the cart

const addItem = (itemButton) => {
  // get cart table and total price element
  const tbodyRef = document.querySelector("#food-tbody");
  const totalPrice = tbodyRef.querySelector(".total").querySelector(".price");

  // get the parent element with class="item-parent"
  const parent = itemButton.closest(".item-parent");

  // create new row and set the rows attributes
  const newRow = tbodyRef.insertRow(0); // insert as first tbody row
  newRow.setAttribute("name", parent.getAttribute("name"));
  newRow.setAttribute("class", "cart-item");
  newRow.setAttribute("data-id", parent.dataset.id);

  // create cells for new row
  const newCellFood = newRow.insertCell(0); // insert as first column
  const newCellPrice = newRow.insertCell(-1); // insert as last column

  // create text for new cells
  const newTextFood = document.createTextNode(parent.getAttribute("name"));
  const newTextPrice = document.createTextNode(parent.getAttribute("value"));

  // append the text to the cells
  newCellFood.appendChild(newTextFood);
  newCellPrice.appendChild(newTextPrice);

  // increment the carts total price element
  totalPrice.innerHTML =
    parseInt(totalPrice.innerHTML) + parseInt(parent.getAttribute("value"));

  // call displayDecrement to update display of decrement button
  disableDecrement();
};

export default addItem;
