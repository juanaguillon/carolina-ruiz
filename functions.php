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
 * Otener los valores legibles de un color.
 * Los colores en la aplicación se agregan con nombre | hex. Ej: Púrpura | #8F49FF
 * Esta función dará formato a el color Púrpura | #8F49FF y entregará un array con los valores
 *  
 * @param string $colorName Nombre de color a dar formato
 * @return array ["name" => "Púrpura", "hex" => "#8F49FF"] 
 */
function caror_explode_color_name($colorName){
  $colorName = explode("|", trim ($colorName));
  return array(
    "hex" => $colorName[1],
    "name" => $colorName[0]
  );
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

  if ($passed_validation && $orderCart && 'publish' === $product_status) {
    
    WC_AJAX::get_refreshed_fragments();

  } else {

    $data = array(
      'error' => true,
      'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
    );

    echo wp_send_json($data);
  }

  wp_die();
}
