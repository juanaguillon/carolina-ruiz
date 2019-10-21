<!DOCTYPE html>
<html lang="en">

<head>
  <title>Carolina Ruiz | Moda</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="carolina ruiz, moda chaquetas para mujer, tendencias en ropas">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

  <!-- Css -->
  <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/custom.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/revolution/css/settings.css" /> -->

  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/font-icons.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/revolution/css/settings.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/rev-slider.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/sliders.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/responsive.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/spacings.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/animate.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/custom.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon-114x114.png">

  <?php wp_head() ?>
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top">
  <script>
    var ajaxURL = "<?php echo esc_url(admin_url("admin-ajax.php")) ?>"
  </script>

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      "Loading..."
    </div>
  </div>

  <!-- Navigation -->
  <header class="nav-type-1" id="home">

    <nav class="navbar navbar-fixed-top">
      <div class="navigation-overlay">
        <div class="container-fluid relative">
          <div class="row">

            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <!-- Logo -->
              <div class="logo-container">
                <div class="logo-wrap local-scroll">
                  <a href="#home">
                    <img class="logo" src="<?php echo get_template_directory_uri() ?>/img/logo_light.png" alt="logo">
                  </a>
                </div>
              </div>
            </div> <!-- end navbar-header -->


            <div class="col-md-8 col-xs-12 nav-wrap">
              <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                <ul class="nav navbar-nav local-scroll text-center">
                  <li class="active"><a href="<?php echo esc_url(home_url()) ?>">Home</a></li>
                  <li class="active">
                    <a href="#owl-promo">Sobre mi</a>
                  </li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="colecciones.html">Colecciones
                      <span class="revicon-down-open"></span></a>
                    <ul class="dropdown-menu menu-nav-desplegable">
                      <li><a href="#">Street</a></li>
                      <li><a href="#">Casual</a></li>
                      <li><a href="#">Elegante</a></li>
                      <li><a href="#">Noche</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#about-us">Prensa</a>
                  </li>
                  <li>
                    <a href="blog.html">Blog</a>
                  </li>
                  <li>
                    <a href="#contact">Contacto</a>
                  </li>

                </ul>
              </div>
            </div> <!-- end col -->

            <div class="menu-socials hidden-sm hidden-xs">
              <ul>

                <li class="spanish">
                  <a href="#">ES</a>
                </li>
                <li class="english">
                  <a href="#">EN</a>
                </li>
                <li class="cart_list">
                  <a href="#">
                    <i class="icon_cart_alt"></i>
                    <i id="arrow_cart" class="arrow_carrot-down"></i>
                  </a>
                  <div class="list_cart_header">
                    <?php
                    if (WC()->cart->get_cart_contents_count() !== 0) :
                      ?>
                      <ul>

                        <?php
                          foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
                            $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                            $permalink = $_product->get_permalink();

                            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
                              ?>
                            <li>
                              <div class="list_header_thumb">
                                <img src="<?= wp_get_attachment_image_url($_product->get_image_id(), "thumbnial") ?>" alt="">
                              </div>
                              <div class="list_header_inf">
                                <span class="list_header_title">
                                  <?= wp_kses_post($_product->get_name())  ?>
                                </span>

                                <span class="list_header_price">
                                  <?= apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                                </span>
                                <span class="list_header_quantity">
                                  <?= "X" . $cart_item['quantity']; ?>
                                </span>
                              </div>
                            </li>
                        <?php
                            endif;
                          endforeach;
                          ?>
                      </ul>
                      <div class="mt-10 text-center">
                        <a href="<?php echo esc_url(get_permalink(7)) ?>" class="btn btn-sm btn-color">Ver Carrito</a>
                      </div>



                    <?php
                    else :
                      ?>
                      <div class="list_header_empty">
                        <div class="icon_error-circle_alt"></div>
                        <span>No tienes productos en tu carrito actualmente.</span>
                      </div>

                    <?php
                    endif; // Endif check if cart is´t empty.

                    ?>

                  </div>
                </li>
                <li>
                  <a href="#" class="boton-buscar"><i class="icon_search"></i></a>
                </li>

              </ul>
            </div>

          </div> <!-- end row -->
        </div> <!-- end container -->
      </div> <!-- end navigation -->
    </nav> <!-- end navbar -->

  </header> <!-- end navigation -->
  <div class="main-wrapper-onepage main oh">
    <!-- End in footer -->