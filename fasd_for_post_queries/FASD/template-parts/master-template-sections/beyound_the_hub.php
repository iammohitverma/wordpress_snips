    <!-- This Section is used on following pages ||  Start -->
    <!-- For Justice Professionals
    For Aboriginal + Torres Strait Islander Communities
    For People with FASD, Parents and Carers
    For Pregnancy + Breastfeeding
    For Policy Makers
    For Educators
    Assessment & Diagnosis -->
    <?php
        $bg_clr = get_sub_field('section_background');
        $sec_hdg = get_sub_field('section_heading');
        $desc = get_sub_field('description');
        $select_post_type = get_sub_field('select_post_type');
        $shapes = get_sub_field('shapes');
        $tleft = get_sub_field('top_left_shape');
        $tright = get_sub_field('top_right_shape');
        $bleft = get_sub_field('bottom_left_shape');
        $bright = get_sub_field('bottom_right_shape');
        $lcenter = get_sub_field('left_center_shape');
        $rcenter = get_sub_field('right_center_shape');
    ?>

    <?php

if ($select_post_type) { ?>
    <section class="content_editor_module" style="background: <?php echo $bg_clr ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex align-items-center">
                    <h3 class="main_hdng">
                        <?php echo $sec_hdg ?>
                    </h3>
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-center mt-3 mt-lg-0">
                    <p class="main_desc">
                        <?php echo $desc ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <!-- Provide option for carousel in admin panel | if user select carousel option then this ID will add in following element "beyond_da_hub_slider" -->
                    <div class="owl-carousel owl-theme beyond_da_hub_slider">
                        <?php foreach( $select_post_type as $post ){
                            setup_postdata($post);?>
                        <div class="item">
                            <div class="box">
                                <div class="image_wrap">
                                    <figure>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                                        <a href="<?php echo get_the_permalink(); ?>" class="link_arrow">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </figure>
                                </div>
                                <div class="content_wrap">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <h4 class="hdng">
                                            <?php echo get_the_title(); ?>
                                        </h4>
                                    </a>
                                    <p class="desc">
                                        <?php echo get_the_content(); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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
    <?php }else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata(); ?>