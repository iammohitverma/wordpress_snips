
<!-- service_directory_results start -->
<section class="service_directory_results init_min_height" style="background-color:#f4f5f1;">
   <div class="container">
      <div class="search_directory">
         <form>
            <div class="top">
               <div class="input_wrap">
                  <input type="search" placeholder="type here to search services directory">
                  <input type="submit" value="Search" aria-label="search" title="search">
               </div>
            </div>
            <div class="bottom">
               <div class="row">
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Filter by state</label>
                        <select data-placeholder="States" name="state" class="input_style" style="--selectBg: #F2F2F2;" multiple="multiple">
                           <option value="Queensland1">Queensland1</option>
                           <option value="Queensland2">Queensland2</option>
                           <option value="Queensland3">Queensland3</option>
                        </select>
                        <div class="selectedPlaceholder chosen-choices">States</div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Type of service</label>
                        <select data-placeholder="Services" name="services" class="input_style" style="--selectBg: #F2F2F2;" multiple="multiple">
                           <option value="Service 1">Service 1</option>
                           <option value="Service 2">Service 2</option>
                           <option value="Service 3">Service 3</option>
                        </select>
                        <div class="selectedPlaceholder chosen-choices">Services</div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Age</label>
                        <select data-placeholder="Age" name="age" class="input_style" style="--selectBg: #F2F2F2;" multiple="multiple">
                           <option value="12 - 18 years">12 - 18 years</option>
                           <option value="18 - 22 years">18 - 22 years</option>
                        </select>
                        <div class="selectedPlaceholder chosen-choices">Age</div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Billing Method</label>
                        <select data-placeholder="Billing Method" name="billing_method" class="input_style" style="--selectBg: #F2F2F2;" multiple="multiple">
                           <option value="Medicare bulk-billed">Medicare bulk-billed</option>
                           <option value="Medicare plus additional fee">Medicare plus additional fee</option>
                        </select>
                        <div class="selectedPlaceholder chosen-choices">Billing Method</div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="results_wrapper">
         <div class="top">
            <div class="left">
               <h4 class="hdng">
                  <img src="http://52.64.249.237/wp-content/uploads/2024/04/result_directories.svg" alt="icon">
                  <span class="text">1-10 of 97 results</span>
               </h4>
            </div>
            <div class="right">
               <form>
                  <div class="inner">
                     <div class="input_wrap">
                        <select class="input_style" style="--selectBg: #f4f5f1;">
                           <option value="most_recent">Most Recent</option>
                           <option value="oldest">Oldest</option>
                           <option value="a_z_by_title">A to Z by Title</option>
                           <option value="z_a_by_title">Z to A by Title</option>
                        </select>
                     </div>
                     <button class="print_btn" aria-label="print" title="print">Print All</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="main">
            <div class="row">
               <div class="col-lg-4">
                  <div class="directories_filter">
                     <div class="top">
                        <div class="accordion chosen-container-multi" id="accordionPanelsStayOpenExample">
                           <div class="accordion-item" id="stateAccordion">
                              <h2 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stateAccordion-collapseOne" aria-expanded="true" aria-controls="stateAccordion-collapseOne" disabled>
                                 Location
                                 </button>
                              </h2>
                              <div id="stateAccordion-collapseOne" class="accordion-collapse collapse">
                                 <div class="accordion-body ">
                                    <ul class="tags chosen-choices"></ul>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item" id="servicesAccordion">
                              <h2 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#servicesAccordion-collapseOne" aria-expanded="true" aria-controls="servicesAccordion-collapseOne" disabled>
                                 Type of Service
                                 </button>
                              </h2>
                              <div id="servicesAccordion-collapseOne" class="accordion-collapse collapse">
                                 <div class="accordion-body ">
                                    <ul class="tags chosen-choices"></ul>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item" id="ageAccordion">
                              <h2 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ageAccordion-collapseTwo" aria-expanded="false" aria-controls="ageAccordion-collapseTwo" disabled>
                                 Age
                                 </button>
                              </h2>
                              <div id="ageAccordion-collapseTwo" class="accordion-collapse collapse">
                                 <div class="accordion-body">
                                    <ul class="tags chosen-choices"></ul>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item" id="billingAccordion">
                              <h2 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#billingAccordion-collapseThree" aria-expanded="false" aria-controls="billingAccordion-collapseThree" disabled>
                                 Billing Method
                                 </button>
                              </h2>
                              <div id="billingAccordion-collapseThree" class="accordion-collapse collapse">
                                 <div class="accordion-body">
                                    <ul class="tags chosen-choices"></ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="bottom">
                        <button class="fasd_btn outline_btn" style="--btnClr: #197391;" aria-label="refine-search" title="refiune-search">Refine Search</button>
                        <button class="cross" aria-label="cross" title="cross">
                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon_stroke.svg" alt="icon">
                        </button>
                     </div>
                  </div>
               </div>
               
             

