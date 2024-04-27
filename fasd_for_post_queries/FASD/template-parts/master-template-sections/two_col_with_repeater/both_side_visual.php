<!-- sirf video 2 column section -->
<?php
$Text_visual_duo = get_sub_field('both_side_visual');

if( have_rows('both_side_visual') ): while ( have_rows('both_side_visual') ) : the_row(); ?>
<section class="two_column_video_layout pb_100" style="background-color:#fafbf7">
        <div class="container">
            
    <?php if( have_rows('visual') ): while ( have_rows('visual') ) : the_row();       

        $left_side_visual = get_sub_field('left_side_visual');
        //print_r($left_side_visual);
        $right_side_visual = get_sub_field('right_side_visual'); ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <!-- video column one -->
                    <div class="two_elem">
                    <figure class="videoAayegi" <?php if (!empty($left_side_visual['select_video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($left_side_visual['select_video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($left_side_visual['video_featured_image'])) : ?>
                                <img src="<?php echo esc_url($left_side_visual['video_featured_image']['url']); ?>"
                                    alt="<?php echo esc_attr($left_side_visual['video_featured_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($left_side_visual['image']) && empty($left_side_visual['select_video'])) : ?>
                                <img src="<?php echo esc_url($left_side_visual['image']['url']); ?>"
                                    alt="<?php echo esc_attr($left_side_visual['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                            </div>
                        </figure>
                    
                        <div class="cntnt_wrap">
                            <h4 class="hdng">
                                <?php echo $left_side_visual['heading']; ?>
                            </h4>
                            <div class="desc">
                                <?php echo $left_side_visual['description']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <!-- video columns two -->
                    <div class="two_elem">
                    <figure class="videoAayegi" <?php if (!empty($right_side_visual['select_video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($right_side_visual['select_video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($right_side_visual['video_featured_image'])) : ?>
                                <img src="<?php echo esc_url($right_side_visual['video_featured_image']['url']); ?>"
                                    alt="<?php echo esc_attr($right_side_visual['video_featured_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($right_side_visual['image']) && empty($right_side_visual['select_video'])) : ?>
                                <img src="<?php echo esc_url($right_side_visual['image']['url']); ?>"
                                    alt="<?php echo esc_attr($right_side_visual['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                            </div>
                        </figure>
                    
                        <div class="cntnt_wrap">
                            <h4 class="hdng">
                                <?php echo $right_side_visual['heading']; ?>
                            </h4>
                            <div class="desc">
                                <?php echo $right_side_visual['description']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endwhile; endif; ?>
    </div>
</section>
<?php endwhile; endif;

?>