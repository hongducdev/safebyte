<?php

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'safebyte_loop_shop_columns', 20 ); 
function safebyte_loop_shop_columns() {
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : safebyte()->get_theme_opt('products_columns', 4);
	return $columns;
}
 

// Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'safebyte_loop_shop_per_page', 20 );
function safebyte_loop_shop_per_page( $limit ) {
	$limit = safebyte()->get_theme_opt('product_per_page', 9);
	return $limit;
}


/* Remove result count & product ordering & item product category..... */
function safebyte_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
}
add_action( 'init', 'safebyte_cwoocommerce_remove_function' );

/* Product Category */
add_action( 'woocommerce_before_shop_loop', 'safebyte_woocommerce_nav_top', 2 );
function safebyte_woocommerce_nav_top() { ?>
	<?php
		$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : safebyte()->get_theme_opt('products_columns', 2);
		$view_mode = isset($_GET['view']) ? sanitize_text_field($_GET['view']) : safebyte()->get_theme_opt('shop_layout', 'grid');
		$view_mode_class = '';
		if($view_mode == 'grid') {
			$view_mode_class = 'grid-mode';
		} else {
			$view_mode_class = 'list-mode';
		}
	?>

	<div class="woocommerce-topbar">
		<div class="woocommerce-result-count">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-right-group">
			<div class="woocommerce-topbar-ordering">
				<?php woocommerce_catalog_ordering(); ?>
			</div>
			<div class="view-mode-btn grid-mode" data-view="grid <?php echo esc_attr($columns); ?>">
				<div class="view-mode-btn-inner">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="view-mode-btn list-mode" data-view="list">
				<span></span>
			</div>
		</div>
	</div>
<?php }

function display_new_badge_on_products()
{
	global $product;
	$newness_days = 30;
	$created = strtotime($product->get_date_created());
	$html = '';
	if ((time() - (60 * 60 * 24 * $newness_days)) < $created) {
		$html = '<span class="new">' . esc_html__('New', 'invadex') . '</span>';
	}
	return $html;
}


add_filter( 'woocommerce_after_shop_loop_item', 'safebyte_woocommerce_product' );
function safebyte_woocommerce_product() {
	global $product;
	$shop_layout = safebyte()->get_theme_opt('shop_layout', 'grid');
	if(isset($_GET['shop-layout'])) {
        $shop_layout = $_GET['shop-layout'];
    }
	?>
	<div class="woocommerce-product-inner item-layout-<?php echo esc_attr($shop_layout); ?>">
		<div class="woocommerce-product-header">
			<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
			</a>
			<div class="woocommerce-badges <?php echo esc_attr($product->is_on_sale() ? 'sale' : 'new'); ?>">
				<?php if ($product->is_on_sale()) : ?>
					<span><?php echo esc_html__('Sale', 'invadex'); ?></span>
				<?php else : ?>
					<?php pxl_print_html(display_new_badge_on_products($product->get_id())); ?>
				<?php endif; ?>
			</div>
			<div class="woocommerce-product-buttons">
				<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
				<?php } else { ?>
					<div class="woocommerce-product-button add-cart">
						<?php woocommerce_template_loop_add_to_cart(); ?>
					</div>
				<?php } ?>
				<?php if (class_exists('WPCleverWoosw')) : ?>
					<div class="woocommerce-product-button wishlist">
						<?php echo do_shortcode('[woosw id="' . esc_attr($product->get_id()) . '"]'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="woocommerce-product-content">
			<div class="woocommerce-product--price">
				<?php woocommerce_template_loop_price(); ?>
			</div>
			<h4 class="woocommerce-product-title">
				<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
			</h4>
			<div class="woocommerce-product--rating">
				<?php woocommerce_template_loop_rating(); ?>
			</div>
		</div>
	</div>
<?php }

/* Removes the "shop" title on the main shop page */
function safebyte_hide_page_title()
{
    return false;
}
add_filter('woocommerce_show_page_title', 'safebyte_hide_page_title');

/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'safebyte_custom_sale_text', 10, 3);
function safebyte_custom_sale_text($text, $post, $_product)
{
	$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);

	$product_sale = '';
	if(!empty($sale_price)) {
		$product_sale = intval( ( (intval($regular_price) - intval($sale_price)) / intval($regular_price) ) * 100);
		return '<span class="onsale">' .$product_sale. '%</span>';
	}
}

/**
 * Modify image width theme support.
 */

add_action( 'woocommerce_before_single_product_summary', 'safebyte_woocommerce_single_summer_start', 0 );
function safebyte_woocommerce_single_summer_start() { ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }
add_action( 'woocommerce_after_single_product_summary', 'safebyte_woocommerce_single_summer_end', 5 );
function safebyte_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }


