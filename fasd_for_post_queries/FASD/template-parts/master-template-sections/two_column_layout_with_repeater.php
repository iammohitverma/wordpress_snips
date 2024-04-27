<?php
$layouts = get_sub_field('type_of_layout');
// print_r($layouts);
if ($layouts === 'Text & Visual Duo') {
     $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two_col_with_repeater/Textand_Visual.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}elseif ($layouts === 'Both Side Text') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two_col_with_repeater/both_side_text.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}
elseif ($layouts === 'Both Side Visual') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two_col_with_repeater/both_side_visual.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}