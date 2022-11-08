<?php

// Sponsor Type Taxonomy
 
add_action( 'init', 'create_sponsor_type_taxonomy', 0 );
 
function create_sponsor_type_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Sponsor Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Sponsor Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Sponsor Types' ),
    'all_items' => __( 'All Sponsor Types' ),
    'parent_item' => __( 'Parent Sponsor Type' ),
    'parent_item_colon' => __( 'Parent Sponsor Type:' ),
    'edit_item' => __( 'Edit Sponsor Type' ), 
    'update_item' => __( 'Update Sponsor Type' ),
    'add_new_item' => __( 'Add New Sponsor Type' ),
    'new_item_name' => __( 'New Sponsor Type Name' ),
    'menu_name' => __( 'Sponsor Types' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('sponsor_types',array('sponsor'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'sponsor_type' ),
  ));
 
}


// Person Role Taxonomy
 
add_action( 'init', 'create_person_role_taxonomy', 0 );
 
function create_person_role_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Person Roles', 'taxonomy general name' ),
    'singular_name' => _x( 'Person Role', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Person Roles' ),
    'all_items' => __( 'All Person Roles' ),
    'parent_item' => __( 'Parent Person Role' ),
    'parent_item_colon' => __( 'Parent Person Role:' ),
    'edit_item' => __( 'Edit Person Role' ), 
    'update_item' => __( 'Update Person Role' ),
    'add_new_item' => __( 'Add New Person Role' ),
    'new_item_name' => __( 'New Person Role Name' ),
    'menu_name' => __( 'Person Roles' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('person_roles',array('people'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'person_role' ),
  ));
 
}


// Event Type Taxonomy
 
add_action( 'init', 'create_event_type_taxonomy', 0 );
 
function create_event_type_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Event Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Event Types' ),
    'all_items' => __( 'All Event Types' ),
    'parent_item' => __( 'Parent Event Type' ),
    'parent_item_colon' => __( 'Parent Event Type:' ),
    'edit_item' => __( 'Edit Event Type' ), 
    'update_item' => __( 'Update Event Type' ),
    'add_new_item' => __( 'Add New Event Type' ),
    'new_item_name' => __( 'New Event Type Name' ),
    'menu_name' => __( 'Event Types' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('event_types',array('event'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event_type' ),
  ));
 
}


// Division type Taxonomy
 
add_action( 'init', 'create_division_type_taxonomy', 0 );
 
function create_division_type_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Division Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Division Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Division Types' ),
    'all_items' => __( 'All Division Types' ),
    'parent_item' => __( 'Parent Division Type' ),
    'parent_item_colon' => __( 'Parent Division Type:' ),
    'edit_item' => __( 'Edit Division Type' ), 
    'update_item' => __( 'Update Division Type' ),
    'add_new_item' => __( 'Add New Division Type' ),
    'new_item_name' => __( 'New Division Type Name' ),
    'menu_name' => __( 'Division Types' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('division_types',array('division'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'division_type' ),
  ));
 
}