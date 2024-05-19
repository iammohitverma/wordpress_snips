(function ($) {
  $(document).ready(function () {
    var collapseButtonClass = "collapse-all";

    // Add a clickable link to the label line of flexible content fields
    $(".acf-field-flexible-content > .acf-label").append(
      '<a class="' +
      collapseButtonClass +
      '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>'
    );

    // Toggle function for collapsing/expanding all flexible content items
    $("." + collapseButtonClass).on("click", function () {
      var allCollapsed = $(".acf-flexible-content .layout");
      if (allCollapsed) {
        $(".acf-fc-layout-handle").each(function (index) {
          jQuery(this).click();
        });
      }
    });

    // append layout value to ACF handle
    function updateLayoutValues() {
      jQuery("[data-name='type_of_layout']").each(function (index) {
        let layoutValue = jQuery(this).find("select").val();
        let layoutHandle = jQuery(this)
          .closest(".layout")
          .find(".acf-fc-layout-handle");

        jQuery(layoutHandle).attr("data-layout", " - " + layoutValue);
      });
    }
    // Run the function on page load
    updateLayoutValues();

    function moveHeadingTagFun() {
      // append heading tags field to heading field
      jQuery("[data-name='select_heading_tag']").each(function (index) {
        let selectField = jQuery(this).find(".acf-input");
        jQuery(selectField).addClass("selectTag");
        console.log("selectField " + selectField);

        // jQuery(this)
        //   .closest(".acf-fields")
        //   .find("[data-name='heading'] .acf-input")
        //   .append(selectField);

        // jQuery(this).remove();

        jQuery(this).next(".acf-field").find(".acf-input").append(selectField);

        jQuery(this).remove();
      });
    }

    // Run the function on page load
    moveHeadingTagFun();

    // Bind the function to a click event
    jQuery(document).on("click", function () {
      // You may want to add some conditions here to determine when to run the function,
      // for example, if a specific element is clicked.
      updateLayoutValues();

      jQuery("[data-name='type_of_layout'] select").on("change", function () {
        let layoutValue = jQuery(this).val();
        console.log(layoutValue);
        let layoutHandle = jQuery(this)
          .closest(".layout")
          .find(".acf-fc-layout-handle");

        jQuery(layoutHandle).attr("data-layout", " - " + layoutValue);
      });
    });
  });
})(jQuery);
