<?php
    $bg_clr = get_sub_field('background_color');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');
?>
<?php  
    $banner_without_slider= get_sub_field('banner_without_slider');
    // echo $banner_without_slider['heading'];
?>
<!-- banner without slider start -->
<section class="cmn_banner_without_slider" style="background-color: <?php echo $bg_clr ?>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text_wrap">
                    <h1 class="heading" style="color: <?php $banner_without_slider['heading_text_color']; ?>"><?php echo $banner_without_slider['heading']; ?></h1>
                    <p style="color: <?php $banner_without_slider['description_text_color']; ?>"><?php echo $banner_without_slider['description']; ?></p>
                    <?php if ($banner_without_slider['button'] != "") { ?>
                        <a class="banner_btn" href="<?php echo esc_url( $banner_without_slider['button']['url'] ); ?>"style="color:<?php echo $banner_without_slider['button_text_color']; ?>; background-color: <?php echo $banner_without_slider['button_bg_color']; ?>">
                        <?php echo esc_html( $banner_without_slider['button']['title'] ); ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img_wrap">
                    <img src="<?php echo esc_url($banner_without_slider['banner_image']['url']); ?>" alt="banner_image">
                </div>
            </div>
        </div>
    </div>

    <?php 
        if (!empty($shapes)) {
            foreach ($shapes as $shape) {
                if ($shape == 'Top Left') {
                   echo '<img src="' . esc_url($tleft['url']) . '" alt="" class="top-left">';
                }   elseif ($shape == 'Top Right') {
                    echo '<img src="' . esc_url($tright['url']) . '" alt="" class="top-right">';
                }   elseif ($shape == 'Bottom left') {
                    echo '<img src="' . esc_url($bleft['url']) . '" alt="" class="bottom-left">';
                }  elseif ($shape == 'Bottom Right') {
                    echo '<img src="' . esc_url($bright['url']) . '" alt="" class="bottom-right">';
                }  elseif ($shape == 'Left Center') {
                    echo '<img src="' . esc_url($lcenter['url']) . '" alt="" class="middle-left">';
                }  elseif ($shape == 'Right Center') {
                    echo '<img src="' . esc_url($rcenter['url']) . '" alt="" class="middle-right ">';
                }  else {
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