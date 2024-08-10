
<style>
    .absolute_link{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
</style>
<section class="surgeon_services">
    <div class="container">
        <div class="head">
            <h2 class="sec_hdng">Services</h2>
        </div>
        <div class="services_grid">
    <?php
    $featured_posts = get_field('services_list');
    // Uncomment below line if you need to debug and see the structure of $featured_posts
    if( $featured_posts ): ?>
        <?php foreach( $featured_posts as $post ): 
            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>
         <div class="service_wrap" style="position:relative">
                <figure>
                    <img src="/wp-content/uploads/2024/08/hip_surgery.png" alt="">
                </figure>
                <h5 class="title"><?php the_title(); ?></h5>
                <a href="<?php the_permalink(); ?>" class="absolute_link"></a>
            </div>
        <?php endforeach; ?>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>
</div>

    </div>
</section>
