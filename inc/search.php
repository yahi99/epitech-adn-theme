<?php
add_action( 'wp_enqueue_scripts', 'ajax_search_enqueue_scripts' );
function ajax_search_enqueue_scripts() {
	wp_localize_script( 'epitech-script', 'searchwebsite', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	));
}

add_action( 'wp_ajax_nopriv_search_website', 'search_website' );
add_action( 'wp_ajax_search_website', 'search_website' );

function search_website() {
	$search = sanitize_text_field($_POST['q']);

	if(!$search) {
		die();
	}

	$posts = new WP_Query(
		array(
			'post_type' => 'page',
			'orderby' => 'date',
			's' => $search,
			'order' => 'DESC',
			'post_status' => 'publish',
			'posts_per_page' => 3
		)
	);

	ob_start();

	while ( $posts->have_posts() ) {
		$posts->the_post();
		get_template_part('template-parts/content', 'search-line-info');
	}

	$list_informations = ob_get_clean();

	$posts = new WP_Query(
		array(
			'post_type' => 'actu_events',
			'orderby' => 'date',
			's' => $search,
			'order' => 'DESC',
			'post_status' => 'publish',
			'posts_per_page' => 3
		)
	);

	ob_start();

	while ( $posts->have_posts() ) {
		$posts->the_post();
		get_template_part('template-parts/content', 'search-line-events');
	}

	$list_events = ob_get_clean();

	echo json_encode([
		'informations' => $list_informations,
		'events' => $list_events
	]);

	die();

}