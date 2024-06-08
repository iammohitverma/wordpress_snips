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
$Text_visual_duo = get_sub_field('text_visual_duo');

if( have_rows('text_visual_duo') ): while ( have_rows('text_visual_duo') ) : the_row(); ?>
    <section class="colored_2_column_layout colored_repeater" style="background-color:<?php echo $bg_clr; ?>">
        <div class="container">
    <?php if( have_rows('text_and_visual_block') ): while ( have_rows('text_and_visual_block') ) : the_row();       
        $Alignment = get_sub_field('column_alignment');
        $heading = get_sub_field('heading');
        $heading_text_color = get_sub_field('heading_text_color');
        $content = get_sub_field('content');
        $image = get_sub_field('image');
        // $video = get_sub_field('video');
        // $video_featured_image = get_sub_field('video_featured_image');
        $button = get_sub_field('button');
        $button_text_color = get_sub_field('button_text_color');
        $button_bg_color = get_sub_field('button_bg_color'); ?>

        <?php if($Alignment == "Image On Right Side"){ ?>
            <div class="row d-flex align-items-center">
                <div class="col-12 col-sm-10 col-md-6  mt-4 mt-md-0">
                    <div class="inner">
                        <h2 class="hdng" style="color:<?php echo $heading_text_color; ?>">
                            <?php echo $heading; ?>
                        </h2>
                        <div class="desc" style="color:#6D6D6D">
                            <?php echo $content; ?>
                        </div>
                        <?php if ($button != "") { ?>
                            <a href="<?php echo esc_url($button['url']); ?>" class="brdr_btn black_btn" style="background-color: <?php echo $button_bg_color; ?>; color: <?php echo $button_text_color; ?>"><?php echo esc_html($button['title']); ?></a>
                        <?php } ?>
                       
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <?php if ($image != "") { ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
                       <?php } else{ ?>
                            
            <div class="row d-flex align-items-center">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <?php if ($image != "") { ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php } ?>
                        
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6  mt-4 mt-md-0">
                    <div class="inner">
                        <h2 class="hdng" style="color:<?php echo $heading_text_color; ?>">
                            <?php echo $heading; ?>
                        </h2>
                        <div class="desc" style="color:#6D6D6D">
                            <?php echo $content; ?>
                        </div>
                        <?php if ($button != "") { ?>
                            <a href="<?php echo esc_url($button['url']); ?>" class="brdr_btn black_btn" style="background-color: <?php echo $button_bg_color; ?>; color: <?php echo $button_text_color; ?>"><?php echo esc_html($button['title']); ?></a>
                        <?php } ?>
                       
                    </div>
                </div>
            </div>
                      <?php  } ?>
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

