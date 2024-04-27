<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techmind-theme
 */

?>
<?php
    $bg_clr = get_sub_field('section_background');
    $sec_hdg = get_sub_field('section_heading');
    $sec_hdg_clr = get_sub_field('heading_text_color');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');
?>
    <section class="seeking_info" style="background: <?php echo $bg_clr ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="main_hdng" style="color: <?php echo $sec_hdg_clr ?>">
                         <?php echo $sec_hdg  ?>
                    </h2>
                </div>
            </div>
            <?php if( have_rows('topics') ): ?>
            <div class="row">
            <?php
                while( have_rows('topics') ) : the_row();
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                ?>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                           <?php echo $title  ?>
                        </h4>
                        <figure>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </figure>
                        <a href="<?php echo esc_attr($link['url']);?>" class="absolute_link" target="<?php echo esc_attr($link['target']); ?>"></a>
                    </div>
                </div>
                <?php // End loop.
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
