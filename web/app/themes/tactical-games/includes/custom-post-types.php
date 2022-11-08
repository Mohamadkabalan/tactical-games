<?php

/* Division */
function tg_custom_post_division() {
  $labels = array(
    'name'               => _x( 'Division', 'post type general name' ),
    'singular_name'      => _x( 'Divisions', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New division' ),
    'edit_item'          => __( 'Edit division' ),
    'new_item'           => __( 'New division' ),
    'all_items'          => __( 'All Divisions' ),
    'view_item'          => __( 'View division' ),
    'search_items'       => __( 'Search Divisions' ),
    'not_found'          => __( 'No Divisions found' ),
    'not_found_in_trash' => __( 'No Divisions found in the Trash' ), 
    'menu_name'          => 'Divisions'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'The Women Divisions',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => false,
  );
  register_post_type( 'division', $args ); 
}
add_action( 'init', 'tg_custom_post_division' );


/* Sponsor */
function tg_custom_post_sponsor() {
  $labels = array(
    'name'               => _x( 'Sponsor', 'post type general name' ),
    'singular_name'      => _x( 'Sponsors', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Sponsor' ),
    'edit_item'          => __( 'Edit Sponsor' ),
    'new_item'           => __( 'New Sponsor' ),
    'all_items'          => __( 'All Sponsors' ),
    'view_item'          => __( 'View Sponsor' ),
    'search_items'       => __( 'Search Sponsors' ),
    'not_found'          => __( 'No Sponsors found' ),
    'not_found_in_trash' => __( 'No Sponsors found in the Trash' ), 
    'menu_name'          => 'Sponsors'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Sponsors',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => false,
  );
  register_post_type( 'sponsor', $args ); 
}
add_action( 'init', 'tg_custom_post_sponsor' );


/* People */
function tg_custom_post_people() {
  $labels = array(
    'name'               => _x( 'Person', 'post type general name' ),
    'singular_name'      => _x( 'Person', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Person' ),
    'edit_item'          => __( 'Edit Person' ),
    'new_item'           => __( 'New Person' ),
    'all_items'          => __( 'All People' ),
    'view_item'          => __( 'View Person' ),
    'search_items'       => __( 'Search People' ),
    'not_found'          => __( 'No People found' ),
    'not_found_in_trash' => __( 'No People found in the Trash' ), 
    'menu_name'          => 'People'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'People',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => false,
  );
  register_post_type( 'people', $args ); 
}
add_action( 'init', 'tg_custom_post_people' );


/* Event */
function tg_custom_post_event() {
  $labels = array(
    'name'               => _x( 'Event', 'post type general name' ),
    'singular_name'      => _x( 'Events', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Event' ),
    'edit_item'          => __( 'Edit Event' ),
    'new_item'           => __( 'New Event' ),
    'all_items'          => __( 'All Events' ),
    'view_item'          => __( 'View Event' ),
    'search_items'       => __( 'Search Events' ),
    'not_found'          => __( 'No Events found' ),
    'not_found_in_trash' => __( 'No Events found in the Trash' ), 
    'menu_name'          => 'Events'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Events',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
    'show_in_rest' => true
  );
  register_post_type( 'event', $args ); 
}
add_action( 'init', 'tg_custom_post_event' );


/* Testimonial */
function tg_custom_post_testimonial() {
  $labels = array(
    'name'               => _x( 'Testimonial', 'post type general name' ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Testimonial' ),
    'edit_item'          => __( 'Edit Testimonial' ),
    'new_item'           => __( 'New Testimonial' ),
    'all_items'          => __( 'All Testimonials' ),
    'view_item'          => __( 'View Testimonial' ),
    'search_items'       => __( 'Search Testimonials' ),
    'not_found'          => __( 'No Testimonials found' ),
    'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
    'menu_name'          => 'Testimonials'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Testimonials',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => false,
  );
  register_post_type( 'testimonial', $args ); 
}
add_action( 'init', 'tg_custom_post_testimonial' );


/* FAQ */
function tg_custom_post_faq() {
  $labels = array(
    'name'               => _x( 'FAQ', 'post type general name' ),
    'singular_name'      => _x( 'FAQ', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New FAQ' ),
    'edit_item'          => __( 'Edit FAQ' ),
    'new_item'           => __( 'New FAQ' ),
    'all_items'          => __( 'All FAQs' ),
    'view_item'          => __( 'View FAQ' ),
    'search_items'       => __( 'Search FAQs' ),
    'not_found'          => __( 'No FAQs found' ),
    'not_found_in_trash' => __( 'No FAQs found in the Trash' ), 
    'menu_name'          => 'FAQs'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'FAQs',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => false,
  );
  register_post_type( 'faq', $args ); 
}
add_action( 'init', 'tg_custom_post_faq' );


/* Training Programs */
function tg_custom_post_training_program() {
  $labels = array(
    'name'               => _x( 'Training Program', 'post type general name' ),
    'singular_name'      => _x( 'Training Programs', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New training program' ),
    'edit_item'          => __( 'Edit training program' ),
    'new_item'           => __( 'New training program' ),
    'all_items'          => __( 'All Training Programs' ),
    'view_item'          => __( 'View training program' ),
    'search_items'       => __( 'Search Training Programs' ),
    'not_found'          => __( 'No Training Programs found' ),
    'not_found_in_trash' => __( 'No Training Programs found in the Trash' ), 
    'menu_name'          => 'Training Programs'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'The Women Training Programs',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => false,
  );
  register_post_type( 'training_program', $args ); 
}
add_action( 'init', 'tg_custom_post_training_program' );