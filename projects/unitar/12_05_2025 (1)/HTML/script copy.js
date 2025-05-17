/***************************************/
// campus filter script start
/***************************************/
let checkedItems = [];
let allLabels = document.querySelectorAll(".mohe-filter li label");

/**************** FilterFun function here *************/
function filterFun(state) {
  let productsLi = document.querySelectorAll(".products.columns-3 li");
  productsLi.forEach((product) => {
    let tmCampusBox = product.querySelector(".tm-campus-box");
    let st_ut_main = tmCampusBox.querySelector(".st_ut_main .a_wrap");
    let st_ut_main_a = tmCampusBox.querySelector(".st_ut_main a");
    let st_ut_list = tmCampusBox.querySelector(".st_ut_list");
    let st_ut_list_options = tmCampusBox.querySelectorAll(".st_ut_list a");

    st_ut_list_options.forEach((option) => {
      let dataLoc = option
        .getAttribute("data-location")
        .replace(/\s+/g, " ")
        .trim();
      let optionClasses = option.classList;
      if (
        state == "checked" &&
        checkedItems.includes(dataLoc) &&
        !optionClasses.contains("selectedCheck")
      ) {
        st_ut_main.appendChild(option);
        st_ut_list.appendChild(st_ut_main_a);
        option.classList.add("selectedCheck");
      } else if (state == "unchecked") {
        if (dataLoc == "main" && checkedItems.length == 0) {
          st_ut_main_a.classList.remove("selectedCheck");
          st_ut_main.appendChild(option);
          st_ut_list.appendChild(st_ut_main_a);
        } else if (dataLoc == checkedItems[checkedItems.length - 1]) {
          st_ut_main_a.classList.remove("selectedCheck");
          st_ut_main.appendChild(option);
          st_ut_list.appendChild(st_ut_main_a);
        } else if (!checkedItems.includes(dataLoc)) {
          option.classList.remove("selectedCheck");
        }
      }
    });
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
  console.log(checkedItems);
}

allLabels.forEach((element) => {
  element.addEventListener("click", checkboxChecked);
});
/***************************************/
// campus filter script end
/***************************************/
