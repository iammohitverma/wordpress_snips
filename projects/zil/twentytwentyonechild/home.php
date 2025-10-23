<?php
/**
 * Template Name: Blog Page
 *
 * Displays the blog posts dynamically.
 *
 * @package twentytwentyonechild
 */

get_header(); ?>

<section class="breadcrumb_section pt_100 pb_100">
    <div class="container">
        <div class="text_wrap">
            <p><a class="inherit_parent_color" href="<?php echo home_url(); ?>">Home</a> &gt; Blog</p>
            <hr/>
            <h1 class="fs_56">Our Blog</h1>
        </div>
    </div>
</section>

<section class="blog_posts_sec pt_100 pb_100">
    <div class="container">
        <div class="row">
            <?php
            // Set up pagination
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // Custom query for blog posts
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'paged'          => $paged,
                'post_status'    => 'publish',
            );

            $blog_query = new WP_Query($args);

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog_post_card">
                            <div class="img_wrap">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid cover')); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="/wp-content/uploads/2025/10/placeholder_white.jpg" alt="<?php the_title(); ?>" class="img-fluid cover">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="text_wrap">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  <?php
                                    // Get categories without links
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo '<div class="post_meta mb_10">';
                                        
                                        // Categories (as span tags)
                                        echo '<div class="post_categories me-2">';
                                        foreach ($categories as $cat) {
                                            echo '<span class="category_tag">' . esc_html($cat->name) . '</span> ';
                                        }
                                        echo '</div>';

                                        // Publish Date
                                        echo '<span class="post_date">' . get_the_date('F j, Y') . '</span>';

                                        echo '</div>';
                                    } else {
                                        // Show only date if no categories
                                        echo '<div class="post_meta mb_10">';
                                        echo '<span class="post_date">' . get_the_date('F j, Y') . '</span>';
                                        echo '</div>';
                                    }
                                    ?>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                <a href="<?php the_permalink(); ?>" class="site_btn text-white">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            else : ?>
                <div class="col-12 text-center">
                    <p>No posts found.</p>
                </div>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div>

        <!-- Pagination -->
        <div class="pagination_wrap text-center mt_40">
            <?php
            echo paginate_links(array(
                'total'     => $blog_query->max_num_pages,
                'current'   => max(1, $paged),
                'mid_size'  => 2,
                'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                'next_text' => '<i class="fa-solid fa-angle-right"></i>',
            ));
            ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>
