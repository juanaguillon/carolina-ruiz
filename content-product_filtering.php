<?php

/**
 * Filtros Isotope.
 */
?>
<div class="category-product-filter">
  <ul>
    <li><span class="btn iso-filter" data-filter="*">Todo</span></li>

    <?php
    $categories = get_terms(['taxonomy' => 'product_cat']);
    foreach ($categories as $cat) : ?>
      <li><span class="btn iso-filter" data-filter=".<?= $cat->slug ?>"><?= $cat->name ?></span></li>
    <?php endforeach; ?>
  </ul>
</div>