 <!-- colored 2 Column Layout  -->
 <?php
    $bg_clr = get_sub_field('section_background_color');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');
    ?>
    <?php
    $textandimage = get_sub_field('text_&_image_duo');
    if( $textandimage ): 
        $alignment_selection = get_sub_field('column_alignment');
        // echo $textandimage['column_alignment'];
        $heading = get_sub_field('heading');
        $hdg_clr = get_sub_field('heading_text_color');
        $description = get_sub_field('description');
        $description_text_color = get_sub_field('description_text_color');
        $button = get_sub_field('button');
        $button_text_color = get_sub_field('button_text_color');
        $button_bg_color = get_sub_field('button_bg_color');
        $image = get_sub_field('image');
        $select_video = get_sub_field('select_video');
        $video_featured_image = get_sub_field('video_featured_image');
        
    ?>
    <section class="colored_2_column_layout"style="background: <?php echo $bg_clr ?>">
        <div class="container">

            <!-- if set two condition here for both different code will work 😊 -->
            <?php if ($textandimage['column_alignment'] == "Image On Left Side") { ?>

                <!-- isme image right me hai and mobile me top par aayegi using css -->
                <div class="row d-flex align-items-center flex-column-reverse flex-md-row">
                    <div class="col-12 col-sm-10 col-md-6 mt-4 mt-md-0">
                        <div class="two_elem">
                        <figure class="videoAayegi" <?php if (!empty($textandimage['select_video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($textandimage['select_video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($textandimage['video_featured_image']) && !empty($textandimage['select_video'])) : ?>
                                <img src="<?php echo esc_url($textandimage['video_featured_image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandimage['video_featured_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($textandimage['image']) && empty($textandimage['select_video'])) : ?>
                                <img src="<?php echo esc_url($textandimage['image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandimage['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                            </div>
                        </figure>
                        </div>
                    </div>
                    <div class="col-12 col-sm-10 col-md-6">
                        <div class="inner">
                            <h2 class="hdng" style="color:<?php echo esc_html( $textandimage['heading_text_color'] ); ?>">
                                <?php echo $textandimage['heading']; ?>
                            </h2>
                            <p class="desc" style="color:<?php echo esc_html( $textandimage['description_text_color'] ); ?>">
                            <?php echo $textandimage['description']; ?>
                            </p>
                            <?php if ($textandimage['button'] != "") { ?>
                                <a class="brdr_btn black_btn" href="<?php echo esc_url( $textandimage['button']['url'] ); ?>">
                                <?php echo esc_html( $textandimage['button']['title'] ); ?></a>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>

            <?php } else{ ?>

                <!-- isme image left me hai using css and mobile me top par aayegi without css -->
                <div class="row d-flex align-items-center flex-column-reverse flex-md-row">
                    <div class="col-12 col-sm-10 col-md-6">
                        <div class="inner">
                            <h2 class="hdng" style="color:<?php echo esc_html( $textandimage['heading_text_color'] ); ?>">
                                <?php echo $textandimage['heading']; ?>
                            </h2>
                            <p class="desc" style="color:<?php echo esc_html( $textandimage['description_text_color'] ); ?>">
                            <?php echo $textandimage['description']; ?>
                            </p>
                            <?php if ($textandimage['button'] != "" ) { ?>
                                <a class="brdr_btn black_btn" href="<?php echo esc_url( $textandimage['button']['url'] ); ?>">
                                <?php echo esc_html( $textandimage['button']['title'] ); ?></a>
                            <?php } ?>
                       
                        </div>
                    </div>
                    <div class="col-12 col-sm-10 col-md-6 mt-4 mt-md-0">
                        <div class="two_elem">
                        <figure class="videoAayegi" <?php if (!empty($textandimage['select_video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($textandimage['select_video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($textandimage['video_featured_image']) && !empty($textandimage['select_video'])) : ?>
                                <img src="<?php echo esc_url($textandimage['video_featured_image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandimage['video_featured_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($textandimage['image']) && empty($textandimage['select_video'])) : ?>
                                <img src="<?php echo esc_url($textandimage['image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandimage['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                            </div>
                        </figure>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
    <?php endif; ?>