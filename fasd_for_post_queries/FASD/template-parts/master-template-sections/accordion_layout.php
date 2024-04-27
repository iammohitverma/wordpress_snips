<?php
$layouts = get_sub_field('type_of_layout');
//echo $layouts;
if ($layouts === 'Accordion And Visual Duo') {
     $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/accordion_layouts/accordion_and_text_editor.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}elseif ($layouts === 'Accordion And Text Editorr') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/accordion_layouts/accordion_and_visual_duo.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}elseif ($layouts === 'Both Side Accordion') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/accordion_layouts/both_side_accordion.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}
?>