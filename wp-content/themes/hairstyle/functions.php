<?php
/**
 * Hairstyle functions and definitions
 *
 * @package Hairstyle
 */


if ( ! function_exists( 'hairstyle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function hairstyle_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'hairstyle', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('hairstyle-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hairstyle' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // hairstyle_setup
add_action( 'after_setup_theme', 'hairstyle_setup' );


function hairstyle_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'hairstyle' ),
		'description'   => __( 'Appears on blog page sidebar', 'hairstyle' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'hairstyle' ),
		'description'   => __( 'Appears on page sidebar', 'hairstyle' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'hairstyle_widgets_init' );

function hairstyle_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by Lato, translate this to off, do not
		* translate into your own language.
		*/
		$lato = _x('on', 'Lato font:on or off','hairstyle');
		
		/* Translators: If there are any character that are
		* not supported by Roboto, translate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on', 'Roboto font:on or off','hairstyle');
		
		/* Translators: If there are any character that are
		* not supported by Roboto Condensed, translate this to off, do not
		* translate into your own language.
		*/
		$roboto_cond = _x('on', 'Roboto Condensed font:on or off','hairstyle');
		
		if('off' !== $lato || 'off' !==  $roboto || 'off' !== $roboto_cond){
			$font_family = array();
			
			if('off' !== $lato){
				$font_family[] = 'Lato:300,400';
			}
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:400,700';
			}
			
			if('off' !== $roboto_cond){
				$font_family[] = 'Roboto Condensed:400,700';
			}
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function hairstyle_scripts() {
	wp_enqueue_style( 'hairstyle-font', hairstyle_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'hairstyle-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'hairstyle-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );
	wp_enqueue_style( 'hairstyle-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'hairstyle-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'hairstyle-care_bootstrap', get_template_directory_uri() .'/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'hairstyle-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hairstyle_scripts' );


function hairstyle_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. esc_attr($paged) . ' of ' . esc_attr($wp_query->max_num_pages) .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>".esc_attr($page)."</li>";
		}
		echo '</ul></div></div>';
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


// URL DEFINES
define('hairstyle_theme_doc','http://flythemesdemo.net/documentation/hairstyle-doc/');
define('hairstyle_site_url','http://flythemes.net/');

function hairstyle_credit_link(){
		return __('Hairstyle theme by','hairstyle'). "<a href=".esc_url(hairstyle_site_url)." target='_blank'> Flythemes</a>";
	}
	
function hairstyle_slider_hide(){
		if ( ((get_theme_mod('slide_image1', true) == "") && (get_theme_mod('slide_image2', true) == "") && (get_theme_mod('slide_image3', true) == "" )) || get_theme_mod('slide_hide') == '') {
			echo "<style type='text/css'>.contact-strip{margin-top:81px;} #header{background-color:#000000 !important;}</style>";
			
		}
}
add_action('wp_head','hairstyle_slider_hide');