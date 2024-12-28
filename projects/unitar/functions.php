<?php



/*
* Sorts programmes array and the campus array in reverse order
* Thierry 
* 2018-02-15
*/

function cmp_programmes($a, $b)
{
	return strcmp($a['text'], $b['text']);
}

function cmp_campus($a, $b)
{
    return strcmp($b['text'], $a['text']);
}

//	Sort descending index array with subarray text
function build_sorter($cl) {
	return function ($a, $b) use ($cl) {
		return strcmp($cl[$a]['text'], $cl[$b]['text']);
	};
}
//	Sort descending index array with subarray text
function build_sorter_desc($cl) {
	return function ($a, $b) use ($cl) {
		return strcmp($cl[$b]['text'], $cl[$a]['text']);
	};
}    
    
function sql_list_categories($wpdb)
{
	$querystr = "
		SELECT t.term_id, t.name, t.slug
		FROM $wpdb->terms AS t 
		JOIN $wpdb->term_taxonomy AS tt ON tt.term_id = t.term_id 
		WHERE tt.taxonomy='product_cat' AND t.name != 'Uncategorised' ORDER BY t.name";
	$sql_result = $wpdb->get_results($querystr, OBJECT);
	$list = array();
	foreach($sql_result as $record) {
		$list[intval($record->term_id)] = $record;
	}
	return $list;
}

function sql_list_cat_prog_ids($wpdb)
{
	$querystr = "
		SELECT tt.term_taxonomy_id AS cat_id, tr.object_id AS prog_id FROM $wpdb->term_taxonomy AS tt
		LEFT JOIN $wpdb->term_relationships AS tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
		WHERE tt.taxonomy = 'product_cat'";
	$sql_result = $wpdb->get_results($querystr, OBJECT);
	$list = array();
	foreach($sql_result as $record) {
		$list[intval($record->cat_id)][] = intval($record->prog_id);
	}
	return $list;
}

function sql_list_programmes($wpdb)
{
	$querystr = "
		SELECT ID, post_title, post_date, post_name, pm.meta_value AS pretty_title,
		REPLACE( REPLACE( REPLACE( REPLACE( wpo.option_value, '%year%', DATE_FORMAT(wpp.post_date,'%Y') ), '%monthnum%', DATE_FORMAT(wpp.post_date, '%m') ), '%day%', DATE_FORMAT(wpp.post_date, '%d') ), '%postname%', wpp.post_name ) AS permalink
		FROM $wpdb->posts wpp
		JOIN $wpdb->options wpo ON wpo.option_name = 'permalink_structure'
		LEFT JOIN wp_postmeta pm ON ID=pm.post_id AND pm.meta_key='cmb_pretty_title'
		WHERE post_type='product'
			AND post_status='publish'";
	$sql_result = $wpdb->get_results($querystr, OBJECT);
	$list = array();
	foreach($sql_result as $record) {
		$list[intval($record->ID)] = $record;
	}
	return $list;
}

function sql_list_prog_campus_ids($wpdb)
{
	//	Get the list of campuses' IDs for each programme ID
	$querystr = "
		SELECT tt.term_taxonomy_id AS campus_id, tr.object_id AS prog_id FROM $wpdb->term_taxonomy AS tt
		JOIN $wpdb->term_relationships AS tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
		WHERE tt.taxonomy = 'campus'";
	$sql_result = $wpdb->get_results($querystr, OBJECT);
	$list = array();
	foreach($sql_result as $record) {
		$list[intval($record->prog_id)][] = intval($record->campus_id);
	}
	return $list;
}

function sql_list_campuses($wpdb)
{
	$querystr = "SELECT t.term_id, t.name, t.slug, tm.meta_value FROM $wpdb->terms AS t 
		JOIN $wpdb->term_taxonomy AS tt ON tt.term_id = t.term_id
		LEFT JOIN $wpdb->termmeta AS tm ON tt.term_id = tm.term_id AND meta_key = 'cmb_term_long_name'
		WHERE tt.taxonomy='campus' AND t.name != 'Uncategorised' ORDER BY t.name";
	$sql_result = $wpdb->get_results($querystr, OBJECT);
	$list = array();
	foreach($sql_result as $record) {
		$list[intval($record->term_id)] = $record;
	}
	return $list;
}


add_filter( 'gform_pre_render_3', 'populate_form1' );

