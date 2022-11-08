<?php 

add_action('wp_enqueue_scripts', 'devvly_enqueue_styles');
add_action('wp_enqueue_scripts', 'devvly_enqueue_scripts');

function devvly_enqueue_styles() {
  wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/style.css', false, 1.0, 'all');
}

add_action( 'enqueue_block_editor_assets', function() {
  wp_enqueue_style( 'my-block-editor-styles', get_template_directory_uri() . "/assets/css/style.css", false, 1.0, 'all' );
} );

function devvly_enqueue_scripts() {
  wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array(), '2.9.2', 'all');
  wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array(), '5.0.2', 'all');

  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/mini-cart.js', array('jquery'), 1.0, true);
  wp_enqueue_script( 'script-nav', get_template_directory_uri() . '/assets/js/navbar.js', false, 1.0, true);
  wp_enqueue_script( 'script-product-image', get_template_directory_uri() . '/assets/js/product-image.js', false, 1.0, true);
  wp_enqueue_script( 'script-jcarousel', get_template_directory_uri() . '/assets/js/jquery.jcarousel.min.js', array('jquery'), 1.0, true);
  wp_enqueue_script( 'script-jcarousel-responsive', get_template_directory_uri() . '/assets/js/jcarousel.responsive.js', array('jquery'), 1.0, true);

}

