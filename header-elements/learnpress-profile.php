<?php

// Get variables from params - with defaults
if ( ! isset( $params ) || ! is_array( $params ) ) {
	return '';
}

$user_id            = get_current_user_id();
$show_username      = ! empty( $params['show_username'] );
$show_avatar        = ! empty( $params['show_avatar'] );
$show_dropdown      = ! empty( $params['show_dropdown'] );
$display_type       = isset( $params['display_type'] ) ? $params['display_type'] : 'text';
$show_icon         = ! empty( $params['show_icon'] );
$user_logged_in     = is_user_logged_in();

// Build classes
$classes = array( 'wd-learnpress-element', 'wd-tools-element', 'wd-profile-element' );

if ( $display_type === 'icon' || $display_type === 'both' ) {
	$classes[] = 'wd-has-icon';
}

if ( $display_type === 'text' || $display_type === 'both' ) {
	$classes[] = 'wd-has-text';
}

if ( $show_dropdown && $user_logged_in ) {
	$classes[] = 'wd-event-hover';
	$classes[] = 'menu-simple-dropdown';
}

$class_string = implode( ' ', $classes );

// Enqueue dropdown styles if needed
if ( $show_dropdown ) {
	omniverse_enqueue_inline_style( 'menu-simple-dropdown' );
}

?>
<div class="<?php echo esc_attr( $class_string ); ?>" style="display: inline-block; padding: 5px 10px;">
	<?php if ( ! $user_logged_in ) : ?>
		<!-- Not Logged In - Show Login Link -->
		<a href="<?php echo esc_url( home_url( '/login/' ) ); ?>" class="wd-learnpress-login wd-tools-link" title="<?php esc_attr_e( 'Login', 'omniverse' ); ?>" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; padding: 8px 12px; color: inherit;">
			<?php if ( $show_icon ) : ?>
				<span class="wd-tools-icon">
					<i class="dn-i-account"></i>
				</span>
			<?php endif; ?>

			<?php if ( $display_type === 'text' || $display_type === 'both' ) : ?>
				<span class="wd-tools-text">
					<?php esc_html_e( 'Login', 'omniverse' ); ?>
				</span>
			<?php endif; ?>
		</a>

	<?php else : ?>
		<!-- Logged In - Show Profile Link -->
		<?php
		$user_obj = get_user_by( 'id', $user_id );
		
		// Safety check - only render if user object exists
		if ( ! $user_obj ) {
			echo '<!-- LearnPress Profile: User not found -->';
			return;
		}
		
		// Get student profile link - try different approaches for compatibility
		$profile_url = home_url( '/' );
		if ( function_exists( 'learn_press_student_profile_link' ) ) {
			$profile_url = learn_press_student_profile_link( $user_id );
		} elseif ( function_exists( 'learn_press_get_page_link' ) ) {
			$profile_url = learn_press_get_page_link( 'profile' );
		}
		?>
		<a href="<?php echo esc_url( $profile_url ); ?>" class="wd-learnpress-profile" title="<?php echo esc_attr( $user_obj->display_name ); ?>" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; padding: 8px 12px; color: inherit;">
			<?php if ( $display_type === 'icon' || $display_type === 'both' ) : ?>
				<span class="wd-tools-icon">
					<?php if ( $show_avatar ) : ?>
						<?php echo wp_kses_post( get_avatar( $user_id, 32 ) ); ?>
					<?php else : ?>
						<i class="dn-i-account"></i>
					<?php endif; ?>
				</span>
			<?php endif; ?>

			<?php if ( $display_type === 'text' || $display_type === 'both' ) : ?>
				<span class="wd-tools-text">
					<?php if ( $show_username ) : ?>
						<span class="wd-cart-icon" style="display: inline-flex; align-items: center;">
							<i class="dn-i-account"></i>
						</span>	
					<?php endif; ?>
				</span>
			<?php endif; ?>
		</a>

		<?php if ( $show_dropdown ) : ?>
			<!-- Dropdown Menu -->
			<div class="wd-learnpress-dropdown menu-dropdown">
				<ul class="wd-menu">
					<li class="wd-menu-item">
						<a href="<?php echo esc_url( $profile_url ); ?>" class="wd-menu-link">
							<?php esc_html_e( 'My Profile', 'omniverse' ); ?>
						</a>
					</li>

					<?php if ( function_exists( 'learn_press_get_page_link' ) ) : ?>
						<li class="wd-menu-item">
							<a href="<?php echo esc_url( learn_press_get_page_link( 'courses' ) ); ?>" class="wd-menu-link">
								<?php esc_html_e( 'My Courses', 'omniverse' ); ?>
							</a>
						</li>
					<?php endif; ?>

					<li class="wd-menu-item">
						<a href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>" class="wd-menu-link">
							<?php esc_html_e( 'Logout', 'omniverse' ); ?>
						</a>
					</li>
				</ul>
			</div>
		<?php endif; ?>

	<?php endif; ?>
</div>

<style>
.wd-learnpress-element.wd-event-hover {
	position: relative;
}

.wd-learnpress-element.wd-event-hover .wd-learnpress-dropdown {
	display: none;
	position: absolute;
	top: 100%;
	left: 0;
	right: 0;
	background: white;
	border: 1px solid #ddd;
	border-radius: 4px;
	box-shadow: 0 2px 8px rgba(0,0,0,0.1);
	z-index: 1000;
	min-width: 200px;
	margin-top: 5px;
}

.wd-learnpress-element.wd-event-hover:hover .wd-learnpress-dropdown {
	display: block;
}

.wd-learnpress-element .wd-menu {
	list-style: none;
	margin: 0;
	padding: 0;
}

.wd-learnpress-element .wd-menu-item {
	margin: 0;
	padding: 0;
	border-bottom: 1px solid #f0f0f0;
}

.wd-learnpress-element .wd-menu-item:last-child {
	border-bottom: none;
}

.wd-learnpress-element .wd-menu-link {
	display: block;
	padding: 10px 15px;
	color: #333;
	text-decoration: none;
	transition: background-color 0.2s;
}

.wd-learnpress-element .wd-menu-link:hover {
	background-color: #f5f5f5;
	color: #0066cc;
}
</style>
