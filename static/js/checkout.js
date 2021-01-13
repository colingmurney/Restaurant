document.querySelector(".btn").addEventListener("click", () => {
  const totalPrice = document.querySelector("#total-price").innerHTML;

  const hiddenForm = document.createElement("form");
  hiddenForm.action = "confirmation.php";
  hiddenForm.method = "post";

  let totalPriceInput = document.createElement("input");
  totalPriceInput.type = "hidden";
  totalPriceInput.name = "totalPrice";
  totalPriceInput.value = totalPrice;

  hiddenForm.appendChild(totalPriceInput);

  document.getElementById("hidden_form_container").appendChild(hiddenForm);
  hiddenForm.submit();
});