add_action( 'woocommerce_single_product_summary', 'safebyte_woocommerce_sg_product_title', 5 );
function safebyte_woocommerce_sg_product_title() { 
	global $product; 
	$product_title = safebyte()->get_theme_opt( 'product_title', false ); 
	if($product_title ) : ?>
		<div class="woocommerce-sg-product-title">
			<?php woocommerce_template_single_title(); ?>
		</div>
<?php endif; }

add_action( 'woocommerce_single_product_summary', 'safebyte_woocommerce_sg_product_rating', 10 );
function safebyte_woocommerce_sg_product_rating() { global $product; ?>
	<div class="woocommerce-sg-product-rating">
		<?php woocommerce_template_single_rating(); ?>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'safebyte_woocommerce_sg_product_price', 15 );
function safebyte_woocommerce_sg_product_price() { ?>
	<div class="woocommerce-sg-product-price">
		<?php woocommerce_template_single_price(); ?>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'safebyte_woocommerce_sg_product_excerpt', 20 );
function safebyte_woocommerce_sg_product_excerpt() { ?>
	<div class="woocommerce-sg-product-excerpt">
		<?php woocommerce_template_single_excerpt(); ?>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'safebyte_woocommerce_sg_product_button', 30 );
function safebyte_woocommerce_sg_product_button() { 
	global $product;
	?>
	<div class="woocommerce-sg-product-button">
		<?php if (class_exists('WPCleverWoosw')) { ?>
			<div class="woocommerce-wishlist">
		    	<?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
			</div>
		<?php } ?>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'safebyte_woocommerce_sg_social_share', 40 );
function safebyte_woocommerce_sg_social_share() { 
	$product_social_share = safebyte()->get_theme_opt( 'product_social_share', false );
	if($product_social_share) : ?>
		<div class="woocommerce-social-share">
			<label class="pxl-mr-20"><?php echo esc_html__('Share:', 'safebyte'); ?></label>
			<a class="fb-social pxl-mr-10" title="<?php echo esc_attr__('Facebook', 'safebyte'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
	        <a class="tw-social pxl-mr-10" title="<?php echo esc_attr__('Twitter', 'safebyte'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
	        <a class="pin-social pxl-mr-10" title="<?php echo esc_attr__('Pinterest', 'safebyte'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
	        <a class="lin-social pxl-mr-10" title="<?php echo esc_attr__('LinkedIn', 'safebyte'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
    </div>
<?php endif; }

/* Checkout Page*/
add_action( 'woocommerce_checkout_before_order_review_heading', 'saira_checkout_before_order_review_heading_start', 5 );
function saira_checkout_before_order_review_heading_start() { ?>
	<?php echo '<div class="pxl-order-review-right"><div class="pxl-order-review-inner">'; ?>
<?php }

add_action( 'woocommerce_checkout_after_order_review', 'saira_checkout_after_order_review_end', 5 );
function saira_checkout_after_order_review_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }
/* End Checkout Page*/

/* Product Single: Gallery */
add_action( 'woocommerce_before_single_product_summary', 'safebyte_woocommerce_single_gallery_start', 0 );
function safebyte_woocommerce_single_gallery_start() { ?>
	<?php echo '<div class="woocommerce-gallery col-xl-6 col-lg-6 col-md-6"><div class="woocommerce-gallery-inner">'; ?>
<?php }
add_action( 'woocommerce_before_single_product_summary', 'safebyte_woocommerce_single_gallery_end', 30 );
function safebyte_woocommerce_single_gallery_end() { ?>
	<?php echo '</div></div><div class="woocommerce-summary-inner col-xl-6 col-lg-6 col-md-6">'; ?>
<?php }

