<?php

// Initialize defaults with safety checks
if ( ! isset( $params ) || ! is_array( $params ) ) {
	return '';
}

$user_id            = get_current_user_id();
$user_logged_in     = is_user_logged_in();
$lp_active          = class_exists( 'LearnPress' ) || defined( 'LEARNPRESS_PLUGIN_FILE' );
$show_badge         = ! empty( $params['show_badge'] );
$show_icon          = ! empty( $params['show_icon'] );
$hide_when_zero     = ! empty( $params['hide_when_zero'] );
$notification_count = 0;

// Only process if user is logged in and LearnPress is active
if ( ! $user_logged_in || ! $lp_active ) {
	return '';
}

// Safely get notification count
if ( function_exists( 'learn_press_get_student' ) ) {
	$student = learn_press_get_student( $user_id );
	
	if ( function_exists( 'get_user_notifications_count' ) ) {
		$notification_count = get_user_notifications_count( $user_id );
	} elseif ( is_object( $student ) ) {
		// Default: Check for unread course messages
		$notification_count = get_user_meta( $user_id, 'unread_notifications', true );
		$notification_count = ! empty( $notification_count ) ? intval( $notification_count ) : 0;
	}
}

// Set notifications URL
$notifications_url = admin_url( 'admin.php?page=lp-calendar' );
if ( function_exists( 'learn_press_get_page_link' ) ) {
	$maybe_url = learn_press_get_page_link( 'notifications' );
	if ( $maybe_url ) {
		$notifications_url = $maybe_url;
	}
}

// Hide if no notifications and option is enabled
if ( $notification_count === 0 && $hide_when_zero ) {
	return '';
}

?>
<div class="wd-learnpress-notifications wd-tools-element" style="display: inline-block;">
	<a href="<?php echo esc_url( $notifications_url ); ?>" class="wd-notifications-link" title="<?php esc_attr_e( 'Notifications', 'omniverse' ); ?>" style="display: inline-flex; align-items: center; text-decoration: none; padding: 8px 12px;">
		<?php if ( $show_icon ) : ?>
			<span class="wd-notifications-icon" style="display: inline-block; position: relative;">
				<i class="dn-i-alert-info"></i>

				<?php if ( $show_badge && $notification_count > 0 ) : ?>
					<span class="wd-notification-badge" style="display: inline-block; position: absolute; top: -8px; right: -8px; background: #dc3545; color: white; border-radius: 50%; min-width: 18px; height: 18px; padding: 0 4px; text-align: center; line-height: 18px; font-size: 11px; font-weight: bold;">
						<?php echo intval( $notification_count ); ?>
					</span>
				<?php endif; ?>
			</span>
		<?php elseif ( $show_badge && $notification_count > 0 ) : ?>
			<span class="wd-notification-badge" style="display: inline-block; background: #dc3545; color: white; border-radius: 50%; min-width: 20px; height: 20px; padding: 0 4px; text-align: center; line-height: 20px; font-size: 12px; font-weight: bold;">
				<?php echo intval( $notification_count ); ?>
			</span>
		<?php endif; ?>
	</a>
</div>
