<!-- Footer -->
<footer class="footer minimal bg-dark">
  <div class="container">
    <div class="row">

      <div class="col-md-4 col-md-offset-4">

        <div class="footer-logo local-scroll mb-30 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <h2>
            <?php 
            if (caror_is_language()) { 
              $redes = "Redes Sociales";
            } else {
              $redes = "Social Networks";
             } ?>
            <a href="#home" class="color-white"><?= $redes ?></a>
          </h2>
        </div>

        <div class="socials footer-socials">

          <?php
          foreach (get_field("contacto_redes_sociales", "option") as $red) : ?>

            <a href="<?= $red["url"] ?>">
              <img src="<?= $red["imagen"]["url"] ?>" alt="<?= $red["texto"] ?>">
            </a>
          <?php endforeach; ?>

        </div> <!-- end socials -->

        <span class="copyright text-center">
          ©2018 Crolina Ruiz
        </span>

      </div>

    </div>
  </div>
</footer> <!-- end footer -->
<?php wp_footer() ?>

<div id="back-to-top">
  <a href="#top"><i class="fa fa-angle-up"></i></a>
</div>

</div> <!-- end main-wrapper ( Initialize in header ) -->

<!-- jQuery Scripts -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/gmap3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/custom.js"></script>
<script type="text/javascript">

</script>
<script>

</script>


<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/rev-slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/scripts.js"></script>

<!-- Google Map -->
<script type="text/javascript">
  $(document).ready(function() {

    var gmapDiv = $("#google-map");
    var gmapMarker = gmapDiv.attr("data-address");

    gmapDiv.gmap3({
        zoom: 16,
        address: gmapMarker,
        oomControl: true,
        navigationControl: true,
        scrollwheel: false,
        styles: [{
          "featureType": "all",
          "elementType": "all",
          "stylers": [{
            "saturation": "-70"
          }]
        }]
      })
      .marker({
        address: gmapMarker,
        icon: "img/map_pin.png"
      })
      .infowindow({
        content: "V Tytana St, Manila, Philippines"
      })
      .then(function(infowindow) {
        var map = this.get(0);
        var marker = this.get(1);
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
      });
  });
</script>



<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/revolution/js/extensions/revolution.extension.parallax.min.js"></script>


</body>

</html>