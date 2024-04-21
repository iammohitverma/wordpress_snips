<?php

// Change color pallet for ACF color picker
function klf_acf_input_admin_footer() { ?>

<script type="text/javascript">
(function($) {

    acf.add_filter('color_picker_args', function( args, $field ){

        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#005E7E', '#BF4846','#4F75AD', '#4AABDE', '#295576','#292929','#6D6D6D','#EEF0E7']

        // return colors
        return args;

    });

})(jQuery);
</script>

<?php }

add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');