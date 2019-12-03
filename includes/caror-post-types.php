<?php

function caror_remove_labels_admin()
{

  remove_menu_page('edit.php'); // Posts
  remove_menu_page('edit-comments.php'); // Comments
  // remove_menu_page('edit.php?post_type=page'); // Pages
  // remove_menu_page('plugins.php'); // Plugins
  remove_menu_page('themes.php'); // Appearance
  remove_menu_page('tools.php'); // Tools
  // remove_menu_page('options-general.php'); // Settings
  remove_menu_page('edit.php'); // Posts
}
add_action('admin_init', 'caror_remove_labels_admin');


/**
 * Agregar argumentos a un nuevo post Type 
 * @param string $name Nombre general de el nuevo post-type,
 * @param string $icon Icono que se agregará a el post type
 * @param boolean $isMale Se ajusta en revisar si es un elemento masculino/femenino. Se ajusta en campos como <Ver todos los elementos> o <Ver todas las páginas>
 * @param array $supports Todos los soportes que tiene el post type, por defecto será <<title, editor, thumbnail>>
 * @param string $taxonomie Taxonomias que se agregarán separadas por ","
 * @param string $prural Como será el nombre del post en prural. Ej: Notici (AS/OS/S), post(S/AS) 
 * @return array Lista de args que se pasarán a un nuevo post type.
 * */
function __caror_register_post_type($name, $icon, $isMale = true, $supports = array(), $taxonomie = "", $prural = "s")
{

  $theName = ucfirst($name);
  $genre = ($isMale) ? "o" : "a";
  if (empty($supports)) {
    $supports = array(
      'title', 'editor', 'thumbnail'
    );
  }
  $labels = array(
    'name'                  => $theName . $prural,
    'singular_name'         => $theName,
    'menu_name'             => $theName . $prural,
    'name_admin_bar'        => $theName,
    'add_new'               => 'Añadir nuev' . $genre,
    'add_new_item'          => "Añadir nuev" . $genre . ' ' . $name,
    'new_item'              => 'Nuev' . $genre . ' ' . $name,
    'edit_item'             => 'Editar ' . $name,
    'view_item'             => 'Ver ' . $name,
    'all_items'             => 'Tod' . $genre . 's l' . $genre . 's ' . $name . 's', //Tod@s l@s *Nombre de Post*
    'search_items'          => "Buscar {$name}",
    'not_found'             => "No se han encontrado {$name}s.",
    'not_found_in_trash'    => "No se ha encontrado {$name}s en la papelera."
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'menu_icon'          => $icon,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => strtolower($name)),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'supports'           => $supports,
  );

  if ($taxonomie !== "") {
    $args["taxonomies"] = explode(",", $taxonomie);
  }

  return $args;
}

/**
 * Agregar una nueva taxonomía completa.
 * @param String $name Nombre singular de la Taxonomía.
 * @param Boolean $is_male Si es true, este se tomará como taxonomia masculina. Por ejemplo, la taxonomía es "Escritor", si se asigna true a esta variable, será "El Escritor"; en caso contrario será "La Escritor"
 * @param Boolean $asTag ¿Será una taxonomía donde se permitan taxonomias/categorías hijas?
 * @param Array $otherArgs Este será definido para ajustes de esta taxonomía. La clave "Labels" Se ajustarán y no podrán sobreescribrse.
 * @see https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function __caror_register_taxonomy($name, $is_male = true, $asTag = false, $otherArgs = array())
{
  $theName = ucfirst($name);
  $pluralName = $theName . "s";
  $genre = ($is_male) ? "o" : "a";
  $labels = array(
    'name'                       => $pluralName,
    'singular_name'              => $theName,
    'search_items'               => "Buscar {$pluralName}",
    'popular_items'              => "{$pluralName} Populares",
    'all_items'                  => "Tod{$genre}s l{$genre}s {$pluralName}",
    'edit_item'                  => "Editar {$theName}",
    'update_item'                => "Actualizar {$theName}",
    'add_new_item'               => "Añadir {$theName}",
    'new_item_name'              => "Nuevo nombre de {$theName}",
    'add_or_remove_items'        => "Añadir o Eliminar {$theName}",
    'not_found'                  => "No se ha encontrado ${$pluralName}",
    'menu_name'                  => $pluralName,
  );

  if (empty($otherArgs)) {
    $args = array(
      'show_ui'               => true,
      'show_admin_column'     => true,
      'query_var'             => true,
      'rewrite'               => array('slug' => strtolower($theName)),
    );
  } else {
    $args = $otherArgs;
  }
  $args["hierarchical"] = $asTag;
  $args["labels"] = $labels;
  return $args;
}

function caror_register_posts_types()
{
  $postTypes = array(
    "blog" => __caror_register_post_type("Post", "dashicons-admin-site", true, array("title", "excerpt", "editor", "thumbnail")),
    "banner" => __caror_register_post_type("Banner", "dashicons-images-alt2", true, array("title", "excerpt", "thumbnail"))
  );
  foreach ($postTypes as $ptkey => $ptvalue) {

    register_post_type($ptkey, $ptvalue);
  }

  $taxonomies = array(
    "blog" => array(
      "categoria" => __caror_register_taxonomy("Categoría", false, false, array(
        "slug" => "categoria"
      )),
    ),
    "product" => array(
      "material" => __caror_register_taxonomy("Material", true, true)
    ),
  );

  foreach ($taxonomies as $postTypeID => $taxes) {
    foreach ($taxes as $taxSlug => $taxArgs) {
      register_taxonomy($taxSlug, $postTypeID, $taxArgs);
    }
  }
}

add_action("init", "caror_register_posts_types");


$generalOptions = acf_add_options_page(array(
  "position"    => "9",
  'menu_title'  => 'Opciones',
  'menu_slug'   => 'theme-general-settings',
));

acf_add_options_sub_page(array(
  'page_title'   => 'Contacto',
  'menu_title'   => 'Contacto',
  'parent_slug'   => $generalOptions['menu_slug'],
));
