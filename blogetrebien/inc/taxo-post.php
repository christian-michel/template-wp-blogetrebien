<?php

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'post_taxonomy_intervenant', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function post_taxonomy_intervenant() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Intervenant', 'ta-portfolio' ),
    'singular_name' => _x( 'Intervenant', 'ta-portfolio' ),
    'search_items' =>  __( 'Recherche Intervenant' ),
    'all_items' => __( 'Tous les intervenants' ),
    'parent_item' => __( 'Intervenant Parent' ),
    'parent_item_colon' => __( 'Intervenant Parent :' ),
    'edit_item' => __( 'Edit Intervenant' ), 
    'update_item' => __( 'Update Intervenant' ),
    'add_new_item' => __( 'Ajouter un nouvel intervenant' ),
    'new_item_name' => __( 'Nouveau nom d\'intervenant' ),
    'menu_name' => __( 'Intervenants' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('intervenants',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tax_intervenant' ),
  ));
 
}









//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'post_taxonomy_discipline', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function post_taxonomy_discipline() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Discipline', 'ta-portfolio' ),
    'singular_name' => _x( 'Discipline', 'ta-portfolio' ),
    'search_items' =>  __( 'Recherche Discipline' ),
    'all_items' => __( 'Toutes les disciplines' ),
    'parent_item' => __( 'Discipline Parent' ),
    'parent_item_colon' => __( 'Discipline Parent :' ),
    'edit_item' => __( 'Edit Discipline' ), 
    'update_item' => __( 'Update Discipline' ),
    'add_new_item' => __( 'Ajouter une nouvelle discipline' ),
    'new_item_name' => __( 'Nouveau nom de discipline' ),
    'menu_name' => __( 'Disciplines' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('disciplines',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tax_discipline' ),
  ));
 
}







//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'post_taxonomy_format', 0 );
 
//create a custom taxonomy name it topics for your posts
 
function post_taxonomy_format() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Format', 'ta-portfolio' ),
    'singular_name' => _x( 'Format', 'ta-portfolio' ),
    'search_items' =>  __( 'Recherche Format' ),
    'all_items' => __( 'Tous les formats' ),
    'parent_item' => __( 'Format Parent' ),
    'parent_item_colon' => __( 'Format Parent :' ),
    'edit_item' => __( 'Edit Format' ), 
    'update_item' => __( 'Update Format' ),
    'add_new_item' => __( 'Ajouter un nouveau format' ),
    'new_item_name' => __( 'Nouveau nom de format' ),
    'menu_name' => __( 'Formats' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('formats',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tax_format' ),
  ));
 
}