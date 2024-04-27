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
$both_side_text_and_image = get_sub_field('both_side_text_&_image');
if ($both_side_text_and_image) { 
    $left_visual = $both_side_text_and_image['left_side_visual'];
    $right_visual = $both_side_text_and_image['right_side_visual'];
    ?>
    
    <!-- iske liye to module nawa hi banega content and video wala  -->
    <section class="content_editor_module two_column_video_layout" style="background-color:<?php echo $bg_clr; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="main_hdng" style="color: <?php echo $both_side_text_and_image['heading_text_color'];?>">
                        <?php echo $both_side_text_and_image['heading']; ?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <div class="main_desc">
                        <?php echo $both_side_text_and_image['left_side_content']; ?>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <div class="main_desc">
                        <?php echo $both_side_text_and_image['right_side_content']; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <!-- video columns -->
                    <div class="two_elem">
                        <!-- 
                            if there is video section please use these attributes in following figure tag | 
                            data-target-el="hide-show-toggle" data-video="https://www.youtube.com/embed/MLpWrANjFbI?autoplay=1&mute=1"
                        -->
                        <figure data-target-el="hide-show-toggle" data-video="<?php echo esc_url($left_visual['video']['url']); ?>" class="mt-4">
                            <div class="hideElem">
                                <img src="<?php echo esc_url($left_visual['featured_image']['url']); ?>" alt="<?php echo esc_attr($left_visual['featured_image']['alt']); ?>" class="feat_img">
                            </div>
                        </figure>
                    
                        <div class="cntnt_wrap">
                            <h4 class="hdng">
                            <?php echo $left_visual['video_heading']; ?>
                            </h4>
                            <div class="desc">
                                <?php echo $left_visual['video_description']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <!-- video columns -->
                    <div class="two_elem">
                        <!-- 
                            if there is video section please use these attributes in following figure tag | 
                            data-target-el="hide-show-toggle" data-video="https://www.youtube.com/embed/MLpWrANjFbI?autoplay=1&mute=1"
                        -->
                        <figure data-target-el="hide-show-toggle" data-video="<?php echo esc_url($right_visual['video']['url']); ?>" class="mt-4">
                            <div class="hideElem">
                                <img src="<?php echo esc_url($right_visual['featured_image']['url']); ?>" alt="<?php echo esc_attr($right_visual['featured_image']['alt']); ?>" class="feat_img">
                            </div>
                        </figure>

                        <div class="cntnt_wrap">
                            <h4 class="hdng">
                                <?php echo $right_visual['video_heading']; ?>
                            </h4>
                            <div class="desc">
                                <?php echo $right_visual['video_description']; ?>
                            </div>
                        </div>
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
<?php }
?>