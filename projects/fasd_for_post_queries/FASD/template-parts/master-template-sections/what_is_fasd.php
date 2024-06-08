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

// Check rows exists.
if( have_rows('content_block') ): ?>
    <!-- iske liye to module nawa hi banega content and video wala  -->
    <section class="content_editor_module" style="background-color:<?php echo $bg_clr; ?>">
            <div class="container">
                <div class="row">
    <?php // Loop through rows.
    while( have_rows('content_block') ) : the_row();

        // Load sub field value.
        $left_side_content = get_sub_field('left_side_content');
        $right_side_content = get_sub_field('right_side_content'); ?>
                <div class="col-12 col-sm-12 col-md-2 mt-3">
                    <div class="main_desc">
                    <?php echo $left_side_content; ?>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-10 mt-3">
                    <div class="main_desc">
                    <?php echo $right_side_content; ?>
                    </div>
                </div>

    <?php // End loop.
    endwhile; ?>
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
<?php // No value.
else :
    // Do something...
endif;
?>
