<?php
get_header();
$searchQuery = get_search_query();

$products = new WP_Query(array(
  "post_type" => "product",
  's' => $searchQuery,
  "posts_per_page" => -1
));
$resultados = "Resultados encontrados";
if ( caror_is_language("en")){
  $resultados = "Results found";
}

?>
<section class="section-wrap works-grid-3-col-wide pb-0" id="portfolio">

  <div class="container-fluid">

    <div class="row heading">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <h2 class="text-center bottom-line"><?= $resultados ?></h2>
      </div>
    </div>

    <?php get_template_part("content", "product_filtering"); ?>

    <div class="grid-4-col grid grid-wide grid-gutter grayscale">
      <?php
      while ($products->have_posts()) : $products->the_post();
        global $product;
        wc_get_template_part('content', 'product');
      endwhile;

      ?>

    </div>
  </div>
</section>
<?php


get_footer();
