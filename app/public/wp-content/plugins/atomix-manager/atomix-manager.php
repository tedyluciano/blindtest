<?php
/**
 * Plugin Name: Atomix Manager
 * Description: Shortcode by Sunda.
 * Plugin URI:  ''
 * Version:     1.0.0
 * Author:      Sunda NZAZI
 * Author URI:  ''
 * License:     GPLv3
 */



define('AM_PLUGIN_URL',	get_am_plugin_url());
/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

    // If Plugins Requirements are not met.
    /*if ( ! plugin_requirements_checker()->requirements_met() ) {
        add_action( 'admin_notices', array( plugin_requirements_checker(), 'show_requirements_errors' ) );

        // Deactivate plugin immediately if requirements are not met.
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        deactivate_plugins( plugin_basename( __FILE__ ) );

        return;
    }*/


    /**
     * The core plugin class that is used to define internationalization,
     * admin-specific hooks, and frontend-facing site hooks.
     */
    require_once plugin_dir_path( __FILE__ ) . 'inc/class-atomix-manager.php';


    require_once( trailingslashit( dirname( __FILE__ ) ) . 'inc/class-load-autoloader.php' );


    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since    1.0.0
     */
    $GLOBALS['atomix_manager'] = new AtomixManager\Inc\Atomix_Manager();

    register_activation_hook( __FILE__, array( new AtomixManager\App\Activator(), 'activate' ) );
    register_deactivation_hook( __FILE__, array( new AtomixManager\App\Deactivator(), 'deactivate' ) );




    //add_action( 'after_setup_theme', 'crb_load' );
    //add_action( 'carbon_fields_register_fields',  'options_initialize_admin_page');
}


function get_am_plugin_url(){
    $url = str_replace('index.php', '', plugins_url('index.php', __FILE__ ));
    if(strpos($url, 'http') === false) {
        $site_url	= get_site_url();
        $url		= (substr($site_url, -1) === '/') ? substr($site_url, 0, -1). $url : $site_url. $url;
    }
    $url = str_replace(array(chr(10), chr(13)), '', $url);

    return $url;
}



run_plugin_name();
