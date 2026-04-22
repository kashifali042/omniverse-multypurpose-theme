<?php

namespace DN\Modules\Header_Builder;

/**
 * ------------------------------------------------------------------------------------------------
 * Include all elements classes and create their objects. AJAX handlers.
 * ------------------------------------------------------------------------------------------------
 */
class Elements {

	/**
	 * Elements list.
	 *
	 * @var array
	 */
	public $elements = array();

	/**
	 * Elements object classes.
	 *
	 * @var array
	 */
	public $elements_classes = array();

	/**
	 * Construct.
	 */
	public function __construct() {
		$this->build_elements_list();
		$this->include_files();
		add_action( 'wp_ajax_omniverse_get_builder_elements', array( $this, 'get_elements_ajax' ) );
	}

	/**
	 * Build elements list dynamically based on active plugins.
	 *
	 * @return void
	 */
	public function build_elements_list() {
		// Core elements (always available)
		$core_elements = array(
			'Root',
			'Row',
			'Column',
			'Logo',
			'Mainmenu',
			'Menu',
			'Burger',
			'Search',
			'Mobilesearch',
			'Categories',
			'Divider',
			'Space',
			'Text',
			'HTMLBlock',
			'Button',
			'Infobox',
			'Social',
			'Stickynavigation',
		);

		$this->elements = $core_elements;

		// WooCommerce elements (only if WooCommerce is active)
		if ( function_exists( 'wc_get_products' ) || class_exists( 'WooCommerce' ) ) {
			$this->elements = array_merge( $this->elements, array(
				'Cart',
				'Wishlist',
				'Compare',
				'Account',
			) );
		}

		// LearnPress elements (only if LearnPress is active)
		if ( class_exists( 'LearnPress' ) || defined( 'LEARNPRESS_PLUGIN_FILE' ) ) {
			$this->elements = array_merge( $this->elements, array(
				'Learnpressprofile',
				'Learnpresscourses',
				'Learnpressnotifications',
				'Learnpresscart',
			) );
		}

		// WPML language switcher (only if WPML is active)
		if ( defined( 'WPML_PLUGIN_BASENAME' ) ) {
			$this->elements[] = 'Languages';
		}
	}

	/**
	 * Include elements classes.
	 *
	 * @return void
	 */
	public function include_files() {
		require_once OMNIVERSE_HB_DIR . 'elements/abstract/class-element.php';

		foreach ( $this->elements as $class ) {
			$path = OMNIVERSE_HB_DIR . 'elements/class-' . strtolower( $class ) . '.php';

			if ( file_exists( $path ) ) {
				require_once $path;

				$class_name                       = 'DN\Modules\Header_Builder\Elements\\' . $class;
				$this->elements_classes[ $class ] = new $class_name();
			}
		}
	}

	/**
	 * Get all elements.
	 *
	 * @return void
	 */
	public function get_elements_ajax() {
		check_ajax_referer( 'omniverse-get-builder-elements-nonce', 'security' );

		$elements = array();

		foreach ( $this->elements_classes as $el => $class ) {
			$args = $class->get_args();
			if ( $args['addable'] ) {
				$elements[] = $class->get_args();
			}
		}

		echo wp_json_encode( $elements );

		wp_die();
	}
}
