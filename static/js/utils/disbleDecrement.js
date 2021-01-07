export default function disbaleDecrement() {
  const trRef = document
    .querySelector("#food-tbody")
    .querySelectorAll(".cart-item");

  const foodItems = document.querySelectorAll(".item");

  foodItems.forEach((foodItem) => {
    foodItem.querySelector(".itemButton").disabled = true;
  });

  trRef.forEach((tr) => {
    const className = tr.getAttribute("name").replace(/\s+/g, "");
    const itemInCartAndCurrentPage = document.querySelector(`.${className}`);

    if (itemInCartAndCurrentPage) {
      itemInCartAndCurrentPage.querySelector(".itemButton").disabled = false;
    }
  });
}
