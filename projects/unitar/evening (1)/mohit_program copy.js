var firstTimeCheck;
jQuery(".mohe-filter li").on("click", function () {
  jQuery(this).toggleClass("checked");
  if (jQuery(".mohe-filter li.checked").length > 0) {
    firstTimeCheck = true;
  } else {
    // firstTimeCheck = false;
  }

  var prevIndex = -1; // initially set kia hai -1

  if (firstTimeCheck) {
    var selectedValue = jQuery(this).find("label").text().trim();
    var allProducts = jQuery(".product");
    jQuery(allProducts).each(function () {
      var product = jQuery(this);
      var previousitemindex = product.attr("previousitemindex");
      var stUtListOptions = product.find(".st_ut_list [data-code]");
      var stUtListOption = product.find(
        '.st_ut_list [data-code="' + selectedValue + '"]'
      );
      // find hone par uski position change krna
      if (stUtListOption.length && !previousitemindex) {
        product.css("border", "2px solid red");
        var anchorToMove = stUtListOption; //jis anchor ko move krna hai
        var stUtMain = product.find(".st_ut_main"); //main ke andr move krna hai
        var prevAnchor = stUtMain.find("a"); // main ka anchor
        if (prevAnchor.length) {
          // agar anchor exist krta hai
          prevIndex = stUtListOptions.index(stUtListOption); //index find krna jisko move krna hai
          stUtMain.empty().append(anchorToMove.clone()); // pehle main ko empty krna hai fr uske andr append krna hai
          stUtListOption.after(prevAnchor); // options ke andr main ke anchor ko add krna hai
          stUtListOption.remove(); // baad m option ko remove krna hai
        }
        product.attr("previousItemIndex", prevIndex);
      }
    });
  }
});
