<?php /* Template Name: Collections */ get_header() ?>

<div class="page-content">
  <div class="row ">

    <div class="col-md-12">
      <div class="container-fluid">

        <!-- <div class="row heading head-title">
          <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 coleccion-selector">
            <h2 class="text-center bottom-line">Colección 2019 <i class="fa fa-angle-down desplegar-colecciones"></i>
            </h2>
            <div class="coleccion-lista">
              <div class="coleccion-imagen">
                <img src="<?php echo get_template_directory_uri() ?>/img/project_1.jpg" alt="">
                <h3>Colección 2018</h3>
              </div>
              <div class="coleccion-imagen">
                <img src="<?php echo get_template_directory_uri() ?>/img/project_4.jpg" alt="">
                <h3>Colección 2017</h3>
              </div>
              <div class="coleccion-imagen">
                <img src="<?php echo get_template_directory_uri() ?>/img/project_6.jpg" alt="">
                <h3>Colección 2016</h3>
              </div>

            </div>
          </div>
        </div> -->
        <div class="filtros-coleccion">
          <ul>
            <li>
              <span>Categoria</span>
              <div class="select relative">
                <i class="fa fa-angle-down"></i>

                <select class="collection_select" id="select_categoria">
                  <option selected="" value="default">Todos</option>
                  <?php
                  $categories = get_terms(['taxonomy' => 'product_cat']);
                  foreach ($categories as $cat) : ?>
                    <option value="<?= $cat->slug ?>"><?= $cat->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </li>
            <li>
              <span>Talla</span>
              <div class="select relative">
                <i class="fa fa-angle-down"></i>
                <select class="collection_select" id="select_talla">
                  <option selected="" value="default">Todas</option>
                  <?php
                  $tallas = get_terms("pa_talla");
                  foreach ($tallas  as $tall) : ?>
                    <option value="talla_<?= $tall->slug ?>"><?= $tall->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </li>
            <li>
              <span>Color</span>
              <div class="select relative">
                <i class="fa fa-angle-down"></i>
                <select class="collection_select" id="select_color">
                  <option selected="" value="default">Todos</option>
                  <?php
                  $colors = get_terms("pa_color");
                  foreach ($colors  as $color) :
                    $colorName = caror_explode_color_name($color)
                    ?>
                    <option value="<?= $color->slug ?>"><?= $colorName["name"] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </li>
            <li>
              <span>Material</span>
              <div class="select relative">
                <i class="fa fa-angle-down"></i>
                <select class="collection_select" id="select_material">
                  <option selected="" value="default">Todos</option>
                  <?php
                  $materiales = get_terms(array(
                    "material" => "material"
                  ))
                  ?>

                  <?php
                  foreach ($materiales as $mat) : ?>

                    <option value="<?php echo $mat->slug ?>"><?php echo $mat->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </li>
          </ul>
        </div>

        <div class="grid-4-col grid grid-wide grid-gutter">

          <?php

          $args = array(
            "post_type" => "product",
            "posts_per_page" => 12
          );
          $loop = new WP_Query($args);
          while ($loop->have_posts()) : $loop->the_post();
            global $product;
            wc_get_template_part('content', 'product');
          endwhile;

          ?>
        </div>
      </div>
    </div>


  </div>
</div>

<?php get_footer() ?>