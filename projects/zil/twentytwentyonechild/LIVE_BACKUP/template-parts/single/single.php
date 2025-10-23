<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package twentytwentyonechild
 */




?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <?php echo the_content(); ?>


</div><!-- #post-<?php the_ID(); ?> -->