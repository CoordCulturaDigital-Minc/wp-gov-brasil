<?php
/**
 * wp-gov-brasil funções e definições
 *
 * @package wp-gov-brasil
 */

if ( ! function_exists( 'wp_gov_brasil_setup' ) ) :
/**
 * Configura predefinições do tema e registra suporte para várias características do Wordpress
 * Note que esta função esta enganchada em after_setup_theme, que
 * é executada antes do gancho de inicialização. O gancho init é tarde demais para algumas funcionalidades
 * tais como suporte para post thumbnails
 */
function wp_gov_brasil_setup() {

	// define variables
	global $themename, $shortname;

	$themename = 'Tema Padrão do Governo Federal';
	$shortname = 'wp_gov_brasil';

	/*
	 * Arquivo de tradução do tema
	 */
	load_theme_textdomain( 'wp-gov-brasil', get_template_directory() . '/languages' );

	// Add mensagens padrão e comentários de links de feed RSS no head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Deixa que o wordpress gerencia a tag title
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Ativa suporte para miniaturas
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Registra os menus
	register_nav_menus( array(
		'nav-servicos' => esc_html__( 'Menu Serviços', 'wp-gov-brasil' ),
		'nav-apoio'    => esc_html__( 'Menu de Apoio', 'wp-gov-brasil' ),
		'nav-footer'   => esc_html__( 'Menu Rodapé', 'wp-gov-brasil' ),
	) );

	/*
	 * Altera formulário de busca, de comentário para o formato html5
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Ativa suporte para Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Configura o fundo personalizável.
	add_theme_support( 'custom-background', apply_filters( 'wp_gov_brasil_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wp_gov_brasil_setup
add_action( 'after_setup_theme', 'wp_gov_brasil_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function wp_gov_brasil_content_width() {
	// $GLOBALS['content_width'] = apply_filters( 'wp_gov_brasil_content_width', 960 );
// }
// add_action( 'after_setup_theme', 'wp_gov_brasil_content_width', 0 );

/**
 * Registrar widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wp_gov_brasil_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp-gov-brasil' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'wp_gov_brasil_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_gov_brasil_scripts() {

	// wp_enqueue_style( 'wp-gov-brasil-style', get_stylesheet_uri() );

	// estilos
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'wp-gov-brasil-style-fonts', get_template_directory_uri() . '/css/fontes.css' );
	wp_enqueue_style( 'wp-gov-brasil-font-awesome', get_template_directory_uri() . '/fonts/font-awesome//css/font-awesome.min.css' );
	wp_enqueue_style( 'wp-gov-brasil-style', get_template_directory_uri() . '/css/template-' . get_theme_mod('wp_gov_brasil_color_scheme', 'verde') . '.css' );

	// scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array(), 'v1.4.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), 'v2.3.2', true );

	wp_enqueue_script( 'wp-gov-brasil-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'wp-gov-brasil-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_gov_brasil_scripts' );


// Hidden admin bar
if( !is_user_logged_in() )
	add_filter('show_admin_bar', '__return_false');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Class Theme Options
 */
require get_template_directory() . '/inc/theme-options.php';

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


/**
 * Widgets
 */

/**
 * Load Widget Centrais de Conteúdos
 */
require get_template_directory() . '/inc/widgets/centrais-de-conteudos.php';


/**
 * Load Widget Custom Loop
 */
require get_template_directory() . '/inc/widgets/custom-loop.php';


/**
 * Load Widget Slides
 */
require get_template_directory() . '/inc/widgets/slides_carousel.php';