function populate_form1( $form ) {

global $post, $wp_query, $wpdb, $product;
	$setCat = $wp_query->query_vars['pagename'];
		
	$isProduct = is_product();

	//
	//	gather all data in arrays to reduce queries to 5 and speed up the loop.
	//	here we'll be populating the following lists: categories, programmes and campuses.
	//

	//	Get the different lists of items from the DB to fill in the forms and jQuery lists

	$sql_categories = sql_list_categories($wpdb);
	$sql_cat_progs = sql_list_cat_prog_ids($wpdb);
	$sql_programmes = sql_list_programmes($wpdb);
	$sql_prog_campuses = sql_list_prog_campus_ids($wpdb);
	$sql_campuses = sql_list_campuses($wpdb);

	//
	//	And ze big loop to sort the lists and populate the GF lists
	//

	$script = '';
	$prog_campuses = array();
	$programmesList = array();
	$campusSelect = array();

	foreach($sql_categories as $category) {
		$current_cat = sanitize_title($category->name);

		$programmesList[] = array( 'text' => '» '.$category->name, 'value' => $current_cat);

		$tmpProgs = array();
		foreach($sql_cat_progs[$category->term_id] as $programme_id) {
			if(!isset($sql_programmes[$programme_id])) continue;
			$record = $sql_programmes[$programme_id];

			$pTitle = $record->pretty_title;
			if(empty($pTitle)) $pTitle = $record->post_title;
			$stitle = basename($record->permalink);
			$tmpProgs[] = array( 'text' => __(($pTitle), 'ozh_reap'), 'value' => $stitle);

// 			$prog_campuses[$stitle] = $sql_prog_campuses[$programme_id];
		}	

		uasort($tmpProgs, 'cmp_programmes');
		$programmesList = array_merge($programmesList, $tmpProgs);
		unset($tmpProgs);
	
	}	//	end foreach($categories as $category)


	//
	//	Build the campuses lists
	//

	$campus_list = array();		//	List of all campuses for jQuery

	//	Full list of campuses for jQuery
	foreach ($sql_campuses as $campus){
		$campus_list[$campus->term_id] = array( 'text' => html_entity_decode($campus->name), 'value' => $campus->meta_value);			
	}
/*

	//	sort campuses IDs by name for each programme
	$fn = build_sorter_desc($campus_list);
	foreach($prog_campuses as $st => $cp) {
		usort($prog_campuses[$st], $fn);
	}
*/

	//	if we have a programme selected, build the list with only available campuses.
	if($isProduct) {
		$campus_id = 0;
		$campus_choices = array();
		foreach($sql_prog_campuses[$post->ID] as $campus_id) {
			$campus = $sql_campuses[$campus_id];
			$campus_choices[$campus->term_id] = array( 'text' => html_entity_decode($campus->name), 'value' => $campus->meta_value);			
		}
	} else {
		$campus_choices = $campus_list;
	}

	unset($sql_campuses, $sql_cat_progs, $sql_categories, $sql_prog_campuses, $sql_programmes);

	//	Select a programme
	$field = GFFormsModel::get_field($form, 12);
	$field->placeholder = 'Select a programme...';
	$field->choices = $programmesList;		
	$field->defaultValue = $setCat;
	if($isProduct) $field->defaultValue = $post->post_name;


return $form;

}

add_filter( 'rest_authentication_errors', function( $result ) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }

    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }

    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});


/**********************************************************************
** WEBSITE REVAMP
* *********************************************************************/



// Remove default logo
/*add_filter( 'generate_logo_output', function( $output, $logo_url, $html_attr ) {
    return;
}, 10, 3 );*/


//add_filter('body_class', 'add_entity_page_class');
function add_entity_page_class($classes) {
    $cur_obj = get_queried_object()->post_type;
   

    if ($cur_obj == 'product' || $cur_obj == 'page'){
        
    }
    

    return $classes;
}



// Add Institute menus
/* register_nav_menus(
	array(
        'institute_en' => __( 'Institute Menu', 'unitar' ),
        'institute_bm' => __( 'Bahasa Institute Menu', 'unitar' ),
	)
);*/


//add_action('generate_before_header', 'top_bar_nav');
function top_bar_nav(){
	?>
	<div class="top-bar-custom hide-on-mobile hide-on-tablet">
		<div class="grid-container inside-top-bar-custom">
			<div>
				<span>Explore journeys:</span>
			</div>
			<div>
				<?php
					global $post;

					$current_page_lang =  get_post_meta(get_the_ID(), 'language_switch', true);
	
					if ($current_page_lang[0] == "EN" ){
						wp_nav_menu(
							array(
								'theme_location' => 'institute_bm',
								'container' => 'div',
								'container_class' => 'top-nav',
								'menu_class' => '',
								'fallback_cb' => false,
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth' => 1,
							)
						);
					}elseif ($current_page_lang[0] == "MY"){
						wp_nav_menu(
							array(
								'theme_location' => 'institute_en',
								'container' => 'div',
								'container_class' => 'top-nav',
								'menu_class' => '',
								'fallback_cb' => false,
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth' => 1,
							)
						);
					}else{
						wp_nav_menu(
							array(
								'theme_location' => 'institute_en',
								'container' => 'div',
								'container_class' => 'top-nav',
								'menu_class' => '',
								'fallback_cb' => false,
								'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth' => 1,
							)
						);
					}

				?>
			</div>
		</div>
	</div>
	<?php
}








//add_filter( 'post_type_link', 'custom_product_permalink', 99, 2 );
function custom_product_permalink( $post_link, $post ) {
    if ( is_object( $post ) && $post->post_type == 'product' ) {
        $terms = wp_get_object_terms( $post->ID, 'institute' );

        // Check if the terms exist and the array is not empty
        if ( $terms && ! is_wp_error( $terms ) && ! empty( $terms ) ) {
            // Modify the URL structure
            $post_link = str_replace( '/programme/', '/' . $terms[0]->slug . '-/programme/', $post_link );
        }
    }

    return $post_link;
}


add_action( 'gform_after_submission', 'push_to_datalayer', 10, 2 );
function push_to_datalayer( $entry, $form ) {
    // Construct the data you want to send to dataLayer
    ?>
    <script>
          let programname = jQuery('#programme-header h1').text().trim();
             dataLayer.push({
               'event': 'submit_course_inquiry',
               'programName': programname,
               'buttonName': 'Submit',
               'formId': "<?php echo $form['id']; ?>",
               'formName': "<?php echo $form['title']; ?>",
               'formDestination': window.location.href,
               });
               
              setTimeout(function() {
                    console.log('program');
                }, 3000); 
    </script>
    <?php
}


// Metabox-Testing custom post register file
// require_once get_template_directory() . "/inc/news_post_type.php"; //for main theme = get_stylesheet_directory
require_once get_stylesheet_directory() . "/inc/news_post_type.php"; //for child theme = get_template_directory
require_once get_stylesheet_directory() . "/inc/guides_post_type.php";