<div class="col-lg-8">
    <div class="listings_wrapper">
        <!-- Start loop here -->
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'servicedirectory',
            'posts_per_page' => 5,
            'paged' => $paged
        );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
        ?>
            <div class="listing_wrap">
                <div class="top">
                    <div class="info_wrap">
                        <div class="left">
                            <i class="icon">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
								 $post_link = get_permalink( $post->ID );
                                 
                                 $image_id = get_post_thumbnail_id(get_the_ID());
                                 $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true); 
								 
								if($image == ""){
									$imgName = "/wp-content/uploads/2024/05/service_feat_placeholder.svg";
								}else{
									$imgName = $image[0];
								}
								 
								 ?>
								  <a href="<?php echo $post_link; ?>" aria-label="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                                    <img src="<?php echo $imgName; ?>" alt="<?php echo $alt_text; ?>" title="<?php echo get_the_title($image_id); ?>"/>
                                   </a>
                            </i>
                        </div>
                        <div class="right">
                          <h4 class="hdng">
                           <a href="<?php echo get_permalink( $post->ID ); ?>" aria-label="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a>
                               </h4>

                            <p class="location">
                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/location.svg" alt="icon" class="icon">
                                <?php
                                $field1 = get_field('address');
                                $field2 = get_field('address_2');
                                $field3 = get_field('state');
                                $field4 = get_field('postcode');
                                echo $field1 . ' ' . $field2 . ' ' . $field3 . ' ' . $field4;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="btns_wrap">
                        <a href=" tel:<?php echo get_field('phone_number'); ?>" class="fasd_btn fill_btn with_icon_img" style="--btnClr:#005E7E" aria-label="phone-number" title="phone-number">
                            <i class="icon">
                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_call_icon.svg" alt="icon" class="initial">
                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_call_icon.svg" alt="icon" class="hovered">
                            </i>
                            <?php echo get_field('phone_number'); ?>
                        </a>
                        <a href="mailto:<?php the_field('email_address'); ?>" class="fasd_btn outline_btn with_icon_img" style="--btnClr:#005E7E" aria-label="email-address" title="email-address">
                            <i class="icon">
                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_email_icon.svg" alt="icon" class="initial">
                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_email_icon.svg" alt="icon" class="hovered">
                            </i>
                            E-Mail
                        </a>
                        <a href="<?php echo  get_field('website_url') ; ?>" class="fasd_btn outline_btn with_icon_img" style="--btnClr:#005E7E" aria-label="website-url" title="website-url">
                            <i class="icon">
                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_web_link_icon.svg" alt="icon" class="initial">
                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_web_link_icon.svg" alt="icon" class="hovered">
                            </i>
                            Website
                        </a>
                    </div>
                </div>
                <div class="bottom">
                    <div class="inner">
                        <div class="left">
                            <ul>
                                  <li>
											<?php 
												$clinic_service = implode(',', get_field('what_is_the_nature_of_your_clinic_service_or_practice'));
												echo $clinic_service;
											?>
										</li>
                            </ul>
                        </div>
                        <div class="right">
                            <div class="updated_on">
                                <i class="icon">
                                    <img src="http://52.64.249.237/wp-content/uploads/2024/04/updated_icon.svg" alt="icon">
                                </i>
                                <p>Page last updated <?php echo get_the_date(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        ?>
        <!-- End loop here -->

        <div class="pagination">
            <?php

         // Custom pagination without next and previous buttons
         // global $wp_query;
         // $big = 999999999; // Need an unlikely integer
         // $total_pages = $the_query->max_num_pages;
         // $current_page = max(1, get_query_var('paged'));
         // $show_dots_threshold = 5; // Change this threshold as needed
     
         // if ($total_pages > 1) {
         //     echo '<div class="post_pagination v_2">';
         //     echo '<ul>';

             // Previous page link
            //  if ($current_page > 1) {
            //      echo '<li class="page-item control prev" tabindex="0"><a class="page-link" href="' . get_pagenum_link($current_page - 1) . '"  aria-label="Previous" tabindex="0"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_left_arrow.svg" alt="shape"></a></li>';
            //  }

             // Page numbers
            //  for ($i = 1; $i <= $total_pages; $i++) {
            //      if ($i == 1 || $i == $total_pages || abs($i - $current_page) < $show_dots_threshold || ($i > $current_page - $show_dots_threshold && $i < $current_page + $show_dots_threshold)) {
            //          $current_class = ($current_page == $i) ? 'current' : '';
            //          echo '<li class="page-item count ' . $current_class . '" tabindex="0"><a class="page-link" href="' . get_pagenum_link($i) . '"  aria-label="Page Count" tabindex="0">' . $i . '</a></li>';
            //      } elseif ($i == $current_page + $show_dots_threshold || $i == $current_page - $show_dots_threshold) {
            //          echo '<li class="page-item count dots" tabindex="0"><a class="page-link" href="JavaScript:void(0)">...</a></li>';
            //      }
            //  }

             // Next page link
            //  if ($current_page < $total_pages) {
            //      echo '<li class="page-item control next" tabindex="0"><a class="page-link" href="' . get_pagenum_link($current_page + 1) . '"  aria-label="Next" tabindex="0"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_right_arrow.svg" alt="shape"></a></li>';
            //  }

            //  echo '</ul>';
            //  echo '</div>';
         // }

            $big = 999999999;
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $loop->max_num_pages,
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;'
            ) );
            ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
