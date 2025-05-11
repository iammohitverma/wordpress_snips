jQuery(".mohe-filter li").on("click", function () {
  const checkboxItem = jQuery(this);
  checkboxItem.toggleClass("checked");

  const selectedValue = checkboxItem.find("label").text().trim();
  const allProducts = jQuery(".product");

  allProducts.each(function () {
    const product = jQuery(this); // current product
    const stUtMain = product.find(".st_ut_main .a_wrap"); // inside current product
    const stUtListOptions = product.find(".st_ut_list [data-code]"); // all options inside current product
    const stUtListOption = product.find(
      `.st_ut_list [data-code="${selectedValue}"]`
    ); // find selected option from current product's options
    const previousIndex = parseInt(product.attr("previousitemindex")); // get previously moded item's index
    const currentitemcode = product.attr("currentitemcode"); // get previously moded item's index
    const currentMainAnchor = stUtMain.find("a"); // main anchor option inside current product

    // ✅ checkbox checked
    if (checkboxItem.hasClass("checked")) {
      debugger;
      if (stUtListOption.length && !previousIndex) {
        product.css("border", "2px solid green");
        if (currentMainAnchor.length) {
          const indexToMove = stUtListOptions.index(stUtListOption);
          stUtMain.empty().append(stUtListOption.clone());
          stUtListOption.after(currentMainAnchor);
          stUtListOption.remove();
          product.attr("previousitemindex", indexToMove);
          product.attr("currentitemcode", selectedValue);
        }
      } else if (previousIndex) {
        console.log("prevIndex already hai");
        stUtListOption.css("background", "#ED7D31");
      }
    } else {
      // ❌ checkbox unchecked
      debugger;
      if (
        currentMainAnchor.length &&
        previousIndex !== undefined &&
        previousIndex != -1
      ) {
        product.css("border", "2px solid red");
        if (selectedValue == currentitemcode) {
          const optionAnchor = stUtListOptions.eq(previousIndex);
          optionAnchor.after(currentMainAnchor);
          stUtMain.empty().append(optionAnchor.clone());
          optionAnchor.remove();

          product.removeAttr("previousitemindex");
          product.removeAttr("currentitemcode");
        } else {
          stUtListOption.css("background", "transparent");
        }
      }
    }
  });
});
