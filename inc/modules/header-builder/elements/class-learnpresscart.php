<?php

namespace DN\Modules\Header_Builder\Elements;

use DN\Modules\Header_Builder\Element;

/**
 * ------------------------------------------------------------------------------------------------
 * LearnPress Cart Element
 * Displays the number of courses in the student's cart (pending enrollment)
 * ------------------------------------------------------------------------------------------------
 */
class Learnpresscart extends Element {

	public function __construct() {
		parent::__construct();

		$this->template_name = 'learnpress-cart';
	}

	public function map() {
		$this->args = array(
			'type'            => 'learnpresscart',
			'title'           => esc_html__( 'LearnPress Cart', 'omniverse' ),
			'text'            => esc_html__( 'Courses in cart', 'omniverse' ),
			'icon'            => 'dn-i-cart',
			'editable'        => true,
			'container'       => false,
			'edit_on_create'  => true,
			'drag_target_for' => array(),
			'drag_source'     => 'content_element',
			'removable'       => true,
			'addable'         => true,
			'params'          => array(
				'show_count'      => array(
					'id'          => 'show_count',
					'title'       => esc_html__( 'Show Count', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display number of courses in cart', 'omniverse' ),
				),
				'show_label'      => array(
					'id'          => 'show_label',
					'title'       => esc_html__( 'Show Label', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display "Cart" text label', 'omniverse' ),
				),
				'show_icon'       => array(
					'id'          => 'show_icon',
					'title'       => esc_html__( 'Show Icon', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display cart icon', 'omniverse' ),
				),
				'hide_when_empty'  => array(
					'id'          => 'hide_when_empty',
					'title'       => esc_html__( 'Hide When Empty', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => false,
					'description' => esc_html__( 'Hide element if cart is empty', 'omniverse' ),
				),
				'hide_for_guests' => array(
					'id'          => 'hide_for_guests',
					'title'       => esc_html__( 'Hide For Guests', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Hide element for non-logged-in users', 'omniverse' ),
				),
				'link_to_cart'    => array(
					'id'          => 'link_to_cart',
					'title'       => esc_html__( 'Link to Cart Page', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Make element clickable to cart page', 'omniverse' ),
				),
				'text_color'      => array(
					'id'        => 'text_color',
					'title'     => esc_html__( 'Text Color', 'omniverse' ),
					'type'      => 'color',
					'tab'       => esc_html__( 'Style', 'omniverse' ),
					'value'     => '',
					'selectors' => array(
						'whb-row .{{WRAPPER}}.wd-learnpress-cart' => array(
							'color: {{VALUE}};',
						),
					),
				),
				'icon_color'      => array(
					'id'        => 'icon_color',
					'title'     => esc_html__( 'Icon Color', 'omniverse' ),
					'type'      => 'color',
					'tab'       => esc_html__( 'Style', 'omniverse' ),
					'value'     => '',
					'selectors' => array(
						'whb-row .{{WRAPPER}}.wd-learnpress-cart i' => array(
							'color: {{VALUE}};',
						),
					),
				),
			),
		);
	}
}
