<?php


namespace AtomixManager\Inc;


//require_once( trailingslashit( dirname( __FILE__ ) ) . '/class-load-autoloader.php' );


use AtomixManager\Core\Function_Shortcodes;
use AtomixManager\Core\Shortcodes;



class Atomix_Manager {


    /**
     * Main plugin path /wp-content/plugins/<plugin-folder>/.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_path    Main path.
     */
    private static $plugin_path;


    /**
     * Absolute plugin url <wordpress-root-folder>/wp-content/plugins/<plugin-folder>/.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_url    Main path.
     */
    private static $plugin_url;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     */
    const PLUGIN_ID         = 'atomix-manager';

    /**
     * The name identifier of this plugin.
     *
     * @since    1.0.0
     */
    const ATOMIX_MANAGER      = 'Atomix Manager';


    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     */
    const PLUGIN_VERSION    = '1.0.0';



    protected static $_instance = NULL;



    public function __construct() {

        self::$plugin_path = plugin_dir_path( dirname( __FILE__ ) );
        self::$plugin_url  = plugin_dir_url( dirname( __FILE__ ) );



        if(!is_admin()){
            add_action ('wp_enqueue_scripts',  array( $this,'addCssAssets'), 99);
            add_action ('wp_enqueue_scripts',  array( $this,'addJsAssets'), 99);
        }


        add_action( 'after_setup_theme', array( $this, 'class_setup'));

    }


        /**
     * Get plugin's absolute path.
     *
     * @since    1.0.0
     */
    public static function get_plugin_path() {
       return isset( self::$plugin_path ) ? self::$plugin_path : plugin_dir_path( dirname( __FILE__ ) );
    }


    /**
     * Get plugin's absolute url.
     *
     * @since    1.0.0
     */
    public static function get_plugin_url() {
      return isset( self::$plugin_url ) ? self::$plugin_url : plugin_dir_url( dirname( __FILE__ ) );
    }



    public function class_setup(){

        $GLOBALS['function_Shortcodes']  = new Function_Shortcodes();
        $GLOBALS['function_Shortcodes']::get_instance();

        $shortcodes = new Shortcodes();
        $shortcodes::get_instance();

    }

    /**
     * ACTION Enqueue scripts
     */
    public function enqueue()
    {
        # jQuery will be loaded as a dependency
        ## DO NOT use other version than the one bundled with WP
        ### Things will BREAK if you do so
        wp_enqueue_script(
            'ajax-last-post',
            "{$this->plugin_url}ajax.js",
            array( 'jquery' )
        );
        # Here we send PHP values to JS
        wp_localize_script(
            'ajax-last-post',
            'wp_ajax',
            array(
                'ajaxurl'      => admin_url( 'admin-ajax.php' ),
                'ajaxnonce'   => wp_create_nonce( 'ajax_player_validation' ),
                'loading'    => 'http://i.stack.imgur.com/drgpu.gif'
            )
        );
    }

    public function addCssAssets($params = null){

        $parent_style = 'parent-style';


        $css_path_file = self::$plugin_path . 'assets/jsonCss_js/css.json';


        if (file_exists($css_path_file)) {
            $cssPath = json_decode(file_get_contents($css_path_file), TRUE);
        }else{
            $cssPath = [$params];
        }
        foreach ($cssPath as $name_css ) {
            foreach ($name_css as $handler => $argsItemCss) {
                wp_register_style(
                    $argsItemCss['handle'],
                    AM_PLUGIN_URL .'assets' . $argsItemCss['src'],
                    '',
                    $argsItemCss['version'],
                    ''
                );
                wp_enqueue_style( $argsItemCss['handle']);

            }
        }


    }

    public function addJsAssets($params = null){

        $js_path_file = self::$plugin_path . 'assets/jsonCss_js/js.json';


        if (file_exists($js_path_file)) {
            $jsPath = json_decode(file_get_contents($js_path_file), TRUE);
        }else{
            $jsPath = [$params];
        }
        foreach ($jsPath as $name_js ) {



            foreach ($name_js as $handler => $argsItemJs) {
                wp_register_script(
                    $argsItemJs['handle'],
                    AM_PLUGIN_URL .'assets' . $argsItemJs['src'],
                    array('jquery'),
                    $argsItemJs['version'],
                    $argsItemJs['footer']
                );
                wp_enqueue_script($argsItemJs['handle']);
            }
        }
    }




}

