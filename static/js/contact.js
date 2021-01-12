import {
  validateName,
  validateEmail,
  validateReason,
  validateBody,
} from "./utils/validateInput";

document.querySelector(".btn").addEventListener("click", () => {
  const nameInput = document.querySelector("#name");
  const emailInput = document.querySelector("#email");
  const reasonInput = document.querySelector("#reason");
  const bodyInput = document.querySelector("#body");

  validateName(nameInput);
  validateEmail(emailInput);
  validateReason(reasonInput);
  validateBody(bodyInput);

  if (document.querySelector(".validation-unsuccessful") !== null) return;

  const contactForm = document.querySelector("#contact-form");
  contactForm.submit();
});
