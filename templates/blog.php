<?php

/** Template Name: Blog */
get_header()
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
        <span class="tittle">Mas popular</span>
        <ul>
          <li>
            <div class="top-post">
              <span class="top-post-rank">1</span>

              <div class="top-post-content">
                <a href="post.html">
                  <h4 class="top-post-title">organiza tu maquillaje en 3 simples pasos</h4>
                </a>
                <span class="top-post-date">24/Oct/2019</span>
              </div>
            </div>
          </li>
          <li>
            <div class="top-post">
              <span class="top-post-rank">2</span>

              <div class="top-post-content">
                <a href="post.html">
                  <h4 class="top-post-title">las cosas más geniales a la venta para hacer de este tu mejor verano</h4>
                </a>
                <span class="top-post-date">24/Oct/2019</span>
              </div>
            </div>
          </li>
          <li>
            <div class="top-post">
              <span class="top-post-rank">3</span>

              <div class="top-post-content">
                <a href="post.html">
                  <h4 class="top-post-title">Cómo diseñar vestidos voluminosos</h4>
                </a>
                <span class="top-post-date">24/Oct/2019</span>
              </div>
            </div>
          </li>
          <li>
            <div class="top-post">
              <span class="top-post-rank">4</span>

              <div class="top-post-content">
                <a href="post.html">
                  <h4 class="top-post-title">¿Por qué las chaquetas son la próxima cosa para agregar a su lista de
                    compras?</h4>
                </a>
                <span class="top-post-date">24/Oct/2019</span>
              </div>
            </div>
          </li>
          <li>
            <div class="top-post">
              <span class="top-post-rank">5</span>
              <div class="top-post-content">
                <a href="post.html">
                  <h4 class="top-post-title">El look perfecto para verano es muy facil...</h4>
                </a>
                <span class="top-post-date">24/Oct/2019</span>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="category-section">
        <span class="tittle">Categorias</span>
        <ul class="lista-categorias">
          <li><a href="#">Tendencias</a></li>
          <li><a href="#">Fashion</a></li>
          <li><a href="#">Tips</a></li>
          <li><a href="#">Belleza</a></li>
          <li><a href="#">Estilo de vida</a></li>
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
                <a href="<?php echo get_permalink($post) ?>" class="btn">Leer mas</a>
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
        <a href="#" class="btn-transparent-color btn btn-transparent">Cargar mas posts</a>
      </div>
    </div>
  </div>

</div>



<?php get_footer() ?>