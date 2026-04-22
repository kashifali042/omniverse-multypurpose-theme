<?php if ( ! defined( 'OMNIVERSE_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );}
/**
* ------------------------------------------------------------------------------------------------
* Extra menu list element map
* ------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'omniverse_get_vc_map_extra_menu' ) ) {
	function omniverse_get_vc_map_extra_menu() {
		return array(
			'name'                    => esc_html__( 'Extra menu list', 'omniverse' ),
			'base'                    => 'extra_menu',
			'as_parent'               => array( 'only' => 'extra_menu_list' ),
			'content_element'         => true,
			'show_settings_on_create' => true,
			'category'                => omniverse_get_tab_title_category_for_wpb( esc_html__( 'Theme elements', 'omniverse' ) ),
			'description'             => esc_html__( 'Create a menu list for your mega menu dropdown', 'omniverse' ),
			'icon'                    => OMNIVERSE_ASSETS . '/images/vc-icon/extra-menu-list.svg',
			'params'                  => array(
				array(
					'type'       => 'omniverse_css_id',
					'param_name' => 'omniverse_css_id',
				),
				/**
				 * Link
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Link', 'omniverse' ),
					'param_name' => 'link_divider',
				),
				array(
					'type'             => 'textfield',
					'holder'           => 'div',
					'heading'          => esc_html__( 'Title', 'omniverse' ),
					'param_name'       => 'title',
					'edit_field_class' => 'vc_col-sm-6 vc_column',

				),
				array(
					'type'             => 'vc_link',
					'heading'          => esc_html__( 'Link', 'omniverse' ),
					'param_name'       => 'link',
					'hint'             => esc_html__( 'Enter URL if you want this parent menu item to have a link.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				/**
				 * Label
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Label', 'omniverse' ),
					'param_name' => 'label_divider',
				),
				array(
					'type'             => 'textfield',
					'heading'          => esc_html__( 'Label text (optional)', 'omniverse' ),
					'param_name'       => 'label_text',
					'hint'             => esc_html__( 'Write a label for this menu item badge like “Sale”, “Hot”, “New” etc. Leave empty to not add any badges.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'omniverse_dropdown',
					'heading'          => esc_html__( 'Label color', 'omniverse' ),
					'param_name'       => 'label',
					'value'            => array(
						esc_html__( 'Primary Color', 'omniverse' ) => 'primary',
						esc_html__( 'Secondary', 'omniverse' ) => 'secondary',
						esc_html__( 'Red', 'omniverse' ) => 'red',
						esc_html__( 'Green', 'omniverse' ) => 'green',
						esc_html__( 'Blue', 'omniverse' ) => 'blue',
						esc_html__( 'Orange', 'omniverse' ) => 'orange',
						esc_html__( 'Grey', 'omniverse' ) => 'grey',
						esc_html__( 'White', 'omniverse' ) => 'white',
						esc_html__( 'Black', 'omniverse' ) => 'black',
					),
					'style'            => array(
						'primary'   => omniverse_get_color_value( 'primary-color', '#7eb934' ),
						'secondary' => omniverse_get_color_value( 'secondary-color', '#fbbc34' ),
						'red'       => '#D41212',
						'green'     => '#2c3d4f',
						'blue'      => '#00A1BE',
						'orange'    => '#fbbc34',
						'grey'      => '#ECECEC',
						'black'     => '#000000',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				/**
				 * Image
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Image', 'omniverse' ),
					'param_name' => 'image_divider',
				),
				array(
					'type'             => 'attach_image',
					'heading'          => esc_html__( 'Image', 'omniverse' ),
					'param_name'       => 'image',
					'value'            => '',
					'hint'             => esc_html__( 'Select image from media library.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'textfield',
					'heading'          => esc_html__( 'Image size', 'omniverse' ),
					'param_name'       => 'image_size',
					'hint'             => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
					'description'      => esc_html__( 'Example: \'thumbnail\', \'medium\', \'large\', \'full\' or enter image size in pixels: \'200x100\'.', 'omniverse' ),
				),
				/**
				 * Extra
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Extra options', 'omniverse' ),
					'param_name' => 'extra_divider',
				),
				( function_exists( 'vc_map_add_css_animation' ) ) ? vc_map_add_css_animation( true ) : '',
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Extra class name', 'omniverse' ),
					'param_name' => 'el_class',
					'hint'       => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'omniverse' ),
				),
				// Design options.
				array(
					'heading'    => esc_html__( 'CSS box', 'omniverse' ),
					'group'      => esc_html__( 'Design Options', 'js_composer' ),
					'type'       => 'css_editor',
					'param_name' => 'css',
				),
				omniverse_get_vc_responsive_spacing_map(),
			),
			'js_view'                 => 'VcColumnView',
		);
	}
}

if ( ! function_exists( 'omniverse_get_vc_map_extra_menu_list' ) ) {
	function omniverse_get_vc_map_extra_menu_list() {
		return array(
			'name'            => esc_html__( 'Extra menu list item', 'omniverse' ),
			'base'            => 'extra_menu_list',
			'as_child'        => array( 'only' => 'extra_menu' ),
			'content_element' => true,
			'category'        => omniverse_get_tab_title_category_for_wpb( esc_html__( 'Theme elements', 'omniverse' ) ),
			'description'     => esc_html__( 'A link for your extra menu list', 'omniverse' ),
			'icon'            => OMNIVERSE_ASSETS . '/images/vc-icon/extra-menu-list-item.svg',
			'params'          => array(
				/**
				 * Link
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Link', 'omniverse' ),
					'param_name' => 'link_divider',
				),
				array(
					'type'             => 'textfield',
					'holder'           => 'div',
					'heading'          => esc_html__( 'Title', 'omniverse' ),
					'param_name'       => 'title',
					'edit_field_class' => 'vc_col-sm-6 vc_column',

				),
				array(
					'type'             => 'vc_link',
					'heading'          => esc_html__( 'Link', 'omniverse' ),
					'param_name'       => 'link',
					'hint'             => esc_html__( 'Enter URL if you want this parent menu item to have a link.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				/**
				 * Label
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Label', 'omniverse' ),
					'param_name' => 'label_divider',
				),
				array(
					'type'             => 'textfield',
					'heading'          => esc_html__( 'Label text (optional)', 'omniverse' ),
					'param_name'       => 'label_text',
					'hint'             => esc_html__( 'Write a label for this menu item badge like “Sale”, “Hot”, “New” etc. Leave empty to not add any badges.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'omniverse_dropdown',
					'heading'          => esc_html__( 'Label color', 'omniverse' ),
					'param_name'       => 'label',
					'value'            => array(
						esc_html__( 'Primary Color', 'omniverse' ) => 'primary',
						esc_html__( 'Secondary', 'omniverse' ) => 'secondary',
						esc_html__( 'Red', 'omniverse' ) => 'red',
						esc_html__( 'Green', 'omniverse' ) => 'green',
						esc_html__( 'Blue', 'omniverse' ) => 'blue',
						esc_html__( 'Orange', 'omniverse' ) => 'orange',
						esc_html__( 'Grey', 'omniverse' ) => 'grey',
						esc_html__( 'White', 'omniverse' ) => 'white',
						esc_html__( 'Black', 'omniverse' ) => 'black',
					),
					'style'            => array(
						'primary'   => omniverse_get_color_value( 'primary-color', '#7eb934' ),
						'secondary' => omniverse_get_color_value( 'secondary-color', '#fbbc34' ),
						'red'       => '#D41212',
						'green'     => '#2c3d4f',
						'blue'      => '#00A1BE',
						'orange'    => '#fbbc34',
						'grey'      => '#ECECEC',
						'black'     => '#000000',
					),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				/**
				 * Image
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Image', 'omniverse' ),
					'param_name' => 'image_divider',
				),
				array(
					'type'             => 'attach_image',
					'heading'          => esc_html__( 'Image', 'omniverse' ),
					'param_name'       => 'image',
					'value'            => '',
					'hint'             => esc_html__( 'Select image from media library.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
					'type'             => 'textfield',
					'heading'          => esc_html__( 'Image size', 'omniverse' ),
					'param_name'       => 'image_size',
					'hint'             => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'omniverse' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
					'description'      => esc_html__( 'Example: \'thumbnail\', \'medium\', \'large\', \'full\' or enter image size in pixels: \'200x100\'.', 'omniverse' ),
				),
				/**
				 * Extra
				 */
				array(
					'type'       => 'omniverse_title_divider',
					'holder'     => 'div',
					'title'      => esc_html__( 'Extra options', 'omniverse' ),
					'param_name' => 'extra_divider',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Extra class name', 'omniverse' ),
					'param_name' => 'el_class',
					'hint'       => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'omniverse' ),
				),
			),
		);
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_extra_menu extends WPBakeryShortCodesContainer {

	}
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_extra_menu_list extends WPBakeryShortCode {

	}
}
