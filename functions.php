<?php

include "includes/caror-post-types.php";

function printcode($code)
{
  echo "<pre>" . print_r($code, true) . "</pre>";
}

function caror_init()
{
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');
  add_filter('woocommerce_enqueue_styles', '__return_empty_array');
}


/**
 * Obtener html de un post blog en específico.
 *
 * @param object $postBlog Objeto query wordpress de el single blog.
 * @return void
 */
function caror_get_single_blog($postBlog)
{
  ?>
  <div class="post">
    <div class="post-image">
      <img src="<?php echo get_the_post_thumbnail_url($postBlog, "full") ?>" alt="">
    </div>
    <div class="post-contenido">
      <span class="post-fecha">
        <?php echo get_the_date("d/M/Y", $postBlog) ?>
      </span>
      <h3><?php echo $postBlog->post_title ?></h3>
      <p><?php echo $postBlog->post_excerpt ?></p>
    </div>
    <div class="botones-posts">
      <div>
        <a href="<?php echo get_permalink($postBlog) ?>" class="btn">Leer mas</a>
      </div>
      <div class="compartir-redes">
        <a href=""><i class="social_facebook"></i></a>
        <a href=""><i class="social_twitter"></i></a>
        <a href=""><i class="social_pinterest"></i></a>
      </div>
    </div>
  </div>

<?php
}

/**
 * Otener los valores legibles de un color.
 * Los colores en la aplicación se agregan con nombre | hex. Ej: Púrpura | #8F49FF
 * Esta función dará formato a el color Púrpura | #8F49FF y entregará un array con los valores
 *  
 * @param string $colorName Nombre de color a dar formato
 * @return array ["name" => "Púrpura", "hex" => "#8F49FF"] 
 */
function caror_explode_color_name($colorTerm)
{
  $retruned = array(

    "name" => $colorTerm->name
  );
  if (caror_is_language("en")) {
    $colorTerm = get_term(pll_get_term($colorTerm->term_id, "es"), "pa_color");
    $retruned["hex"] = get_field("color_de_producto", $colorTerm);
    // printcode($colorTerm);
  } else {
    $retruned["hex"] = get_field("color_de_producto", $colorTerm);
  }

  return $retruned;
}

add_action('after_setup_theme', 'caror_init');

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart()
{

  $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
  $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
  $variation_id = absint($_POST['variation_id']);
  $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
  $product_status = get_post_status($product_id);
  $orderCart = WC()->cart->add_to_cart($product_id, $quantity, $variation_id,  array(
    "attribute_pa_talla" => $_POST['talla'],
    "attribute_pa_color" => $_POST['color']
  ));
  $redirection = false;


  if ($passed_validation && $orderCart && 'publish' === $product_status) {
    if (isset($_POST["redirect"]) && $_POST["redirect"] == "true") {
      $redirection = WC()->cart->get_checkout_url();
      echo wp_send_json(array(
        "redirect" => $redirection,
        "type" => $_POST["redirect"]
      ));
    } else {
      WC_AJAX::get_refreshed_fragments();
    }
  } else {

    $data = array(
      'error' => true,
      'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
    );

    echo wp_send_json($data);
  }

  wp_die();
}

/**
 * Es necesario obtener el precio de un producto variable.
 * Esto es necesario, ya que los productos varialbes no envían un único precio, sino un rango de precio.
 * Con esta función se obtiene el precio mas alto.
 * 
 * @param object $prodct Producto actual el cual obtener el precio
 * @return array ["sale" => PriceInDiscount, "regular" => PriceNormal ] Precio de producto variable
 */
function getVariationProduct($prodct)
{
  $available_variations = $prodct->get_available_variations();
  $count = count($available_variations) - 1;
  $variation_id = $available_variations[$count]['variation_id'];
  $variable_product1 = new WC_Product_Variation($variation_id);
  $regular_price = (int) $variable_product1->regular_price;
  $sales_price = (int) $variable_product1->sale_price;
  $regular_price = "$" . number_format($regular_price, "0", ".", ".");
  $sales_price = "$" . number_format($sales_price, "0", ".", ".");

  return array(
    "sale" => $sales_price,
    "regular" => $regular_price,
  );
}


/**
 * Obtener los custom fields de ACF, dependiendo de el lengaje actual.
 */
function caror_get_acf_field($key, $post = "option")
{
  if (caror_is_language()) {
    $suffix = "-_es";
  } else {
    $suffix = "-_en";
  }
  return get_field($key . $suffix, $post);
}

$getLocale = get_locale();
function caror_is_language($lang = "es")
{
  global $getLocale;
  if ($lang == "es") {
    $locale = "es_CO";
  } else if ($lang == "en") {
    $locale = "en_US";
  }
  return $getLocale === $locale;
}


//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types)
{

  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);

  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');
