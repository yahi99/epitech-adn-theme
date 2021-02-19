<?php

global $wp_query;

function filter_add_query_vars($query_vars)
{
    $query_vars[] = 'param' ;
    return $query_vars;
}
//add_filter( 'query_vars', 'filter_add_query_vars' );
//remove_filter( 'query_vars', 'filter_add_query_vars' );

function tatwerat_startSession() {
    if(session_id() == "") {
        session_start();
    }
}

//ajouter deux nouvelle zone de menu à mon thème
function register_my_menus() {
    register_nav_menus(
        array(
            'campus-menu' => __( 'Sur-header Campus' ),
            'footer-menu' => __( 'Menu Footer2' ),
            'campus-international-menu' => __( 'Sur-header Campus International' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

//ajouter la nouvelle zone de widget Header
function header_widgets_init() {

    register_sidebar( array(

        'name' => 'Header Area',
        'id' => 'header-widget-area',
        'before_widget' => '<div class="header-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="header-title">',
        'after_title' => '</h2>',
    ) );
}

add_action( 'widgets_init', 'header_widgets_init' );

if ( ! function_exists( 'epitech_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function epitech_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on epitech, use a find and replace
         * to change 'epitech' to the name of your theme in all the template files.
         */
        //load_theme_textdomain( 'epitech', get_template_directory() . '/languages' );
    
    
        add_editor_style( array('assets/css/editor-style.css') );
    
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
    
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
    
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
    
        add_image_size( 'event-big', 580, 640, true );
        add_image_size( 'event-news', 280, 200, true );
        add_image_size( 'fullpage', 1440, 580, true);
        add_image_size( 'network-campus', 280, 280, true);
        add_image_size( 'network-campus-large', 380, 262, true);
    
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'epitech' ),
            'preheader-campus' => esc_html__( 'Sur-header Campus', 'epitech' ),
            'preheader-campus-inter' => esc_html__( 'Sur-header Campus International', 'epitech' ),
            'footer' => esc_html__( 'Footer', 'epitech' ),
        ) );
    
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
     
    }
    endif;
    add_action( 'after_setup_theme', 'epitech_setup' );



function limit_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

// add class CSS adn-epitech body tag
function adn_class($classes) {
    // add 'class-name' to the $classes array
    if (is_front_page()) { 
        $classes[] = 'adn-epitech loading';
    }else{
        $classes[] = 'adn-epitech render';
    }
    // return the $classes array
    return $classes;
}
 
//Now add test class to the filter
add_filter('body_class','adn_class');



function isBodyClass($classToSearchFor) {
    $classes = get_body_class();

    return in_array($classToSearchFor, $classes);
}


# prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adds prefixed and sanitized locale to body classes
 *
 * @param  array $classes An array of body classes.
 * @return array
 */
add_filter( 'body_class', 'pll_plugin_body_class' );

function pll_plugin_body_class( $classes )
{
    if ( function_exists( 'PLL' ) && $language = PLL()->model->get_language( get_locale() ) )
    {
        $classes[] = 'pll-' . str_replace( '_', '-', sanitize_title_with_dashes( $language->get_locale( 'raw' ) ) );
    }

    return $classes;
}



function epitech_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'epitech' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'A column will be automatically assigned to each widget inserted', 'epitech' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'epitech_widgets_init' );

add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {

    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
    $query_vars['paged'] = $_POST['page'];
    $query_vars['posts_per_page'] = 3;

    //add_filter( 'editor_max_image_size', 'my_image_size_override' );

    $posts = new WP_Query( $query_vars );
    $GLOBALS['wp_query'] = $posts;

    $list_news = $list_events = "";


	$region = isset($_POST['region_id']) ? intval(sanitize_text_field($_POST['region_id'])) : null;
	if($region) {
		$args[] = [
			'taxonomy' => 'region',
			'field' => 'term_id',
			'terms' => array($region)
		];
	}


	$theme = isset($_POST['theme_id']) ? intval(sanitize_text_field($_POST['theme_id'])) : null;
	if($theme) {
		$args[] = [
			'taxonomy' => 'thematic',
			'field' => 'term_id',
			'terms' => array($theme)
		];
	}

    if( ! $posts->have_posts() ) {
        get_template_part( 'content', 'none' );
    }
    else {
        $posts = new WP_Query(
            array(
                'post_type' => 'actu_events',
                'category__not_in' => array(11),
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'posts_per_page' => $query_vars['posts_per_page'],
                'paged' => $query_vars['paged'],
                'tax_query' => $args
            )
        );

        ob_start();

        while ( $posts->have_posts() ) {
            $posts->the_post();
            get_template_part('template-parts/content', 'news');
        }

        $list_news = ob_get_clean();

        $queryEventFeatured = new WP_Query(
            array(
                'post_type' => 'actu_events',
                'cat' => 11,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'paged' => $query_vars['paged'],
                'tax_query' => $args
            )
        );

        ob_start();

        while ( $queryEventFeatured->have_posts() ) {
            $queryEventFeatured->the_post();
            get_template_part('template-parts/content', 'event-big');
        }

        $list_events = ob_get_clean();
    }

    remove_filter( 'editor_max_image_size', 'my_image_size_override' );

    echo json_encode([
       'args' => $query_vars,
       'news' => $list_news,
       'event' => $list_events
    ]);

    die();
}

function my_image_size_override() {
   // return array( 825, 510 );
}


/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE
Insert a template partial by using a shortcode in Elementor’s shortcode widget
——————————————————————————- */


function template_partial($atts) {
    extract(shortcode_atts(array(
        'dir' => 'template-parts',
        'name' => FALSE
    ), $atts));
    if ( $name ) {
        ob_start();
        get_template_part( $dir . '/' . $name );
        return ob_get_clean();
    }
}

//add_shortcode('partial', 'template_partial');

/*
 Then in your Elementor editor, add a shortcode widget on your page

[partial name="NAMEOFYOURPARTIAL" dir="YOURPARTIALSDIRECTORY"]

e.g. [partial name="content-hp-interviews"]

*/


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

function wpb_hook_javascript() {
    if (is_front_page()) { 
        wp_enqueue_script( 'epitech-glitch-slideshow', get_bloginfo( 'stylesheet_directory' ) . '/js/glitch-slideshow.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'epitech-particule', get_bloginfo( 'stylesheet_directory' ) . '/js/particule.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'epitech-parallax', get_bloginfo( 'stylesheet_directory' ) . '/js/smooth-parallax.js', array( 'jquery' ), '', true );
    }
  }




/**
 * Enqueue theme scripts and styles.
 */

function epitech_scripts() {
    wp_enqueue_style( 'epitech-adn', get_bloginfo( 'stylesheet_directory' ) . '/css/main.css');
    wp_enqueue_style( 'epitech-style', get_stylesheet_uri() );
    wp_enqueue_script( 'epitech-bootstrap', get_bloginfo( 'stylesheet_directory' ) . '/js/bootstrap.js', array(), '20151215', true );
    wp_enqueue_script( 'epitech-jwplayer', get_bloginfo( 'stylesheet_directory' ) . '/js/jwplayer/jwplayer.js', array(), '20151215', true );
    wp_enqueue_script( 'epitech-owlcarousel', get_bloginfo( 'stylesheet_directory' ) . '/js/owl.carousel.min.js', array(), '20151215', true );
    wp_enqueue_script( 'epitech-slick', get_bloginfo( 'stylesheet_directory' ) . '/js/slick-carousel/slick/slick.js', array(), '', true );
    wp_enqueue_script( 'epitech-ionis-ecole', 'https://static.ionis-group.com/js/ecoles.min.js', array(), '20151216', true );
    wp_enqueue_script( 'jquery.animateNumber.min', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.animateNumber.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'epitech-imagesloaded', get_bloginfo( 'stylesheet_directory' ) . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'epitech-rwdImageMaps', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.rwdImageMaps.min.js', array( 'jquery' ), '', true );
    //wp_enqueue_script( 'epitech-glitch-slideshow', get_bloginfo( 'stylesheet_directory' ) . '/js/glitch-slideshow.js', array( 'jquery' ), '', true );
    //wp_enqueue_script( 'epitech-particule', get_bloginfo( 'stylesheet_directory' ) . '/js/particule.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'epitech-classie', get_bloginfo( 'stylesheet_directory' ) . '/js/classie.js', array( 'jquery' ), '', true );
    //wp_enqueue_script( 'epitech-snap-svg', get_bloginfo( 'stylesheet_directory' ) . '/js/snap.svg-min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'epitech-modernizr', get_bloginfo( 'stylesheet_directory' ) . '/js/modernizr.custom.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'epitech-navigation', get_bloginfo( 'stylesheet_directory' ) . '/js/navigation.js', array( 'jquery' ), '', true );
    //wp_enqueue_script( 'epitech-parallax', get_bloginfo( 'stylesheet_directory' ) . '/js/smooth-parallax.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'epitech-script', get_bloginfo( 'stylesheet_directory' ) . '/js/adn.js',  array( 'jquery' ), '', true );

}

add_action( 'wp_enqueue_scripts', 'epitech_scripts' );
add_action('wp_footer', 'wpb_hook_javascript');

?>
