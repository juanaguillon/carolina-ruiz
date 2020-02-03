<?php /* Template Name: Index */ ?>
<?php get_header() ?>


<!-- Revolution Slider -->
<section>
  <div class="rev_slider_wrapper">
    <div class="rev_slider" id="slider1" data-version="5.0">
      <ul class="local-scroll">

        <?php
        $bannersQuery = new WP_Query(array(
          "post_type" => "banner",
          "posts_per_page" => -1
        ));

        $banners = $bannersQuery->posts;

        foreach ($banners as $banner) : 
          $imgCrop = get_field("imagen_de_banner", $banner)["url"];
          
        ?>
        
        
          <li data-fstransition="fade" data-transition="zoomout" data-easein="default" data-easeout="default" data-slotamount="1" data-masterspeed="1200" data-delay="8000" data-title="<?= $banner->post_title ?>">
            <!-- MAIN IMAGE -->
            <img src="<?= $imgCrop ?>" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgparallax="7" class="rev-slidebg">

            <!-- LAYER NR. 1 -->
            <div class="tp-caption medium_text" data-x="left" data-y="center" data-voffset="40" data-transform_idle="o:1;s:1000" data-transform_in="x:0;y:200;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:500;" data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;" data-start="1000">
              <div class="texto-banner">
                <h2><?= $banner->post_title ?></h2>
                <?php 
                $tienda = "Ver tienda";
                if ( caror_is_language("en")){
                  $tienda = "See shop";
                }
                 ?>
                <a href="<?= get_permalink(woocommerce_get_page_id('shop')) ?>" class="btn btn-lg btn-transparent"><?= $tienda ?></a>
              </div>
              <div>

              </div>
            </div>

          </li>
        <?php endforeach; ?>

      </ul>

      <div class="local-scroll">
        <a href="#owl-promo" class="scroll-down">
          <i class="fa fa-angle-down"></i>
        </a>
      </div>

    </div>
  </div>
</section>

<section id="sobre_mi" class="section-wrap promo-section bg-dark">

  <div id="owl-promo" class="owl-carousel owl-theme">

    <div class="item">
      <div class="container">
        <div class="row">

          <div class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
            <img src="<?php echo get_template_directory_uri() ?>/img/promo_img_1.png" alt="">
          </div>

          <?php
          if (caror_is_language("es")) :
            ?>
            <div class="col-md-6 promo-description">
              <p class="subheading">Carolina Ruíz</p>
              <h3 class="color-white">Mi Biografía</h3>
              <p class="mb-30">
                En 2017 Carolina Ruiz crea la primera chaqueta de su marca, inspirada en retales de alta costura, jean, taches, encajes, lentejuelas, pieles, con esta
                nace la idea de la superposicion de materiales que dan vida a un nuevo
                estilo combinando elementos y detalles logrando una prenda diferenciadora, personaliza y unica donde la mano de obra artesanal juega el papel mas importante. <br><br>

                Personalizar la ropa es tendencia, aunque nada se diferencie de los encajes bordados que hacian nuestras abuelas, justo ahora tiene mayor prescencia en la ropa. tal vez sea porque es mas interesante salir a la calle con algo que describa tu personalidad o porque queremos distinguirnos con algo diferente, lo cierto, es que estamos viviendo en un mundo personalizado y hay que aprender a sacar el maximo provecho de la moda. <br><br>


                La globalizacion ha llevado a las grandes marcas a generar patrones de moda que aunque logran su cometido al comercializar al por mayor un solo tipo de prenda, tambien nos hace caer como consumidores en el uso de estandares que no siempre logran reflejar nuestra personalidad unica y nuestro propio estilo. <br><br>

                En cuanto a nuestro producto como tal, las ideas son infinitas cuando se trata de usar chaquetas o chalecos con diseños diferenciadores. <br><br>
              </p>

              <!-- <div class="customNavigation mt-40">
                <a class="prev"><i class="icon arrow_left"></i></a>
                <a class="next"><i class="icon arrow_right"></i></a>
              </div> -->
            </div>

          <?php
          else :
            ?>
            <div class="col-md-6 promo-description">
              <p class="subheading">Carolina Ruíz</p>
              <h3 class="color-white">My Biography</h3>
              <p class="mb-30">
                In 2017 Carolina Ruiz creates the first jacket of her brand, inspired by couture scraps, jean, studs, lace, sequins, skins, with this idea of ​​the superposition of materials that give life to a new born combining elements and details achieving a differentiating, personalized and unique garment where artisan workmanship plays the most important role. <br><br> Customizing clothes is a trend, although nothing differs from the embroidered lace made by our grandmothers, right now it has greater presence in clothes. Perhaps it is because it is more interesting to go out with something that describes your personality or because we want to distinguish ourselves with something different, the truth is that we are living in a personalized world and we must learn to make the most of fashion. <br><br> Globalization has led the big brands to generate fashion patterns that although they achieve their mission by wholesale marketing a single type of garment, it also makes us fall as consumers in the use of standards that do not always reflect our unique personality and our own style. <br><br>As for our product as such, the ideas are endless when it comes to wearing jackets or vests with differentiating designs. <br><br>
              </p>

              <!-- <div class="customNavigation mt-40">
                <a class="prev"><i class="icon arrow_left"></i></a>
                <a class="next"><i class="icon arrow_right"></i></a>
              </div> -->
            </div>
          <?php
          endif;
          ?>



        </div>
      </div>
    </div>


  </div> <!-- end slider -->
