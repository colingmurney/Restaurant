// validation functions hide or display unsuccessful messages

export function validateName(nameInput) {
  // Must only include letters and spaces
  // min 2 characters
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

export function validateEmail(emailInput) {
  // any characters but must follow xxxxxx@xxxx.xxx
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

export function validateAddress(addressInput) {
  // Any alphanumeric and spaces
  // min 6 characters
  const re = /^[A-Za-z0-9\s]{6,}$/;
  const address = addressInput.value.trim();

  if (re.test(address)) {
    addressInput.classList.remove("validation-unsuccessful");
    document.querySelector("#address-msg").style.display = "none";
  } else {
    addressInput.classList.add("validation-unsuccessful");
    document.querySelector("#address-msg").style.display = "block";
  }
}

export function validateCity(cityInput) {
  // Must only include letters and spaces
  // min 2 characters
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

export function validateProvince(provinceInput) {
  // default province option has value of ""
  // function validates that a province was selected
  const province = provinceInput.value;

  if (province) {
    provinceInput.classList.remove("validation-unsuccessful");
    document.querySelector("#province-msg").style.display = "none";
  } else {
    provinceInput.classList.add("validation-unsuccessful");
    document.querySelector("#province-msg").style.display = "block";
  }
}

export function validatePostal(postalInput) {
  // must follow canadian postal code format
  // optional space between 3rd and 4th characters
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

export function validateCardname(cardnameInput) {
  // allow names with hyphens and spaces
  // must include at least 2 names that are separted by a whitespace
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

export function validateCardnumber(cardnumberInput) {
  // 16 digits that may include whitespace
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

export function validateExpmonth(expmonthInput) {
  // default expiry month option has value of ""
  // function validates that a expiry month was selected
  const expmonth = expmonthInput.value;

  if (expmonth) {
    expmonthInput.classList.remove("validation-unsuccessful");
    document.querySelector("#expmonth-msg").style.display = "none";
  } else {
    expmonthInput.classList.add("validation-unsuccessful");
    document.querySelector("#expmonth-msg").style.display = "block";
  }
}

export function validateExpyear(expyearInput) {
  // default expiry year option has value of ""
  // function validates that a expiry year was selected
  const expyear = expyearInput.value;

  if (expyear) {
    expyearInput.classList.remove("validation-unsuccessful");
    document.querySelector("#expyear-msg").style.display = "none";
  } else {
    expyearInput.classList.add("validation-unsuccessful");
    document.querySelector("#expyear-msg").style.display = "block";
  }
}

export function validateCvv(cvvInput) {
  // must include 3 consecutive digits
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

export function validateReason(reasonInput) {
  // default reason option has value of ""
  // function validates that a reason was selected
  const reason = reasonInput.value;

  if (reason) {
    reasonInput.classList.remove("validation-unsuccessful");
    document.querySelector("#reason-msg").style.display = "none";
  } else {
    reasonInput.classList.add("validation-unsuccessful");
    document.querySelector("#reason-msg").style.display = "block";
  }
}

export function validateBody(bodyInput) {
  // any characters
  // min 10, max 1000
  const re = /^[\S\s]{10,1000}$/;
  const body = bodyInput.value.trim();

  if (re.test(body)) {
    bodyInput.classList.remove("validation-unsuccessful");
    document.querySelector("#body-msg").style.display = "none";
  } else {
    bodyInput.classList.add("validation-unsuccessful");
    document.querySelector("#body-msg").style.display = "block";
  }
}
