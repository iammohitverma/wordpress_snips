<?php
    $heading = get_sub_field("heading");
    $blocks = get_sub_field("blocks");
?>

<!-- Explore More -->
<section class="explore_more_section pt_120 pb_120" style="background-color: #EAFF80">
	<div class="container">
		<h3 class="hdng fs_44 shape bottom_right_shape" style="--dataShape: url('/wp-content/uploads/2024/10/zigzag_3.svg')"><?php echo $heading?></h3>
		
		<div class="three_col_section">
            <?php
                $rows = $blocks;
                if( $rows ) {
                    echo '<div class="row">';
                    foreach( $rows as $row ) {
                        $image = $row['image'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $link = $row['link'];
                        ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="explore_card">
                                <div class="img_wrap">
                                    <?php 
                                        if($image){?>
                                            <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>">
                                    <?php } ?>
                                </div>
                                <div class="details">
                                    <h3 class="hdng fs_32"><?php echo $title?></h3>
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
                                        <a class="icon_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                }
            ?>
				
		</div>

	</div>
</section>