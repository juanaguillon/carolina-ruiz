<?php get_header();

$currentPost = get_queried_object();

?>
<div class="contenido">
  <div class="featured-post-image">
    <img src="<?php echo get_the_post_thumbnail_url($currentPost, "full") ?>" alt="">
  </div>
  <div class="featured-post-content post-layout">
    <h2><?php echo $currentPost->post_title ?></h2>
    <span class="fecha"><?php echo get_the_date("d/M/Y", $currentPost) ?></span>

    <?php
    $terms = get_the_terms($currentPost, "categoria");
    $stringTerm = "";
    $relatedProdTerms = array();
    foreach ($terms as $term) {
      $relatedProdTerms[] = $term->term_id;
      if ($stringTerm == "") {
        $stringTerm .=  $term->name;
      } else {
        $stringTerm .= ", " . $term->name;
      }
    }
    ?>

    <span class="categoria"><?php echo $stringTerm ?></span>
    <p>
      <?php echo $currentPost->post_content ?>

    </p>
    <div class="botones-post">
      <span>Comparte si te gustó</span>
      <div class="compartir-redes">
        <a href="#"><i class="social_facebook"></i></a>
        <a href="#"><i class="social_twitter"></i></a>
        <a href="#"><i class="social_pinterest"></i></a>
      </div>
    </div>
  </div>


  <div class="row seccion-articulos-relacionados post-layout">
    <div class="col-md-12">
      <h3 class="text-center bottom-line">Posts relacionados</h3>
    </div>
    <?php
    $postsQuery = new WP_Query(array(
      "post_type" => "blog",
      "posts_per_page" => 2,
      "order" => "rand",
      "tax_query" => array(
        array(
          "taxonomy" => "categoria",
          "terms" =>  $relatedProdTerms
        )
      )
    ));
    foreach ($postsQuery->posts as $relpost) : ?>
      <div class="col-md-6 res-mb">
        <div class="post-relacionado">
          <div class="post-relacionado-image">
            <a href="<?php echo get_permalink($relpost) ?>"><img src="<?php echo get_the_post_thumbnail_url($relpost, "medium") ?>" alt=""></a>
          </div>
          <div class="post-relacionado-content">
            <a href="<?php echo get_permalink($relpost) ?>">
              <h4><?php echo $relpost->post_title ?></h4>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>

</div>

<?php get_footer() ?>