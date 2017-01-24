<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.opushive.com
 * @since      1.0.0
 *
 * @package    Infinite_scroll_hotmagazine
 * @subpackage Infinite_scroll_hotmagazine/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Infinite_scroll_hotmagazine
 * @subpackage Infinite_scroll_hotmagazine/includes
 * @author     Opus Hive <info@opushive.com>
 */
class Infinite_scroll_hotmagazine_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'infinite_scroll_hotmagazine',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
