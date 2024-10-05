<?php
    $banner_image = get_sub_field("banner_image");
    $banner_heading = get_sub_field("banner_heading");
    $banner_link = get_sub_field("banner_link");
?>

<section class="hero lg_banner pt_100 pb_100" style="--bgImage: url('<?php 
    if($banner_image){
        echo $banner_image['url'];
    }
?>')">
	<div class="container">
		<div class="content_wrap text-center">
			<h1 class="hdng fs_84 shape white d-block" style="--dataShape: url('/wp-content/uploads/2024/10/circle_shape.svg')"><?php echo $banner_heading;?></h1>
            <?php 
            $link = $banner_link;
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="arrow_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
		</div>
	</div>
</section>
