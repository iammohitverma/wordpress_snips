<?php

function my_acf_blocks_init() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'custom_block',
            'title'             => __('Custom Block by mohit'),
            'description'       => __('A custom block created with ACF.'),
            'render_template'   => get_stylesheet_directory() . '/blocks/custom-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('custom', 'block'),
            'supports'          => array(
                'align' => true, 
                'jsx' => true
            ),
            'enqueue_assets'    => function() {
                wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
                wp_enqueue_style('custom-block-css', get_stylesheet_directory() . '/css/custom-block.css');
                wp_enqueue_script('custom-block-js', get_stylesheet_directory() . '/js/custom-block.js', array('jquery'), null, true);
            },
            'example' => array( // Enables preview in the block editor
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'is_preview' => true
                    )
                )
            ),
        ));
    }
}
add_action('acf/init', 'my_acf_blocks_init');
