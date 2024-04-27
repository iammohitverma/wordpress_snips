<!-- sirf video 2 column section -->
<?php
$section_bg_color = get_sub_field('section_background_color');

if( have_rows('both_side_visual') ): while ( have_rows('both_side_visual') ) : the_row(); ?>
<section class="two_column_video_layout pb_100" style="background-color:<?php echo $section_bg_color; ?>">
        <div class="container">
    <?php if( have_rows('visual_block') ): while ( have_rows('visual_block') ) : the_row();       

        $left_side_visual = get_sub_field('left_side_visual');
        $right_side_visual = get_sub_field('right_side_visual'); ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <!-- video columns one -->
                    <div class="two_elem">
                        <figure class="videoAayegi" <?php if (!empty($left_side_visual['video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($left_side_visual['video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($left_side_visual['video_feature_image']) && !empty($left_side_visual['video'])) : ?>
                                <img src="<?php echo esc_url($left_side_visual['video_feature_image']['url']); ?>"
                                    alt="<?php echo esc_attr($left_side_visual['video_feature_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($left_side_visual['image']) && empty($left_side_visual['video'])) : ?>
                                <img src="<?php echo esc_url($left_side_visual['image']['url']); ?>"
                                    alt="<?php echo esc_attr($left_side_visual['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                                <?php if (!empty($left_side_visual['link'])) { ?>
                                <a class="link_arrow" href="<?php echo esc_url($left_side_visual['link']['url']); ?>">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <?php } ?>
                            </div>
                        </figure>
                    
                        <div class="cntnt_wrap">
                            <h4 class="hdng">
                                <?php echo $left_side_visual['visual_heading'] ?>
                            </h4>
                            <p class="desc">
                                <?php echo $left_side_visual['visual_description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <!-- video columns two -->
                    <div class="two_elem">

                        <figure class="videoAayegi" <?php if (!empty($right_side_visual['video'])) : ?>data-target-el="hide-show-toggle"
                            data-video="<?php echo esc_url($right_side_visual['video']['url']); ?>" <?php endif; ?>>
                            <div class="hideElem">
                                <?php if (!empty($right_side_visual['video_feature_image']) && empty($left_side_visual['video'])) : ?>
                                <img src="<?php echo esc_url($right_side_visual['video_feature_image']['url']); ?>"
                                    alt="<?php echo esc_attr($right_side_visual['video_feature_image']['alt']); ?>" class="feat_img" />
                                <?php elseif (!empty($right_side_visual['image']) && empty($right_side_visual['video'])) : ?>
                                <img src="<?php echo esc_url($right_side_visual['image']['url']); ?>"
                                    alt="<?php echo esc_attr($right_side_visual['image']['alt']); ?>" class="feat_img" />
                                <?php endif; ?>
                                <?php if (!empty($right_side_visual['link'])) { ?>
                                <a class="link_arrow" href="<?php echo esc_url($right_side_visual['link']['url']); ?>">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <?php } ?>
                            </div>
                        </figure>

                        <div class="cntnt_wrap">
                            <h4 class="hdng">
                                <?php echo $right_side_visual['visual_heading'] ?>
                            </h4>
                            <p class="desc">
                                <?php echo $right_side_visual['visual_description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

    <?php endwhile; endif; ?>
    </div>
</section>
<?php endwhile; endif;

?>

            