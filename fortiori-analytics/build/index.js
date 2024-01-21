// MOBILE HEADER MENU BUTTON EVENT LISTENER
const mobileHeaderMenuOpenButton = document.querySelector(
  ".header-mobile__menu > .open"
);
const mobileHeaderMenuCloseButton = document.querySelector(
  ".header-mobile__menu > .close"
);
const mobileHeaderNavigation = document.querySelector(
  ".header-mobile__content"
);

mobileHeaderMenuOpenButton.addEventListener("click", () => {
  mobileHeaderMenuOpenButton.style.display = "none";
  mobileHeaderMenuCloseButton.style.display = "block";

  mobileHeaderNavigation.classList.remove("hidden");
  mobileHeaderNavigation.classList.add("shown");
});

mobileHeaderMenuCloseButton.addEventListener("click", () => {
  mobileHeaderMenuCloseButton.style.display = "none";
  mobileHeaderMenuOpenButton.style.display = "block";

  mobileHeaderNavigation.classList.remove("shown");
  mobileHeaderNavigation.classList.add("hidden");
});
