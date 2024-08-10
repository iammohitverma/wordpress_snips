
<section class="find-section our_specialist">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="find-hdng">Our Specialists</h3>
            </div>

            <div class="surgeons_list">
          
</div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="service-slider">
                    <div class="owl-carousel owl-theme" id="find-slider-home">

    <?php
    // Get the current service ID
    $current_service_id = get_the_ID();

    // Query surgeons related to the current service
    $args = array(
        'post_type' => 'surgeons',
        'meta_query' => array(
            array(
                'key' => 'services_list', // This is the relationship field in surgeons
                'value' => '"' . $current_service_id . '"', // Need to quote the ID for LIKE comparison
                'compare' => 'LIKE'
            )
        )
    );

    $related_surgeons = new WP_Query($args);

    if( $related_surgeons->have_posts() ): ?>
        <?php while( $related_surgeons->have_posts() ): $related_surgeons->the_post(); ?>
            <div class="item">
                <div class="card">
                    <div class="card-body">
                        <img src="/wp-content/uploads/2024/08/find-slider-4.png" alt="slider-icons-1">
                        <h3 class="slider-hdnd"><?php the_title(); ?></h3>
                        <p class="slider-desc"><?php the_field('specialization'); ?></p> <!-- Assuming you have a field for surgeon specialization -->
                        <a href="<?php the_permalink(); ?>"></a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php else: ?>
        <p>No surgeons found for this service.</p>
    <?php endif; ?>
   
                    </div>
                    <!-- <div class="slider_btn">
                            <a href="#" class="btn btn-success">SEE All Services</a>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</section>