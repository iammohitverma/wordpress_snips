/***************************************/
// set locations on session storage start
/***************************************/
window.addEventListener("DOMContentLoaded", function () {
  let allProgramHeadings = document.querySelectorAll(
    ".programme-heading-loop a"
  );
  function setLocationSessionOnHeading(e) {
    let currentProduct = e.target.closest(".product");
    let locationText = currentProduct.querySelector(".st_ut_main a").innerText;
    sessionStorage.setItem("currentLocation", locationText);
  }
  allProgramHeadings.forEach((element) => {
    element.addEventListener("click", setLocationSessionOnHeading);
  });

  let allUTLocations = document.querySelectorAll(".st_ut_dropdown a");
  function setLocationSessionOnAnchor(e) {
    let locationText = e.target.innerText;
    sessionStorage.setItem("currentLocation", locationText);
  }

  allUTLocations.forEach((element) => {
    element.addEventListener("click", setLocationSessionOnAnchor);
  });

  let savedLocation = sessionStorage.getItem("currentLocation");
  if (savedLocation) {
    let dynamicLocation = document.getElementById("dynamic_location");
    if (dynamicLocation) {
      dynamicLocation.innerText = savedLocation;
    }
  }
});
/***************************************/
// set locations on session storage end
/***************************************/
