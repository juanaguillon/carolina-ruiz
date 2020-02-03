	
<div class="list_cart_header">
	<?php
	$cartCounts = WC()->cart->get_cart_contents_count();
	if ($cartCounts !== 0) :
		?>
		<ul>
			<?php
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
					$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
					$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
					$permalink = $_product->get_permalink();

					if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
						?>
					<li>
						<div class="list_header_thumb">
							<img src="<?= wp_get_attachment_image_url($_product->get_image_id(), "thumbnial") ?>" alt="">
						</div>
						<div class="list_header_inf">
							<span class="list_header_title">
								<?= wp_kses_post($_product->get_name())  ?>
							</span>

							<span class="list_header_price">
								<?= apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
							</span>
							<span class="list_header_quantity">
								<?= "X" . $cart_item['quantity']; ?>
							</span>
						</div>
					</li>
			<?php
					endif;
				endforeach;
				?>
		</ul>
		<div class="mt-10 text-center">
			<a href="<?php echo wc_get_cart_url() ?>" class="btn btn-sm btn-color">Ver Carrito</a>
		</div>
	<?php
	else :
		?>
		<div class="list_header_empty">
			<div class="icon_error-circle_alt"></div>
			<span>No tienes productos en tu carrito actualmente.</span>
		</div>
	<?php
	endif; // Endif check if cart is´t empty.
	?>
</div>
<?php
$countOrders = count(WC()->cart->get_cart());
if ($countOrders > 0) :
	?>
	<div class="cart_head_counts"><span><?= $countOrders ?></span></div>

<?php
endif;
?>