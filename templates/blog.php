<?php

/** Template Name: Blog */
get_header();

$blogQuery = array(
  "post_type" => "blog",
  "posts_per_page" => -1
);

$wpQueryBlog = new WP_Query($blogQuery);
$posts = $wpQueryBlog->posts;

if (caror_is_language()) {
  $popular = "Más Popular";
  $categorias = "Categorías";
  $leermas = "Leer más";
  $loadmore = "Cargar mas posts";
} else {
  $popular = "Most popular";
  $categorias = "Categories";
  $leermas = "Read more";
  $loadmore = "Load more posts";
}

?>



<div class="contenido blog-layout">

  <div class="row m-0">
    <div class="aside col-md-3">
      <div class="search-section">
        <form class="relative">
          <input type="search" placeholder="Buscar">
          <button type="submit" class="search-button"><i class="icon icon_search"></i></button>
        </form>
      </div>
      <div class="top-post-section">
        <span class="tittle"><?= $popular ?></span>
        <ul>
          <?php
          foreach ($posts as $i => $post) :
            if ($i == 5) break;
            ?>
            <li>
              <div class="top-post">
                <span class="top-post-rank"><?php echo $i + 1 ?></span>

                <div class="top-post-content">
                  <a href="<?php echo get_permalink($post) ?>">
                    <h4 class="top-post-title"><?php echo wp_kses_post($post->post_title); ?></h4>
                  </a>
                  <span class="top-post-date"><?php echo get_the_date("d/M/Y", $post) ?></span>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="category-section">
        <span class="tittle"><?= $categorias ?></span>

        <ul class="lista-categorias">
          <?php
          $categories = get_terms(array(
            "taxonomy" => "categoria",
            "hide_empty" => true
          ));
          foreach ($categories as $cat) : ?>

            <li><a href="<?php echo get_term_link($cat) ?>"><?php echo $cat->name ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="contenido-posts col-md-9">
      <div class="blog-grid">
        <?php
        $blogQuery = array(
          "post_type" => "blog",
          "posts_per_page" => -1
        );

        $wpQueryBlog = new WP_Query($blogQuery);
        $posts = $wpQueryBlog->posts;

        foreach ($posts as $post) :
          ?>
          <div class="post">
            <div class="post-image">
              <img src="<?php echo get_the_post_thumbnail_url($post, "full") ?>" alt="">
            </div>
            <div class="post-contenido">
              <span class="post-fecha">
                <?php echo get_the_date("d/M/Y", $post) ?>
              </span>
              <h3><?php echo $post->post_title ?></h3>
              <p><?php echo $post->post_excerpt ?></p>
            </div>
            <div class="botones-posts">
              <div>
                <a href="<?php echo get_permalink($post) ?>" class="btn"><?= $leermas ?></a>
              </div>
              <div class="compartir-redes">
                <a href=""><i class="social_facebook"></i></a>
                <a href=""><i class="social_twitter"></i></a>
                <a href=""><i class="social_pinterest"></i></a>
              </div>
            </div>
          </div>
        <?php
        // $content_post = get_post($post);
        // $content = $content_post->post_content;
        // $content = apply_filters('the_content', $content);
        // $content = str_replace(']]>', ']]&gt;', $content);
        // echo $content;
        endforeach;
        ?>


      </div>
      <div class="boton-mas-posts">
        <a href="#" class="btn-transparent-color btn btn-transparent"><?= $loadmore ?></a>
      </div>
    </div>
  </div>

</div>



<?php get_footer() ?>