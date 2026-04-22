<?php
/**
 *
 * The framework's functions and definitions
 */

define( 'OMNIVERSE_THEME_DIR', get_template_directory_uri() );
define( 'OMNIVERSE_THEMEROOT', get_template_directory() );
define( 'OMNIVERSE_IMAGES', OMNIVERSE_THEME_DIR . '/images' );
define( 'OMNIVERSE_SCRIPTS', OMNIVERSE_THEME_DIR . '/js' );
define( 'OMNIVERSE_STYLES', OMNIVERSE_THEME_DIR . '/css' );
define( 'OMNIVERSE_FRAMEWORK', '/inc' );
define( 'OMNIVERSE_DUMMY', OMNIVERSE_THEME_DIR . '/inc/dummy-content' );
define( 'OMNIVERSE_CLASSES', OMNIVERSE_THEMEROOT . '/inc/classes' );
define( 'OMNIVERSE_CONFIGS', OMNIVERSE_THEMEROOT . '/inc/configs' );
define( 'OMNIVERSE_HEADER_BUILDER', OMNIVERSE_THEME_DIR . '/inc/header-builder' );
define( 'OMNIVERSE_ASSETS', OMNIVERSE_THEME_DIR . '/inc/admin/assets' );
define( 'OMNIVERSE_ASSETS_IMAGES', OMNIVERSE_ASSETS . '/images' );
define( 'OMNIVERSE_API_URL', 'https://zynxsol.com/wp-json/dn/v1/' );
define( 'OMNIVERSE_DEMO_URL', 'https://omniverse.zynxsol.com/' );
define( 'OMNIVERSE_PLUGINS_URL', OMNIVERSE_DEMO_URL . 'plugins/' );
define( 'OMNIVERSE_DUMMY_URL', OMNIVERSE_DEMO_URL . 'dummy-content/' );
define( 'OMNIVERSE_TOOLTIP_URL', OMNIVERSE_DEMO_URL . 'theme-settings-tooltips/' );
define( 'OMNIVERSE_SLUG', 'omniverse' );
define( 'OMNIVERSE_CORE_VERSION', '1.1.3' );
define( 'OMNIVERSE_WPB_CSS_VERSION', '1.0.2' );

if ( ! function_exists( 'omniverse_load_classes' ) ) {
	function omniverse_load_classes() {
		$classes = array(
			'class-singleton.php',
			'class-api.php',
			'class-config.php',
			'class-layout.php',
			'class-autoupdates.php',
			'class-activation.php',
			'class-notices.php',
			'class-theme.php',
			'class-registry.php',
		);

		foreach ( $classes as $class ) {
			require OMNIVERSE_CLASSES . DIRECTORY_SEPARATOR . $class;
		}
	}
}

omniverse_load_classes();

new DN\Theme();

define( 'OMNIVERSE_VERSION', omniverse_get_theme_info( 'Version' ) );

add_filter('woodmart_get_inline_css', function($css) {
    $css .= '.whb-top-bar { background-color: #000000 !important; }';
    return $css;
});


