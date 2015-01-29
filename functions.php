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
    // set_post_thumbnail_size( 250, 200, true );

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

	wp_enqueue_style( 'prefix-font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '4.1.0' );

    wp_enqueue_script( 'ui', get_template_directory_uri() . '/js/ui.js',  array('jquery'));

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


/* custom taxonomy for featured posts - PG 25 Sep 2012 */

function features_init() {
    // create a new taxonomy
    $labels = array(
    'name' => _x( 'Features', 'taxonomy general name' ),
    'singular_name' => _x( 'Feature', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Features' ),
    'all_items' => __( 'All Features' ),
    'parent_item' => __( 'Parent Feature' ),
    'parent_item_colon' => __( 'Parent Feature:' ),
    'edit_item' => __( 'Edit Feature' ),
    'update_item' => __( 'Update Feature' ),
    'add_new_item' => __( 'Add New Feature' ),
    'new_item_name' => __( 'New Feature' ),
    'menu_name' => __( 'Feature' ),
  );

    register_taxonomy(
        'feature',
        array('post','essexuni_news'),
        array(
            'labels' => $labels,
            'hierarchical' => true,
            'rewrite' => array( 'slug' => 'feature' )
        )
    );
}
add_action( 'init', 'features_init' );



/* custom taxonomy for sections (for post icons) */

function sections_init() {
	// create a new taxonomy
	$labels = array(
    'name' => _x( 'Content Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Content Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Content Type' ),
    'all_items' => __( 'All Content Types' ),
    'parent_item' => __( 'Parent Section' ),
    'parent_item_colon' => __( 'Parent Content Types:' ),
    'edit_item' => __( 'Edit Content Type' ),
    'update_item' => __( 'Update Content Type' ),
    'menu_name' => __( 'Content Types' ),
  );

	register_taxonomy(
		'content_types',
		array('post','essexuni_news'),
		array(
			'labels' => $labels,
			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'content_types' )
		)
	);
}
add_action( 'init', 'sections_init' );



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
			'taxonomies' => array('category','post_tag','feature','content_types'), //add multiple existing categories to this custom post type
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )

		)
	);
}
add_action( 'init', 'create_post_type' );


add_action( 'wp_enqueue_scripts', 'retina_support_enqueue_scripts' );


function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'essexuni_news'
    ));
    return $query;
  }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );




function top_level_category_list() {
  $args = array(
            'hide_empty'  => 1,
            'parent'      => 0,
            'exclude'     => array(1,19,20)
            );
  $categories = get_categories( $args );
  foreach($categories as $category) {
    echo '<li><a href="';
    echo get_category_link( $category->term_id );
    echo '">';
    echo $category->name;
    echo '</a></li>';
   }
}



// Show posts of 'post', 'page' and 'news in brief' post types on home page
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'essexuni_news') );
    return $query;
}


//add single-post class to post_class for single posts
function add_post_class_to_single_post( $classes ) {
    if ( is_single() ) {
        array_push( $classes, 'single-post' );
    } // end if
    return $classes;
}
add_filter( 'post_class', 'add_post_class_to_single_post' );


//add extra fields to the user profile
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

    <h3>Extra profile information</h3>

    <table class="form-table">

        <tr>
            <th><label for="title">Title e.g. Professor</label></th>

            <td>
                <input type="text" name="title" id="title" value="<?php echo esc_attr( get_the_author_meta( 'title', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your title.</span>
            </td>
        </tr><tr>
            <th><label for="jobtitle">Job Title</label></th>

            <td>
                <input type="text" name="jobtitle" id="jobtitle" value="<?php echo esc_attr( get_the_author_meta( 'jobtitle', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your job title.</span>
            </td>
        </tr>
        <tr>
            <th><label for="excerpt">Brief Excerpt</label></th>

            <td>
                <input type="text" name="excerpt" id="excerpt" value="<?php echo esc_attr( get_the_author_meta( 'excerpt', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter a brief excerpt.</span>
            </td>
        </tr>

    </table>
<?php }



add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
    update_usermeta( $user_id, 'title', $_POST['title'] );
    update_usermeta( $user_id, 'jobtitle', $_POST['jobtitle'] );
    update_usermeta( $user_id, 'excerpt', $_POST['excerpt'] );
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



