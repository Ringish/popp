<?php

/**
 *
 * @link              http://simon-ring.se/popp
 * @since             1.0.0
 * @package           Popp
 *
 * @wordpress-plugin
 * Plugin Name:       Popp
 * Plugin URI:        http://simon-ring.se/popp
 * Description:       Make beautiful popups
 * Version:           1.0.0
 * Author:            Simon Ring
 * Author URI:        http://simon-ring.se
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       popp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-popp-activator.php
 */
function activate_popp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-popp-activator.php';
	Popp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-popp-deactivator.php
 */
function deactivate_popp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-popp-deactivator.php';
	Popp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_popp' );
register_deactivation_hook( __FILE__, 'deactivate_popp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-popp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_popp() {

	$plugin = new popp();


	$plugin->run();

}
run_popp();

