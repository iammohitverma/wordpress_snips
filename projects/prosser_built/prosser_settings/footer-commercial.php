<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prosserbuilt-theme
 */

?>

<?php
    //get acf values
    $commercial_footer_logo = get_field('commercial_footer_logo', 'option');
    $commercial_footer_menu_left = get_field('commercial_footer_menu_left', 'option');
    $commercial_footer_menu_right = get_field('commercial_footer_menu_right', 'option');
    $commercial_footer_address = get_field('commercial_footer_address', 'option');
    $commercial_footer_button = get_field('commercial_footer_button', 'option');
    $commercial_social_icons = get_field('commercial_social_icons', 'option');
    $commercial_copyright = get_field('commercial_copyright', 'option');
    $commercial_website_by = get_field('commercial_website_by', 'option');
?>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-6 col-xl-6">
                <div class="first">
                    <a href="<?php echo get_site_url(); ?>" class="logo">
                        <img src="<?php echo esc_url($commercial_footer_logo['url']); ?>" alt="<?php echo esc_attr($commercial_footer_logo['alt']); ?>">
                    </a>
                    <div class="both_web">
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => $commercial_footer_menu_left
                                ) );
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-2">
                <div class="second">
                    <?php
                        wp_nav_menu( array( 
                            'theme_location' => $commercial_footer_menu_right
                            ) );
                    ?>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-4 col-lg-3 col-xl-4">
                <div class="third">
                    <?php
                        echo $commercial_footer_address;
                    ?>
                     <?php
                        if( $commercial_footer_button ): 
                            $commercial_footer_button_url = $commercial_footer_button['url'];
                            $commercial_footer_button_title = $commercial_footer_button['title'];
                            $commercial_footer_button_target = $commercial_footer_button['target'] ? $commercial_footer_button['target'] : '_self';
                            ?>
                            <a href="<?php echo esc_url( $commercial_footer_button_url ); ?>" class="brdr_btn" target="<?php echo esc_attr( $commercial_footer_button_target ); ?>"><?php echo esc_html( $commercial_footer_button_title ); ?></a>

                        <?php endif; ?>

                    <ul class="social_link">
                        <?php 
                            if( have_rows('commercial_social_icons', 'option') ):
                                while( have_rows('commercial_social_icons', 'option') ) : the_row();
                                    $commercial_social_icon = get_sub_field('commercial_social_icon', 'option');
                                    $commercial_social_link = get_sub_field('commercial_social_link', 'option');
                                    ?>
                                        <li>
                                            <a href="<?php echo $commercial_social_link; ?>" target="_blank">
                                                <img src="<?php echo esc_url($commercial_social_icon['url']); ?>" alt="<?php echo esc_attr($commercial_social_icon['alt']); ?>">
                                            </a>
                                        </li>
                                    <?php
                                endwhile;
                            else :
                            endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="copyright-box">
                    <li>
                        <?php echo $commercial_copyright; ?>
                    </li>
                    <li>
                        <?php echo $commercial_website_by; ?>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
