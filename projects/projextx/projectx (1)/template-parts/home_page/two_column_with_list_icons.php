<?php
    $image = get_sub_field("image");
    $heading = get_sub_field("heading");
    $description = get_sub_field("description");
    $icon_lists = get_sub_field("icon_lists");
    $link = get_sub_field("link");
?>

<!-- respectful relationships -->
<section class="two_col_section pt_120 pb_120" style="background-color: #ffffff">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="img_wrap">
                <?php 
                    if($image){?>
                        <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
                    <?php } ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="text_wrap">
					<h2 class="hdng fs_44 shape bottom_left_shape" style="--dataShape: url('/wp-content/uploads/2024/10/zigzag_shape_2.svg')"><?php echo $heading?></h2>

                    <div class="content_editor_default">
                        <?php echo $description?>
                    </div>


                    <?php
                    $rows = $icon_lists;
                    if( $rows ) {
                        echo '<ul class="icon_list mt_40">';
                        foreach( $rows as $row ) {
                            $icon = $row['icon'];
                            $content = $row['content'];
                            ?>
                                <li>
                                    <?php 
                                        if($image){?>
                                            <img src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
                                    <?php } ?>
                                    <?php echo $content?>
                                </li>
                            <?php
                        }
                        echo '</ul>';
                    }
                    ?>

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
	</div>
</section>