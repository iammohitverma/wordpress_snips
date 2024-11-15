jQuery(document).ready(function () {
  // init Isotope
  var $grid = $(".grid").isotope({
    // options
    transitionDuration: 1000,
  });
  // filter items on button click
  $(".filter-button-group").on("click", "button", function () {
    $(this).siblings().removeClass("is-checked");
    $(this).addClass("is-checked");
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });
});
