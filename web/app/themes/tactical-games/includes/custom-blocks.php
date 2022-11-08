<?php

/*
Custom Blocks
*/

add_action('acf/init', 'ww_acf_init');

function ww_acf_init()
{
  // Bail out if function doesn’t exist.
  if (!function_exists('acf_register_block')) {
    return;
  }


  // Register Most Recent posts block.
  acf_register_block(array(
    'name'            => 'tg_most_recent_block',
    'title'           => __('Most Recent Posts', 'tactical-games'),
    'description'     => __('Most Recent Post and Review.', 'tactical-games'),
    'render_callback' => 'tg_most_recent_acf_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('posts'),
  ));


  // Register Hero Carousel block.
  acf_register_block(array(
    'name'            => 'hero_carousel_block',
    'title'           => __('Hero Carousel', 'tactical-games'),
    'description'     => __('Hero Carousel block.', 'tactical-games'),
    'render_callback' => 'tg_hero_carousel_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('hero carousel'),
  ));

  // Register Highlighted Links block.
  acf_register_block(array(
    'name'            => 'highlighted_links_block',
    'title'           => __('Highlighted Links', 'tactical-games'),
    'description'     => __('Highlighted Links block.', 'tactical-games'),
    'render_callback' => 'tg_highlighted_links_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Highlighted Links'),
  ));

  // Register Featured Content block.
  acf_register_block(array(
    'name'            => 'featured_content_block',
    'title'           => __('Featured Content', 'tactical-games'),
    'description'     => __('Featured Content block.', 'tactical-games'),
    'render_callback' => 'tg_featured_content_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Featured Content'),
  ));

  // Register Testimonials block.
  acf_register_block(array(
    'name'            => 'testimonials_block',
    'title'           => __('Testimonials', 'tactical-games'),
    'description'     => __('Testimonials block.', 'tactical-games'),
    'render_callback' => 'tg_testimonials_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Testimonials'),
  ));

  // Register Upcoming Events block.
  acf_register_block(array(
    'name'            => 'upcoming_events_block',
    'title'           => __('Upcoming Events', 'tactical-games'),
    'description'     => __('Upcoming Events block.', 'tactical-games'),
    'render_callback' => 'tg_upcoming_events_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Upcoming Events'),
  ));

  // Register Events List block.
  acf_register_block(array(
    'name'            => 'events_list_block',
    'title'           => __('Events List', 'tactical-games'),
    'description'     => __('Events List block.', 'tactical-games'),
    'render_callback' => 'tg_events_list_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Events List'),
  ));

  // Register Event Schedule block.
  acf_register_block(array(
    'name'            => 'event_schedule_block',
    'title'           => __('Event Schedule', 'tactical-games'),
    'description'     => __('Event Schedule block.', 'tactical-games'),
    'render_callback' => 'tg_event_schedule_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Event Schedule'),
  ));

  // Register Divisions block.
  acf_register_block(array(
    'name'            => 'divisions_block',
    'title'           => __('Divisions', 'tactical-games'),
    'description'     => __('Divisions block.', 'tactical-games'),
    'render_callback' => 'tg_divisions_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Divisions'),
  ));

  // Register Event Divisions block.
  acf_register_block(array(
    'name'            => 'event_divisions_block',
    'title'           => __('Event Divisions', 'tactical-games'),
    'description'     => __('Event Divisions block.', 'tactical-games'),
    'render_callback' => 'tg_event_divisions_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Event Divisions'),
  ));

  // Register Instructors List block.
  acf_register_block(array(
    'name'            => 'instructors_list_block',
    'title'           => __('Instructors List', 'tactical-games'),
    'description'     => __('Instructors List block.', 'tactical-games'),
    'render_callback' => 'tg_instructors_list_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Instructors List'),
  ));

  
  // Register Event Staff block.
  acf_register_block(array(
    'name'            => 'event_staff_block',
    'title'           => __('Event Staff', 'tactical-games'),
    'description'     => __('Event Staff block.', 'tactical-games'),
    'render_callback' => 'tg_event_staff_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Event Staff'),
  ));

  // Register Staff List block.
  acf_register_block(array(
    'name'            => 'staff_list_block',
    'title'           => __('Staff List', 'tactical-games'),
    'description'     => __('Staff List block.', 'tactical-games'),
    'render_callback' => 'tg_staff_list_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Staff List'),
  ));

  // Register Page Hero block.
  acf_register_block(array(
    'name'            => 'page_hero_block',
    'title'           => __('Page Hero', 'tactical-games'),
    'description'     => __('Page Hero block.', 'tactical-games'),
    'render_callback' => 'tg_page_hero_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Page Hero'),
  ));

  
  // Register Sponsors block.
  acf_register_block(array(
    'name'            => 'sponsors_block',
    'title'           => __('Sponsors', 'tactical-games'),
    'description'     => __('Sponsors block.', 'tactical-games'),
    'render_callback' => 'tg_sponsors_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Sponsors'),
  ));

  
  // Register FAQs block.
  acf_register_block(array(
    'name'            => 'faqs_block',
    'title'           => __('FAQs', 'tactical-games'),
    'description'     => __('FAQs block.', 'tactical-games'),
    'render_callback' => 'tg_faqs_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('FAQs'),
  ));

  // Register Training Programs block.
  acf_register_block(array(
    'name'            => 'training_programs_block',
    'title'           => __('Training Programs', 'tactical-games'),
    'description'     => __('Training Programs block.', 'tactical-games'),
    'render_callback' => 'tg_training_programs_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('Training Programs'),
  ));

  // Register People List block.
  acf_register_block(array(
    'name'            => 'people_list_block',
    'title'           => __('People List', 'tactical-games'),
    'description'     => __('People List block.', 'tactical-games'),
    'render_callback' => 'tg_people_list_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array('People List'),
  ));
}



