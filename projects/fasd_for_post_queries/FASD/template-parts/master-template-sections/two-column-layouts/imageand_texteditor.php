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
    $textandEditor = get_sub_field('visual_duo_&_text_editor');
    if ($textandEditor) {
        // echo $textandEditor['column_alignment'];
    }
    ?>
<!-- 1 side editor 1 side visual with video  -->
<section class="content_editor_module two_column_video_layout" style="background-color:<?php echo $bg_clr; ?>">
        <div class="container">
            <?php if ($textandEditor['column_alignment'] == "Image On Left Side") { ?>
                <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <?php if ($textandEditor['image_heading'] != "") { ?>
                            <h2 class="hdng" style="color: <?php echo $textandEditor['heading_text_color']; ?>">
                                <?php echo $textandEditor['image_heading']; ?>
                            </h2>
                        <?php } ?>
                        <div class="two_elem">
                        <figure class="videoAayegi" <?php if (!empty($textandEditor['video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($textandEditor['video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($textandEditor['featured_image']) && !empty($textandEditor['video'])) : ?>
                                <img src="<?php echo esc_url($textandEditor['featured_image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandEditor['featured_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($textandEditor['image']) && empty($textandEditor['video'])) : ?>
                                <img src="<?php echo esc_url($textandEditor['image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandEditor['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                            </div>
                        </figure>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <div class="main_desc">
                        <?php echo $textandEditor['content'] ?>
                    </div>
                </div>
            </div>
           <?php }else{ ?>
                <div class="row d-flex justify-content-center test">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="main_desc">
                        <?php echo $textandEditor['content'] ?>
                    </div>
                </div>
                 <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <?php if ($textandEditor['image_heading'] != "") { ?>
                            <h2 class="hdng" style="color: <?php echo $textandEditor['heading_text_color']; ?>">
                                <?php echo $textandEditor['image_heading']; ?>
                            </h2>
                        <?php } ?>
                        <div class="two_elem">
                        <figure class="videoAayegi" <?php if (!empty($textandEditor['video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($textandEditor['video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($textandEditor['featured_image']) && !empty($textandEditor['video'])) : ?>
                                <img src="<?php echo esc_url($textandEditor['featured_image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandEditor['featured_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($textandEditor['image']) && empty($textandEditor['video'])) : ?>
                                <img src="<?php echo esc_url($textandEditor['image']['url']); ?>"
                                    alt="<?php echo esc_attr($textandEditor['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                            </div>
                        </figure>
                    </div>
                    </div>
                </div>
            </div>
           <?php } ?>
            
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