<?php

/**
 * Ficha interna del producto
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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


/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$availableVariations = $product->get_available_variations();

?>

<div class="row contenido-producto res-mb">
	<div id="product-<?php the_ID(); ?>" class="col-md-7 slider-producto">
		<div class="product-slider row d-flex m-0">

			<div class="clearfix col-md-1 col-sm-12 p-0-temp">
				<div id="thumbcarousel" class="carousel" data-interval="false">
					<div class="carousel-inner">
						<div class="item lista-imagenes-carousel">
							<?php if ($imageID = $product->get_image_id()) : ?>
								<div data-target="#carousel" data-slide-to="0" class="thumb">
									<img src="<?php echo wp_get_attachment_image_url($imageID, "thumbnail"); ?>">
								</div>
							<?php endif; ?>

							<?php
							$attachment_ids = $product->get_gallery_image_ids();
							if ($attachment_ids) :
								foreach ($attachment_ids as $attKey => $attachment_id) :
									?>
									<div data-target="#carousel" data-slide-to="<?= $attKey + 1 ?>" class="thumb">
										<img src="<?php echo  wp_get_attachment_image_url($attachment_id, "thumbnail"); ?>">
									</div>
							<?php
								endforeach;
							endif;
							?>

						</div>
						<div class="flecha-mov">
							<a class="down carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-down" aria-hidden="true"></i> </a>
						</div>
					</div>

				</div>

			</div>
			<div id="carousel" class="carousel slide col-md-11 col-sm-12 p-0-temp slider-imagenes-produtos" data-ride="carousel">
				<div class="carousel-inner">

					<?php if ($imageID = $product->get_image_id()) : ?>
						<div class="item active">
							<div class="image-slider-container">
								<img src="<?php echo  wp_get_attachment_image_url($imageID, "full"); ?>">
							</div>
						</div>
					<?php endif; ?>

					<?php
					$attachment_ids = $product->get_gallery_image_ids();
					if ($attachment_ids) :
						$first = true;
						foreach ($attachment_ids as $attachment_id) :
							?>
							<div class="item">
								<div class="image-slider-container">
									<img src="<?php echo  wp_get_attachment_image_url($attachment_id, "full"); ?>">
								</div>
							</div>
					<?php
							$first = false;
						endforeach;
					endif;
					?>

				</div>
			</div>
		</div>

	</div>


	<div class="col-md-5 detalles-productos">

		<h2><?php echo $product->get_title(); ?></h2>
		<div class="referencia item-detalle m-0">
			<span>Referencia:</span><span> R665LO15</span>

		</div>
		<div class="precio item-detalle">
			<span class="valor-precio">$ 55.000</span>
		</div>

		<?php

		$tallas = $product->get_attribute('pa_talla');
		$colors = $product->get_attribute('pa_color');
		$colors = explode(", ", $colors);
		$tallas = explode(", ", $tallas);
		// printcode($tallas);
		// printcode($tallas);
		// printcode($colors);
		?>
		<div class="item-detalle talla detalles">
			<span>Talla</span>
			<ul id="list_tallas">
				<?php foreach ($tallas as $tkey => $talla) : ?>
					<li><a class="<?= $tkey == 0 ? "active" : "" ?>" href="#" data-key_talla="<?= $talla ?>"><?= $talla ?></a></li>
				<?php endforeach; ?>
			</ul>
			<input type="hidden" id="key_talla_val" value="<?= $tallas[0] ?>">
			<a href="#" class="boton-tallas">Guia de tallas</a>
		</div>
		<div class="row">
			<div class="item-detalle cantidad col-md-6">
				<span>Cantidad</span>
				<div class="input-group number-spinner cantidad-spiner">
					<span class="input-group-btn">
						<button class="btn" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
					</span>
					<input type="text" class="form-control text-center" id="key_quant_val" value="1">
					<span class="input-group-btn">
						<button class="btn" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
					</span>
				</div>

			</div>
			<div class="item-detalle color detalles col-md-6">
				<span>Color</span>
				<ul id="list_colors">
					<?php foreach ($colors as $keyColor => $color) :
						$colorName = trim(explode("|", $color)[0]);
						$colorHex = trim(explode("|", $color)[1]);
						?>
						<li class="<?= $keyColor == 0 ? "active" : "" ?>" data-key_color="<?= $colorName ?>" style="background:<?= $colorHex ?>"></li>
					<?php endforeach; ?>
				</ul>
				<input type="hidden" id="key_color_val" value="<?= trim(explode("|", $colors[0])[0]) ?>">
				<input type="hidden" id="key_variattion_id" value="<?= $availableVariations[0]["variation_id"] ?>">
			</div>
		</div>


		<div class="add_actions">

			<a href="#" data-idprod="<?= $product->get_id() ?>" class="btn btn-lg btn-color btn-comprar add_action_cart">
				<div class="loader"></div>
				<i class="fa fa-shopping-cart"></i>Añadir a Carrito
			</a>
		</div>
		<div class="compartir-producto">
			<ul>
				<li><a href="#"><i class="social_facebook"></i></a></li>
				<li><a href="#"><i class="social_twitter"></i></a></li>
				<li><a href="#"><i class="social_pinterest"></i></a></li>
			</ul>
		</div>
	</div>
</div>