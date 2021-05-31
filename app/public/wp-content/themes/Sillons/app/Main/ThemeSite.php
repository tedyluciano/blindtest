<?php
namespace App\Main  ;

use Timber\Menu;
use Timber\User;
use Timber\Post;


define('MSK_ACF_PATH', plugin_dir_path(__FILE__));
class ThemeSite {

	protected $user;

	public function __construct() {
		add_action( 'init', array( $this, 'optionsTheme' ) );
		add_action( 'init', array( $this, 'func_init' ) );
		add_action( 'init', array( $this, 'theme_supports' ) );
		add_action( 'after_setup_theme', array( $this, 'filter' ), 1 );
		add_action( 'widgets_init', array( $this, 'wpb_init_widgets' ) );
		if(!is_admin()){
			add_action ('wp_enqueue_scripts',  array( $this,'addCssAssets'));
			add_action ('wp_enqueue_scripts',  array( $this,'addJsAssets'));
		}
        add_action( 'wp_enqueue_scripts', array( $this, 'contact_object_scripts'));
	}

	public function theme_supports() {
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
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );

		//Nav Menus
		register_nav_menus(array(
			'primary'  => __('primary', 'Main menu'),
			'secondary'  => __('secondary', 'Menu-2')
		));
	}

	public function wpb_init_widgets($id){
        register_sidebar(array(
            'name' => esc_html__('Main Sidebar', 'default'),
            'id' => 'default-main-sidebar',
            'description'   => esc_html__( 'This is default sidebar.', 'default' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="wg-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Sidepanel Header', 'default'),
            'id' => 'default-sidepanel-header',
            'description'   => esc_html__( 'This is sidepanel header.', 'default' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="wg-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Blog Left Sidebar', 'default'),
            'id' => 'default-left-sidebar',
            'description'   => esc_html__( 'This is blog left sidebar.', 'default' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="wg-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Blog Right Sidebar', 'default'),
            'id' => 'default-right-sidebar',
            'description'   => esc_html__( 'This is blog right sidebar.', 'default' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="wg-title">',
            'after_title' => '</h4>',
        ));
        register_sidebars(6, array(
            'name' => esc_html__('Footer Widget %d', 'default'),
            'id' => 'default-footer-widget',
            'description'   => esc_html__( 'This is footer widget sidebar.', 'default' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '<div style="clear:both;"></div></div>',
            'before_title' => '<h4 class="wg-title">',
            'after_title' => '</h4>',
        ));
	}

	public function addCssAssets($params = null){
		$css_path_file = get_template_directory() . '/assets/jsonCss_js/css.json';
		if (file_exists($css_path_file)) {
			$cssPath = json_decode(file_get_contents($css_path_file), TRUE);
		}else{
			$cssPath = [$params];
		}
		foreach ($cssPath as $name_css ) {
			foreach ($name_css as $handler => $argsItemCss) {
				wp_register_style(
					$argsItemCss['handle'],
					get_template_directory_uri().'/assets' . $argsItemCss['src'],
					'',
					$argsItemCss['version'],
					''
				);
				wp_enqueue_style($argsItemCss['handle']);
			}
		}
	}

	public function addJsAssets($params = null){

		$js_path_file = get_template_directory() . '/assets/jsonCss_js/js.json';
		if (file_exists($js_path_file)) {
			$jsPath = json_decode(file_get_contents($js_path_file), TRUE);
		}else{
			$jsPath = [$params];
		}
		foreach ($jsPath as $name_js ) {
			foreach ($name_js as $handler => $argsItemJs) {
				wp_register_script(
					$argsItemJs['handle'],
					get_template_directory_uri().'/assets' . $argsItemJs['src'],
					array('jquery'),
					$argsItemJs['version'],
					true
				);
				wp_enqueue_script($argsItemJs['handle']);
			}
		}
	}

	function filter(){

		add_filter('timber/context', function ($context) {

			global $default_options;

			$context['header'] = new Menu( 'topmenu' );
			$context['menupage'] = new Menu( 'menu-page' );
			$context['footer'] = new Menu( 'footer' );
            $post = new Post();

            $context['post'] = $post;
            $context['colour_jaune'] = '#f5bf1f';
            $context['colour_vert'] = '#29a07d';
            $context['colour_orange'] = '#e76f1b';
            $context['colour_bleu'] = '#14708c';
            $context['icon_box'] = get_field('box', 7);
            $context['options'] = get_fields('option');
			if (!$this->user) {
				$this->user = new User;
			}
			if (function_exists('is_rtl')) {
				$context['is_rtl'] = is_rtl();
			}

			return $context;
		});

        add_filter('upload_mimes', function($mimes){
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        });

        /*add_filter('timber/twig', function($twig){
            $twig->addExtension(new Twig_Extension_StringLoader());
            $twig->addFilter(new Twig_SimpleFilter('arrayUnique', 'arrayUnique'));
            return $twig;
        });*/
	}

	function optionsTheme(){

        if( function_exists('acf_add_options_page') ) {

            acf_add_options_page(array(
                'page_title' 	=> 'Theme General Settings',
                'menu_title'	=> 'Options',
                'menu_slug' 	=> 'theme-general-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));

            acf_add_options_sub_page(array(
                'page_title' 	=> 'Contact Settings',
                'menu_title'	=> 'Contact',
                'parent_slug'	=> 'theme-general-settings',
            ));

           /* acf_add_options_sub_page(array(
                'page_title' 	=> 'Theme Footer Settings',
                'menu_title'	=> 'Footer',
                'parent_slug'	=> 'theme-general-settings',
            ));*/
        }
    }

    function func_init(){
        /*-----------------------------------------------*
                        Template Functions
        /*-----------------------------------------------*/
     //   require_once VER_ABS_PATH_FR . '/template-functions.php';
       // require_once VER_ABS_PATH_FR . '/templates/post-functions.php';
    }


    function contact_object_scripts(){

        $variable = get_field('liste_contact_objet', 'option');


        wp_register_script( 'contact_object', get_template_directory_uri() . '/assets/js/contact-object.js', array( 'jquery' ), '2', true); // register theme.js script
        // add localize support for our placeholder
        $liste = array(
            'liste' => __( $variable, 'Sillons' ), // variable for username placeholder
        );
        wp_localize_script( 'contact_object', 'liste', $liste ); // hook wp_localize_script

        wp_enqueue_script( 'contact_object' ); // load our theme.js script
    }



}