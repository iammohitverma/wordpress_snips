<?php
    $heading = get_sub_field("heading");
    $slider = get_sub_field("slider");
?>

<!-- Relationships & Tips -->
<section class="relationship_tips_section pt_120 pb_120" style="background-color: #015B6D">
	<div class="one_side_container ms-auto">
		<div class="sec_heading">
			<h2 class="hdng white fs_44 shape bottom_right_shape" style="--dataShape: url('/wp-content/uploads/2024/10/heading_shape_1.svg')">
                <?php echo $heading;?>
            </h2>
		</div>
		<div class="swiper" id="relationships_slider">
			<div class="swiper-wrapper">
                <?php
                    $rows = $slider;
                    if( $rows ) {
                        foreach( $rows as $row ) {
                            $image = $row['image'];
                            $title = $row['title'];
                            $description = $row['description'];
                            ?>
                            <div class="swiper-slide">
                                <div class="tips_card">
                                    <div class="img_wrap">
                                        <?php 
                                            if($image){?>
                                                <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
                                        <?php } ?>
                                    </div>
                                    <div class="text_wrap">
                                        <h4 class="hdng fs_22 white"><?php echo $title?></h4>
                                        <p><?php echo $description?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
			</div>	
		</div>
	</div>
	<div class="container">
		<div class="swiper-pagination"></div>
	</div>
</section>