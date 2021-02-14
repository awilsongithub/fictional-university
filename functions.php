

<?php

require 'utils/utils.php';

function load_files()
{
	$googleFontUrl = '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i';
	$fontAwesomeUrl = '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';

	wp_enqueue_style('custom-google-fonts', $googleFontUrl);
	wp_enqueue_style('font-awesome', $fontAwesomeUrl);

	if (strstr($_SERVER['SERVER_NAME'], 'fictional-university.local')) {
		wp_enqueue_script('main-university-js', 'http://localhost:3000/bundled.js', null, '1.0', true);
	} else {
		wp_enqueue_script('our-vendors-js', get_theme_file_uri('/bundled-assets/vendors~scripts.8c97d901916ad616a264.js'), null, '1.0', true);
		wp_enqueue_script('main-university-js', get_theme_file_uri('/bundled-assets/scripts.24642e6049be0a6ef2e3.js'), null, '1.0', true);
		wp_enqueue_style('our-main-styles', get_theme_file_uri('bundled-assets/styles.css'));
	}
}
add_action('wp_enqueue_scripts', 'load_files');

function university_features()
{
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'university_features');

function university_adjust_queries($q) {

	if(!is_admin() AND is_post_type_archive('event') AND $q->is_main_query()) {
		$q->set('order', 'ASC');
		$q->set('meta_key', 'event_date');
		$q->set('orderby', 'meta_value_num');
		$q->set('meta_query', noPastEvents());
	};
};
add_action('pre_get_posts', 'university_adjust_queries');

?>