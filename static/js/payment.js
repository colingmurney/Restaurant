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

function validateName(nameInput) {
  const re = /^[A-Za-z\s]{2,}$/;
  const name = nameInput.value.trim();

  if (re.test(name)) {
    nameInput.classList.remove("validation-unsuccessful");
    document.querySelector("#name-msg").style.display = "none";
  } else {
    nameInput.classList.add("validation-unsuccessful");
    document.querySelector("#name-msg").style.display = "block";
  }
}

function validateEmail(emailInput) {
  const re = /\S+@\S+\.\S+/;
  const email = emailInput.value.trim();

  if (re.test(email)) {
    emailInput.classList.remove("validation-unsuccessful");
    document.querySelector("#email-msg").style.display = "none";
  } else {
    emailInput.classList.add("validation-unsuccessful");
    document.querySelector("#email-msg").style.display = "block";
  }
}

function validateAddress(addressInput) {
  const re = /^[A-Za-z0-9\s]{6,}$/;
  const address = addressInput.value.trim();

  if (re.test(address)) {
    addressInput.classList.remove("validation-unsuccessful");
    document.querySelector("#email-msg").style.display = "none";
  } else {
    addressInput.classList.add("validation-unsuccessful");
    document.querySelector("#address-msg").style.display = "block";
  }
}

function validateCity(cityInput) {
  const re = /^[A-Za-z\s]{2,}$/;
  const city = cityInput.value.trim();

  if (re.test(city)) {
    cityInput.classList.remove("validation-unsuccessful");
    document.querySelector("#city-msg").style.display = "none";
  } else {
    cityInput.classList.add("validation-unsuccessful");
    document.querySelector("#city-msg").style.display = "block";
  }
}

function validateProvince(provinceInput) {
  const province = provinceInput.value;

  if (province !== "province") {
    provinceInput.classList.remove("validation-unsuccessful");
    document.querySelector("#province-msg").style.display = "none";
  } else {
    provinceInput.classList.add("validation-unsuccessful");
    document.querySelector("#province-msg").style.display = "block";
  }
}

function validatePostal(postalInput) {
  const re = /[a-zA-Z][0-9][a-zA-Z](| |)[0-9][a-zA-Z][0-9]/;
  const postal = postalInput.value.trim();

  if (re.test(postal)) {
    postalInput.classList.remove("validation-unsuccessful");
    document.querySelector("#postal-msg").style.display = "none";
  } else {
    postalInput.classList.add("validation-unsuccessful");
    document.querySelector("#postal-msg").style.display = "block";
  }
}

function validateCardname(cardnameInput) {
  const re = /^[a-zA-Z]([-']?[a-zA-Z]+)*( [a-zA-Z]([-']?[a-zA-Z]+)*)+$/;
  const cardname = cardnameInput.value.trim();

  if (re.test(cardname)) {
    cardnameInput.classList.remove("validation-unsuccessful");
    document.querySelector("#cardname-msg").style.display = "none";
  } else {
    cardnameInput.classList.add("validation-unsuccessful");
    document.querySelector("#cardname-msg").style.display = "block";
  }
}

function validateCardnumber(cardnumberInput) {
  const re = /^([0-9]{4}\s?){4}$/;
  const cardnumber = cardnumberInput.value.trim();

  if (re.test(cardnumber)) {
    cardnumberInput.classList.remove("validation-unsuccessful");
    document.querySelector("#cardnumber-msg").style.display = "none";
  } else {
    cardnumberInput.classList.add("validation-unsuccessful");
    document.querySelector("#cardnumber-msg").style.display = "block";
  }
}

function validateExpmonth(expmonthInput) {
  const expmonth = expmonthInput.value;

  if (expmonth !== "expmonth") {
    expmonthInput.classList.remove("validation-unsuccessful");
    document.querySelector("#expmonth-msg").style.display = "none";
  } else {
    expmonthInput.classList.add("validation-unsuccessful");
    document.querySelector("#expmonth-msg").style.display = "block";
  }
}

function validateExpyear(expyearInput) {
  const expyear = expyearInput.value;

  if (expyear !== "expyear") {
    expyearInput.classList.remove("validation-unsuccessful");
    document.querySelector("#expyear-msg").style.display = "none";
  } else {
    expyearInput.classList.add("validation-unsuccessful");
    document.querySelector("#expyear-msg").style.display = "block";
  }
}

function validateCvv(cvvInput) {
  const re = /^[0-9]{3}$/;
  const cvv = cvvInput.value.trim();

  if (re.test(cvv)) {
    cvvInput.classList.remove("validation-unsuccessful");
    document.querySelector("#cvv-msg").style.display = "none";
  } else {
    cvvInput.classList.add("validation-unsuccessful");
    document.querySelector("#cvv-msg").style.display = "block";
  }
}
