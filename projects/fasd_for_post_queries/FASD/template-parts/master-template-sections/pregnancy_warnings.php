<?php
    $bg_clr = get_sub_field('section_background_color');
    $section_content = get_sub_field('section_content');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');
?>
<!-- iske liye to module nawa hi banega content and video wala  -->
<section class="content_editor_module" style="background-color:<?php echo $bg_clr; ?>">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="main_desc">
                        <?php echo $section_content; ?>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center three_image_layout_with_content">
            <?php

            // Check rows exists.
            if( have_rows('image_block') ):

                // Loop through rows.
                while( have_rows('image_block') ) : the_row();

                    // Load sub field value.
                    $image = get_sub_field('image');
                    $description = get_sub_field('description'); ?>
                    
                    <div class="col-12 col-sm-10 col-md-4 mt-4">
                    <div class="inner">
                        <figure>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class=>
                        </figure>
                        <p class="img_desc"><?php echo $description;?></p>
                    </div>
                </div>
               <?php // End loop.
                endwhile;

            // No value.
            else :
                // Do something...
            endif; ?>
            </div>
        </div>
    </section>