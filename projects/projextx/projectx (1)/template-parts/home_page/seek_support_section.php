<?php
    $background_image = get_sub_field("background_image");
    $heading_image = get_sub_field("heading_image");
    $heading = get_sub_field("heading");
    $description = get_sub_field("description");
    $link = get_sub_field("link");
?>

<!-- seek support -->
<section class="seek_support_section pt_100 pb_100 bg_set"  style="--bgImage: url('<?php 
    if($background_image){
        echo $background_image['url'];
    }
?>')">
	<div class="container">
		<div class="content">
			<div class="img_wrap">
                <img src="<?php echo $heading_image['url']?>" alt="<?php echo $heading_image['alt']?>">
			</div>
			<div class="heading mw_435">
				<h3 class="hdng white fs_58 shape bottom_left_shape" style="--dataShape: url('/wp-content/uploads/2024/10/circle_shape-2.svg')">
                <?php echo $heading;?>
                </h3>
			</div>
			<div class="text_content mw_595">
                <div class="content_editor_default">
                    <?php echo $description?>
                </div>
                <?php 
                    $link = $link;
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="arrow_btn mt_40" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
			</div>
		</div>
	</div>
 </section>