<?php

// Initialize defaults with safety checks
if ( ! isset( $params ) || ! is_array( $params ) ) {
	return '';
}

$user_id           = get_current_user_id();
$user_logged_in    = is_user_logged_in();
$lp_active         = class_exists( 'LearnPress' ) || defined( 'LEARNPRESS_PLUGIN_FILE' );
$course_count      = 0;
$show_count        = ! empty( $params['show_count'] );
$show_label        = ! empty( $params['show_label'] );
$show_icon         = ! empty( $params['show_icon'] );
$hide_when_zero    = ! empty( $params['hide_when_zero'] );
$courses_url       = home_url( '/' );

// Only process if user is logged in and LearnPress is active
if ( ! $user_logged_in || ! $lp_active ) {
	return '';
}

// Safely get course count
if ( function_exists( 'learn_press_get_student' ) ) {
	$student = learn_press_get_student( $user_id );
	
	if ( is_object( $student ) && method_exists( $student, 'get_courses' ) ) {
		$courses = $student->get_courses( array( 'status' => 'enrolled' ) );
		$course_count = is_array( $courses ) ? count( $courses ) : 0;
	}
}

// Get courses page link
if ( function_exists( 'learn_press_get_page_link' ) ) {
	$courses_url = learn_press_get_page_link( 'courses' );
}

// Hide if no courses and option is enabled
if ( $course_count === 0 && $hide_when_zero ) {
	return '';
}

?>
<div class="wd-learnpress-courses wd-tools-element" style="display: inline-block;">
	<a href="<?php echo esc_url( $courses_url ); ?>" class="wd-courses-link" title="<?php esc_attr_e( 'My Courses', 'omniverse' ); ?>" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; padding: 8px 12px;">
		<?php if ( $show_icon ) : ?>
			<span class="wd-courses-icon" style="display: inline-flex; align-items: center;">
				<i class="dn-i-book-edit"></i>
			</span>
		<?php endif; ?>
	</a>
</div>

