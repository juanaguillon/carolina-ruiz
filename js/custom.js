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

var $grid = null;

function initPlugins() {
  $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows"
  });

  $(".iso-filter").click(function() {
    var filter = $(this).data("filter");
    $grid.isotope({
      filter: filter
    });
  });

  $(".lista-imagenes-carousel").slick({
    vertical: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".carousel-inner_product",
    prevArrow: $(".flecha-mov-top"),
    centerMode: true,
    focusOnSelect: true,
    nextArrow: $(".flecha-mov-bottom"),
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          vertical:false
        }
      }
    ]
  });
  $(".carousel-inner_product").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: ".lista-imagenes-carousel",
    arrows: false
  });

  $(".image-slider-container").imagefill();
  $(".carousel-inner_product").lightGallery({
    selector: ".image-slider-container"
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
 * Crear el scroll a la seccion especifica en caso de enviar un query Param.
 * Por ejemplo, en el index, se crea un link a diferente secciones. Esta funcion hará el scroll animado.
 */
function makeScrollIfExistsTheQueryParam() {
  var headerHeight = 90;
  var urlParams = new URLSearchParams(window.location.search);
  var sectionParam = urlParams.get("section");
  if (sectionParam) {
    console.log(sectionParam);
    var body = $("html, body");
    body
      .stop()
      .animate(
        { scrollTop: $("#" + sectionParam).offset().top - 50 },
        500,
        "swing"
      );
  }
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
    var redirect = false;
    currentButton.addClass("btn-loading");
    currentButton.prop("disabled", true);

    if (currentButton.hasClass("go_to_checkout")) {
      redirect = true;
    }
    $.ajax({
      url: ajaxURL,
      method: "POST",
      success: function(data) {
        if (data["redirect"]) {
          window.location.href = data["redirect"];
        } else {
          $("#mini_cart_wrap").html(
            data["fragments"]["div.widget_shopping_cart_content"]
          );
        }
        currentButton.prop("disabled", false);
        currentButton.removeClass("btn-loading");
      },
      data: {
        action: "woocommerce_ajax_add_to_cart",
        product_id: prodID,
        redirect: redirect,
        product_sku: "",
        quantity: quantity,
        talla: talla,
        color: color,
        variation_id: variation
      }
    });
  });
}

/**
 * En la página de colleciones es posible cambiar el filtro con los selects.
 */
function changeFilterSelectOnCollection() {
  $(".collection_select").change(function() {
    var catVal = $("#select_categoria").val();
    var tallaVal = $("#select_talla").val();
    var colorVal = $("#select_color").val();
    var materialVal = $("#select_material").val();
    var filter = "";
    if (catVal !== "" && catVal !== "default") {
      filter += "." + catVal;
    }
    if (tallaVal !== "" && tallaVal !== "default") {
      filter += "." + tallaVal;
    }
    if (colorVal !== "" && colorVal !== "default") {
      filter += "." + colorVal;
    }
    if (materialVal !== "" && materialVal !== "default") {
      filter += "." + materialVal;
    }

    $grid.isotope({
      filter: filter
    });
  });
}

function sendContactMessage() {
  $("#contact-form").on("submit", function(e) {
    e.preventDefault();
    function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }
    $("#submit-message").addClass("btn-loading");
    $("#submit-message").attr("disabled", "disabled");

    var showError = function(text) {
      $("#contact_message_error").addClass("show");
      $("#contact_message_success").removeClass("show");
      $("#contact_message_error").text(text);

      $("#submit-message").removeClass("btn-loading");
      $("#submit-message").removeAttr("disabled");
    };
    var showSuccess = function(text) {
      $("#contact_message_success").addClass("show");
      $("#contact_message_error").removeClass("show");
      $("#contact_message_success").text(text);

      $("#submit-message").removeClass("btn-loading");
      $("#submit-message").removeAttr("disabled");
    };

    var nombre = $("#contact_form_name").val();
    var email = $("#contact_form_email").val();
    var phone = $("#contact_form_phone").val();
    var message = $("#contact_form_message").val();

    if (nombre === "" || email === "" || phone === "" || message === "") {
      showError("Todos los campos son requeridos");
      return false;
    } else if (!validateEmail(email)) {
      showError("El email ingresado es inválido.");
      return false;
    }

    $.ajax({
      url: mailUrl,
      method: "POST",
      data: {
        nombre: nombre,
        email: email,
        cell: phone,
        mensaje: message
      },
      success: function(data) {
        if (data === "1") {
          showSuccess("Se ha enviado el mensaje correctamente");
        } else {
          showError("Error al enviar el mensaje, intente nuevamente.");
        }
        console.log(data);
      }
    });
  });
}

/**
 * Mostrar el modal del search
 */
function openSearchModal() {
  $("#search_modal_button").click(function(e) {
    e.preventDefault();
    $("#modal_form_search").modal("show");
  });
}

function makeSrollSections() {
  $(".scroll_page_link").click(function(e) {
    e.preventDefault();
    var section = $(this).data("scroll");
    var body = $("html, body");
    body
      .stop()
      .animate({ scrollTop: $("#" + section).offset().top - 50 }, 500, "swing");
  });
}

/**
 * Conectar página con facebook para poder compartir productos.
 */
function connectToFb() {
  (function(d, s, id) {
    var js,
      fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  })(document, "script", "facebook-jssdk");

  window.fbAsyncInit = function() {
    FB.init({
      appId: 523244048269470,
      autoLogAppEvents: true,
      xfbml: true,
      version: "v3.3"
    });
    FB.AppEvents.logPageView();
  };
  (function($) {
    $("#social_facebook_link").on("click", function(event) {
      event.preventDefault();
      event.stopImmediatePropagation();

      var linkshare = window.location.href;
      var titleshare = $(this).data("nombre");
      var descripshare = $(this).data("descrip");
      var imgshare = $(this).data("urlimg");
      var FBDesc = descripshare;
      var FBTitle = titleshare;
      var FBLink = linkshare;
      var FBPic = imgshare;
      FB.ui(
        {
          method: "share",
          action_type: "og.likes",
          mobile_iframe: true,
          action_properties: JSON.stringify({
            object: {
              "og:url": FBLink,
              "og:title": FBTitle,
              "og:description": FBDesc,
              "og:image": FBPic
            }
          })
        },
        function(response) {}
      );
    });
  })(jQuery);
}

window.onload = function() {
  initPlugins();
  whenClickOnTallasAndColors();
  sendContactMessage();
  addProductToCartAjax();
  whenClickOnHeaderCart();
  hideWhenClickOnBody();
  makeSrollSections();
  makeScrollIfExistsTheQueryParam();
  openSearchModal();

  desplegarColleciones();
  changeFilterSelectOnCollection();
  connectToFb();
};