</div>


   <!-- shapes -->
   <!-- <img src="http://52.64.249.237/wp-content/uploads/2024/04/audience_sec_circle.svg" alt="shape" class="sec_shape top_right">
      <img src="http://52.64.249.237/wp-content/uploads/2024/04/light_green_leaf.svg" alt="shape" class="sec_shape bottom_left"> -->
</section>
<!-- service_directory_results end -->






<style>
   .selectedPlaceholder{
      position: absolute !important;
      overflow-x: auto;
      display: flex;
      flex-wrap: nowrap;
      display: none;
      font-size: 14px;
      color: #999;
    line-height: 1.8;
   }
   .selectedPlaceholder::-webkit-scrollbar {
      height: 3px;
      background-color: #F5F5F5;
   }
   .selectedPlaceholder::-webkit-scrollbar-thumb {
      background-color: #000000;
   }
   .selectedPlaceholder::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      background-color: #F5F5F5;
   }
   .search_directory .chosen-container{
      width: 100% !important;
  }
  .search_directory .chosen-container-single .chosen-single{
      background: none !important;
      box-shadow: none !important;
      padding: 10px !important;
      height: 45px !important;
   }
   .search_directory .chosen-container-single .chosen-single b{
      display: none !important;
   }
   .search_directory .chosen-container-active.chosen-with-drop .chosen-single {
      border-bottom-left-radius: 0 !important;
      border-bottom-right-radius: 0 !important;
   }
   .search_directory .accordion .tags{
      background: none !important;
   }
   .search_directory .chosen-container-multi .chosen-choices{
      background: none !important;
      border: 1px solid #aaa;
      border-radius: 5px;
      padding: 10px !important;
      box-shadow: none !important;
      height: 45px !important;
   }
    
   .search_directory .chosen-container-active .chosen-choices{
      border-bottom-left-radius: 0 !important;
      border-bottom-right-radius: 0 !important;
   }
   .search_directory .chosen-container-multi .chosen-choices li.search-field input[type="text"] {
      margin: 0 !important;
   }
   .search_directory .chosen-container .chosen-drop{
      /* border: none !important; */
      box-shadow: none !important;
      border-radius: 0 0 4px 4px !important;
   }
   .search_directory .chosen-container .chosen-results {
      margin: 0 !important;
      padding: 0 !important;
   }

   .accordion  .chosen-choices{
      border: none !important;
      background: none !important;
   }
</style>