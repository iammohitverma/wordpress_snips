<?php
    $bg_clr = get_sub_field('section_background_color');
    $shapes = get_sub_field('shapes');
    $tleft = get_sub_field('top_left_shape');
    $tright = get_sub_field('top_right_shape');
    $bleft = get_sub_field('bottom_left_shape');
    $bright = get_sub_field('bottom_right_shape');
    $lcenter = get_sub_field('left_center_shape');
    $rcenter = get_sub_field('right_center_shape');
?>
<?php
$Imageand_multipleeditor = get_sub_field('visual_&_multiple_text_editor');
if ($Imageand_multipleeditor) {
    $alignment_selection = get_sub_field('column_alignment');
    // echo $Imageand_multipleeditor['column_alignment'];
}
?>
    <!-- leave this for the time-->
    <!-- two column layout image duo wala chal jayega  leave this for the-->
    <section class="colored_2_column_layout educated_articles" style="background-color: <?php echo $bg_clr; ?>">
        <div class="container">
            <?php if ($Imageand_multipleeditor['column_alignment'] == "Image On Left Side") { ?>
            <div class="row d-flex ">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <h2 class="hdng">
                            <?php echo $Imageand_multipleeditor['heading']; ?>
                        </h2>
                        <div class="image_wrap">
                            <img src="<?php echo esc_url($Imageand_multipleeditor['image']['url']); ?>" alt="<?php echo esc_attr($Imageand_multipleeditor['image']['alt']); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <div class="main_desc">
                            <?php echo $Imageand_multipleeditor['content_first']; ?>
                        </div>
                        <?php if ($Imageand_multipleeditor['button'] != "") { ?>
                            <a href="<?php echo esc_url($Imageand_multipleeditor['button']['url']); ?>" class="brdr_btn article_btn"><?php echo esc_html($Imageand_multipleeditor['button']['title']); ?></a>
                        <?php } ?>
                        <div class="main_desc">
                            <?php echo $Imageand_multipleeditor['content_second']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="row d-flex ">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <div class="main_desc">
                            <?php echo $Imageand_multipleeditor['content_first']; ?>
                        </div>
                        <?php if ($Imageand_multipleeditor['button'] != "") { ?>
                            <a href="<?php echo esc_url($Imageand_multipleeditor['button']['url']); ?>" class="brdr_btn article_btn"><?php echo esc_html($Imageand_multipleeditor['button']['title']); ?></a>
                        <?php } ?>
                        <div class="main_desc">
                            <?php echo $Imageand_multipleeditor['content_second']; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <h2 class="hdng">
                            <?php echo $Imageand_multipleeditor['heading']; ?>
                        </h2>
                        <div class="image_wrap">
                            <img src="<?php echo esc_url($Imageand_multipleeditor['image']['url']); ?>" alt="<?php echo esc_attr($Imageand_multipleeditor['image']['alt']); ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>   
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