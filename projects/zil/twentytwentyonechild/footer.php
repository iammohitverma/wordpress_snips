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
<div class="popup_tm popup_team">
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

<!-- Apply Via Zillion Step Form Popup -->
<div class="popup_tm apply_via_zillion_popup">
    <div class="popup_box">
        <!-- <button type="button" class="close btn-close"></button> -->
        <div class="popup_box_inner">
            <div class="screen screen_1 form_wrapper active">
               <?php echo do_shortcode('[forminator_form id="2714"]');?>
            </div>
            <div class="screen screen_2 analysis">
               <img src="/wp-content/uploads/2025/10/analysis.svg" alt="analysis" />
               <div class="loading">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h5>Reading Your Choices ...</h5>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="popup_tm score_card_popup">
    <div class="box">
        <div class="col left text-center">
            <h4>See how ready you are for paid tax work (60s).</h4>
            <div class="circle">
                <span class="score">87</span>
                <span class="out_of">of 100</span>
            </div>
            <div class="btm">
                <h3>Great</h3>
                <p>Eligible to start paid client work </p>
            </div>
        </div>
        <div class="col right">
            <h5>Summary</h5>
            <ul>
                <li>
                    <span class="circle_text">$50</span>
                    <p>Scope per file</p>
                </li>
                <li>
                    <span class="circle_text">+78%</span>
                    <p>Confidence</p>
                </li>
                <li>
                    <span class="circle_text">3x</span>
                    <p>Placements</p>
                </li>
            </ul>
            <a href="/tap" class="site_btn w-100 text-center text-white">Continue to TAP</a>
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