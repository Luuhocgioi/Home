<?php
/**
 * My Custom Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package My_Custom_Theme
 */

// Enqueue scripts and styles
function my_custom_theme_scripts() {
    wp_enqueue_style( 'my-custom-theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'my-custom-theme-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'my_custom_theme_scripts' );

// Register navigation menus
function my_custom_theme_register_menus() {
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'my-custom-theme' ),
    ) );
}
add_action( 'init', 'my_custom_theme_register_menus' );

// Add theme support for essential features
function my_custom_theme_theme_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'my_custom_theme_theme_setup' );

/**
 * Register custom ACF blocks.
 */
function my_custom_theme_register_acf_blocks() {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    // Get all directories in the 'blocks' folder.
    $block_dirs = glob( get_template_directory() . '/blocks/*' );

    // Loop through each block directory and register the block if block.json exists.
    foreach ( $block_dirs as $block_dir ) {
        $block_json_file = $block_dir . '/block.json';
        if ( file_exists( $block_json_file ) ) {
            $block_data = json_decode( file_get_contents( $block_json_file ), true );
            if ( $block_data && isset( $block_data['name'] ) && isset( $block_data['title'] ) ) {
                acf_register_block_type( array(
                    'name'            => $block_data['name'],
                    'title'           => $block_data['title'],
                    'description'     => isset( $block_data['description'] ) ? $block_data['description'] : '',
                    'render_template' => $block_dir . '/' . ( isset( $block_data['acf']['renderTemplate'] ) ? $block_data['acf']['renderTemplate'] : 'template.php' ),
                    'category'        => isset( $block_data['category'] ) ? $block_data['category'] : 'common',
                    'icon'            => isset( $block_data['icon'] ) ? $block_data['icon'] : 'align-wide',
                    'keywords'        => isset( $block_data['keywords'] ) ? $block_data['keywords'] : array(),
                    'supports'        => isset( $block_data['supports'] ) ? $block_data['supports'] : array(),
                ) );
            }
        }
    }

}
add_action( 'acf/init', 'my_custom_theme_register_acf_blocks' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_custom_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'my-custom-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'my-custom-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'my_custom_theme_widgets_init' );

/**
 * Register ACF Options Page
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Site Header Settings',
        'menu_title'    => 'Header',
        'menu_slug'     => 'site-header-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

} 