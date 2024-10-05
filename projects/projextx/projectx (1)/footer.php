<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package projectx-theme
 */

?>
<footer class="site_footer pt_120" style='background-color: #024350;'>
    <div class="container">
        <div class="top_footer">
            <?php if(is_active_sidebar('top_footer')):
            dynamic_sidebar('top_footer'); 
            endif; ?>
        </div>
        <div class="middle_footer">
            <div class="row">
                <div class="col-md-5">
                    <div class="footer_desc">
                        <?php if(is_active_sidebar('footer_description')): 
                            dynamic_sidebar('footer_description');   
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="footer_menu">
                        <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                            <?php if(is_active_sidebar('footer_company_menu')): 
                            dynamic_sidebar('footer_company_menu');   
                                endif;
                            ?>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                            <?php if(is_active_sidebar('footer_explore_menu')): 
                            dynamic_sidebar('footer_explore_menu');   
                                endif;
                            ?>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                            <?php if(is_active_sidebar('footer_further_menu')): 
                            dynamic_sidebar('footer_further_menu');   
                                endif;
                            ?>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <?php if(is_active_sidebar('footer_contact')): 
                                    dynamic_sidebar('footer_contact');
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_footer">
            <?php if(is_active_sidebar('bottom_footer')): 
            dynamic_sidebar('bottom_footer');
            endif;    
            ?>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
