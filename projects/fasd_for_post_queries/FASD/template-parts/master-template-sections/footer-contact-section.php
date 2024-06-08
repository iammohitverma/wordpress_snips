<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techmind-theme
 */

?>
<section class="form_section pt_100 pb_100" style="background-color: <?php echo get_theme_mod('section_bg_color'); ?>">
    <div class="container">
        <div class="inner">
            <div class="head">
                <h2 class="fs_48 form_title"><?php echo get_theme_mod('top_heading'); ?></h2>
                <p><?php echo get_theme_mod('top_description'); ?></p>
            </div>
            <div class="form_wrap">
                <?php echo do_shortcode(get_theme_mod('contact_form_shortcode')); ?>
            </div>
            <div class="form_btm_content">
                <h3><?php echo get_theme_mod('bottom_heading'); ?></h3>
                <p><?php echo get_theme_mod('bottom_description'); ?></p>
            </div>
        </div>
    </div>
</section>
