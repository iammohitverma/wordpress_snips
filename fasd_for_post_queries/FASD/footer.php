<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fasd-theme
 */

?>

<?php

// Replace 'field_name' with the name of your ACF field
$field_value = get_field('enabled_stay_connected');

// Check if the checkbox is checked
if ($field_value) {
    include get_template_directory() . '/template-parts/master-template-sections/stay_connected_section.php';
} 

?>
<footer class="fasd_footer">
    <div class="top_footer">
        <div class="container">
            <div class="tm_row col_5">
                <div class="tm_col footer_logo">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php endif; ?>
                </div>
                <div class="tm_col">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php endif; ?>
                </div>
                <div class="tm_col">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    <?php endif; ?>
                </div>
                <div class="tm_col">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-4' ); ?>
                    <?php endif; ?>
                </div>
                <div class="tm_col">
                    <!-- <div class="contact_us_sci"> -->
                        <?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-5' ); ?>
                        <?php endif; ?>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright_footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="copyright_links">
                        <?php if ( is_active_sidebar( 'copyright_left' ) ) : ?>
                            <?php dynamic_sidebar( 'copyright_left' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="copyright_right">
                        <?php if ( is_active_sidebar( 'copyright_right' ) ) : ?>
                            <?php dynamic_sidebar( 'copyright_right' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