// Most Recent Posts block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_most_recent_acf_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'category_name' => 'article'
  );

  $context['articles'] = Timber::get_posts($args);

  $args2 = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'category_name' => 'review'
  );

  $context['reviews'] = Timber::get_posts($args2);

  // Render the block.
  Timber::render('blocks/most-recent.twig', $context);
}

// Hero Carousel block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_hero_carousel_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('blocks/hero-carousel.twig', $context);
}

// Highlighted Link block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_highlighted_links_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('blocks/highlighted-links.twig', $context);
}

// Featured Content block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_featured_content_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('blocks/featured-content.twig', $context);
}

// Testimonials block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_testimonials_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('blocks/testimonials.twig', $context);
}

// Upcoming Events block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_upcoming_events_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $today = date('Ymd');
  $today = date('Y-m-d', strtotime($today . ' + 2 days'));

  $args = array(
    'numberposts' => -1,
    'post_type' => 'event',
    'meta_key' => 'event_from', // name of custom field
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
      'key'     => 'event_from',
      'compare' => '>',
      'value'   => $today,
    ),
  );

  if(!empty($block['data']) && !empty($block['data']['event_types'])) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'event_types',
        'terms'    => $block['data']['event_types'],
      )
    );
  }

  $context['events'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/upcoming-events.twig', $context);
}

// Events List block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_events_list_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $today = date('Ymd');
  $today = date('Y-m-d', strtotime($today . ' + 2 days'));

  $args = array(
    'numberposts' => -1,
    'post_type' => 'event',
    'meta_key' => 'event_from', // name of custom field
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
      'key'     => 'event_from',
      'compare' => '>',
      'value'   => $today,
    ),
  );
  if(!empty($block['data']) && !empty($block['data']['event_types'])) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'event_types',
        'terms'    => $block['data']['event_types'],
      )
    );
  }

  $context['events'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/events-list.twig', $context);
}

// Event Schedule block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_event_schedule_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('blocks/event-schedule.twig', $context);
}

// Divisions block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_divisions_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'division'
  );
  if(!empty($block['data']) && !empty($block['data']['division_types'])) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'division_types',
        'terms'    => $block['data']['division_types'],
      )
    );
  }

  $context['divisions'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/divisions.twig', $context);
}


// Event Divisions block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_event_divisions_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'division'
  );

  $context['divisions'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/event-divisions.twig', $context);
}

// Instructors List block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_instructors_list_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'people',
    'person_roles' => 'instructor'
  );

  $context['instructors'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/instructors-list.twig', $context);
}

// Event Staff block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_event_staff_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'people'
  );

  $context['event-staff'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/event-staff.twig', $context);
}

// Staff List block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_staff_list_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'people',
    'person_roles' => 'staff-member'
  );

  $context['staff'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/staff-list.twig', $context);
}

// Page Hero block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_page_hero_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('blocks/hero.twig', $context);
}

// Sponsors block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_sponsors_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'sponsor',
    'sponsor_types' => 'sponsor'
  );

  $context['sponsors'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/sponsors.twig', $context);
}


// FAQs block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_faqs_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'faq'
  );

  $context['faqs'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/faqs.twig', $context);
}


// Training Programs block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_training_programs_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'training_program'
  );

  $context['training_programs'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/training-programs.twig', $context);
}



// People block
/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function tg_people_list_block_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();
  $context['block'] = $block;
  $context['fields'] = get_fields();
  $context['is_preview'] = $is_preview;

  $args = array(
    'numberposts' => -1,
    'post_type' => 'people'
  );
  if(!empty($block['data']) && !empty($block['data']['person_roles'])) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'person_roles',
        'terms'    => $block['data']['person_roles'],
      )
    );
  }

  $context['people_list'] = Timber::get_posts($args);

  // Render the block.
  Timber::render('blocks/people-list.twig', $context);
}
/*

END Custom Blocks

*/
