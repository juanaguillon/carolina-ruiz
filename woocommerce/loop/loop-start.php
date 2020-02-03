<?php

/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if (caror_is_language()) {
	$collection = "Colección 2018";
	$collectionText = "Conoce nuestra colección Resort";
	$todo = "Todo";
} else {
	$collection = "Collection 2018";
	$collectionText = "Meet our resort Collection";
	$todo = "All";
}

?>


<section class="section-wrap works-grid-3-col-wide pb-0" id="portfolio">

	<div class="container-fluid">

		<!-- <div class="row heading">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<h2 class="text-center bottom-line"><?= $collection ?></h2>
				<p class="subheading text-center"><?= $collectionText ?></p>
			</div>
		</div> -->

		<!-- <div class="category-product-filter">
			<ul>

				<li><span class="btn iso-filter" data-filter="*"><?= $todo ?></span></li>
				<?php
				$categories = get_terms(['taxonomy' => 'product_cat']);
				foreach ($categories as $cat) : ?>
					<li><span class="btn iso-filter" data-filter=".<?= $cat->slug ?>"><?= $cat->name ?></span></li>

				<?php endforeach; ?>
			
			</ul>
		</div> -->

		<div class="grid-4-col grid grid-wide grid-gutter">



			<!-- <ul class="products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>"> -->