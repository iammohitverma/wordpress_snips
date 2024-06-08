<?php

$BG_color = get_sub_field('section__background_color');
$Heading = get_sub_field('section_heading');
$Heading_text_clr = get_sub_field('heading_text_color');
$shapes = get_sub_field('shapes');
$tleft = get_sub_field('top_left_shape');
$tright = get_sub_field('top_right_shape');
$bleft = get_sub_field('bottom_left_shape');
$bright = get_sub_field('bottom_right_shape');
$lcenter = get_sub_field('left_center_shape');
$rcenter = get_sub_field('right_center_shape');
?>

<?php
$featured_posts = get_sub_field('select_post_type');
//print_r($featured_posts);
if( $featured_posts ): ?>
   <section class="latest_news">
        <div class="latest_news_wrap" style="background-color: <?php echo $BG_color; ?>">
            <div class="container">
                <div class="latest_news_heading">
                    <h3 style="color: <?php echo $Heading_text_clr; ?>"><?php echo $Heading; ?></h3>
                </div>
            <div class="latest_news_content">
                <?php $count = 0;  
                    foreach( $featured_posts as $post ): 
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>
                     <div class="latest_news_card <?php if ($count != 0) {
                        echo "news_right_cards";
                    } ?>">
                        <div class="card_image">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo the_post_thumbnail_caption(); ?>">
                        </div>
                        <div class="card_details">
                            <div class="card_date">
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="card_heading">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <h3><?php echo get_the_title(); ?></h3>
                                </a>
                            </div> 
                            <?php if ($count == 0) { ?>
                                <div class="card_desc">
                                <p><?php echo get_the_content(); ?></p>
                            </div>
                           <?php } ?>
                            
                        </div>
                    </div>
                        
                    <?php
                    $count++;  ?>
                <?php endforeach; ?>
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
<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>



































