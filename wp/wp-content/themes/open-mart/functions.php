<?php
/**
 * Open Mart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Open Mart
 * @since 1.0.0
 */
/**
 * Theme functions and definitions
 */
if ( ! function_exists( 'open_mart_setup' ) ) :
define( 'OPEN_MART_THEME_VERSION','1.0.0');
define( 'OPEN_MART_THEME_DIR', get_template_directory() . '/' );
define( 'OPEN_MART_THEME_URI', get_template_directory_uri() . '/' );

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_open_mart_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function open_mart_setup(){
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'open-mart', get_template_directory() . '/languages' );
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
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'woocommerce' );
	
		// Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Custom Header.
		add_theme_support( 'custom-header', 

			apply_filters( 'open_mart_custom_header_args', array(
				'default-image' => '',
				'flex-height'   => true,
				'header-text'   => false,
				'video'          => false,
		) 


		) );
		 // Recommend plugins
        add_theme_support( 'recommend-plugins', array(
             'hunk-companion' => array(
                'name' => esc_html__( 'Hunk Companion', 'open-mart' ),
                'active_filename' => 'hunk-companion/hunk-companion.php',
            ),
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'open-mart' ),
                'active_filename' => 'woocommerce/woocommerce.php',
            ),
            'woo-smart-wishlist' => array(
                 'name' => esc_html__( 'WPC Smart Wishlist for WooCommerce', 'open-mart' ),
                 'active_filename' => 'woo-smart-wishlist/wpc-smart-wishlist.php',
             ),
            'woo-smart-compare' => array(
                 'name' => esc_html__( 'WPC Smart Compare for WooCommerce', 'open-mart' ),
                 'active_filename' => 'woo-smart-compare/wpc-smart-compare.php',
             ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'open-mart' ),
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),
            'wp-popup-builder' => array(
                'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'open-mart' ),
                'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
            ), 
            'one-click-demo-import' => array(
                'name' => esc_html__( 'One Click Demo Import', 'open-mart' ),
                'active_filename' => 'one-click-demo-import/one-click-demo-import.php',
            ),
        ) );

           // Useful plugins
        add_theme_support( 'useful-plugins', array(
             'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'Megamenu plugin from Themehunk.', 'open-mart' ),
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
            )
        ) );
		// Add support for Custom Background.
        if(get_theme_mod('open_mart_color_scheme')=='opn-dark'){
        $args = array(
	    'default-color' => '2f2f2f',
        );
        }else{
        $args = array(
	    'default-color' => 'f1f1f1',
        );	
        }
        add_theme_support( 'custom-background',$args );
        
        $GLOBALS['content_width'] = apply_filters( 'open_mart_content_width', 640 );
        add_theme_support( 'woocommerce', array(
                                                 'thumbnail_image_width' => 320,
                                             ) );
	}
endif;
add_action( 'after_setup_theme', 'open_mart_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 */
/**
 * Register widget area.
 */
function open_mart_widgets_init(){
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'open-mart' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your primary sidebar.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="open-mart-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header First Widget', 'open-mart' ),
		'id'            => 'top-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Second Widget', 'open-mart' ),
		'id'            => 'top-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Third Widget', 'open-mart' ),
		'id'            => 'top-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Main Header Widget', 'open-mart' ),
		'id'            => 'main-header-widget',
		'description'   => esc_html__( 'Add widgets here to appear in main header.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Footer Top First Widget', 'open-mart' ),
		'id'            => 'footer-top-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Second Widget', 'open-mart' ),
		'id'            => 'footer-top-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Third Widget', 'open-mart' ),
		'id'            => 'footer-top-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below First Widget', 'open-mart' ),
		'id'            => 'footer-below-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Second Widget', 'open-mart' ),
		'id'            => 'footer-below-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Third Widget', 'open-mart' ),
		'id'            => 'footer-below-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'open-mart' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	for ( $i = 1; $i <= 5; $i++ ){
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'open-mart' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	for ( $i = 1; $i <= 4; $i++ ){
	//Widgets for First Custom Section
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'First Custom Section Widget Area %d', 'open-mart' ), $i ),
			'id'            => 'first-customsec-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	//Widgets for Second Custom Section
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Second Custom Section Widget Area %d', 'open-mart' ), $i ),
			'id'            => 'second-customsec-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	//Widgets for Third Custom Section
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Third Custom Section Widget Area %d', 'open-mart' ), $i ),
			'id'            => 'third-customsec-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	//Widgets for Four Custom Section
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Fourth Custom Section Widget Area %d', 'open-mart' ), $i ),
			'id'            => 'four-customsec-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'open_mart_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function open_mart_scripts(){
	// enqueue css
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'font-awesome', OPEN_MART_THEME_URI . '/third-party/fonts/font-awesome/css/font-awesome.css', '', OPEN_MART_THEME_VERSION );
	wp_enqueue_style( 'animate', OPEN_MART_THEME_URI . '/css/animate.css','',OPEN_MART_THEME_VERSION);
	wp_enqueue_style( 'open-mart-menu', OPEN_MART_THEME_URI . '/css/open-mart-menu.css','',OPEN_MART_THEME_VERSION);
	wp_enqueue_style( 'open-mart-style', get_stylesheet_uri(), array(), OPEN_MART_THEME_VERSION );
	wp_add_inline_style('open-mart-style', open_mart_custom_style());
    //enqueue js
    wp_enqueue_script("jquery-effects-core",array( 'jquery' ));
    wp_enqueue_script('jquery-ui-autocomplete',array( 'jquery' ),'',true );
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('open-mart-menu-js', OPEN_MART_THEME_URI .'/js/open-mart-menu.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('open-mart-accordian-menu-js', OPEN_MART_THEME_URI .'/js/open-mart-accordian-menu.js', array( 'jquery' ), OPEN_MART_THEME_VERSION , true );
    wp_enqueue_script( 'open-mart-custom-js', OPEN_MART_THEME_URI .'/js/open-mart-custom.js', array( 'jquery' ), OPEN_MART_THEME_VERSION , true );
     $openmartlocalize = array(
				
				'open_mart_move_to_top_optn' => (bool) get_theme_mod('open_mart_move_to_top',false),
				'open_mart_sticky_header_effect' => esc_html(get_theme_mod('open_mart_sticky_header_effect','scrltop')),
				//End-to-End
				'open_mart_page_lyout_endtoend' => (bool) get_theme_mod('open_mart_page_lyout_endtoend',false),
			);
    wp_localize_script( 'open-mart-custom-js', 'open_mart_obj',  $openmartlocalize);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'open_mart_scripts' );
/********************************************************/
// Adding Dashicons in WordPress Front-end
/********************************************************/
add_action( 'wp_enqueue_scripts', 'open_mart_load_dashicons_front_end' );
function open_mart_load_dashicons_front_end(){
  wp_enqueue_style( 'dashicons' );
}

/**
 * Load init.
 */
require_once trailingslashit(OPEN_MART_THEME_DIR).'inc/init.php';

//custom function conditional check for blog page
function open_mart_is_blog (){
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}
if ( ! function_exists( 'wp_body_open' ) ){

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}