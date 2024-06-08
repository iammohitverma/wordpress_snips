<?php 
if (get_row_layout() == 'impairment_tabs_layout') :
     $Sectionheading = get_sub_field('section_heading');
     $section_heading_color = get_sub_field('section_heading_color');
    //  tab one:-
     $brain_heading = get_sub_field('brain_heading');
     $brain_image = get_sub_field('brain_image');
     $brain_description = get_sub_field('brain_description');
    //  tab two:-
     $motor_heading = get_sub_field('motor_heading');
     $motor_image = get_sub_field('motor_image');
     $motor_description = get_sub_field('motor_description');
     //  tab three:-
     $cognition_heading = get_sub_field('cognition_heading');
     $cognition_image = get_sub_field('cognition_image');
     $cognition_description = get_sub_field('cognition_description');
     //  tab four:-
     $language_heading = get_sub_field('language_heading');
     $language_image = get_sub_field('language_image');
     $language_description = get_sub_field('language_description');
     //  tab five:-
     $acedmic_heading = get_sub_field('acedmic_heading');
     $academic_image = get_sub_field('academic_image');
     $academic_description = get_sub_field('academic_description');
     //  tab five:-
     $memory_heading = get_sub_field('memory_heading');
     $memory_image = get_sub_field('memory_image');
     $memory_description = get_sub_field('memory_description');
?>
 <!-- banner without slider start-->
<section class="brain_impairment_sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="heading_with_icon mb_60" style=" color: <?php echo $section_heading_color; ?>">
                    <i>
                        <img src="http://52.64.249.237/wp-content/uploads/2024/04/info_icon.svg" alt="shape">
                    </i>    
                    <?php echo $Sectionheading; ?></h2>
            </div>
        </div>

        <div class="tab_slider tabbing_enabled">
            <button class="control prev">
                <img src="http://52.64.249.237/wp-content/uploads/2024/04/tab_slider_prev.svg" alt="">
            </button>
            <button class="control next">
                <img src="http://52.64.249.237/wp-content/uploads/2024/04/tab_slider_next.svg" alt="">
            </button>
            <div class="items">
                <button class="active"><?php echo $brain_heading ?></button>
                <button><?php echo $motor_heading ?></button>
                <button><?php echo $cognition_heading ?></button>
                <button><?php echo $language_heading ?></button>
                <button><?php echo $acedmic_heading ?></button>
                <button><?php echo $memory_heading ?></button>
            </div>
        </div>

        <div class="tab_content col_2">
            <div class="content_wrap active">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_wrap">
                            <img src="<?php echo $brain_image['url']; ?>" alt="tab-content-image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text_wrap">
                            <?php echo $brain_description; ?>
                        </div>
                    </div>
                </div>
            </div>
             <div class="content_wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_wrap">
                            <img src="<?php echo $motor_image['url']; ?>" alt="tab-content-image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text_wrap">
                            <?php echo $motor_description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_wrap">
                            <img src="<?php echo $cognition_image['url']; ?>" alt="tab-content-image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text_wrap">
                            <?php echo $cognition_description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_wrap">
                            <img src="<?php echo $language_image['url']; ?>" alt="tab-content-image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text_wrap">
                            <?php echo $language_description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_wrap">
                            <img src="<?php echo $academic_image['url']; ?>" alt="tab-content-image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text_wrap">
                            <?php echo $academic_description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_wrap">
                            <img src="<?php echo $memory_image['url']; ?>" alt="tab-content-image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text_wrap">
                            <?php echo $memory_description; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single_btn_wrap text-center mt_60">
            <a href="#" class="fasd_btn outline_btn" style="--btnClr:#BF4846">Learn about FASD</a>
        </div>
    </div>

    <!-- shapes for all corner | uncomment commented img tag-->
    <!-- <img src="http://52.64.249.237/wp-content/uploads/2024/04/sec_shape_lightblue_v3.svg" alt="shape" class="sec_shape top_right">
    <img src="http://52.64.249.237/wp-content/uploads/2024/04/circle_light_black.svg" alt="shape" class="sec_shape bottom_left"> -->
</section>
<!-- banner without slider end-->
<?php 
endif;
?>