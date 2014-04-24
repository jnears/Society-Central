<?php
/**
 * societycentral functions and definitions
 *
 * @package societycentral
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'societycentral_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function societycentral_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on societycentral, use a find and replace
	 * to change 'societycentral' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'societycentral', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'societycentral' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'societycentral_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // societycentral_setup
add_action( 'after_setup_theme', 'societycentral_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function societycentral_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'societycentral' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'societycentral_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function societycentral_scripts() {
	wp_enqueue_style( 'societycentral-style', get_stylesheet_uri() );

	wp_enqueue_script( 'societycentral-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'societycentral-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'societycentral_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */

require get_template_directory() . '/inc/jetpack.php';

// Added by jon for society central theme

function headline_init() {
	// create a new taxonomy
	$labels = array(
    'name' => _x( 'Headlines', 'taxonomy general name' ),
    'singular_name' => _x( 'Headline', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Headlines' ),
    'all_items' => __( 'All Headlines' ),
    'parent_item' => __( 'Parent Headline' ),
    'parent_item_colon' => __( 'Parent Headline:' ),
    'edit_item' => __( 'Edit Headline' ),
    'update_item' => __( 'Update Headline' ),
    'add_new_item' => __( 'Add New Headline' ),
    'new_item_name' => __( 'New Headline' ),
    'menu_name' => __( 'Headline' ),
  );

	register_taxonomy(
		'headline',
		array('post','essexuni_news'),
		array(
			'labels' => $labels,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'headline' )
		)
	);
}
add_action( 'init', 'headline_init' );



// Create the 'News in brief' post type
function create_post_type() {
	register_post_type( 'essexuni_news',
		array(
			'labels' => array(
				'name' => __( 'News in brief' ),
				'singular_name' => __( 'News in brief' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'news-in-brief'),
			'menu_position' => 5,
			'taxonomies' => array('category','post_tag','feature','content_types')
		)
	);
}
add_action( 'init', 'create_post_type' );



if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

//remove toggle grid prior to go live
function add_togglegrid() {
wp_enqueue_script(
    'togglegird', // name your script so that you can attach other scripts and de-register, etc.
    get_template_directory_uri() . '/js/togglegrid.js', // this is the location of your script file
    array('jquery') // this array lists the scripts upon which your script depends
);
}
add_action( 'wp_enqueue_scripts', 'add_togglegrid' );
