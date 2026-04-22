<?php

namespace DN\Modules\Header_Builder\Elements;

use DN\Modules\Header_Builder\Element;

/**
 * ------------------------------------------------------------------------------------------------
 * LearnPress User Profile / Login Element
 * Displays user profile, login link, or student dashboard menu in header
 * ------------------------------------------------------------------------------------------------
 */
class Learnpressprofile extends Element {

	public function __construct() {
		parent::__construct();

		$this->template_name = 'learnpress-profile';
	}

	public function map() {
		$this->args = array(
			'type'            => 'learnpressprofile',
			'title'           => esc_html__( 'LearnPress Profile', 'omniverse' ),
			'text'            => esc_html__( 'Student login/profile links', 'omniverse' ),
			'icon'            => 'dn-i-account',
			'editable'        => true,
			'container'       => false,
			'edit_on_create'  => true,
			'drag_target_for' => array(),
			'drag_source'     => 'content_element',
			'removable'       => true,
			'addable'         => true,
			'params'          => array(
				'show_username'   => array(
					'id'          => 'show_username',
					'title'       => esc_html__( 'Show Username', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => false,
					'description' => esc_html__( 'Display student name when logged in', 'omniverse' ),
				),
				'show_avatar'     => array(
					'id'          => 'show_avatar',
					'title'       => esc_html__( 'Show Avatar', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display user avatar when logged in', 'omniverse' ),
				),
				'show_dropdown'   => array(
					'id'          => 'show_dropdown',
					'title'       => esc_html__( 'Show Dropdown Menu', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Show menu on hover (Profile, Courses, Logout)', 'omniverse' ),
				),
				'display_type'    => array(
					'id'      => 'display_type',
					'title'   => esc_html__( 'Display Type', 'omniverse' ),
					'type'    => 'selector',
					'tab'     => esc_html__( 'Style', 'omniverse' ),
					'value'   => 'text',
					'options' => array(
						'icon' => array(
							'value' => 'icon',
							'label' => esc_html__( 'Icon Only', 'omniverse' ),
						),
						'text' => array(
							'value' => 'text',
							'label' => esc_html__( 'Text Only', 'omniverse' ),
						),
						'both' => array(
							'value' => 'both',
							'label' => esc_html__( 'Icon & Text', 'omniverse' ),
						),
					),
				),
				'text_color'      => array(
					'id'        => 'text_color',
					'title'     => esc_html__( 'Text Color', 'omniverse' ),
					'type'      => 'color',
					'tab'       => esc_html__( 'Style', 'omniverse' ),
					'value'     => '',
					'selectors' => array(
						'whb-row .{{WRAPPER}}.wd-learnpress-element a' => array(
							'color: {{VALUE}};',
						),
					),
				),
				'text_hover_color' => array(
					'id'        => 'text_hover_color',
					'title'     => esc_html__( 'Hover Color', 'omniverse' ),
					'type'      => 'color',
					'tab'       => esc_html__( 'Style', 'omniverse' ),
					'value'     => '',
					'selectors' => array(
						'whb-row .{{WRAPPER}}.wd-learnpress-element:hover a' => array(
							'color: {{VALUE}};',
						),
					),
				),
			),
		);
	}
}
