    <!-- Form Section | this is common form across the complete website -->
    <?php
            // $bg_clr = get_sub_field('section');
            // $sec_hdg = get_sub_field('section_heading');
            // $description = get_sub_field('description');
            // $btm_hdg = get_sub_field('bottom_heading');
            // $btm_desc = get_sub_field('bottom_description');
            // $desc_clr = get_sub_field('description_text_color');
            // $sec_hdg_clr = get_sub_field('heading_text_color');
            // $sec_hdg_clr = get_sub_field('heading_text_color');
            // $button = get_sub_field('button');
            // $btn_clr = get_sub_field('button_bg_color');
            // $btn_txt_clr = get_sub_field('button_text_color');
            // $shapes = get_sub_field('shapes');
            // $tleft = get_sub_field('top_left_shape');
            // $tright = get_sub_field('top_right_shape');
            // $bleft = get_sub_field('bottom_left_shape');
            // $bright = get_sub_field('bottom_right_shape');
            // $lcenter = get_sub_field('left_center_shape');
            // $rcenter = get_sub_field('right_center_shape');
            ?>

    <?php 
        $field_Group = 'group_661cb2a328aed';
        $fields = acf_get_fields($field_Group);
        if ($fields) {
            $section_heading = get_field('section_heading');
            print_r($section_heading);
        }
    ?>
    <section class="form_section pt_100 pb_100" style="background-color:<?php echo $bg_clr ?>">
        <div class="container">
            <div class="inner">
                <div class="head">
                    <h2 class="fs_48 form_title" style="color:<?php echo $sec_hdg_clr ?>"><?php echo $sec_hdg ?></h2>
                    <p style="color:<?php echo $desc_clr ?>"><?php echo $description ?></p>
                </div>
                <div class="form_wrap">
                    <?php echo do_shortcode( '[email-subscribers-form id="2"]' ); ?>
                </div>
                <div class="form_btm_content">
                    <h3><?php echo $btm_hdg ?></h3>
                    <p><?php echo $btm_desc ?></p>
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