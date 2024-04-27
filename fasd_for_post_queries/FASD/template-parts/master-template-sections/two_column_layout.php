<?php
$layouts = get_sub_field('type_of_layout');
// print_r($layouts);
if ($layouts === 'Text & Visual Duo') {
     $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two-column-layouts/textandimage.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}elseif ($layouts === 'Visual Duo & Text Editor') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two-column-layouts/imageand_texteditor.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}elseif ($layouts === 'Both Side Visual') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two-column-layouts/BothSide_Visual.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
} elseif ($layouts === 'Visual & Multiple Text Editor') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two-column-layouts/imageand_multiple_editor.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
} elseif ($layouts === 'Both Side Text & Image') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two-column-layouts/Bothside_TextandImage.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
} elseif ($layouts === 'Both Side Text') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/two-column-layouts/both_side_text.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
} else {
    // Handle other cases or display an error message
    echo 'Unknown layout: ' . $layouts;
}
?>
