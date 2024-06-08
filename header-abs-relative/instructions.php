<!-- header file-->
<?php
    $header_transparent_disabled = get_field('header_transparent_disabled');
    $is_header_transparent_disabled = $header_transparent_disabled['value'];
    $header = "absolute";
    if($is_header_transparent_disabled == "yes") {
        $header = "relative";
    }
?>
<body <?php body_class(); ?> data-pageId="<?php echo get_the_id() ?>" data-header="<?php echo $header;?>">

<!-- css -->
<style>
body {
    &[data-header="relative"] {
        padding-top: var(--headerHeight);

        .main_header {
            background-color: $clr_292929;
        }
    }
}
</style>


<!-- js -->
<script>
$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $(".main_header").addClass("sticky");
    } else {
      $(".main_header").removeClass("sticky");
    }
  });
  let headerHeight = $(".main_header").outerHeight();
  $("body")[0].style.setProperty("--headerHeight", headerHeight + "px");
</script>