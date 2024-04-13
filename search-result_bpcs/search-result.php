<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package boldpark-theme
 */

?>



<section class="search-result">
    <div class="container">
        <h3 class="search_hdng alert alert-info text-center">Search results for = <?php echo get_search_query();?> </h3>
        <div class="posts_wrapper">
            <div class="row">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <!-- Post Content here  -->
                    <div class="col-md-6 col-lg-4">
                        <div class="post_card">
                            <div class="post-thumbnail mb-3 mb-lg-0">
                                <?php if (get_the_post_thumbnail_url()) : ?>
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'custom-size2')); ?>" class="img-fluid" alt="">
                                <?php else : ?>
                                    <img src="/wp-content/uploads/2024/04/placeholder.png" class="img-fluid" alt="">
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="postLink"></a>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="post-meta">
                                    <div class="post-tags">
                                        <!-- fetch tags of current post -->
                                        <!-- /*---- get post tags ----*/ -->
                                        <?php  
                                            $posttags = get_the_tags();
                                            if ($posttags) {
                                                foreach($posttags as $tag) {
                                                    echo '<a href="' .  get_tag_link( $tag->term_id ) . '">' . esc_html( $tag->name ) . '</a> ';
                                                }
                                            }
                                        ?>
                                    </div>


                                <!-- <span> by <a href="
                                    <?php 
                                    // echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>">
                                    <strong>
                                        <?php 
                                        // the_author();
                                        ?>
                                    </strong>
                                    </a> 
                                    <?php
                                    //  the_date();?> | <?php
                                    //  the_time();
                                    ?>
                                </span> -->
                                    <span> by <strong><?php the_author();?></strong> <?php the_date();?> | <?php the_time();?></span>


                                    <span class="category"> by
                                        <!-- fetch categories of current post -->
                                        <!-- /*---- get post categories ----*/ -->
                                        <?php 
                                            // $postcat = get_the_category();
                                            // if ($postcat) {
                                            //     foreach($postcat as $cat) {
                                            //         echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a> ';
                                            //     }
                                            // }
                                            $postcat = get_the_category();
                                            if ($postcat) {
                                                foreach($postcat as $cat) {
                                                    echo '<span class="cat">' . esc_html( $cat->name ) . '</span> ';
                                                }
                                            }
                                        ?>

                                    </span>
                                </div>
                                <div class="post-description">
                                    <?php the_excerpt();?>
                                </div>
                            </div>
                            <div class="readtmore_wrap">
                                <a href="<?php the_permalink(); ?>" class="cmn_btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;  
        else : ?>
            </div>
        </div>
        <div>
            <h5 class="alert alert-danger text-center">No Search result found for = <?php echo get_search_query();?> </h5>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="pagination">
                    <?php the_posts_pagination(array(
						'mid-size' => 3,
						'prev_text' => __('« previous'),
						'next_text' => __('next »'),
					)); ?>
                </div>
            </div>
        </div>
    </div>
</section>
