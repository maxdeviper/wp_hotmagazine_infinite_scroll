<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.opushive.com
 * @since             1.0.0
 * @package           Infinite_scroll_hotmagazine
 *
 * @wordpress-plugin
 * Plugin Name:       Inifinite Scroll for Hotmagazine Template
 * Plugin URI:        www.opushive.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Opus Hive
 * Author URI:        www.opushive.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       infinite_scroll_hotmagazine
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-infinite_scroll_hotmagazine-activator.php
 */
function activate_infinite_scroll_hotmagazine() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-infinite_scroll_hotmagazine-activator.php';
	Infinite_scroll_hotmagazine_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-infinite_scroll_hotmagazine-deactivator.php
 */
function deactivate_infinite_scroll_hotmagazine() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-infinite_scroll_hotmagazine-deactivator.php';
	Infinite_scroll_hotmagazine_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_infinite_scroll_hotmagazine' );
register_deactivation_hook( __FILE__, 'deactivate_infinite_scroll_hotmagazine' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-infinite_scroll_hotmagazine.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_infinite_scroll_hotmagazine() {

	$plugin = new Infinite_scroll_hotmagazine();
	$plugin->run();

}
run_infinite_scroll_hotmagazine();
