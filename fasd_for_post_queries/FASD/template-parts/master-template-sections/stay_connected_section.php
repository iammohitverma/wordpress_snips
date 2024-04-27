<?php 
    $field_Group = acf_get_fields('group_661e55c728af6');
    if ($field_Group != "") {
       
        $BG_color = get_field('section_background_color', 'option');
        $section_heading =  get_field('section_heading', 'option');
        $heading_text_color = get_field('heading_text_color', 'option');
        $description = get_field('description', 'option');
        $description_text_color = get_field('description_text_color', 'option');
        $form_shortcode = get_field('form_shortcode', 'option');
        $bottom_heading = get_field('bottom_heading', 'option');
        $bottom_description = get_field('bottom_description', 'option');
        $shapes = get_field('shape', 'option');
        $tl_shape = get_field('top_left_shape', 'option');
        $bl_shape = get_field('bottom_left_shape', 'option');
        $tr_shape = get_field('top_right_shape', 'option');
        $br_shape = get_field('bottom_right_shape', 'option');
        $lc_shape = get_field('left_center_shape', 'option');
        $rc_shape = get_field('right_center_image', 'option');
    }
?>
 <section class="form_section pt_100 pb_100" style="background-color:<?php echo $BG_color ?>">
        <div class="container">
            <div class="inner">
                <div class="head">
                    <h2 class="fs_48 form_title" style="color:<?php echo $heading_text_color ?>"><?php echo $section_heading ?></h2>
                    <p style="color:<?php echo $description_text_color ?>"><?php echo $description ?></p>
                </div>
                <div class="form_wrap">
                   <?php echo do_shortcode("$form_shortcode") ?>
                </div>
                <div class="form_btm_content">
                    <h3><?php echo $bottom_heading ?></h3>
                    <p><?php echo $bottom_description ?></p>
                </div>
            </div>
        </div>
       <!-- shapes for all corner | uncomment commented img tag-->
    <?php 
        if (!empty($shapes)) {
            foreach ($shapes as $shape) {
                if ($shape == 'Top Left') {
                   echo '<img src="' . esc_url($tl_shape['url']) . '" alt="'. esc_attr($tl_shape['alt']) . '" class="top-left">';
                }   elseif ($shape == 'Top Right') {
                    echo '<img src="' . esc_url($tr_shape['url']) . '" alt="'. esc_attr($tr_shape['alt']) . '" class="top-right">';
                }   elseif ($shape == 'Bottom left') {
                    echo '<img src="' . esc_url($bl_shape['url']) . '" alt="'. esc_attr($bl_shape['alt']) . '" class="bottom-left">';
                }  elseif ($shape == 'Bottom Right') {
                    echo '<img src="' . esc_url($br_shape['url']) . '" alt="'. esc_attr($br_shape['alt']) . '" class="bottom-right">';
                }  elseif ($shape == 'Left Center') {
                    echo '<img src="' . esc_url($lc_shape['url']) . '" alt="'. esc_attr($lc_shape['alt']) . '" class="middle-left">';
                }  elseif ($shape == 'Right Center') {
                    echo '<img src="' . esc_url($rc_shape['url']) . '" alt="'. esc_attr($rc_shape['alt']) . '" class="middle-right ">';
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