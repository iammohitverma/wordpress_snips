<?php
    $bg_clr = get_sub_field('section_background_color');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');

if( have_rows('both_side_text') ): while ( have_rows('both_side_text') ) : the_row(); ?>
<!-- both side editor section -->
<section class="two_column_only_content_list" style="background-color:<?php echo $bg_clr; ?>">
    <div class="container">
    <?php if( have_rows('text_block') ): while ( have_rows('text_block') ) : the_row();       

        $left_side_content= get_sub_field('left_side_content');
        $right_side_content= get_sub_field('right_side_content'); 
        $button= get_sub_field('button'); ?>
        <div class="row">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="main_desc">
                        <?php echo $left_side_content ?>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="main_desc">
                        <?php echo $right_side_content ?>
                    </div>
                    <?php
                    if ($button != "") { ?>
                        <a href="<?php echo esc_url($button['url']); ?>" class="brdr_btn list_btn"><?php echo esc_html($button['title']); ?></a>
                   <?php }
                    ?>
                    
                </div>
            </div>

    <?php endwhile; endif; ?>
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
<?php endwhile; endif;

?>

            
