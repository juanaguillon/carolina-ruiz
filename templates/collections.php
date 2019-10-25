<?php /* Template Name: Collections */ get_header() ?>

<div class="page-content">
  <div class="row ">

    <div class="col-md-12">
      <div class="container-fluid">

        <div class="row heading head-title">
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
        </div>
        <div class="filtros-coleccion">
          <pre>
            <?php

            // $attrsWC = wc_get_attribute_taxonomies();
            // $attrsValues = array();
            // foreach ($attrsWC as $attrKey => $attrVal) {
            //   if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
            //     $taxonomy_terms[$tax->attribute_name] = get_terms(wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0');
            //   endif;
            // }

            ?>
          </pre>
          <ul>
            <li>
              <span>Categoria</span>
              <div class="select relative">
                <i class="fa fa-angle-down"></i>

                <select>
                  <option selected="" value="default">Selecciona una opción</option>
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
                <select>
                  <option selected="" value="default">Selecciona una opción</option>
                  <?php
                  $tallas = get_terms("pa_talla");
                  foreach ($tallas  as $tall) : ?>
                    <option value="<?= $tall->term_id ?>"><?= $tall->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </li>
            <li>
              <span>Color</span>
              <div class="select relative">
                <i class="fa fa-angle-down"></i>
                <select>
                  <option selected="" value="default">Selecciona una opción</option>
                  <?php
                  $colors = get_terms("pa_color");
                  foreach ($colors  as $color) :
                    $colorName = caror_explode_color_name($color->name)
                    ?>
                    <option value="<?= $color->term_id ?>"><?= $colorName["name"] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </li>
            <li>
              <span>Material</span>
              <div class="select relative">
                <i class="fa fa-angle-down"></i>
                <select>
                  <option selected="" value="default">Selecciona una opción</option>
                  <option value="green">Cuero</option>
                  <option value="black">Cuero graso</option>
                  <option value="white">Sintetico</option>
                </select>
              </div>
            </li>
          </ul>
        </div>

        <div class="grid-coleccion grid-wide grid-gutter grayscale">

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