   <!-- Page Title -->
   <?php get_header() ?>
   <section class="page-title style-2">
     <div class="container relative clearfix">
       <div class="title-holder">
         <div class="title-text">
           <h1>Página 404</h1>
           <ol class="breadcrumb">
             <li>
               <a href="<?php echo home_url() ?>">Inicio</a>
             </li>
            
           </ol>
         </div>
       </div>
     </div>
   </section> <!-- end page title -->


   <!-- 404-->
   <section class="section-wrap page-404">
     <div class="container">

       <div class="row text-center">
         <div class="col-md-6 col-md-offset-3">
           <h1>404</h1>
           <h2 class="mb-50">Página no encontrada</h2>
           <p class="mb-20">Puedes regresar a el <a href="<?php echo home_url() ?>">Inicio</a> o usa la búsqueda</p>
           <form class="relative">
             <input type="search" placeholder="Search">
             <button type="submit" class="search-button"><i class="icon icon_search"></i></button>
           </form>
         </div>
       </div>

     </div>
   </section> <!-- end 404-->

   <?php get_footer() ?>