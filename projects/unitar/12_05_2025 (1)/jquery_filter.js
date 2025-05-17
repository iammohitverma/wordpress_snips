/***************************************/
// campus filter script start
/***************************************/
let mohFilterChecboxesArray = [];
jQuery(".mohe-filter li").on("click", function () {
  let checkboxItem = jQuery(this);
  checkboxItem.toggleClass("checked");

  let selectedValue = checkboxItem.find("label").text().trim();
  let allProducts = jQuery(".product");

  // ✅ checkbox checked
  if (checkboxItem.hasClass("checked")) {
    mohFilterChecboxesArray.push(selectedValue);
  } else {
    // ❌ checkbox unchecked
    let index = mohFilterChecboxesArray.indexOf(selectedValue);
    if (index !== -1) {
      mohFilterChecboxesArray.splice(index, 1);
    }
  }
  allProducts.each(function () {
    let product = jQuery(this); // current product
    let stUtMain = product.find(".st_ut_main .a_wrap"); // inside current product
    let stUtMainHeading = product.find(".location_wrap .a_wrap");
    let stUtListOptions = product.find(".st_ut_list [data-location]"); // all options inside current product
    let stUtListOption = product.find(
      `.st_ut_list [data-location="${selectedValue}"]`
    ); // find selected option from current product's options
    let previousIndex = parseInt(product.attr("previousitemindex")); // get previously moded item's index
    let currentitemcode = product.attr("currentitemcode"); // get previously item's index
    let currentMainAnchor = stUtMain.find("a"); // main anchor option inside current product

    // ✅ checkbox checked
    if (checkboxItem.hasClass("checked")) {
      if (stUtListOption.length) {
        if (currentMainAnchor.length) {
          let indexToMove = stUtListOptions.index(stUtListOption);
          stUtMain.empty().append(stUtListOption.clone());
          stUtMainHeading.empty().append(stUtListOption.clone());
          stUtListOption.after(currentMainAnchor);
          stUtListOption.remove();
          product.attr("previousitemindex", indexToMove);
          product.attr("currentitemcode", selectedValue);
        }
      }
    } else {
      // ❌ checkbox unchecked
      if (currentMainAnchor.length) {
        if (selectedValue == currentitemcode) {
          let optionAnchor = stUtListOptions.eq(previousIndex);
          optionAnchor.after(currentMainAnchor);
          stUtMain.empty().append(optionAnchor.clone());
          stUtMainHeading.empty().append(optionAnchor.clone());
          optionAnchor.remove();

          product.removeAttr("previousitemindex");
          product.removeAttr("currentitemcode");
        }
      }
    }
    // ✅ Set background colors of selected items
    stUtListOptions = product.find(".st_ut_list [data-location]");
    stUtListOptions.each(function () {
      let option = jQuery(this);
      let optionValue = option.attr("data-location");

      if (mohFilterChecboxesArray.includes(optionValue)) {
        option.addClass("selectedCheck");
      } else {
        option.removeClass("selectedCheck");
      }
    });
  });
});

/***************************************/
// campus filter script end
/***************************************/
