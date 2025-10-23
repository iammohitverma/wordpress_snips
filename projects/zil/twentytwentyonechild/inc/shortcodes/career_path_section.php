
<!-- job placement process -->
<section class="placement_process">
    <div class="container">
        <div class="row">
            <?php if( have_rows('career_path_steps', 'option') ): 
                $count = 1;
                while( have_rows('career_path_steps', 'option') ): the_row(); 
                    $icon = get_sub_field('career_path_icon');
                    $text = get_sub_field('career_path_text');
            ?>
                <div class="col-6 col-md-3 mb_24">
                    <div class="process_wrap" data-flow="<?php echo esc_attr($count); ?>">
                        <div class="icon_wrap">
                            <?php if( !empty($icon) ): ?>
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: $text); ?>">
                            <?php endif; ?>
                        </div>
                        <?php if( $text ): ?>
                            <h4><?php echo esc_html($text); ?></h4>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
                $count++;
                endwhile; 
            endif; ?>
        </div>
    </div>
</section>
