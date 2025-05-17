// mohit's code start here
window.addEventListener("DOMContentLoaded", function () {
  /***************************************/
  // set locations on session storage start
  /***************************************/
  let allProgramHeadings = document.querySelectorAll(
    ".programme-heading-loop a"
  );
  function setLocationSessionOnHeading(e) {
    let currentProduct = e.target.closest(".product");
    let locationCode = currentProduct.querySelector(".st_ut_main a small");
    if (locationCode) {
      sessionStorage.setItem("currentLocation", locationCode.innerText);
    } else {
      sessionStorage.setItem("currentLocation", "");
    }
  }
  allProgramHeadings.forEach((element) => {
    element.addEventListener("click", setLocationSessionOnHeading);
  });

  let allUTLocations = document.querySelectorAll(
    ".st_ut_main a, .st_ut_list a"
  );
  function setLocationSessionOnAnchor(e) {
    let currAnchor = e.target;
    let locationText = currAnchor.querySelector("small").innerText;
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
  /***************************************/
  // set locations on session storage end
  /***************************************/

  /***************************************/
  // campus filter script start
  /***************************************/
  let checkedItems = [];
  let allLabels = document.querySelectorAll(".mohe-filter li label");

  /**************** FilterFun function here *************/
  function filterFun(state) {
    let productsLi = document.querySelectorAll(
      ".products.columns-3 li.product"
    );
    productsLi.forEach((product) => {
      let tmCampusBox = product.querySelector(".tm-campus-box");
      if (tmCampusBox) {
        let st_ut_main = tmCampusBox.querySelector(".st_ut_main .a_wrap");
        let st_ut_main_a = tmCampusBox.querySelector(".st_ut_main a");
        let location_wrap = tmCampusBox.querySelector(".location_wrap .a_wrap");
        let location_wrap_a = tmCampusBox.querySelector(
          ".location_wrap .a_wrap a"
        );
        let st_ut_list = tmCampusBox.querySelector(".st_ut_list");
        let st_ut_list_options = tmCampusBox.querySelectorAll(".st_ut_list a");
        let mohe_code = product.querySelector(".mohe-code a");

        st_ut_list_options?.forEach((option) => {
          let dataLoc = option
            .getAttribute("data-location")
            ?.replace(/\s+/g, " ")
            .trim();
          let optionClasses = option.classList;
          let dataCode = option.getAttribute("data-code");

          let optionClone = option.cloneNode(true);
          if (
            state == "checked" &&
            checkedItems.includes(dataLoc) &&
            !optionClasses.contains("selectedCheck")
          ) {
            st_ut_main.appendChild(option);
            location_wrap_a.remove();
            location_wrap.appendChild(optionClone);
            st_ut_list.appendChild(st_ut_main_a);
            mohe_code.innerText = dataCode;
            option.classList.add("selectedCheck");
          } else if (state == "unchecked") {
            if (dataLoc == "main" && checkedItems.length == 0) {
              st_ut_main_a.classList.remove("selectedCheck");
              st_ut_main.appendChild(option);
              location_wrap_a.remove();
              location_wrap.appendChild(optionClone);
              st_ut_list.appendChild(st_ut_main_a);
              mohe_code.innerText = dataCode;
            } else if (dataLoc == checkedItems[checkedItems.length - 1]) {
              st_ut_main_a.classList.remove("selectedCheck");
              st_ut_main.appendChild(option);
              location_wrap_a.remove();
              location_wrap.appendChild(optionClone);
              st_ut_list.appendChild(st_ut_main_a);
              mohe_code.innerText = dataCode;
            } else if (!checkedItems.includes(dataLoc)) {
              option.classList.remove("selectedCheck");
            }
          }
        });
      }
    });
  }

  /**************** CheckboxChecked function here *************/
  function checkboxChecked(e) {
    let currentLabel = e.target;

    let currentLabelVal = currentLabel.textContent.replace(/\s+/g, " ").trim(); //remove extra white space and sides space
    currentLabel.classList.toggle("checked");

    if (currentLabel.classList.contains("checked")) {
      // ✅
      checkedItems.push(currentLabelVal);
      // checkedItems.sort();
      filterFun("checked");
    } else {
      // 🟥
      const index = checkedItems.indexOf(currentLabelVal);
      if (index > -1) {
        checkedItems.splice(index, 1);
      }
      // checkedItems.sort();
      filterFun("unchecked");
    }
  }

  allLabels.forEach((element) => {
    element.addEventListener("click", checkboxChecked);
  });
  /***************************************/
  // campus filter script end
  /***************************************/
});
// mohit's code end here
