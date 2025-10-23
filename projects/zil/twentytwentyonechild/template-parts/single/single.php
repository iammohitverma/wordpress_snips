<?php
/**
 * The template for displaying single blog post
 *
 * @package twentytwentyonechild
 */

get_header(); ?>

<section class="breadcrumb_section pt_100 pb_100">
    <div class="container">
        <div class="text_wrap">
            <p><a class="inherit_parent_color" href="<?php echo home_url(); ?>">Home</a> &gt; <a class="inherit_parent_color" href="/blog"> Blog </a> &gt; <?php the_title(); ?></p>
            <hr/>
            <h1 class="fs_56"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<section class="single_post_wrap pt_100 pb_100">
    <div class="container">
        <div class="single_post_inner">
            <?php 
                $thumbnail = get_the_post_thumbnail( $post->ID, 'large', ['class' => 'img-fluid w-100 rounded'] );
                if ( $thumbnail ) {
                    echo '<div class="post_thumbnail">';
                    echo $thumbnail;
                    echo '</div>';
                } else { ?>
                    <div class="post_thumbnail">
                        <img src="/wp-content/uploads/2025/10/placeholder.jpeg" alt="<?php the_title(); ?>" class="img-fluid w-100 rounded">
                    </div>
                <?php
                }
            ?>
            <h1 class="fs_32"><?php the_title(); ?></h1>
            <div class="post_meta">
                <span class="post_date"><i class="fa-regular fa-calendar"></i> <?php echo get_the_date('F j, Y'); ?></span>
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<div class="post_categories mt_2">';
                    foreach ( $categories as $cat ) {
                        echo '<span class="category_tag">' . esc_html( $cat->name ) . '</span> ';
                    }
                    echo '</div>';
                }
                ?>
            </div>
            <div class="post_content mt_40">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
