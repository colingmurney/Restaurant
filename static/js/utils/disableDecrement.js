// function hides all the decrement buttons
// changes display to block for menu items that are in the cart

const disableDecrement = () => {
  // get food items and hide display of decrement button
  const foodItems = document.querySelectorAll(".item");
  foodItems.forEach((foodItem) => {
    // first .itemButton in .item div will always be the decrement button
    foodItem.querySelector(".itemButton").style.display = "none";
  });

  // get table rows / menu items
  const trRef = document
    .querySelector("#food-tbody")
    .querySelectorAll(".cart-item");

  // for each cart item, display its corresponding decrement button
  trRef.forEach((tr) => {
    const itemId = tr.dataset.id;
    // only query menu for cart items on current page
    const itemInCartAndCurrentPage = document
      .querySelector(".menu") // gets current page menu items only
      .querySelector(`[data-id="${itemId}"]`);

    if (itemInCartAndCurrentPage) {
      //change button display for current cart item
      itemInCartAndCurrentPage.querySelector(".itemButton").style.display =
        "block";
    }
  });
};

export default disableDecrement;
