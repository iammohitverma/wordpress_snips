<?php
    $rows = get_sub_field("rows");
?>


 <!-- two_col_section repeater -->
 <section class="two_col_section repeater_on pt_120 pb_120" style="background-color: #ffffff">
	<div class="container">

    <?php
        if( have_rows('rows') ):
            while( have_rows('rows') ) : the_row();
        
                // Get parent value.
                $revesible_content = get_sub_field("revesible_content");
                $heading = $revesible_content["heading"];
                $description = $revesible_content["description"];
                $icon_lists = $revesible_content["icon_lists"];
                $link = $revesible_content["link"];

                $image = get_sub_field("image");

                ?>

                <div class="row align-items-center">
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
                            <h3 class="hdng fs_58 shape bottom_left_shape" style="--dataShape: url('/wp-content/uploads/2024/10/zigzag_shape_2.svg')"><?php echo $heading;?></h3>

                            <div class="content_editor_default">
                                <?php echo $description?>
                            </div>

                            <?php        
                            // Loop over sub repeater rows.

                            $rows = $icon_lists;
                            if( $rows ) {
                                echo "<ul class='icon_list mt_20'>";
                                foreach( $rows as $row ) {
                                    $icon = $row['icon'];
                                    $content = $row['content'];
                                    ?>
                                         <li class="align-items-start">
                                            <?php 
                                                if($icon){?>
                                                    <img src="<?php echo $icon['url']?>" alt="<?php echo $icon['alt']?>">
                                            <?php } ?>
                                            <?php echo $content?>
                                        </li>
                                    <?php
                                }
                                echo "</ul>";
                            }

                            ?>

                            <?php 
                            $link = $link;
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="arrow_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                        
               <?php
            endwhile;
        endif;
    ?>
		
	</div>
</section>
