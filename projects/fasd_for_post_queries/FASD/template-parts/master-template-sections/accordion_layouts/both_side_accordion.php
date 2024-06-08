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
    $textwithaccordion = get_sub_field('both_side_accordion');
    if( $textwithaccordion ): 
        $l_hdng = get_sub_field('left_side_heading');
        $l_hdngclr = get_sub_field('left_side_heading_color');
        $r_hdng = get_sub_field('right_side_heading');
        $r_hdng_clr = get_sub_field('right_side_heading_color');        
    ?>

<?php
   if( have_rows('both_side_accordion') ): while ( have_rows('both_side_accordion') ) : the_row();   ?>
    <section class="main-for-people-faq-section" style="background-color: <?php echo $bg_clr; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="main-for-people-faq-wrap">
                            <h4 class="faq_hdng" style="color:<?php echo esc_html( $textwithaccordion['left_side_heading_color'] ); ?>">
                                <?php echo $textwithaccordion['left_side_heading']; ?>
                            </h4> 
                        
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                           <?php
                                if( have_rows('left_side_accordion') ): while ( have_rows('left_side_accordion') ) : the_row(); 
                                $title = get_sub_field('title');
                                $desc = get_sub_field('description');
                                ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush<?php echo strtolower(str_replace(" ","-",$title)) ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse<?php echo strtolower(str_replace(" ","-",$title)) ?>" aria-expanded="false"
                                        aria-controls="flush-collapse<?php echo strtolower(str_replace(" ","-",$title)) ?>">
                                         <?php  echo $title; ?>
                                    </button>
                                </h2>
                                <div id="flush-collapse<?php echo strtolower(str_replace(" ","-",$title)) ?>" class="accordion-collapse collapse"
                                    aria-labelledby="flush<?php echo strtolower(str_replace(" ","-",$title)) ?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"> <?php echo $desc; ?></div>
                                </div>
                            </div>
                             <?php endwhile; endif; ?>
                       
                        </div>
        
                    </div>
                </div>


                <div class="col-md-6 col-sm-12">
                    <div class="main-for-people-faq-wrap">
                       <h4 class="faq_hdng" style="color:<?php echo esc_html( $textwithaccordion['right_side_heading_color'] ); ?>">
                                <?php echo $textwithaccordion['right_side_heading']; ?>
                            </h4> 

                             <div class="accordion accordion-flush" id="accordionFlushExample">
                           <?php
                                if( have_rows('right_side_accordion') ): while ( have_rows('right_side_accordion') ) : the_row(); 
                                $title = get_sub_field('title');
                                $desc = get_sub_field('description');
                                ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush<?php echo strtolower(str_replace(" ","-",$title)) ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse<?php echo strtolower(str_replace(" ","-",$title)) ?>" aria-expanded="false"
                                        aria-controls="flush-collapse<?php echo strtolower(str_replace(" ","-",$title)) ?>">
                                         <?php  echo $title; ?>
                                    </button>
                                </h2>
                                <div id="flush-collapse<?php echo strtolower(str_replace(" ","-",$title)) ?>" class="accordion-collapse collapse"
                                    aria-labelledby="flush<?php echo strtolower(str_replace(" ","-",$title)) ?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"> <?php echo $desc; ?></div>
                                </div>
                            </div>
                             <?php endwhile; endif; ?>
                       
                        </div>
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
  <?php   endwhile; endif;
?>
    <?php endif; ?>