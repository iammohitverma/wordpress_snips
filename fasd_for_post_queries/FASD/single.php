<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fasd-theme
 */

get_header();
?>

<div class="container-fluid p-0" id="single-post">
	<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/single/single', get_post_type() );
		endwhile; // End of the loop.
	?>
</div>
<?php get_footer();?>