</section> <!-- end promo section -->


<?php
$textosContacto1 = "Contacto";
$textosContacto2 = "Ponte en contacto conmigo";
$textosContacto3 = "Horario de pedidos";
$textosContacto4 = "Dirección";
$textosContacto5 = "Teléfono";
$textosContacto6 = "E-mail";
$textosContacto7 = "Nombre";
$textosContacto8 = "E-mail";
$textosContacto9 = "Teléfono";
$textosContacto10 = "Mensaje";
$textosContacto11 = "Enviar";

$coleccionTexto1 = "Colección 2018";
$coleccionTexto2 = "Conoce nuestra colección Resort";

$suscribeTexto1 = "¿Quieres recibir noticias de mis productos?";
$suscribeTexto2 = "Suscribirse";

if (caror_is_language("en")) {
  $textosContacto1 = "Contact";
  $textosContacto2 = "Get in contact with us";
  $textosContacto3 = "Order Schedule";
  $textosContacto4 = "Address";
  $textosContacto5 = "Phone";
  $textosContacto6 = "E-mail";
  $textosContacto7 = "Name";
  $textosContacto8 = "E-mail";
  $textosContacto9 = "Phone";
  $textosContacto10 = "Message";
  $textosContacto11 = "Send";

  $coleccionTexto1 = "Collection 2018";
  $coleccionTexto2 = "Meet our collection Resort";

  $suscribeTexto1 = "Do you want get our last news?";
  $suscribeTexto2 = "Subscribe";
}

?>

<!-- Portfolio -->
<section class="section-wrap works-grid-3-col-wide pb-0" id="portfolio">

  <div class="container-fluid">

    <div class="row heading">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <h2 class="text-center bottom-line"><?= $coleccionTexto1 ?></h2>
        <p class="subheading text-center"><?= $coleccionTexto2 ?></p>
      </div>
    </div>

    <?php get_template_part("content", "product_filtering"); ?>

    <div class="grid-4-col grid grid-wide grid-gutter grayscale">
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
</section> <!-- end portfolio-->


<!-- <section class="call-to-action">
  <div class="container">
    <div class="row">

      <div class="col-md-9 col-xs-12">
        <h2><?= $suscribeTexto1 ?></h2>
      </div>

      <div class="col-md-3 col-xs-12 cta-button">
        <a href="#" class="btn btn-lg btn-color"><?= $suscribeTexto2 ?></a>
      </div>

    </div>
  </div>
</section> -->

<section class="section-wrap contact" id="contact">
  <div class="container">


    <div class="row heading">
      <div class="col-md-6 col-md-offset-3 text-center">
        <h2 class="text-center bottom-line"><?= $textosContacto1 ?></h2>
        <p class="subheading"><?= $textosContacto2 ?></p>
      </div>
    </div>

    <div class="row">

      <div class="col-md-4">
        <h5><?= $textosContacto3 ?></h5>
        <p><?= caror_get_acf_field("contacto_horario_") ?></p>

        <div class="contact-item">
          <div class="contact-icon">
            <i class="icon icon-Pointer"></i>
          </div>
          <h6><?= $textosContacto4 ?></h6>
          <p><?= caror_get_acf_field("contacto_direccion_") ?></p>
        </div> <!-- end address -->

        <div class="contact-item">
          <div class="contact-icon">
            <i class="icon icon-Phone"></i>
          </div>
          <h6><?= $textosContacto5 ?></h6>
          <span><?= caror_get_acf_field("contacto_telefono_") ?></span>
        </div> <!-- end phone number -->

        <div class="contact-item">
          <div class="contact-icon">
            <i class="icon icon-Mail"></i>
          </div>
          <h6><?= $textosContacto6 ?></h6>
          <a href="mailto:enigmasupport@gmail.com"><?= caror_get_acf_field("contacto_email_") ?></a>
        </div> <!-- end email -->

      </div>

      <div class="col-md-8">
        <form id="contact-form" action="#">

          <div id="contact_message_error" class="alert alert-danger contact_message" role="alert">
          </div>
          <div id="contact_message_success" class="alert alert-success contact_message" role="alert">
          </div>

          <div class="row contact-row">
            <div class="col-md-6 contact-name">
              <input name="name" id="contact_form_name" type="text" placeholder="<?= $textosContacto7 ?>*">
            </div>
            <div class="col-md-6 contact-email">
              <input name="mail" id="contact_form_email" type="email" placeholder="<?= $textosContacto8 ?>*">
            </div>
          </div>

          <input name="Subject" id="contact_form_phone" type="text" placeholder="<?= $textosContacto9 ?>">
          <textarea name="comment" id="contact_form_message" placeholder="<?= $textosContacto10 ?>"></textarea>
          <button type="submit" id="submit-message" class="btn btn-lg btn-color btn-submit loading">
            <div class="loader" style="display: none;"></div>
            <?= $textosContacto11 ?>
          </button>
          <div id="msg" class="message"></div>
        </form>
      </div> <!-- end col -->

    </div>
  </div>
</section> <!-- end contact -->

<?php get_footer() ?>