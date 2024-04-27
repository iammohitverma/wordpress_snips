<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fasd-theme
 */

?>

<?php get_header();
?>
<?php if (have_rows('single_layouts')) :
    while (have_rows('single_layouts')) : the_row(); ?>
        
<?php if( get_row_layout() == 'banner_section' ):	
    $bg_clr = get_sub_field('section_background_color');
    $title_clr = get_sub_field('post_title_color');
    $banner_image = get_sub_field('image');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');
    ?>
    <section class="cmn_banner_without_slider cmn_single_news" style="background-color: <?php echo $bg_clr ?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="text_wrap">
                        <h1 class="heading" style="color: <?php echo $title_clr ?>"><?php the_title(); ?></h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php 
                        if( !empty( $banner_image ) ): ?>
                            <div class="img_wrap">
                                <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        </div>
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
    <?php elseif (get_row_layout() == 'two_columns_layouts'):
	$section_bg_color = get_sub_field('section_background_color');
    $left_side_content = get_sub_field('left_side_content');
    $right_side_content = get_sub_field('right_side_content');
	$shapes = get_sub_field('shapes');
	$tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape'); ?>
    <section class="news-single">
        <section class="news-column-left" style="background-color: <?php echo $section_bg_color; ?>">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-md-6 col-sm-12">
                <?php if ($left_side_content['image'] != "") { ?>
                        <div class="news-column-left-figure">
                            <img src="<?php echo esc_url($left_side_content['image']['url']); ?>" class="img-fluid" alt="<?php echo esc_url($left_side_content['image']['alt']); ?>">
                        </div>
                        <?php } ?>
                </div>

            <div class="col-md-6 col-sm-12">
            <div class="news-column-left-wrap">
                 <h2 class="news-column-left-hdng"> <?php echo $right_side_content['heading']; ?></h2>
                    <p class="news-column-left-desc"><?php echo $right_side_content['description'] ?>
                      </p>
                        </div>
                    </div>   
                </div>
            </div>
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
        elseif (get_row_layout() == 'content_blocks' ):
			$section_bg_color = get_sub_field('section_background_color');
			$shapes = get_sub_field('shapes');
			$left_side = get_sub_field('left_side_shape');
			$right_side = get_sub_field('right_side_shape');
		?>
            <section class="news-editor" style="background-color: <?php echo $section_bg_color; ?>">
            <div class="container">
                <div class="row">
                    <?php
            if (have_rows('blocks')) :
                while (have_rows('blocks')) : the_row();
                $editor= get_sub_field('editor');
            ?>
              <div class="col-md-12">
                        <div class="news-editor-wrap">
                            <?php echo $editor ?>
                        </div>
                    </div>
            <?php
            endwhile;
            endif;?>
            </div>
            </div>
			<?php 
                if (!empty($shapes)) {
                    foreach ($shapes as $shape) {
                        if ($shape == 'Left Side Shape') {
                           echo '<img src="' . esc_url($left_side['url']) . '" alt="" class="left_shape">';
                        }   elseif ($shape == 'Right Side Shape') {
                            echo '<img src="' . esc_url($right_side['url']) . '" alt="" class="right_shape">';
                        }  	else {
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
        elseif (get_row_layout() == 'podcast_layout' ):
			$Heading= get_sub_field('heading');
			$Heading_clr= get_sub_field('heading_text_color');
			$shapes = get_sub_field('shapes');
			$tleft = get_sub_field('top_left_shape');
			$tright = get_sub_field('top_right_shape');
			$bleft = get_sub_field('bottom_left_shape');
			$bright = get_sub_field('bottom_right_shape');
			$lcenter = get_sub_field('left_center_shape');
			$rcenter = get_sub_field('right_center_shape'); ?>
			<section class="podcast_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="podcast_hdng" style="color: <?php echo $Heading_clr; ?>"><?php echo $Heading; ?></h4>
                    </div>
                    <div class="row">
        <?php
        if (have_rows('podcast')) :
                while (have_rows('podcast')) : the_row();
				$title= get_sub_field('title');
				$featured_image= get_sub_field('featured_image');
				$no_of_episodes= get_sub_field('no_of_episodes');
				$time_duration= get_sub_field('time_duration');
				$podcast_icon= get_sub_field('podcast_icon');
				?>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="podcast_wrap">
                                <div class="podact_health_wrap">
                                    <div class="podact_health_figure">
										<?php if ($featured_image != "") { ?>
											<img src="<?php echo esc_url($featured_image['url']); ?>" alt="<?php echo esc_attr($featured_image['alt']); ?>">
										<?php } ?>
                                    </div>
                                    <ul>
                                        <li>
                                            <p class="podact_health_desc"><span><?php echo $time_duration; ?></span><span><?php echo $no_of_episodes; ?></span></p>
                                        </li>
                                        <li>
                                            <h3 class="podact_health_hdng"><?php echo $title; ?></h3>
                                        </li>
                                    </ul>
                                </div>
										<?php if ($podcast_icon != "") { ?>
											<div class="podcast_icons">
                                    			<a href="#"><img src="<?php echo esc_url($podcast_icon['url']);?>" alt="podact_icons"></a>
                                			</div>
										<?php } ?>
                            </div>
                        </div>
                <?php 
            endwhile;
            endif;?>
					</div>
                </div>
            </div>
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
    else:
    endif;
  endwhile;
endif;
?> 
</section>
<?php get_footer();?>
