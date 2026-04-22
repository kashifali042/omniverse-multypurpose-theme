<?php

// Initialize defaults with safety checks
if ( ! isset( $params ) || ! is_array( $params ) ) {
	return '';
}

$user_id           = get_current_user_id();
$user_logged_in    = is_user_logged_in();
$lp_active         = class_exists( 'LearnPress' ) || defined( 'LEARNPRESS_PLUGIN_FILE' );
$cart_count        = 0;
$show_count        = ! empty( $params['show_count'] );
$show_label        = ! empty( $params['show_label'] );
$show_icon         = ! empty( $params['show_icon'] );
$hide_when_empty   = ! empty( $params['hide_when_empty'] );
$link_to_cart      = ! empty( $params['link_to_cart'] );
$cart_url          = home_url( '/' );

// Only process if user is logged in and LearnPress is active
if ( ! $user_logged_in || ! $lp_active ) {
	return '';
}

// Safely get cart count
if ( function_exists( 'learn_press_get_cart' ) ) {
	$cart = learn_press_get_cart();
	
	if ( is_object( $cart ) && method_exists( $cart, 'get_items' ) ) {
		$cart_items = $cart->get_items();
		$cart_count = is_array( $cart_items ) ? count( $cart_items ) : 0;
	}
}

// Alternative method if the above doesn't work
if ( $cart_count === 0 && function_exists( 'LP_Cart' ) ) {
	$cart_instance = LP_Cart();
	
	if ( is_object( $cart_instance ) && method_exists( $cart_instance, 'get_items' ) ) {
		$cart_items = $cart_instance->get_items();
		$cart_count = is_array( $cart_items ) ? count( $cart_items ) : 0;
	}
}

// Get cart page link
if ( function_exists( 'learn_press_get_page_link' ) ) {
	$cart_url = learn_press_get_page_link( 'checkout' );
}

// Hide if cart is empty and option is enabled
if ( $cart_count === 0 && $hide_when_empty ) {
	return '';
}

?>
<div class="wd-learnpress-cart wd-tools-element" style="display: inline-block;">
	<?php if ( $link_to_cart ) : ?>
		<a href="<?php echo esc_url( $cart_url ); ?>" class="wd-cart-link" title="<?php esc_attr_e( 'My Cart', 'omniverse' ); ?>" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; padding: 8px 12px;">
	<?php else : ?>
		<span class="wd-cart-link" style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 12px;">
	<?php endif; ?>
		<?php if ( $show_icon ) : ?>
			<span class="wd-cart-icon" style="display: inline-flex; align-items: center;">
				<i class="dn-i-cart"></i>
			</span>
		<?php endif; ?>

		<span class="wd-cart-content" style="display: inline-block;">
			<?php if ( $show_count ) : ?>
				<span class="wd-count" style="display: inline-block; margin-right: 4px; font-weight: bold;">
					<?php echo intval( $cart_count ); ?>
				</span>
			<?php endif; ?>
		</span>
	<?php if ( $link_to_cart ) : ?>
		</a>
	<?php else : ?>
		</span>
	<?php endif; ?>
</div>
