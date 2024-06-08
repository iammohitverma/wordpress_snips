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

if( have_rows('banner_with_slider') ): while ( have_rows('banner_with_slider') ) : the_row(); ?>
<section class="global_banner <?php if (is_front_page()) { ?>home_page<?php } else { ?>inner_pages<?php } ?>" style="background: <?php echo $bg_clr ?>">
    <div class="container">
        <div class="owl-carousel owl-theme" id="global_banner">
    <?php if( have_rows('banner') ): while ( have_rows('banner') ) : the_row();       
            
            $heading = get_sub_field('heading');
            $hdg_color = get_sub_field('heading_text_color');
            $desc = get_sub_field('description');
            $desc_color = get_sub_field('description_text_color');
            $banner_img = get_sub_field('banner_image');
            $button = get_sub_field('button');
            $btn_clr = get_sub_field('button_bg_color');
            $btn_txt_clr = get_sub_field('button_text_color'); 
            ?>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <h1 class="hdng" style="color: <?php echo $hdg_color ?>">
                            <?php echo $heading  ?>
                        </h1>
                        <p class="desc" style="color: <?php echo $desc_color ?>">
                             <?php echo $desc  ?>
                        </p> 
                        <?php if (!empty($button)) { ?>                        
                          <a class="banner_btn" href="<?php echo esc_url( $button['url'] ); ?>"style="color:<?php echo $btn_txt_clr;?>; background-color: <?php echo $btn_clr;?>">
                            <?php echo esc_html( $button['title'] ); ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6 mt-4 mt-md-0">
                    <?php if ($banner_img != "") { ?>
                        <figure>
                            <img class="hero_img" src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>" />
                        </figure>
                    <?php } ?>
                </div>
            </div>
        
    <!-- shapes for all corner | uncomment commented img tag-->
    
   <?php endwhile; endif; ?>
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
<?php endwhile; endif;

?>
