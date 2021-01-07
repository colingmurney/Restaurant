export default function hiddenForm(isIndex) {
  const trRef = document
    .querySelector("#food-tbody")
    .querySelectorAll(".cart-item");

  // console.log(trRef);

  if (trRef.length === 0) return;

  const hiddenForm = document.createElement("form");
  hiddenForm.action = isIndex ? "addOns.php" : "payment.php";
  hiddenForm.method = "post";

  // console.log(trRef[0].getElementsByTagName("td").item(0).innerHTML);
  // console.log(trRef[0].getElementsByTagName("td").item(1).innerHTML);

  for (let i = 0; i < trRef.length; i++) {
    let foodInput = document.createElement("input");
    let priceInput = document.createElement("input");
    let idInput = document.createElement("input");

    // foodInput.type = "hidden";
    // foodInput.name = "cartFoodItems[]";
    // foodInput.value = trRef[i].getElementsByTagName("td").item(0).innerHTML;

    // priceInput.type = "hidden";
    // priceInput.name = "cartPrices[]";
    // priceInput.value = trRef[i].getElementsByTagName("td").item(1).innerHTML;

    // idInput.type = "hidden";
    // idInput.name = "cartIds[]";
    // idInput.value = trRef[i].getAttribute("data-id");

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
}