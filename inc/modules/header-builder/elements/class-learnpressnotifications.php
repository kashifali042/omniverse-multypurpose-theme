<?php

namespace DN\Modules\Header_Builder\Elements;

use DN\Modules\Header_Builder\Element;

/**
 * ------------------------------------------------------------------------------------------------
 * LearnPress Notifications Element
 * Displays unread notifications count if available
 * ------------------------------------------------------------------------------------------------
 */
class Learnpressnotifications extends Element {

	public function __construct() {
		parent::__construct();

		$this->template_name = 'learnpress-notifications';
	}

	public function map() {
		$this->args = array(
			'type'            => 'learnpressnotifications',
			'title'           => esc_html__( 'LearnPress Notifications', 'omniverse' ),
			'text'            => esc_html__( 'Unread notifications count', 'omniverse' ),
			'icon'            => 'dn-i-bell',
			'editable'        => true,
			'container'       => false,
			'edit_on_create'  => true,
			'drag_target_for' => array(),
			'drag_source'     => 'content_element',
			'removable'       => true,
			'addable'         => true,
			'params'          => array(
				'show_badge'       => array(
					'id'          => 'show_badge',
					'title'       => esc_html__( 'Show Badge Count', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display notification count in a badge', 'omniverse' ),
				),
				'show_icon'        => array(
					'id'          => 'show_icon',
					'title'       => esc_html__( 'Show Icon', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display bell icon', 'omniverse' ),
				),
				'hide_for_guests'  => array(
					'id'          => 'hide_for_guests',
					'title'       => esc_html__( 'Hide For Guests', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Hide element for non-logged-in users', 'omniverse' ),
				),
				'hide_when_zero'   => array(
					'id'          => 'hide_when_zero',
					'title'       => esc_html__( 'Hide When No Notifications', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => false,
					'description' => esc_html__( 'Hide element if user has no unread notifications', 'omniverse' ),
				),
				'badge_bg_color'   => array(
					'id'        => 'badge_bg_color',
					'title'     => esc_html__( 'Badge Background Color', 'omniverse' ),
					'type'      => 'color',
					'tab'       => esc_html__( 'Style', 'omniverse' ),
					'value'     => '#e74c3c',
					'selectors' => array(
						'whb-row .{{WRAPPER}}.wd-learnpress-notifications .wd-notification-badge' => array(
							'background-color: {{VALUE}};',
						),
					),
				),
				'icon_color'       => array(
					'id'        => 'icon_color',
					'title'     => esc_html__( 'Icon Color', 'omniverse' ),
					'type'      => 'color',
					'tab'       => esc_html__( 'Style', 'omniverse' ),
					'value'     => '',
					'selectors' => array(
						'whb-row .{{WRAPPER}}.wd-learnpress-notifications i' => array(
							'color: {{VALUE}};',
						),
					),
				),
			),
		);
	}
}
