document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".open-popup");
  const popup = document.getElementById("popup-modal");
  const popupTitle = document.getElementById("popup-title");
  const popupDescription = document.getElementById("popup-description");
  const closePopup = document.querySelector(".close-popup");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      const index = this.getAttribute("data-index"); // Get index from button
      const data = popupData[index]; // Fetch data from JavaScript array

      popupTitle.textContent = data.title;
      popupDescription.textContent = data.description;
      popup.style.display = "flex";
    });
  });

  closePopup.addEventListener("click", function () {
    popup.style.display = "none";
  });

  popup.addEventListener("click", function (event) {
    if (event.target === popup) {
      popup.style.display = "none";
    }
  });
});
