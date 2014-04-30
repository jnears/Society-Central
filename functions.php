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
		array('post','societycentral_news'),
		array(
			'labels' => $labels,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'headline' )
		)
	);
}
add_action( 'init', 'headline_init' );


function department_init() {
	// create a new taxonomy
	$labels = array(
    'name' => _x( 'Departments', 'taxonomy general name' ),
    'singular_name' => _x( 'Department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Departments' ),
    'all_items' => __( 'All Departments' ),
    'parent_item' => __( 'Parent Department' ),
    'parent_item_colon' => __( 'Parent Department:' ),
    'edit_item' => __( 'Edit Department' ),
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Department' ),
    'menu_name' => __( 'Department' ),
  );

	register_taxonomy(
		'department',
		array('post','societycentral_news'),
		array(
			'labels' => $labels,
			'hierarchical' => true,
			 'rewrite' => array( 'slug' => 'department' )
		)
	);
}
add_action( 'init', 'department_init' );



// Create the 'News in brief' post type
function create_post_type() {
	register_post_type( 'societycentral_news',
		array(
			'labels' => array(
				'name' => __( 'News in brief' ),
				'singular_name' => __( 'News in brief' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'news-in-brief'),
			'menu_position' => 5,
			'taxonomies' => array('category','post_tag','feature','content_types') //add multiple existing categories to this custom post type
		)
	);
}
add_action( 'init', 'create_post_type' );


add_action( 'wp_enqueue_scripts', 'retina_support_enqueue_scripts' );


//authors


 
add_filter('user_contactmethods', 'my_user_contactmethods');

function my_user_contactmethods($user_contactmethods){
$user_contactmethods['twitter'] = 'Twitter Username';
$user_contactmethods['facebook'] = 'Facebook URL';
return $user_contactmethods;
}






//Enqueueing retina.js (for retina images)
function retina_support_enqueue_scripts() {
    wp_enqueue_script( 'retina_js', get_template_directory_uri() . '/js/retina.js', '', '', true );
}

add_filter( 'wp_generate_attachment_metadata', 'retina_support_attachment_meta', 10, 2 );
/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
function retina_support_attachment_meta( $metadata, $attachment_id ) {
    foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
            foreach ( $value as $image => $attr ) {
                if ( is_array( $attr ) )
                    retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
            }
        }
    }
 
    return $metadata;
}
/**
 * Create retina-ready images
 *
 * Referenced via retina_support_attachment_meta().
 */
function retina_support_create_images( $file, $width, $height, $crop = false ) {
    if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
            $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
 
            $resized_file->resize( $width * 2, $height * 2, $crop );
            $resized_file->save( $filename );
 
            $info = $resized_file->get_size();
 
            return array(
                'file' => wp_basename( $filename ),
                'width' => $info['width'],
                'height' => $info['height'],
            );
        }
    }
    return false;
}

add_filter( 'delete_attachment', 'delete_retina_support_images' );
/**
 * Delete retina-ready images
 *
 * This function is attached to the 'delete_attachment' filter hook.
 */
function delete_retina_support_images( $attachment_id ) {
    $meta = wp_get_attachment_metadata( $attachment_id );
    $upload_dir = wp_upload_dir();
    $path = pathinfo( $meta['file'] );
    foreach ( $meta as $key => $value ) {
        if ( 'sizes' === $key ) {
            foreach ( $value as $sizes => $size ) {
                $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
                if ( file_exists( $retina_filename ) )
                    unlink( $retina_filename );
            }
        }
    }
}

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
