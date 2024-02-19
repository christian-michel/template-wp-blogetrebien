<?php
/**
 * TA Portfolio functions and definitions
 *
 * @package TA Portfolio
 */

/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on TA Portfolio, use a find and replace
 * to change 'ta-portfolio' to the name of your theme in all the template files
 */
load_theme_textdomain( 'ta-portfolio', get_template_directory() . '/languages' );

// Include the Redux theme options Framework
/*
if ( !class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/redux/framework.php' );
}
*/

// Register all the theme options
require_once( get_template_directory() . '/inc/redux-config.php' );

// Theme options functions
require_once( get_template_directory() . '/inc/ta-option.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 668; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function full_page_width() {
  if ( is_page_template( 'template-no-sidebar.php' ) ) {
	global $content_width;
	$content_width = 1058; /* pixels */
  }
}
add_action( 'template_redirect', 'full_page_width' );

if ( ! function_exists( 'ta_portfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ta_portfolio_setup() {

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	// add_theme_support('post-thumbnails', array('post', 'page', 'stage') ); 
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'timeline-image', 200, 200, true );
	add_image_size( 'tab-image', 60, 60, true );
	add_image_size( 'featured-image', 750, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ta-portfolio' ),
		'secondary' => __( 'Secondary Menu', 'ta-portfolio' ),
		'footer' => __( 'Footer Menu', 'ta-portfolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ta_portfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ta_portfolio_setup
add_action( 'after_setup_theme', 'ta_portfolio_setup' );

/**
 * Ordre des champs pour les commentaires
 */
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );
function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ta_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ta-portfolio' ),
		'id'            => 'sidebar-right',
		'description'   => 'Main sidebar that appears on the right.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s well well-cmc">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'ta-portfolio' ),
		'id'            => 'sidebar-left',
		'description'   => 'Sidebar for Left Sidebar Page template.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s well well-cmc">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	/*
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ta-portfolio' ),
		'id'            => 'footer-1',
		'description'   => 'Appears on the left of the footer section of the site.',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ta-portfolio' ),
		'id'            => 'footer-2',
		'description'   => 'Appears in the middle of the footer section of the site.',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ta-portfolio' ),
		'id'            => 'footer-3',
		'description'   => 'Appears on the right of the footer section of the site.',
		'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	*/

	/*
	register_widget( 'ta_portfolio_social_widget' );
	register_widget( 'ta_portfolio_about_me_widget' );
	register_widget( 'ta_portfolio_post_tabs_widget' );
	*/
}
add_action( 'widgets_init', 'ta_portfolio_widgets_init' );



/*
 nettoyage des colonnes sur les tableaux wordpress
*/
function clean_posts_column( $columns ) {
    unset($columns['wpseo-title']);
    unset($columns['wpseo-score']);
    unset($columns['wpseo-metadesc']);
    unset($columns['wpseo-focuskw']);
	
	unset($columns['author']);
    unset($columns['comments']);
   
    unset($columns['date']);

	
	unset($columns['analytics']);
	unset($columns['stats']);
	
	unset( $columns['seotitle'] );      // SEO title
    unset( $columns['seokeywords'] );   // SEO keyword
    unset( $columns['seodesc'] );       // SEO descript
    unset( $columns['se-actions'] );    // SEO action
	
    return $columns;
}
add_filter( 'manage_edit-post_columns', 'clean_posts_column', 10, 1 );


/* afficher YOAST tout en bas des articles */
function yoast_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_bottom');



/* Ajout dune fonction de recherche sp�cifique pour les actus */
function search_template_chooser($template) {
	global $wp_query;
	$post_type = get_query_var('post_type');
	if( $wp_query->is_search && $post_type == 'post' ) {
		return locate_template('template-blog.php');
	}
	return $template;
}

add_filter('template_include', 'search_template_chooser');



/**
 * Enqueue scripts and styles.
 */
function ta_portfolio_scripts() {
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.3.0', 'all' );

	wp_enqueue_style( 'GoogleFonts-Montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700', array(), '', 'all' );

	wp_enqueue_style( 'GoogleFonts-Lato', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic', array(), '', 'all' );

	wp_enqueue_style( 'ta-portfolio-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '2.1.1', true );

	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '3.1.8', true );

	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3', true );

	wp_enqueue_script( 'classie-js', get_template_directory_uri() . '/js/classie.js', array(), '1.0.1', true );

	wp_enqueue_script( 'cbpAnimatedHeader-js', get_template_directory_uri() . '/js/cbpAnimatedHeader.js', array(), '1.0.0', true );

	wp_enqueue_script( 'jqBootstrapValidation-js', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array(), '1.3.6', true );

	wp_enqueue_script( 'ContactMe-js', get_template_directory_uri() . '/js/contact-me.js', array(), '', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'nav_menu-js', get_template_directory_uri() . '/js/nav_menu.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ta_portfolio_scripts' );

/**
 * Get theme path for JavaScript file.
 */
function get_theme_directory_uri() {
	$stylesheet_directory_uri = array( 'templateUrl' => get_stylesheet_directory_uri() );
	wp_localize_script( 'ContactMe-js', 'ContactMe_uri', $stylesheet_directory_uri );
}
add_action( 'wp_enqueue_scripts', 'get_theme_directory_uri' );


/**
 * filter the <p> tags from the images and iFrame
 * fonctionne avec js/video-responsive.js et style.css (.videoWrapper)
 */
function filter_ptags_on_images($content){
	//$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content); // � am�liorer pour tenir compte des br et des contenus textes dans la balise p
}
add_filter('the_content', 'filter_ptags_on_images');




/**
 * Add Respond.js for IE
 */
if( !function_exists( 'ie_scripts' ) ) {
	function ie_scripts() {
	 	echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
	   	echo ' <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->';
	   	echo ' <!--[if lt IE 9]>';
	    echo ' <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
	    echo ' <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
	   	echo ' <![endif]-->';
   	}
   	add_action('wp_head', 'ie_scripts');
} // end if













/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register Custom Navigation Walker.
 */
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/**
 * Register Custom Taxonomy Posts.
 */
require_once get_template_directory() . '/inc/taxo-post.php';

/**
 * Custom Post Types
 */
require_once get_template_directory() . '/inc/post-types/CPT.php';

/**
 * Intervenants Custom Post Type
 */
require_once get_template_directory() . '/inc/post-types/register-intervenant.php';

/**
 * Challenges Custom Post Type
 */
require_once get_template_directory() . '/inc/post-types/register-challenge.php';

/**
 * Stages Custom Post Type
 */
require_once get_template_directory() . '/inc/post-types/register-stage.php';

/**
 * Formations Custom Post Type
 */
require_once get_template_directory() . '/inc/post-types/register-formation.php';

/**
 * Citations Custom Post Type
 */
require_once get_template_directory() . '/inc/post-types/register-citation.php';

/**
 * Register Custom Metabox Posts.
 */
require_once get_template_directory() . '/inc/my-post-metabox.php';

/**
 * Add Custom Meta Boxes
 */
require_once get_template_directory() . '/inc/custom-metaboxes/CMB.php';

/**
 * Comments Callback.
 */
require_once get_template_directory() . '/inc/comments-callback.php';

/**
 * Add Author Meta.
 */
require_once get_template_directory() . '/inc/author-meta.php';

/**
 * Search Results - Highlight.
 */
require_once get_template_directory() . '/inc/search-highlight.php';

/**
 * Theme Options - Custom CSS.
 */
require_once get_template_directory() . '/inc/custom-css.php';

/**
 * Add Theme Widgets.
 */
/*
require_once ( get_template_directory() . '/widgets/widget-social.php' );
require_once ( get_template_directory() . '/widgets/widget-about-me.php' );
require_once ( get_template_directory() . '/widgets/widget-post-tabs.php' );
*/

