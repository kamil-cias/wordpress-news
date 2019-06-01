<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * @package News
 * @version 1.0.0
 */
/*
Plugin Name: "News {custom post type}"
Plugin URI: https://github.com/kamil-cias/wordpress-news
Description: News - custom post type in content management system WordPress.
Author: Kamil Ciaś <info@goto.systems>
Version: 1.1.0
Author URI: https://goto.systems/plugins
*/
function gotosystems_custom_post_type () {
  $labels = array(
    'name' => 'All News',
    'singular_name' => 'All News',
    'add_new' => 'Add News',
    'all_items' => 'All News',
    'add_new_items' => 'Add News',
    'edit_item' => 'Edit News',
    'new_item' => 'New Post',
    'view_item' => 'View News',
    'search_item' => 'Search News',
    'not_found' => 'Not found news',
    'not_found_in_trash' => 'Not found news in trash',
    'parent_item_colon' => 'Parent news'
    );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'support' => array(
      'title',
      'editor',
      'excerpt',
      'thumnail',
      'revisions',
    ),
  'taxonomies' => array('category', 'post_tag'),
  'menu_position' => 5,
  'exclude_from_search' => false
 );
 register_post_type('news', $args);
}
add_action('init','gotosystems_custom_post_type');

/* Register WordPress Gutenberg CPT */
function gotosystems_post_type() {
  register_post_type( 'News',
    array(
      'labels' => array(
        'name' => __( 'News' ),
        'singular_name' => __( 'News' )
    ),
    'has_archive' => true,
    'public' => true,
    'rewrite' => array('slug' => 'news'),
    'show_in_rest' => true,
    'menu_icon'   => 'dashicons-screenoptions',
    'supports' => array('editor')
   )
  );
}
add_action( 'init', 'gotosystems_post_type' );

add_action('admin_menu', 'gotosystems_setup_news');
 
function gotosystems_setup_news() {
        add_menu_page( 
		'Setup WordPress News', 
		'NEWS Panel', 
		'manage_options', 
		'setup-wordpress-news', 
		'setup_news_init'
	);
	
}
 
function setup_news_init(){
        echo "<h1>Welcome in panel info / custom post type - news</h1>";
	echo "<p>Future plugin options:</br> - Add new instances of post types;</br> - Confirm deleting database tables for new post types while removing the plugin.</p>";
}
