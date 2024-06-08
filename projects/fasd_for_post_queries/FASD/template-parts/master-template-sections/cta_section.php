<?php
    $bg_clr = get_sub_field('section_bg_color');
    $sec_hdg = get_sub_field('heading');
    $description = get_sub_field('description');
    $description_clr= get_sub_field('description_color');
    // echo $sec_hdg;
    $sec_hdg_clr = get_sub_field('heading_color');
    $button = get_sub_field('button');
    $button_bg_color = get_sub_field('button_bg_color');
    $button_text_color = get_sub_field('button_text_color');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');
?>
    <!-- cta -->
    <section class="colored_2_column_layout cta_sec" style="background-color: <?php echo $bg_clr; ?>">
        <div class="container">
            <div class="row d-flex align-items-center text-center">
                <div class="col-12 col-sm-12">
                    <div class="inner">
                        <h2 class="hdng mx-auto w-100" style="color: <?php echo $sec_hdg_clr; ?>">
                            <?php echo $sec_hdg; ?>
                        </h2>
                        <div class="main_desc" style="color: <?php echo $description_clr; ?>">
                            <?php echo $description; ?>
                        </div>
                        <?php if ($button != "") { ?>
                            <a href="<?php echo esc_url($button['url']); ?>" class="brdr_btn black_btn" style="color: <?php echo $button_text_color; ?>; 
                            background-color: <?php echo $button_bg_color; ?>;
                            border-color: <?php echo $button_bg_color; ?> "><?php echo esc_html($button['title']); ?></a>
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