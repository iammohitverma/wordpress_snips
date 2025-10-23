<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>


<!-- custom popup -->
<div class="popup_tm">
    <div class="popup_box">
        <button type="button" class="close btn-close"></button>
        <div class="popup_box_inner">
            <h4>Hello World!</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, blanditiis quis accusamus amet
                libero
                deserunt officiis sed vero alias, numquam minima illo voluptas nesciunt rerum eaque veritatis. Nemo,
                odit
                autem?</p>
        </div>
    </div>
</div>

<footer>
    <div class="top">
        <div class="container">
            <div class="inner">
                <?php if (is_active_sidebar('footer_top')) { ?>
                    <?php dynamic_sidebar('footer_top'); ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer_widget footer_about">
                        <?php if (is_active_sidebar('footer_one')) { ?>
                            <?php dynamic_sidebar('footer_one'); ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_widget footer_address widget_top_15">
                        <?php if (is_active_sidebar('footer_two')) { ?>
                            <?php dynamic_sidebar('footer_two'); ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer_widget footer_links widget_top_15">
                        <?php if (is_active_sidebar('footer_three')) { ?>
                            <?php dynamic_sidebar('footer_three'); ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_widget footer_sci widget_top_15">
                        <?php if (is_active_sidebar('footer_four')) { ?>
                            <?php dynamic_sidebar('footer_four'); ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="copyright">
                <?php if (is_active_sidebar('footer_copyright')) { ?>
                    <?php dynamic_sidebar('footer_copyright'); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>