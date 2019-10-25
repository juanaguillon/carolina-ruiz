<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}

$terms = get_the_terms($product->ID, 'product_cat');
$product_cat_id = "";
foreach ($terms as $term) {
	$product_cat_id .= " " . $term->slug;
}

?>

<div class="work-item grid-item nuevo<?php echo $product_cat_id; ?>">
	<div class="work-img">

		<?php
		$post_thumbnail_id = $product->get_image_id();
		if ($product->get_image_id()) {
			echo wc_get_gallery_image_html($post_thumbnail_id, true);
		} else {
			echo sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
		}
		?>

		<div class="work-overlay">
			<div class="work-description">
			</div>
			<a href="<?php echo esc_url($product->get_permalink()); ?>" class="btn btn-lg btn-transparent">Ver producto</a>
		</div>
	</div>
	<div class="nombre-producto">
		<h4><?php echo wp_kses_post($product->get_name()); ?></h4>
		<?php

		if ($product->product_type == 'variable') {
			$available_variations = $product->get_available_variations();
			$count = count($available_variations) - 1;
			$variation_id = $available_variations[$count]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
			$variable_product1 = new WC_Product_Variation($variation_id);
			$regular_price = $variable_product1->regular_price;
			$sales_price = $variable_product1->sale_price;
		} else if ($product->product_type == "simple") {
			$regular_price = $product->get_price()
			?>
		<?php
		}

		?>
		<span class="valor-precio-2 text-center">$<?php echo number_format(wp_kses_post($regular_price), "0", ".", "."); ?></span>


		<a href="<?php echo esc_url($product->get_permalink()); ?>" class="btn btn-color btn-comprar-prdt">Comprar</a>
	</div>
</div>