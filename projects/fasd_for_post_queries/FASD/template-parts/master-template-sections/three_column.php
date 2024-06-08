    <!-- This Section is used on *For Health Professionals* Page  ||  Start -->
    <?php
        $bg_clr = get_sub_field('section_background');
        $shapes = get_sub_field('shapes');
        $tleft = get_sub_field('top_left_shape');
        $tright = get_sub_field('top_right_shape');
        $bleft = get_sub_field('bottom_left_shape');
        $bright = get_sub_field('bottom_right_shape');
        $lcenter = get_sub_field('left_center_shape');
        $rcenter = get_sub_field('right_center_shape');
    ?>
    <?php if( have_rows('topics') ): ?>
    <section class="colored_box" style="background: <?php echo $bg_clr ?>">
        <div class="container">
            <div class="row">
               <?php
                while( have_rows('topics') ) : the_row();
                    $title = get_sub_field('heading');
                    $content = get_sub_field('content');
                    $bg_clr = get_sub_field('background_color');
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');

                ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 box">
                    <div class="inner" style="background-color: <?php echo $bg_clr ?>">
                        <h3 class="hdng">
                            <?php echo $title  ?>
                        </h3>
                        <div class="main_desc_2">
                            <?php echo $content; ?>
                        </div>
                        
                        <?php if (!empty($link)) { ?>
                        <a class="link_arrow" href="<?php echo esc_url($link['url']); ?>">
                        <?php echo esc_html($link['title']); ?>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
               
                <?php } ?>
                    </div>
                </div>
                <?php // End loop.
                endwhile;?>
            </div>
        </div>

        <!-- shapes -->
        <?php 
            if (!empty($shapes)) {
                foreach ($shapes as $shape) {
                    if ($shape == 'Top Left') {
                       echo '<img src="' . esc_url($tleft['url']) . '" alt="" class="top-left">';
                    }   elseif ($shape == 'Top Right') {
                        echo '<img src="' . esc_url($tright['url']) . '" alt="" class="top-right">';
                    }   elseif ($shape == 'Bottom left') {
                        echo '<img src="' . esc_url($bleft['url']) . '" alt="" class="bottom-left">';
                    }  elseif ($shape == 'Bottom Right') {
                        echo '<img src="' . esc_url($bright['url']) . '" alt="" class="bottom-right">';
                    }  elseif ($shape == 'Left Center') {
                        echo '<img src="' . esc_url($lcenter['url']) . '" alt="" class="middle-left">';
                    }  elseif ($shape == 'Right Center') {
                        echo '<img src="' . esc_url($rcenter['url']) . '" alt="" class="middle-right ">';
                    }  else {
                        // Handle other cases if needed
                        echo "Found something else: $shape\n";
                    }
                }
            } else {
                // echo "No shapes selected.";
            }
        ?>
    </section>
    <?php
            // No value.
                else :
                // Do something...
                endif; ?>
    <!-- This Section is used on *For Health Professionals* Page  ||  End -->