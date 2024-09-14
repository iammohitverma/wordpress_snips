<?php /* Template Name: Announcements */
get_header();
?>

<!-- <?php

//if( have_rows('sections') ):

    //while ( have_rows('sections') ) : the_row();

        //if( get_row_layout() == 'banner_section' ):
            //$banner_image = get_sub_field('banner_background_image'); ?>
            <section class="banner_sec banner_with_image">
                <div class="banner_sec_wrap">
                    <div class="image_wrap">
                        <img src="<?php //echo esc_url($banner_image['url']); ?>" alt="<?php //echo esc_attr($banner_image['alt']); ?>">
                    </div>
                </div>
            </section>

        <?php //endif;

    //endwhile;

//else :
    // Do something...
//endif; ?> -->

<!-- banner changed on 05-09-2024 -->

<?php

if( have_rows('sections') ):

    while ( have_rows('sections') ) : the_row();

        if( get_row_layout() == 'banner_section' ): ?>
            
            <section class="banner_sec_with_slider owl-carousel owl-theme">
            <?php
            if( have_rows('banner_blocks') ):

                while( have_rows('banner_blocks') ) : the_row();

                    $banner_background_image = get_sub_field('banner_background_image'); ?>
                    <div class="banner_sec_wrap" style="background-image: url('<?php echo esc_url($banner_background_image['url']); ?>');">
                        <div class="container">
                            <div class="row">
                            <?php 
                            $args = array(
                                    'post_type' => 'news',
                                    'posts_per_page' => 1,
                                    'post_status' => 'publish',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    );
                                $the_query = new WP_Query( $args );

                                if ( $the_query->have_posts() ) {

                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post(); ?>
                                            <div class="col-lg-6 col-md-8 col-sm-10 col-10">
                                                <div class="banner_sec_heading">
                                                    <p class="sub_hdng">LATEST NEWS</p>
                                                    <h1 class="hdng">
                                                        <?php echo get_the_title(); ?>
                                                    </h1>
                                                    <p class="desc">
                                                        <?php echo get_the_content(); ?>
                                                    </p>
                                                    <div class="meta_info">
                                                        <ul>
                                                            <li><?php echo get_the_date('F j, Y'); ?></li>
                                                            <!-- <li><?php //echo get_the_author(); ?></li>
                                                            <li>4min read</li> -->
                                                        </ul>
                                                    </div>
                                                    <div class="banner_sec_btn">
                                                        <a href="<?php echo get_the_permalink(); ?>" class="common_btn">Read More</a>
                                                    </div>
                                                </div>
                                            </div>  
                                    <?php }

                                } else {

                                }

                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;

            else :
                // Do something...
            endif; ?>
            </section>

        <?php endif;

    endwhile;

else :
    // Do something...
endif; ?>


<section class="tabs-section">
    <div class="loader_wrap">
        <span class="loader"></span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-6">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php
                     $cat_args = array(
                        'post_type' => 'news',
                        'taxonomy' => 'news-category',
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    );
                    $cats = get_categories($cat_args); ?>
             
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true" data-tab-name="announcements">
                            <?php echo $cats[0]->name; ?>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false" data-tab-name="presentations">
                            <?php echo $cats[2]->name; ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false" data-tab-name="media">
                            <?php echo $cats[1]->name; ?></button>
                    </li>
                </ul>
            </div>
            <div class="col-xl-4 col-lg-4 col-6">
                <div class="nav-select">
                    <p class="date-desc">Sort by date:</p>
                    <select class="form-select" aria-label="Default select example" id="post_date_filter">
                        <?php
                        $date_args = array(
                            'post_type' => 'news',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'orderby' => 'name',
                            'order'   => 'ASC',
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'news-category',
                                    'field'    => 'slug',
                                    'terms'    => 'announcements'
                                ),
                                array(
                                    'taxonomy' => 'news-category',
                                    'field' => 'slug',
                                    'term' =>  'presentations',
                                ),
                                  array(
                                    'taxonomy' => 'news-category',
                                    'field' => 'slug',
                                    'term' => 'media',
                                  ),
                            )
                        );
                        $date_query = new WP_Query( $date_args );

                        $post_date = array();
                        if ( $date_query->have_posts() ) {
                            while ( $date_query->have_posts() ) {
                                $date_query->the_post(); 

                                $get_year = get_the_date('Y');
                                // Add year to the array if it is not already present
                                if (!in_array($get_year, $post_date)) {
                                    $post_date[] = $get_year;
                                }
                            }
                            foreach ($post_date as $date) {
                                echo '<option value="' . $date . '">' . $date . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

<!-- announcement section start -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <div class="tabs-wrapping announcements_posts">
                <?php
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 5,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news-category',
                                'field'    => 'slug',
                                'terms'    => 'announcements'
                            ),
                        )
                    );
                    $the_query = new WP_Query( $args ); 

                    if ( $the_query->have_posts() ) {
                        
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); ?>
                            <p class="tabs-desc">
                                <?php echo get_the_date('F j, Y'); ?>
                            </p>
                            <h4 class="tabs-hdng">
                                <?php echo get_the_title(); ?>
                            </h4>
                        <?php }
                        
                    } else {
                        
                    }
                    wp_reset_postdata(); ?>
                </div>
                <div class="button_wrap">
                        <button class="common_btn" id="announcement_load_more_btn">Load more</button>
                </div>
            </div>
            <!-- presentations section start -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="tabs-wrapping presentation_posts">
                <?php
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 5,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news-category',
                                'field'    => 'slug',
                                'terms'    => 'presentations'
                            ),
                        )
                    );
                    $the_query = new WP_Query( $args ); 

                    if ( $the_query->have_posts() ) {
                        
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); ?>
                            <p class="tabs-desc">
                                <?php echo get_the_date('F j, Y'); ?>
                            </p>
                            <h4 class="tabs-hdng">
                                <?php echo get_the_title(); ?>
                            </h4>
                        <?php }
                        
                    } else {
                        
                    }
                    wp_reset_postdata(); ?>
                </div>
                <div class="button_wrap">
                    <button href="#" class="common_btn" id="presentation_load_more_btn">Load more</button>
                </div>
            </div>

             <!-- media section start -->
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">
                <div class="row media_posts">
                <?php
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 6,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news-category',
                                'field' => 'slug',
                                'terms' => 'media',
                            )
                        )
                    ); 

                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                        
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-tab">
                                <div class="card">
                                    <div class="card-figure">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="tab-figure-1">
                                        <!-- <h6 class="tatest-hdng">LATEST NEWS</h6> -->
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li><?php echo get_the_date('F j, Y'); ?></li>
                                            <!-- <li>4min read</li> -->
                                        </ul>
                                        <!-- <p class="desc"><?php //echo get_the_author(); ?></p> -->

                                        <h4 class="hdng">
                                            <?php echo get_the_title(); ?>
                                        </h4>

                                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-success">Read More <img src="/wp-content/uploads/2024/08/publication_arrows.svg" alt="icon"></a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        
                    } else {
                        
                    }
                    
                    wp_reset_postdata(); ?>
                    </div>
                    <div class="button_wrap">
                        <button href="#" class="common_btn" id="media_load_more_btn">Load more</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>