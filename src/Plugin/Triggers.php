<?php
namespace Saltus\WP\Plugin\Saltus\FreemiusCheckout\Plugin;

use Saltus\WP\Plugin\Saltus\FreemiusCheckout\Core;

/**
 * Manage Triggers - load cpt information
 */
class Triggers {

	/**
	 * The plugin's instance.
	 *
	 * @var Core
	 */
	public $core;

	/**
	 * Array with rules from the triggers CPT
	 *
	 * @var array
	 */
	public $rules;

	/**
	 * Define Assets
	 *
	 * @param Core $core This plugin's instance.
	 */
	public function __construct( Core $core ) {
		$this->core = $core;
		$this->set_rules();
	}

	public function set_rules() {

		$fms_opts = get_option('fmstriggeropts');

		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'fmstrigger',
			'suppress_filters' => true,
			'fields'           => 'ids',
		);

		$rule_ids = get_posts( $args );

		$rules = [];

		foreach ( $rule_ids as $id ) {

			$rule = get_post_meta( $id, 'triggers', true );

			if( $fms_opts['sandbox'] ) {

				$plugin_id         = $rule['plugin_id'];
				$plugin_public_key = $rule['public_key'];
				$plugin_secret_key = $rule['private_key'];
				$timestamp         = time();

				$sandbox_token = md5(
					$timestamp .
					$plugin_id .
					$plugin_secret_key .
					$plugin_public_key .
					'checkout'
				);

				$rule['sandbox_token'] = $sandbox_token;
				$rule['timestamp'] = $timestamp;

			}

			// remove uncessary stuff
			unset( $rule['private_key'] );
			unset( $rule['completed'] );
			unset( $rule['sucess'] );

			$rules[ $id ] = $rule;
		}

		$this->rules = $rules;

	}

}
