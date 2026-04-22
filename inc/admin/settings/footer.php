<?php
if ( ! defined( 'OMNIVERSE_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

use DN\Admin\Modules\Options;

Options::add_field(
	array(
		'id'          => 'disable_footer',
		'section'     => 'footer_section',
		'name'        => esc_html__( 'Footer', 'omniverse' ),
		'description' => esc_html__( 'Enable/disable the footer on your website.', 'omniverse' ),
		'type'        => 'switcher',
		'default'     => '1',
		'priority'    => 10,
	)
);

Options::add_field(
	array(
		'id'       => 'footer_content_type',
		'name'     => esc_html__( 'Footer content', 'omniverse' ),
		'group'       => esc_html__( 'Content', 'omniverse' ),
		'type'     => 'buttons',
		'section'  => 'footer_section',
		'options'  => array(
			'widgets'    => array(
				'name'  => esc_html__( 'Widgets', 'omniverse' ),
				'value' => 'widgets',
			),
			'html_block' => array(
				'name'  => esc_html__( 'HTML Block', 'omniverse' ),
				'value' => 'html_block',
			),
		),
		'default'  => 'widgets',
		'priority' => 20,
		'class'    => 'dn-html-block-switch',
	)
);

Options::add_field(
	array(
		'id'          => 'footer-layout',
		'name'        => esc_html__( 'Footer layout', 'omniverse' ),
		'description' => esc_html__( 'Choose your footer layout. Depending on the number of the columns you will have a different number of widget areas for the footer in Appearance->Widgets.', 'omniverse' ),
		'group'       => esc_html__( 'Content', 'omniverse' ),
		'type'        => 'buttons',
		'section'     => 'footer_section',
		'options'     => array(
			1  => array(
				'name'  => esc_html__( 'Single Column', 'omniverse' ),
				'value' => 1,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-1.png',
			),
			2  => array(
				'name'  => esc_html__( 'Two Columns', 'omniverse' ),
				'value' => 2,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-2.png',
			),
			3  => array(
				'name'  => esc_html__( 'Three Columns', 'omniverse' ),
				'value' => 3,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-3.png',
			),
			4  => array(
				'name'  => esc_html__( 'Four Columns', 'omniverse' ),
				'value' => 4,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-4.png',
			),
			5  => array(
				'name'  => esc_html__( 'Six Columns', 'omniverse' ),
				'value' => 5,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-5.png',
			),
			6  => array(
				'name'  => esc_html__( '1/4 + 1/2 + 1/4', 'omniverse' ),
				'value' => 6,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-6.png',
			),
			7  => array(
				'name'  => esc_html__( '1/2 + 1/4 + 1/4', 'omniverse' ),
				'value' => 7,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-7.png',
			),
			8  => array(
				'name'  => esc_html__( '1/4 + 1/4 + 1/2', 'omniverse' ),
				'value' => 8,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-8.png',
			),
			9  => array(
				'name'  => esc_html__( 'Two rows', 'omniverse' ),
				'value' => 9,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-9.png',
			),
			10 => array(
				'name'  => esc_html__( 'Two rows', 'omniverse' ),
				'value' => 10,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-10.png',
			),
			11 => array(
				'name'  => esc_html__( 'Two rows', 'omniverse' ),
				'value' => 11,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-11.png',
			),
			12 => array(
				'name'  => esc_html__( 'Two rows', 'omniverse' ),
				'value' => 12,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-12.png',
			),
			13 => array(
				'name'  => esc_html__( 'Five columns', 'omniverse' ),
				'value' => 13,
				'image' => OMNIVERSE_ASSETS_IMAGES . '/settings/footer-13.png',
			),
		),
		'requires'    => array(
			array(
				'key'     => 'footer_content_type',
				'compare' => 'equals',
				'value'   => 'widgets',
			),
		),
		'default'     => 13,
		'priority'    => 21,
	)
);

Options::add_field(
	array(
		'id'           => 'footer_html_block',
		'type'         => 'select',
		'section'      => 'footer_section',
		'name'         => esc_html__( 'HTML Block', 'omniverse' ),
		'group'       => esc_html__( 'Content', 'omniverse' ),
		'select2'      => true,
		'empty_option' => true,
		'autocomplete' => array(
			'type'   => 'post',
			'value'  => 'cms_block',
			'search' => 'omniverse_get_post_by_query_autocomplete',
			'render' => 'omniverse_get_post_by_ids_autocomplete',
		),
		'requires'     => array(
			array(
				'key'     => 'footer_content_type',
				'compare' => 'equals',
				'value'   => 'html_block',
			),
		),
		'priority'     => 22,
	)
);

Options::add_field(
	array(
		'id'          => 'footer-bar-bg',
		'name'        => esc_html__( 'Footer background', 'omniverse' ),
		'description' => esc_html__( 'You can set your footer section background color or upload your image.', 'omniverse' ),
		'group'       => esc_html__( 'Style', 'omniverse' ),
		'type'        => 'background',
		'default'     => array(
			'color' => '#ffffff',
		),
		'section'     => 'footer_section',
		'selector'    => '.footer-container',
		'tags'        => 'footer color',
		'priority'    => 30,
	)
);

Options::add_field(
	array(
		'id'          => 'footer-style',
		'name'        => esc_html__( 'Footer text color', 'omniverse' ),
		'description' => esc_html__( 'Choose your footer color scheme', 'omniverse' ),
		'group'       => esc_html__( 'Style', 'omniverse' ),
		'type'        => 'buttons',
		'section'     => 'footer_section',
		'options'     => array(
			'dark'  => array(
				'name'  => esc_html__( 'Dark', 'omniverse' ),
				'value' => 'dark',
			),
			'light' => array(
				'name'  => esc_html__( 'Light', 'omniverse' ),
				'value' => 'light',
			),
		),
		'default'     => 'dark',
		'priority'    => 40,
	)
);

Options::add_field(
	array(
		'id'          => 'sticky_footer',
		'section'     => 'footer_section',
		'name'        => esc_html__( 'Sticky footer', 'omniverse' ),
		'hint'        => '<a href="https://omniverse.zynxsol.com/docs/set-up-footer/" target="_blank"><video data-src="' . OMNIVERSE_TOOLTIP_URL . 'footer-sticky.mp4" autoplay loop muted></video></a>',
		'description' => esc_html__( 'The footer will be displayed behind the content of the page and will be visible when user scrolls to the bottom on the page.', 'omniverse' ),
		'group'       => esc_html__( 'Settings', 'omniverse' ),
		'type'        => 'switcher',
		'default'     => false,
		'priority'    => 50,
	)
);

Options::add_field(
	array(
		'id'          => 'collapse_footer_widgets',
		'section'     => 'footer_section',
		'name'        => esc_html__( 'Collapse widgets on mobile', 'omniverse' ),
		'hint'        => '<img src="' . OMNIVERSE_TOOLTIP_URL . 'footer-collapse-widgets-on-mobile.png">',
		'description' => esc_html__( 'Widgets added to the footer will be collapsed by default and opened when you click on their titles.', 'omniverse' ),
		'group'       => esc_html__( 'Settings', 'omniverse' ),
		'type'        => 'switcher',
		'on-text'     => esc_html__( 'Yes', 'omniverse' ),
		'off-text'    => esc_html__( 'No', 'omniverse' ),
		'default'     => true,
		'priority'    => 60,
	)
);

Options::add_field(
	array(
		'id'          => 'scroll_top_btn',
		'section'     => 'footer_section',
		'name'        => esc_html__( 'Scroll to top button', 'omniverse' ),
		'hint'        => '<video data-src="' . OMNIVERSE_TOOLTIP_URL . 'scroll-to-top-button.mp4" autoplay loop muted></video>',
		'description' => esc_html__( 'This button moves you to the top of the page when you click it.', 'omniverse' ),
		'group'       => esc_html__( 'Settings', 'omniverse' ),
		'type'        => 'switcher',
		'default'     => '1',
		'priority'    => 70,
	)
);

Options::add_field(
	array(
		'id'          => 'disable_copyrights',
		'section'     => 'copyrights_section',
		'name'        => esc_html__( 'Copyrights', 'omniverse' ),
		'hint'        => '<img src="' . OMNIVERSE_TOOLTIP_URL . 'footer-copyrights.png">',
		'description' => esc_html__( 'Turn on/off a section with your copyrights under the footer.', 'omniverse' ),
		'type'        => 'switcher',
		'default'     => '1',
		'priority'    => 10,
		'class'       => 'dn-tooltip-bordered',
	)
);

Options::add_field(
	array(
		'id'          => 'copyrights-layout',
		'name'        => esc_html__( 'Copyrights layout', 'omniverse' ),
		'description' => esc_html__( 'Set different copyrights section layout.', 'omniverse' ),
		'type'        => 'buttons',
		'section'     => 'copyrights_section',
		'options'     => array(
			'two-columns' => array(
				'name'  => esc_html__( 'Two columns', 'omniverse' ),
				'hint'        => '<img src="' . OMNIVERSE_TOOLTIP_URL . 'footer-copyrights-2-column.png">',
				'value' => 'two-columns',
			),
			'centered'    => array(
				'name'  => esc_html__( 'Centered', 'omniverse' ),
				'hint'        => '<img src="' . OMNIVERSE_TOOLTIP_URL . 'footer-copyrights-1-column.png">',
				'value' => 'centered',
			),
		),
		'default'     => 'two-columns',
		'priority'    => 20,
		'class'       => 'dn-tooltip-bordered',
	)
);

Options::add_field(
	array(
		'id'          => 'copyrights',
		'name'        => esc_html__( 'Copyrights text', 'omniverse' ),
		'group'       => esc_html__( 'Content', 'omniverse' ),
		'type'        => 'textarea',
		'wysiwyg'     => false,
		'description' => esc_html__( 'Place here text you want to see in the copyrights area. You can use shortocdes. Ex.: [social_buttons]', 'omniverse' ),
		'default'     => 'Based on <a href="http://omniverse.zynxsol.com"><strong>OmniVerse</strong></a> theme<i class="fa fa-copyright"></i> ' . date( 'Y' ) . ' <a href="https://themeforest.net/item/omniverse-woocommerce-wordpress-theme/20264492"><strong>WooCommerce Themes</strong></a>.',
		'section'     => 'copyrights_section',
		'priority'    => 30,
	)
);

Options::add_field(
	array(
		'id'          => 'copyrights2',
		'name'        => esc_html__( 'Text next to copyrights', 'omniverse' ),
		'group'       => esc_html__( 'Content', 'omniverse' ),
		'type'        => 'textarea',
		'wysiwyg'     => false,
		'description' => esc_html__( 'You can use shortcodes. Ex.: [social_buttons] or place an HTML Block built with page builder there like [html_block id="258"]', 'omniverse' ),
		'default'     => '<img src="' . OMNIVERSE_IMAGES . '/payments.png" alt="payments">',
		'section'     => 'copyrights_section',
		'priority'    => 40,
	)
);

/**
 * Prefooter.
 */
Options::add_field(
	array(
		'id'       => 'prefooter_content_type',
		'name'     => esc_html__( 'Prefooter content', 'omniverse' ),
		'type'     => 'buttons',
		'section'  => 'prefooter_section',
		'options'  => array(
			'text'       => array(
				'name'  => esc_html__( 'Text', 'omniverse' ),
				'value' => 'text',
			),
			'html_block' => array(
				'name'  => esc_html__( 'HTML Block', 'omniverse' ),
				'value' => 'html_block',
			),
		),
		'default'  => 'text',
		'priority' => 10,
		'class'    => 'dn-html-block-switch',
	)
);

Options::add_field(
	array(
		'id'       => 'prefooter_area',
		'type'     => 'textarea',
		'wysiwyg'  => false,
		'name'     => esc_html__( 'Text', 'omniverse' ),
		'default'  => '[html_block id="258"]',
		'section'  => 'prefooter_section',
		'tags'     => 'prefooter',
		'requires' => array(
			array(
				'key'     => 'prefooter_content_type',
				'compare' => 'equals',
				'value'   => 'text',
			),
		),
		'priority' => 20,
	)
);

Options::add_field(
	array(
		'id'           => 'prefooter_html_block',
		'name'         => esc_html__( 'HTML Block', 'omniverse' ),
		'type'         => 'select',
		'section'      => 'prefooter_section',
		'select2'      => true,
		'empty_option' => true,
		'autocomplete' => array(
			'type'   => 'post',
			'value'  => 'cms_block',
			'search' => 'omniverse_get_post_by_query_autocomplete',
			'render' => 'omniverse_get_post_by_ids_autocomplete',
		),
		'requires'     => array(
			array(
				'key'     => 'prefooter_content_type',
				'compare' => 'equals',
				'value'   => 'html_block',
			),
		),
		'priority'     => 30,
	)
);