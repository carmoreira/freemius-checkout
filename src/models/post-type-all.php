<?php

$fms_opts = get_option('fmstriggeropts');

return [
	'active'   => true,
	'type'     => 'cpt',
	'name'     => 'fmstrigger',
	'supports' => [
		'title',
	],
	'labels'   => [
		'has_one'     => 'Trigger',
		'has_many'    => 'Triggers',
		'text_domain' => 'fmscheckout',
		'overrides'   => [
			'name'                  => 'Triggers',
			'singular_name'         => 'Trigger',
			'menu_name'             => 'Freemius Triggers',
			'name_admin_bar'        => 'Freemius Triggers',
			'add_new'               => 'Add New',
			'add_new_item'          => 'Add New Trigger',
			'edit_item'             => 'Edit Trigger',
			'new_item'              => 'New Trigger',
			'view_item'             => 'View Trigger',
			'view_items'            => 'View Triggers',
			'search_items'          => 'Search Triggers',
			'not_found'             => 'No Triggers found.',
			'not_found_in_trash'    => 'No Triggers found in Trash.',
			'parent_item-colon'     => 'Parent Triggers:',
			'all_items'             => 'All Triggers',
			'archives'              => 'Trigger Archives',
			'attributes'            => 'Trigger Attributes',
			'insert_into_item'      => 'Insert into Trigger',
			'uploaded_to_this_item' => 'Uploaded to this Trigger',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use featured image',
			'filter_items_list'     => 'Filter Triggers list',
			'items_list_navigation' => 'Triggers list navigation',
			'items_list'            => 'Triggers list',
		],
	],
	'options'  => [
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'can_export'         => true,
		'capability_type'    => 'post',
		'menu_icon'          => 'dashicons-cart',
		'rewrite'            => [
			'slug'       => 'Trigger',
			'with_front' => false,
			'feeds'      => false,
			'pages'      => false,
		],
		'enter_title_here'   => 'Enter trigger name here',
		'admin_cols'         => array(
			'title',
			'group' => array(
				'taxonomy' => 'group',
			),

		),
		'admin_filters'      => array(
			'group' => array(
				'taxonomy' => 'group',
			),
		),
	],

	'meta'     => [
		'triggers' => [
			'title'     => __( 'Trigger and Checkout Details', 'freemius-checkout' ),
			'data_type' => 'serialize',
			'priority'  => 'low',
			'sections'  => [

				'triggerDetails'    => [
					'title'  => __( 'Trigger Details', 'interactive-geo-maps' ),
					'icon'   => 'fa fa-cogs',
					'fields' => [
						'selector'       => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'CSS Selector', 'freemius-checkout' ),
						],
						'plan_id'       => [
							'type'    => 'text',
							'default' => isset( $fms_opts['plan_id'] ) ? $fms_opts['plan_id'] : '',
							'title'   => __( 'Plan ID', 'freemius-checkout' ),
						],
						'licenses'     => [
							'type'    => 'spinner',
							'default' => 1,
							'title'   => __( 'Licenses', 'freemius-checkout' ),
						],
						'trial'        => [
							'type'    => 'switcher',
							'default' => false,
							'title'   => __( 'Trial', 'freemius-checkout' ),
						],
						'coupon'       => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'Coupon', 'freemius-checkout' ),
						],
						'billingCycle' => [
							'type'    => 'select',
							'default' => 'anual',
							'options' => [
								'anual'    => __( 'Anual', 'freemius-checkout' ),
								'monthly'  => __( 'Monthly', 'freemius-checkout' ),
								'lifetime' => __( 'Lifetime', 'freemius-checkout' ),
							],
							'title'   => __( 'Billing Cycle', 'freemius-checkout' ),
						],

					],
				],
				'pluginDetails'     => [
					'title'  => __( 'Plugin Details', 'interactive-geo-maps' ),
					'icon'   => 'fa fa-globe',
					'fields' => [
						'name'      => [
							'type'    => 'text',
							'default' => isset( $fms_opts['name'] ) ? $fms_opts['name'] : '',
							'title'   => __( 'Name', 'freemius-checkout' ),
						],

						'plugin_id'  => [
							'type'    => 'text',
							'default' => isset( $fms_opts['plugin_id'] ) ? $fms_opts['plugin_id'] : '',
							'title'   => __( 'Plugin ID', 'freemius-checkout' ),
						],

						'public_key' => [
							'type'    => 'text',
							'default' => isset( $fms_opts['public_key'] ) ? $fms_opts['public_key'] : '',
							'title'   => __( 'Public Key', 'freemius-checkout' ),
						],
						'private_key' => [
							'type'    => 'text',
							'default' => isset( $fms_opts['private_key'] ) ? $fms_opts['private_key'] : '',
							'title'   => __( 'Private Key', 'freemius-checkout' ),
						],

						'image'     => [
							'type'    => 'text',
							'default' => isset( $fms_opts['image'] ) ? $fms_opts['image'] : '',
							'title'   => __( 'Image URL', 'freemius-checkout' ),
							'desc'    => __( 'https://your-plugin-site.com/logo-100x100.png', 'freemius-checkout' ),
						],
					],
				],
				'triggerJavascript' => [
					'title'  => __( 'Javascript Events', 'interactive-geo-maps' ),
					'icon'   => 'fa fa-code',
					'fields' => [
						'completed' => [
							'type'    => 'textarea',
							'default' => '',
							'title'   => __( 'Completed Event Javascript', 'freemius-checkout' ),
							'desc'    => __( 'The logic here will be executed immediately after the purchase confirmation..<br>You can use the var <code>response</code> in your code.', 'freemius-checkout' ),
						],
						'sucess'    => [
							'type'    => 'textarea',
							'default' => '',
							'title'   => __( 'Success Event Javascript', 'freemius-checkout' ),
							'desc'    => __( 'The logic here will be executed after the customer closes the checkout, after a successful purchase.<br>You can use the var <code>response</code> in your code.', 'freemius-checkout' ),
						],
					],
				],
			],
		],
	],
	'settings' => [
		'fmstriggeropts' => [
			'title'         => __( 'Plugin Freemius Details', 'interactive-geo-maps' ),
			'menu_title'    => __( 'Settings', 'interactive-geo-maps' ),
			'show_bar_menu' => false,
			'ajax_save'     => false,
			'sections'      => [
				'pluginDetails' => [
					'title'  => __( 'Plugin Default Details', 'interactive-geo-maps' ),
					'icon'   => 'fa fa-globe',
					'fields' => [

						'sandbox'        => [
							'type'    => 'switcher',
							'default' => false,
							'title'   => __( 'Enable Sandbox', 'freemius-checkout' ),
						],

						'name'      => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'Name', 'freemius-checkout' ),
						],

						'plugin_id'  => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'Plugin ID', 'freemius-checkout' ),
						],

						'public_key' => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'Public Key', 'freemius-checkout' ),
						],
						'private_key' => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'Private Key', 'freemius-checkout' ),
						],
						'plan_id'       => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'Plan ID', 'freemius-checkout' ),
						],
						'image'     => [
							'type'    => 'text',
							'default' => '',
							'title'   => __( 'Image URL', 'freemius-checkout' ),
							'desc'    => __( 'https://your-plugin-site.com/logo-100x100.png', 'freemius-checkout' ),
						],

					],
				],
			],
		],
	],
];