/* Ajax update cart item */
add_filter('woocommerce_add_to_cart_fragments', 'safebyte_woo_mini_cart_item_fragment');
function safebyte_woo_mini_cart_item_fragment( $fragments ) {
	global $woocommerce;
	$product_subtitle = safebyte()->get_page_opt( 'product_subtitle' );
    ob_start();
    ?>
    <div class="widget_shopping_cart">
    	<div class="widget_shopping_head">
    		<div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
	    	<div class="widget_shopping_title">
	    		<?php echo esc_html__( 'Cart', 'safebyte' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'safebyte' ), WC()->cart->cart_contents_count ); ?>)</span>
	    	</div>
	    </div>
        <div class="widget_shopping_cart_content">
            <?php
            	$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
            ?>
            <ul class="cart_list product_list_widget">

			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

							$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							<li>
								<?php if(!empty($thumbnail)) : ?>
									<div class="cart-product-image">
										<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
											<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
										</a>
									</div>
								<?php endif; ?>
								<div class="cart-product-meta">
									<h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
									<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_attr__( 'Remove this item', 'safebyte' ),
											esc_attr( $product_id ),
											esc_attr( $cart_item_key ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								</div>	
							</li>
							<?php
						}
					}
				?>

			<?php else : ?>

				<li class="empty">
					<i class="caseicon-shopping-cart-alt"></i>
					<span><?php esc_html_e( 'Your cart is empty', 'safebyte' ); ?></span>
					<a class="btn btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'safebyte'); ?></a>
				</li>

			<?php endif; ?>

			</ul><!-- end product list -->
        </div>
        <?php if ( ! WC()->cart->is_empty() ) : ?>
			<div class="widget_shopping_cart_footer">
				<p class="total"><strong><?php esc_html_e( 'Subtotal', 'safebyte' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

				<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

				<p class="buttons">
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-shop wc-forward"><?php esc_html_e( 'View Cart', 'safebyte' ); ?></a>
					<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn checkout wc-forward"><?php esc_html_e( 'Checkout', 'safebyte' ); ?></a>
				</p>
			</div>
		<?php endif; ?>
    </div>
    <?php
    $fragments['div.widget_shopping_cart'] = ob_get_clean();
    return $fragments;
}

/* Ajax update cart total number */

add_filter( 'woocommerce_add_to_cart_fragments', 'safebyte_woocommerce_sidebar_cart_count_number' );
function safebyte_woocommerce_sidebar_cart_count_number( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'safebyte' ), WC()->cart->cart_contents_count ); ?>)</span>
	<?php
	
	$fragments['span.widget_cart_counter'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'safebyte_woocommerce_sidebar_cart_count_number_header' );
function safebyte_woocommerce_sidebar_cart_count_number_header( $fragments ) {
	ob_start();
	?>
	<span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'safebyte' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.widget_cart_counter_header'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'safebyte_woocommerce_sidebar_cart_count_number_sidebar' );
function safebyte_woocommerce_sidebar_cart_count_number_sidebar( $fragments ) {
	ob_start();
	?>
	<span class="ct-cart-count-sidebar"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'safebyte' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['span.ct-cart-count-sidebar'] = ob_get_clean();
	
	return $fragments;
}

add_filter( 'woocommerce_output_related_products_args', 'safebyte_related_products_args', 20 );
  function safebyte_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns'] = 4;
	return $args;
}

/* Pagination Args */
function safebyte_filter_woocommerce_pagination_args( $array ) { 
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
    return $array; 
}; 
add_filter( 'woocommerce_pagination_args', 'safebyte_filter_woocommerce_pagination_args', 10, 1 ); 

/* Flex Slider Arrow */
add_filter( 'woocommerce_single_product_carousel_options', 'safebyte_update_woo_flexslider_options' );
function safebyte_update_woo_flexslider_options( $options ) {
$options['directionNav'] = true;
	return $options;
}

/* Single Thumbnail Size */
$single_img_size = safebyte()->get_theme_opt('single_img_size');
if(!empty($single_img_size['width']) && !empty($single_img_size['height'])) {
	add_filter('woocommerce_get_image_size_single', function ($size) {
		$single_img_size = safebyte()->get_theme_opt('single_img_size');
		$single_img_size_width = preg_replace('/[^0-9]/', '', $single_img_size['width']);
		$single_img_size_height = preg_replace('/[^0-9]/', '', $single_img_size['height']);
		$size['width'] = $single_img_size_width;
	    $size['height'] = $single_img_size_height;
	    $size['crop'] = 1;
	    return $size;
	});
}
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    $size['width'] = 300;
    $size['height'] = 300;
    $size['crop'] = 1;
    return $size;
});

add_filter('woocommerce_get_image_size_thumbnail', function ($size) {
    $size['width'] = 685;
    $size['height'] = 750;
    $size['crop'] = 1;
    return $size;
});

// paginate links
add_filter('woocommerce_pagination_args', 'safebyte_woocommerce_pagination_args');
function safebyte_woocommerce_pagination_args($default){
	$default = array_merge($default, [
		'prev_text' => '<i class="caseicon-angle-arrow-left"></i>',
		'next_text' => '<i class="caseicon-angle-arrow-right"></i>',
		'type'      => 'plain',
	]);
	return $default;
}

// cart link in archive product
add_filter('woocommerce_loop_add_to_cart_link', 'safebyte_woocommerce_loop_add_to_cart_link', 10, 3);
function safebyte_woocommerce_loop_add_to_cart_link($button, $product, $args){
	return sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s><span class="pxl-text--hide">%s</span><span class="pxl-btn-text">%s</span>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() ),
		esc_html( $product->add_to_cart_text() ),
		'<i class="fas fa-shopping-cart"></i><span class="btn-cart-overlay"></span><span class="pxl-cart-loader"></span>'
	);
}