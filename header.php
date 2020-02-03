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
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/lg.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/responsive.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/slick.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/spacings.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/animate.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/custom.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon-114x114.png">

  <?php
                                                      if (is_singular(["product", "blog"])) :
                                                        $posttyle = get_queried_object(); ?>
    <meta property="og:title" content="Carolina Ruiz | <?php echo $posttyle->post_title ?>" />
    <meta property="og:description" content="<?php echo $posttyle->post_content ?>" />
    <meta property="og:url" content="<?php echo get_permalink($posttyle) ?>" />
    <meta property="og:site_name" content="Mazal" />
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url($posttyle, "medium") ?>" />
  <?php endif; ?>

  <?php wp_head() ?>
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top">
  <script>
    var ajaxURL = "<?php echo esc_url(admin_url("admin-ajax.php")) ?>"
    var mailUrl = "<?php echo get_template_directory_uri() . "/includes/envioform.php" ?>"
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
                  <a href="<?php echo esc_url(home_url()) ?>">
                    <img class="logo" src="<?php echo get_template_directory_uri() ?>/img/logo_light.png" alt="logo">
                  </a>
                </div>
              </div>
            </div> <!-- end navbar-header -->


            <div class="col-md-8 col-xs-12 nav-wrap">
              <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                <ul class="nav navbar-nav local-scroll text-center">

                  <?php
                                                      $headText1 = "Inicio";
                                                      $headText2 = "Sobre mi";
                                                      $headText3 = "Categorías";
                                                      $headText3All = "Todas";
                                                      $headText4 = "Tienda";
                                                      $headText5 = "Contacto";

                                                      if (caror_is_language("en")) {
                                                        $headText1 = "Home";
                                                        $headText2 = "About me";
                                                        $headText3 = "Categories";
                                                        $headText3All = "All";
                                                        $headText4 = "Shop";
                                                        $headText5 = "Contact";
                                                      }

                  ?>

                  <li class="<?= is_home() || is_front_page() ? "active" : "" ?>"><a href="<?php echo esc_url(home_url()) ?>"><?= $headText1 ?></a></li>
                  <li class="">
                    <?php if (is_front_page()) : ?>
                      <a class="scroll_page_link" data-scroll="sobre_mi"><?= $headText2 ?></a>
                    <?php else : ?>
                      <a href="<?php echo pll_home_url() . "?section=sobre_mi" ?>"><?= $headText2 ?></a>
                    <?php endif; ?>
                  </li>
                  <li id="categories_dropdown" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href=""><?= $headText3 ?>
                      <span class="revicon-down-open"></span>
                    </a>
                    <ul class="dropdown-menu menu-nav-desplegable">
                      <li><a href="<?= get_permalink(pll_get_post(177)) ?>"><?= $headText3All ?></a></li>
                      <?php
                      $categoriasWP = get_terms(array(
                        "taxonomy" => "product_cat"
                      ));
                      foreach ($categoriasWP as $cat) : ?>
                        <li><a href="<?php echo get_term_link($cat) ?>"><?php echo $cat->name ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                  </li>
                  <li id="categories_simple">
                    <a href="<?= get_permalink(pll_get_post(177)) ?>"><?= $headText3 ?></a>
                  </li>
                  <li class="<?= is_shop() ? "active" : "" ?>">
                    <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"><?= $headText4 ?></a>
                  </li>
                  <li class="<?= is_page(191) ? "active" : "" ?>">
                    <a href="<?php echo get_permalink(191) ?>">Blog</a>
                  </li>
                  <li>

                    <?php if (is_front_page()) : ?>
                      <a class="scroll_page_link" data-scroll="contact"><?= $headText5 ?></a>
                    <?php else : ?>
                      <a href="<?php echo pll_home_url() . "?section=contact" ?>"><?= $headText5 ?></a>
                    <?php endif; ?>
                  </li>

                </ul>
              </div>
            </div> <!-- end col -->

            <div class="menu-socials hidden-sm hidden-xs">
              <ul>


                <li class="spanish <?= caror_is_language("es") ? "active" : "" ?>">
                  <a href="<?= pll_home_url("es") ?>">ES</a>
                </li>
                <li class="english <?= caror_is_language("en") ? "active" : "" ?>">
                  <a href="<?= pll_home_url("en") ?>">EN</a>
                </li>
                <li class="cart_list">
                  <a href="#">
                    <i class="icon_cart_alt"></i>
                    <i id="arrow_cart" class="arrow_carrot-down"></i>
                  </a>
                  <div id="mini_cart_wrap">
                    <?php wc_get_template('cart/mini-cart.php'); ?>
                  </div>

                </li>
                <li id="search_modal_button">
                  <a href="#" class="boton-buscar"><i class="icon_search"></i></a>
                </li>

              </ul>
            </div>

          </div> <!-- end row -->
        </div> <!-- end container -->
      </div> <!-- end navigation -->
    </nav> <!-- end navbar -->

  </header> <!-- end navigation -->
  <div id="modal_form_search" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <?php
                                                                                                                              $action = pll_home_url();
                                                                                                                              $placeholder = "Buscar en la web.";
                                                                                                                              $button = "Buscar";

                                                                                                                              if (caror_is_language("en")) {
                                                                                                                                $placeholder = "Search in web";
                                                                                                                                $button = "Search";
                                                                                                                              }
          ?>
          <form action="<?= $action ?>" id="form_search" method="get">
            <div class="field-group">
              <input name="s" type="text" placeholder="<?= $placeholder ?>">
            </div>
            <div class="field-group text-center">
              <button class="btn btn-primary"><i class="icon-search"></i><?= $button ?></button>
            </div>
          </form>
        </div>

      </div>
      <!-- <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Buscar en la web</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div> -->
    </div>
  </div>
  <div class="main-wrapper-onepage main oh">
    <!-- End in footer -->