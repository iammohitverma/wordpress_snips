<?php 
$Section_BG_color = get_sub_field('section_background_color');
$Select_post_type = get_sub_field('select_post');
$shapes = get_sub_field('shapes');
$tleft = get_sub_field('top_left_shape');
$tright = get_sub_field('top_right_shape');
$bleft = get_sub_field('bottom_left_shape');
$bright = get_sub_field('bottom_right_shape');
$lcenter = get_sub_field('left_center_shape');
$rcenter = get_sub_field('right_center_shape');
// echo $Select_post_type;
if ($Select_post_type) {
    $args = array(
        'post_type' => $Select_post_type,
        'post_status' => 'publish',
        'posts_per_page' => '3',
        'orderby'=>'ID',
    );
// The Query.
$the_query = new WP_Query( $args );

// The Loop.
if ( $the_query->have_posts() ) { ?>
	<section class="content_editor_module pt-0" style="background-color:<?php echo $Section_BG_color; ?>">
        <div class="container">
            <div class="row d-flex justify-content-center">
	<?php while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
		        <div class="col-12 col-sm-10 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="post_image" />


                                <a href="<?php echo get_the_permalink(); ?>" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <p class="tagsSec">
                                <?php echo ucfirst(get_post_type()); ?>
                            </p>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <h4 class="hdng">
                                    <?php echo get_the_title(); ?>
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
	<?php } ?>
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
<?php } else {
	
}
// Restore original Post Data.
wp_reset_postdata();
} ?>