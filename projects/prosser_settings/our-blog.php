<?php
/* Template Name: Blog  */
get_header('commercial');
?>

<section class="blog_page">
    <div class="heading_area">
        <div class="container">
            <h1 class="hdng text-center"><?php echo the_title(); ?></h1>
        </div>
    </div>

    <div class="posts_listing_cards">
        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Pagination
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $post_id = get_the_ID();
                        $thumbnail_url = '';

                        if (has_post_thumbnail()) {
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        }
                        ?>

                        <div class="col-lg-6">
                            <div class="post_card">
                                <div class="img_wrap">
                                    <img src="<?php echo $thumbnail_url; ?>" alt="" class="absolute_set">
                                </div>
                                <div class="details_wrap">
                                    <h4><?php echo the_title(); ?></h4>
                                    <p>Read More ></p>
                                </div>
                                <!-- set post's permalink in anchor below -->
                                <a href="<?php echo the_permalink(); ?>" class="absolute_set"></a>
                            </div>
                        </div>

                        <?php
                    endwhile;
                    ?>
                    <div class="pagination">
                        <?php
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(
                            array(
                                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $the_query->max_num_pages
                            )
                        );
                        ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                else:
                    echo "No Posts Found";
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer('commercial'); ?>