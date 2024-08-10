<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package responsesystems-theme
 */

?>
<footer class="pt_80 pb_80">
    <div class="container">
        <div class="content">

        <?php if ( is_active_sidebar( 'footer-logo' ) ) : ?>
            <div class="logo_wrap">
                <?php dynamic_sidebar( 'footer-logo' ); ?>
            </div>
        <?php endif; ?>


        <?php if ( is_active_sidebar( 'footer-menu' ) ) : ?>
            <div class="footer_menu">
                <?php dynamic_sidebar( 'footer-menu' ); ?>
            </div>
        <?php endif; ?>
     
        <?php if ( is_active_sidebar( 'footer-sci' ) ) : ?>
            <div class="footer_sci">
                <?php dynamic_sidebar( 'footer-sci' ); ?>
            </div>
        <?php endif; ?>
    
        <?php if ( is_active_sidebar( 'footer-copyright' ) ) : ?>
            <div class="footer_copyright">
                <?php dynamic_sidebar( 'footer-copyright' ); ?>
            </div>
        <?php endif; ?>
        
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
