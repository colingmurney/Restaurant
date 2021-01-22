import {
  validateName,
  validateEmail,
  validateReason,
  validateBody,
} from "./utils/validateInput";

document.querySelector(".btn").addEventListener("click", () => {
  // get user input elements
  const nameInput = document.querySelector("#name");
  const emailInput = document.querySelector("#email");
  const reasonInput = document.querySelector("#reason");
  const bodyInput = document.querySelector("#body");

  // validate each input element
  validateName(nameInput);
  validateEmail(emailInput);
  validateReason(reasonInput);
  validateBody(bodyInput);

  // if any unsuccessful msgs are displayed (not all inputs are valid)
  // return before submitted payment form
  if (document.querySelector(".validation-unsuccessful") !== null) return;

  // get contact form and submit
  const contactForm = document.querySelector("#contact-form");
  contactForm.submit();
});