// //baseline.js - set image margins to
// function add_baseline() {
// wp_enqueue_script(
//     'baseline', // name your script so that you can attach other scripts and de-register, etc.
//     get_template_directory_uri() . '/js/baseline.js', // this is the location of your script file
//     array('jquery') // this array lists the scripts upon which your script depends
// );
// }
// add_action( 'wp_enqueue_scripts', 'add_baseline' );


/* add style snippets dropdown to text editor */

/* taken from http://alisothegeek.co lscm/2011/05/tinymce-styles-dropdown-wordpress-visual-editor */

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
    	array(
    		'title' => 'Pullquote',
    		'block' => 'blockquote',
    		'classes' => 'pull-quote'

        ),
         array(
            'title' => 'Blockquote',
            'block' => 'blockquote'
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

add_action( 'admin_init', 'add_my_editor_style' );

function add_my_editor_style() {
	add_editor_style();
}

function truncate_title($limit) {
  $title = get_the_title($post->ID);
  $getlength = strlen($title);
  if ($getlength > $limit){
    $title = preg_replace('/\s+?(\S+)?$/', '', substr($title, 0, $limit)).'... ';
  }
  echo $title;
}

if (!wp_next_scheduled('relevanssi_build_index')) {
    wp_schedule_event( time(), 'daily', 'relevanssi_build_index' );
}


add_filter( 'post_thumbnail_html', 'make_post_thumbnail_link', 10, 3 );

function make_post_thumbnail_link( $html, $post_id, $post_image_id ) {

    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';

    return $html;
}

remove_filter('pre_user_description', 'wp_filter_kses');


function authorNotification( $new_status, $old_status, $post ) { 
    if ( $new_status == 'publish' && $old_status != 'publish' ) 
        { $author = get_userdata($post->post_author); 
        $message = " Hi ".$author->display_name.", New post, ".$post->post_title." has just been published at ".get_permalink( $post->ID ).". "; 
    wp_mail($author->user_email, "New Post Published", $message); 
} } 
add_action('transition_post_status', 'authorNotification', 10, 3 );


// TRIBE EVENTS CALENDAR SPECIFIC

// Hide event calendar ical and google+ links

/*
 * Removes the Google Calendar and iCal single event links
 */

add_action('tribe_events_single_event_before_the_content', 'tribe_remove_single_event_links');

function tribe_remove_single_event_links () {
    remove_action( 'tribe_events_single_event_after_the_content', array( 'TribeiCal', 'single_event_links' ) );
}

/*
 * Uncomment the following action to add the Google Calendar Link
 */

//add_action('tribe_events_single_event_after_the_content', 'tribe_add_gcal_link');

function tribe_add_gcal_link()  {

    // don't show on password protected posts
    if (is_single() && !post_password_required()) {
        echo '<div class="tribe-events-cal-links">';
        echo '<a class="tribe-events-gcal tribe-events-button" href="' . tribe_get_gcal_link() . '" title="' . __( 'Add to Google Calendar', 'tribe-events-calendar' ) . '">+ ' . __( 'Google Calendar', 'tribe-events-calendar-pro' ) . '</a>';
        echo '</div><!-- .tribe-events-cal-links -->';
    }

}

/*
 * Uncomment the following action to add the iCal Link
 */

//add_action('tribe_events_single_event_after_the_content', 'tribe_add_ical_link');

function tribe_add_ical_link()  {

    // don't show on password protected posts
    if (is_single() && !post_password_required()) {
        echo '<div class="tribe-events-cal-links">';
        echo '<a class="tribe-events-ical tribe-events-button" href="' . tribe_get_single_ical_link() . '">+ ' . __( 'iCal Import', 'tribe-events-calendar' ) . '</a>';
        echo '</div><!-- .tribe-events-cal-links -->';
    }

}

// Remove ical import for all events on the events list


remove_filter('tribe_events_after_footer', array('TribeiCal', 'maybe_add_link'), 10, 1);

#remove related links from under posts
add_filter( 'rp4wp_append_content', '__return_false' );
