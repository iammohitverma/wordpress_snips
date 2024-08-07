<!-- About section -->
<?php
            $bg_clr = get_sub_field('section_background_color');
            $sec_hdg = get_sub_field('heading');
            //$sec_hdg_clr = get_sub_field('heading_text_color');
            $button = get_sub_field('button');
            //$btn_clr = get_sub_field('button_bg_color');
            //$btn_txt_clr = get_sub_field('button_text_color');
            $shapes = get_sub_field('shapes');
            $tleft = get_sub_field('top_left_shape');
            $tright = get_sub_field('top_right_shape');
            $bleft = get_sub_field('bottom_left_shape');
            $bright = get_sub_field('bottom_right_shape');
            $lcenter = get_sub_field('left_center_shape');
            $rcenter = get_sub_field('right_center_shape');
            ?>
<section class="content_editor_module about_fasd" style="background-color:<?php echo $bg_clr ?>">
    <div class="container">
        <?php if (!empty($sec_hdg)) { ?>
        <div class="row">
            <div class="col-12 col-md-6 d-flex align-items-center">
                <h3 class="main_hdng">
                    <?php echo $sec_hdg; ?>
                </h3>
            </div>
            <?php if (!empty($button)) { ?>
            <div class="col-12 col-md-6 d-flex align-items-center mt-3 mt-lg-0">
                <a class="brdr_btn" href="<?php echo esc_url($button['url']); ?>">
                    <?php echo esc_html($button['title']); ?></a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if( have_rows('blocks') ): ?>
        <div class="row">
            <?php
                while( have_rows('blocks') ) : the_row();
                    $image = get_sub_field('image');
                    $video = get_sub_field('select_video');
                    $video_featured_img = get_sub_field('video_featured_image');
                    $title = get_sub_field('title');
                    $short_desc = get_sub_field('short_description');
                    $link = get_sub_field('link');

                ?>
            <div class="col-12 col-sm-12 col-md-4 mt-5">
                <div class="box">
                    <div class="image_wrap">
                        <!-- 
                                if there is video section please use these attributes in following figure tag | 
                                data-target-el="hide-show-toggle" data-video="https://www.youtube.com/embed/MLpWrANjFbI?autoplay=1&mute=1"
                            -->
                        <!-- data-target-el="hide-show-toggle" data-video="http://52.64.249.237/wp-content/uploads/2024/04/test.mp4" -->

                        <figure class="videoAayegi" <?php if (!empty($video)) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($video['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($video_featured_img)) : ?>
                                <img src="<?php echo esc_url($video_featured_img['url']); ?>"
                                    alt="<?php echo esc_attr($video_featured_img['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($image) && empty($video)) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                                <?php if (!empty($link)) { ?>
                                <a class="link_arrow" href="<?php echo esc_url($link['url']); ?>">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <?php } ?>
                            </div>
                        </figure>
                    </div>
                    <div class="content_wrap">
                        <h4 class="hdng">
                            <?php echo $title ?>
                        </h4>
                        <p class="desc">
                            <?php echo $short_desc ?>
                        </p>
                    </div>
                </div>
            </div><?php // End loop.
                endwhile;?>
        </div>
        <?php
            // No value.
                else :
                // Do something...
                endif; ?>
    </div>
    <!-- shapes -->
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