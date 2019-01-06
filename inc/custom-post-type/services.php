<?php
/**
 * @package emp
 */

add_action( 'init', 'register_services' );
 /**
  * Register a book post type.
  *
  * @link http://codex.wordpress.org/Function_Reference/register_post_type
  */
 function register_services() {
 	$labels = array(
 		'name'               => 'Services',
 		'singular_name'      => 'Service',
 		'menu_name'          => 'Services',
 		'name_admin_bar'     => 'Services',
 		'add_new'            => 'Ajouter un nouveau service',
 		'add_new_item'       => 'Ajouter un nouveau service',
 		'new_item'           => 'Nouveau service',
 		'edit_item'          => 'Editer un service',
 		'view_item'          => 'Voir un service',
 		'all_items'          => 'Tous les services',
 		'search_items'       => 'Rechercher un service',
 		'parent_item_colon'  => '',
 		'not_found'          => 'Aucun service',
 		'not_found_in_trash' => 'Aucun service dans la corbeille'
 	);

 	$args = array(
 		'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
 		'public'             => true,
 		'publicly_queryable' => true,
 		'show_ui'            => true,
 		'show_in_menu'       => true,
 		'query_var'          => true,
 		'rewrite'            => array( 'slug' => 'services' ),
 		'capability_type'    => 'post',
    'menu_icon'           => 'dashicons-edit',
 		'has_archive'        => false,
 		'hierarchical'       => false,
 		'menu_position'      => 5,
 		'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions'),
 	);

 	register_post_type( 'services', $args );

 }
