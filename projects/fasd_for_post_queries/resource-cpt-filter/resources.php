<?php /* Template Name: Resources */

get_header();
$bg_clr = get_field("section_background_color");
$bws = get_field("banner_without_slider");
$heading = $bws['heading'];
$hdg_color = $bws['heading_text_color'];
$desc = $bws['description'];
$desc_color = $bws['description_text_color'];
$banner_img_id = $bws['banner_image']['ID'];
$banner_img_url = $bws['banner_image']['url'];
$shapes = get_field("shapes");
// $right_center_shape = $shape['right_center_shape']['url'];
// $left_center_shape = $shape['left_center_shape']['url'];
// $bottom_right_shape = $shape['bottom_right_shape']['url'];
// $bottom_left_shape = $shape['bottom_left_shape']['url'];
// $top_right_shape = $shape['top_right_shape']['url'];
// $top_left_shape = $shape['top_left_shape']['url'];
?>

<!-- banner without slider start -->
<section class="cmn_banner_without_slider" style="background-color: <?php echo $bg_clr ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text_wrap">
                    <h1 class="heading" style="color: <?php echo $hdg_color ?>"><?php echo $heading; ?></h1>
                    <p style="color: <?php echo $desc_color ?>"><?php echo $desc; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img_wrap">
                    <img src="<?php echo esc_url($banner_img_url); ?>"
                        alt="banner_image">
                </div>
            </div>
        </div>
    </div>

    <!-- shapes for all corner | uncomment commented img tag-->
    <?php
    if (!empty($shapes)) {
        foreach ($shapes as $shape) {
            if ($shape == 'Top Left') {
                echo '<img src="' . esc_url($top_left_shape) . '" alt="" class="top-left">';
            } elseif ($shape == 'Top Right') {
                echo '<img src="' . esc_url($top_right_shape) . '" alt="" class="top-right">';
            } elseif ($shape == 'Bottom left') {
                echo '<img src="' . esc_url($bottom_left_shape) . '" alt="" class="bottom-left">';
            } elseif ($shape == 'Bottom Right') {
                echo '<img src="' . esc_url($bottom_right_shape) . '" alt="" class="bottom-right">';
            } elseif ($shape == 'Left Center') {
                echo '<img src="' . esc_url($left_center_shape) . '" alt="" class="middle-left">';
            } elseif ($shape == 'Right Center') {
                echo '<img src="' . esc_url($right_center_shape) . '" alt="" class="middle-right ">';
            } else {
                // Handle other cases if needed
                echo "Found something else: $shape\n";
            }
        }
    } else {
        // echo "No shapes selected.";
    }
    ?>
</section>
<!-- banner without slider end -->


<?php
    echo do_shortcode("[resources_posts_with_filter]");
?>

<?php get_footer(); ?>