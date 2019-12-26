<?php
/**
 * Freemius Checkout
 *
 * @wordpress-plugin
 * Plugin Name:       Freemius Checkout
 * Plugin URI:        https://cmoreira.net/
 * Description:       Set selectors to trigger the freemius checkout iframe
 * Version:           1.0.0
 * Author:            Carlos Moreira
 * Author URI:        https://cmoreira.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       freemius-checkout
 * Domain Path:       /languages
 */

namespace Saltus\WP\Plugin\Saltus\FreemiusCheckout;

// If this file is called directly, quit.
if ( ! defined( 'WPINC' ) ) {
	exit;
}
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( class_exists( \Saltus\WP\Framework\Core::class ) ) {

	/*
	* The path to the plugin root directory is mandatory,
	* so it loads the models from a subdirectory.
	*/
	$framework = new \Saltus\WP\Framework\Core( dirname( __FILE__ ) );
	$framework->register();
	/**
	 * Initialize plugin
	 *
	 */
	add_action(
		'plugins_loaded',
		function () use ( $framework ) {
			$plugin = new Core( 'saltus-framework', '0.0.2', __FILE__, $framework );
			$plugin->init();
		}
	);

}




