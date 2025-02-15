<?php
// <!-- Woocommerce -->
delete_transient( 'wc_stripe_appearance' );
delete_transient( 'wc_stripe_blocks_appearance' );


add_filter('wc_stripe_get_element_options', function ($options) {
    $options['appearance'] = (object) [
        'fonts' => [
            (object) [
                'family' => 'Reo Sans',
                'cssSrc' => 'https://cdn.jsdelivr.net/gh/chauhan07/snipshot/Reo_Sans/stylesheet-reo.css?ver=1.0.0',
                'style' => 'normal'
            ]
        ],
        'variables' => (object) [
            'fontFamily' => 'Reo Sans',
        ],
        'rules' => (object) [
            '.Label' => (object) [
                'fontFamily' => 'Reo Sans',
                'fontSize' => '20px',
                'fontWeight' => '400',
                'color' => 'black'
            ]
        ]
    ];
    return $options;
});




// Change Stripe fonts | Forminator Plugin Hook
add_filter('forminator_field_stripe_markup', function ($markup, $attr) {
    if (!empty($attr['data-elements-options'])) {
        $data_options = json_decode($attr['data-elements-options'], true);
        // Ensure 'fonts' array exists
        if (!isset($data_options['appearance']['fonts'])) {
            $data_options['appearance']['fonts'] = [];
        }
        // Add custom font
        $data_options['fonts'] = [
            [
               'family' => 'Reo Sans',
               'cssSrc' => 'https://cdn.jsdelivr.net/gh/chauhan07/snipshot/Reo_Sans/stylesheet-reo.css?ver=1.0.0',
               'style' => 'normal'
            ]
        ];
        $data_options['appearance']['variables'] = array_merge($data_options['appearance']['variables'], [
            "fontSizeBase" => "18px",
            "fontFamily" => "Reo Sans",
            "fontWeightNormal" => "600" 
        ]);
        $updated_options = esc_attr(json_encode($data_options));
        $markup = preg_replace('/data-elements-options=[\'"][^\'"]+[\'"]/', 'data-elements-options=\'' . $updated_options . '\'', $markup);
    }
    return $markup;
}, 10, 2);



