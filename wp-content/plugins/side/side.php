<?php
/**
 * Side
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Side
 * Plugin URI:        https://sideinc.com/hire-me-please/
 * Description:       This plugin will create the page Properties Listing and will load the assets when necessary.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Side
 * Author URI:        https://sideinc.com
 * Text Domain:       side
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://sideinc.com/hire-me-please/
 */

require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';

/**
 * I know wordpress coding standards do not make use of composer autoload, 
 * they recomend require instead. But, here, in order to demonstrate knowledge,
 * concerning modern php and psrs I will be using namespaces and autoload.
 */

use SideInc\SideInc;

if ( ! function_exists('side_plugin_setup') && ! class_exists('SideInc') ) {

    //Defines required
    require_once plugin_dir_path(__FILE__) . '/src/defines.php';

    //activation actions
    register_activation_hook(__FILE__, function() {
        new SideInc(ACTIVATE);
    });

    //deactivation actions
    register_deactivation_hook(__FILE__, function() {
        new SideInc(DEACTIVATE);
    });

    //uninstall hook
    register_uninstall_hook(__FILE__, 'sideIncUninstall');

    //uninstall do not accept anonymous functions
    function sideIncUninstall(){
        new SideInc(UNINSTALL);
    }

    add_action( 'wp_enqueue_scripts', 'side_plugin_setup' );

    function side_plugin_setup() {

        //Lets get the page title
        $page = get_page_by_title(PROPERTY_LISTING_PAGE_NAME, 'OBJECT', 'page');

        //assets will only be loaded when necessary
        if(get_the_ID() !== $page->ID) return;
    
        wp_enqueue_style(
            'side-plugin-styles',
            plugin_dir_url(__FILE__) . '/build/style.css',
            [],
            filemtime(plugin_dir_path( __FILE__ ) . '/build/style.css')
        );
    
        wp_enqueue_script( 
            'side-plugin-scripts', 
            plugin_dir_url(__FILE__) . '/build/scripts.js',
            array( 'jquery' ),
            filemtime(plugin_dir_path( __FILE__ ) . '/build/scripts.js'),
            true
        );
    }
}
