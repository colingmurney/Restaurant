// function create a hidden form using items in cart
// form action url depends on the argument passed

const hiddenForm = (isIndex) => {
  // get item elements in cart
  const trRef = document
    .querySelector("#food-tbody")
    .querySelectorAll(".cart-item");

  // check that cart has at least 1 main food item in it
  let mainItemCount = 0;
  trRef.forEach((tr) => {
    if (tr.dataset.id <= 8) {
      mainItemCount++;
    }
  });

  if (mainItemCount === 0) {
    // display hidden empty cart message and return from function
    const cartEmptyMsg = document.getElementById("cart-empty-msg");
    cartEmptyMsg.style.display = "block";
    return;
  }

  const hiddenForm = document.createElement("form");
  // if called from index page, direct to add-ons
  // if not, direct to payment page
  hiddenForm.action = isIndex ? "add-ons.php" : "payment.php";
  hiddenForm.method = "post";

  // for each item in cart, create input, set attributes, and append to hidden form
  for (let i = 0; i < trRef.length; i++) {
    let foodInput = document.createElement("input");
    let priceInput = document.createElement("input");
    let idInput = document.createElement("input");

    foodInput.type = "hidden";
    foodInput.name = `cart[${i}][foodItem]`;
    foodInput.value = trRef[i].getElementsByTagName("td").item(0).innerHTML;

    priceInput.type = "hidden";
    priceInput.name = `cart[${i}][price]`;
    priceInput.value = trRef[i].getElementsByTagName("td").item(1).innerHTML;

    idInput.type = "hidden";
    idInput.name = `cart[${i}][id]`;
    idInput.value = trRef[i].getAttribute("data-id");

    hiddenForm.appendChild(foodInput);
    hiddenForm.appendChild(priceInput);
    hiddenForm.appendChild(idInput);
  }

  document.getElementById("hidden_form_container").appendChild(hiddenForm);
  hiddenForm.submit();
};

export default hiddenForm;
