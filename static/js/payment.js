import {
  validateName,
  validateEmail,
  validateAddress,
  validateCity,
  validateProvince,
  validatePostal,
  validateCardname,
  validateCardnumber,
  validateExpmonth,
  validateExpyear,
  validateCvv,
} from "./utils/validateInput";

const button = document.querySelector(".btn");

button.addEventListener("click", () => {
  const nameInput = document.querySelector("#name");
  const emailInput = document.querySelector("#email");
  const addressInput = document.querySelector("#address");
  const cityInput = document.querySelector("#city");
  const provinceInput = document.querySelector("#province");
  const postalInput = document.querySelector("#postal");
  const cardnameInput = document.querySelector("#cardname");
  const cardnumberInput = document.querySelector("#cardnumber");
  const expmonthInput = document.querySelector("#expmonth");
  const expyearInput = document.querySelector("#expyear");
  const cvvInput = document.querySelector("#cvv");

  validateName(nameInput);
  validateEmail(emailInput);
  validateAddress(addressInput);
  validateCity(cityInput);
  validateProvince(provinceInput);
  validatePostal(postalInput);
  validateCardname(cardnameInput);
  validateCardnumber(cardnumberInput);
  validateExpmonth(expmonthInput);
  validateExpyear(expyearInput);
  validateCvv(cvvInput);

  if (document.querySelector(".validation-unsuccessful") !== null) return;

  const paymentForm = document.querySelector("#payment-form");
  paymentForm.submit();
});
