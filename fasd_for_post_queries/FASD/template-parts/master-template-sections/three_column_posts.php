<?php 
$heading = get_sub_field('heading');

$args = array(
    'post_type' => 'resource',
    'post_status' => 'publish',
);
// The Query.
$the_query = new WP_Query( $args );

// The Loop.
if ( $the_query->have_posts() ) { ?>
	<section class="content_editor_module pt-0" style="background-color:#eef0e7">
        <div class="container">
            <div class="row d-flex justify-content-center">
	<?php while ( $the_query->have_posts() ) {
		$the_query->the_post(); ?>
		        <div class="col-12 col-sm-10 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="post_image" />


                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <p class="tagsSec">
                                Resources
                            </p>
                            <h4 class="hdng">
                                <?php echo get_the_title(); ?>
                            </h4>
                        </div>
                    </div>
                </div>
	<?php } ?>
	        </div>
        </div>
    </section>
<?php } else {
	
}
// Restore original Post Data.
wp_reset_postdata();

 ?>