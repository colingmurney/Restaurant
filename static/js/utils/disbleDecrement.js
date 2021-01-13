export default function disbaleDecrement() {
  const trRef = document
    .querySelector("#food-tbody")
    .querySelectorAll(".cart-item");

  const foodItems = document.querySelectorAll(".item");

  foodItems.forEach((foodItem) => {
    foodItem.querySelector(".itemButton").style.display = "none";
  });

  trRef.forEach((tr) => {
    const itemId = tr.dataset.id;
    const itemInCartAndCurrentPage = document
      .querySelector(".menu")
      .querySelector(`[data-id="${itemId}"]`);

    if (itemInCartAndCurrentPage) {
      itemInCartAndCurrentPage.querySelector(".itemButton").style.display =
        "block";
    }
  });
}
