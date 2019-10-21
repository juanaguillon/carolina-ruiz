$(document).on("click", ".number-spinner button", function() {
  var btn = $(this),
    oldValue = btn
      .closest(".number-spinner")
      .find("input")
      .val()
      .trim(),
    newVal = 0;

  if (btn.attr("data-dir") == "up") {
    newVal = parseInt(oldValue) + 1;
  } else {
    if (oldValue > 1) {
      newVal = parseInt(oldValue) - 1;
    } else {
      newVal = 1;
    }
  }
  btn
    .closest(".number-spinner")
    .find("input")
    .val(newVal);
});

function initPlugins() {
  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows"
  });

  $(".iso-filter").click(function() {
    var filter = $(this).data("filter");
    $grid.isotope({
      filter: filter
    });
  });
}

$(".category-product-filter ul li span").click(function() {
  $(".category-product-filter ul li span").removeClass("filter-active");
  $(this).addClass("filter-active");
});

/**
 * En la ficha de producto, cuando se haga cambio en los colores o en las tallas del producto
 *  */
function whenClickOnTallasAndColors() {
  $("#list_tallas li a").click(function(e) {
    e.preventDefault();
    $("#list_tallas li a").removeClass("active");
    $(this).addClass("active");
    $("#key_talla_val").val($(this).data("key_talla"));
  });
  $("#list_colors li").click(function(e) {
    e.preventDefault();
    $("#list_colors li").removeClass("active");
    $(this).addClass("active");
    $("#key_color_val").val($(this).data("key_color"));
  });
}

/**
 * CUando se haga click en el carrito del header
 */
function whenClickOnHeaderCart() {
  $(".cart_list").click(function() {
    $(this).toggleClass("active");
    $("#arrow_cart").toggleClass("arrow_carrot-down");
    $("#arrow_cart").toggleClass("arrow_carrot-up");
  });
  $(".list_cart_header").click(function(e){
    e.stopPropagation()
  })
}

/**
 * Enviar un producto via ajax
 */
function addProductToCartAjax() {
  $(".add_action_cart").click(function(e) {
    e.preventDefault();
    var talla = $("#key_talla_val").val();
    var quantity = $("#key_quant_val").val();
    var color = $("#key_color_val").val();
    var prodID = $(this).data("idprod");
    key_quant_val;
    key_color_val;
    $.ajax({
      url: ajaxURL,
      method: "POST",
      success: function(data) {
        console.log(data);
      },
      data: {
        action: "woocommerce_ajax_add_to_cart",
        product_id: prodID,
        product_sku: "",
        quantity: quantity,
        talla: talla,
        color: color,
        variation_id: 0
      }
    });
  });
}

$(document).ready(function() {
  initPlugins();
  whenClickOnTallasAndColors();
  addProductToCartAjax();
  whenClickOnHeaderCart();
});
