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
 * Desplegar colecciones en la página de colecciones
 */
function desplegarColleciones() {
  $(".desplegar-colecciones").click(function() {
    $(".coleccion-selector .coleccion-lista").toggleClass(
      "coleccion-lista-active"
    );

    if ($(this).hasClass("fa-angle-down")) {
      $(this).removeClass("fa-angle-down");
      $(this).addClass("fa-angle-up");
    } else {
      $(this).addClass("fa-angle-down");
      $(this).removeClass("fa-angle-up");
    }
  });
}

/**
 * CUando se haga click en el carrito del header
 */
function whenClickOnHeaderCart() {
  $(".cart_list").click(function(e) {
    e.stopPropagation();
    $(this).toggleClass("active");
    $("#arrow_cart").toggleClass("arrow_carrot-down");
    $("#arrow_cart").toggleClass("arrow_carrot-up");
  });
  $("#mini_cart_wrap").click(function(e) {
    e.stopPropagation();
  });
  $(".mini_cart_wrap").click(function(e) {
    e.stopPropagation();
  });
}

/**
 * En ocasiones será necesario ocultar un elemento cuando demos click en el body, pero evitar este comportameinto cuando se de click en el mismo elemento. Añada el selector del elemento y la clase a modificar que desea que obtenga dicho comportamiento
 */
function hideWhenClickOnBody() {
  $("body").click(function() {
    $(".cart_list").removeClass("active");
    $("#arrow_cart").removeClass("arrow_carrot-up");
    $("#arrow_cart").addClass("arrow_carrot-down");
  });

  // var elementsToHide = {
  //   // selector : clase css
  //   ".cart_list": "active"
  // };
  // for (var key in elementsToHide) {
  //   if (object.hasOwnProperty(key)) {
  //     $(key).click(function(e) {
  //       e.stopPropagation();
  //     });
  //   }
  // }

  // $("body").click(function() {
  //   for (var key in elementsToHide) {
  //     if (object.hasOwnProperty(key)) {
  //       $(key).removeClass(object[key]);
  //     }
  //   }
  // });
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
    var variation = $("#key_variattion_id").val();
    var currentButton = $(this);

    var prodID = currentButton.data("idprod");
    currentButton.addClass("btn-loading");
    currentButton.prop("disabled", true);
    key_quant_val;
    key_color_val;
    $.ajax({
      url: ajaxURL,
      method: "POST",
      success: function(data) {
        $("#mini_cart_wrap").html(
          data["fragments"]["div.widget_shopping_cart_content"]
        );
        currentButton.prop("disabled", false);
        currentButton.removeClass("btn-loading");
      },
      data: {
        action: "woocommerce_ajax_add_to_cart",
        product_id: prodID,
        product_sku: "",
        quantity: quantity,
        talla: talla,
        color: color,
        variation_id: variation
      }
    });
  });
}

$(document).ready(function() {
  initPlugins();
  whenClickOnTallasAndColors();
  addProductToCartAjax();
  whenClickOnHeaderCart();
  hideWhenClickOnBody();

  desplegarColleciones();
});
