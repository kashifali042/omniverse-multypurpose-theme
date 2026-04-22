<?php

namespace DN\Modules\Header_Builder\Elements;

use DN\Modules\Header_Builder\Element;

/**
 * ------------------------------------------------------------------------------------------------
 * LearnPress Courses Counter Element
 * Displays the number of courses the student is enrolled in
 * ------------------------------------------------------------------------------------------------
 */
class Learnpresscourses extends Element {

	public function __construct() {
		parent::__construct();

		$this->template_name = 'learnpress-courses';
	}

	public function map() {
		$this->args = array(
			'type'            => 'learnpresscourses',
			'title'           => esc_html__( 'LearnPress Courses', 'omniverse' ),
			'text'            => esc_html__( 'Student enrolled courses', 'omniverse' ),
			'icon'            => 'dn-i-book',
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
					'title'       => esc_html__( 'Show Course Count', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display number of enrolled courses', 'omniverse' ),
				),
				'show_label'      => array(
					'id'          => 'show_label',
					'title'       => esc_html__( 'Show Label', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display "Courses" text label', 'omniverse' ),
				),
				'show_icon'       => array(
					'id'          => 'show_icon',
					'title'       => esc_html__( 'Show Icon', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Display book icon', 'omniverse' ),
				),
				'hide_when_zero'  => array(
					'id'          => 'hide_when_zero',
					'title'       => esc_html__( 'Hide When No Courses', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => false,
					'description' => esc_html__( 'Hide element if user has no enrolled courses', 'omniverse' ),
				),
				'hide_for_guests' => array(
					'id'          => 'hide_for_guests',
					'title'       => esc_html__( 'Hide For Guests', 'omniverse' ),
					'type'        => 'switcher',
					'tab'         => esc_html__( 'General', 'omniverse' ),
					'value'       => true,
					'description' => esc_html__( 'Hide element for non-logged-in users', 'omniverse' ),
				),
				'text_color'      => array(
					'id'        => 'text_color',
					'title'     => esc_html__( 'Text Color', 'omniverse' ),
					'type'      => 'color',
					'tab'       => esc_html__( 'Style', 'omniverse' ),
					'value'     => '',
					'selectors' => array(
						'whb-row .{{WRAPPER}}.wd-learnpress-courses' => array(
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
						'whb-row .{{WRAPPER}}.wd-learnpress-courses i' => array(
							'color: {{VALUE}};',
						),
					),
				),
			),
		);
	}
}
