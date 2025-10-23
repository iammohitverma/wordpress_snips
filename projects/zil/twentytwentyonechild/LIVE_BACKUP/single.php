<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package twentytwentyonechild
 */

get_header();
?>

<div class="" id="single-<?php echo get_post_type(); ?>">
	<?php
	while (have_posts()):
		the_post();
		get_template_part('template-parts/single/single', get_post_type());
	endwhile; // End of the loop.
	?>
</div>
<?php get_footer(); ?>