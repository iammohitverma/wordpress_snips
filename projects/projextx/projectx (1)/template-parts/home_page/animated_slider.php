<?php
    $heading = get_sub_field("heading");
    $slider = get_sub_field("slider");
?>

<!-- Mission -->
<section class="mission_section pt_120 pb_120" style="background-color: #ffffff">
	<div class="container">
		<div class="sec_heading mb-0 text-center">
			<h3 class="hdng fs_44 shape bottom_right_shape" style="--dataShape: url('/wp-content/uploads/2024/10/zigzag_shape_2.svg')"><?php echo $heading?></h3>
		</div>
	</div>
	<div class="container-fluid p-0">
        <?php
            if( have_rows('slider') ):
                while( have_rows('slider') ) : the_row();
            
                    // Get parent value.
                    $slider_direction = get_sub_field('slider_direction');
                    ?>
            
                    <div class="swiper marquee_card_row <?php echo $slider_direction;?>">
                        <div class="swiper-wrapper">
                        <?php
                            // Loop over sub repeater rows.
                            if( have_rows('slider_blocks') ):
                                while( have_rows('slider_blocks') ) : the_row();
                    
                                    // Get sub value.
                                    $title = get_sub_field('title');
                                    $description = get_sub_field('description');
                                    $bottom_text = get_sub_field('bottom_text');
                                    ?>

                                    <div class="swiper-slide">
                                        <div class="marquee_card">
                                            <h4 class="hdng fs_18"><?php echo $title;?></h4>
                                            <p><?php echo $description;?></p>
                                            
                                            <?php
                                                $rows = $bottom_text;

                                                if( $rows ) {
                                                    echo '<div class="btm_text">';
                                                    foreach( $rows as $row ) {
                                                        $info = $row['info'];
                                                       ?>
                                                        <span><?php echo $info;?></span>
                                                       <?php
                                                    }
                                                    echo '</div>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php                    
                                endwhile;
                            endif;?>                           
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
        ?>
		
	</div>
	<div class="container">
		<div class="swiper-pagination"></div>
	</div>
</section>