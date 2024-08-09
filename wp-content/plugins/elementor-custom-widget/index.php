<?php
/**
 * Plugin Name: Elementor custom Widget
 * Description: customized widget
 * Plugin URI:  https://poyesis.fr/
 * Version:     1.0.0
 * Author:      Poyesis Developer
 * Text Domain: custom-widget
 *
 * Requires Plugins: elementor
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


/**
 * Register slot Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_custom_widget($widgets_manager)
{
  require_once (__DIR__ . '/widgets/header/contact-button.php');
  require_once (__DIR__ . '/widgets/footer/cities-carousel.php');
  require_once (__DIR__ . '/widgets/for_sale/first_section.php');
  require_once (__DIR__ . '/widgets/banner first section/animated-first-section.php');
  require_once (__DIR__ . '/widgets/anchor scroller/anchor-scroller.php');
  require_once (__DIR__ . '/widgets/fly-private/first-section.php');
  require_once (__DIR__ . '/widgets/fly-private/time-roulette.php');
  require_once (__DIR__ . '/widgets/fly-private/tree-list.php');
  require_once (__DIR__ . '/widgets/fly-private/gallery-roulette.php');
  require_once (__DIR__ . '/widgets/purchase-your-aircraft/biography.php');
  require_once (__DIR__ . '/widgets/header/burger-menu.php');
  require_once (__DIR__ . '/widgets/footer/carousel-custom-pages.php');
  require_once (__DIR__ . '/widgets/grid-gallery/grid-gallery.php');

  $widgets_manager->register(new \Elementor_Contact_Button_Widget());
  $widgets_manager->register(new \Elementor_Cities_Carousel_Widget());
  $widgets_manager->register(new \Elementor_First_Section_Widget());
  $widgets_manager->register(new \Elementor_animated_first_section_Widget());
  $widgets_manager->register(new \Elementor_anchor_scroller_Widget());
  $widgets_manager->register(new \Elementor_fly_private_first_section_Widget());
  $widgets_manager->register(new \Elementor_time_roulette_Widget());
  $widgets_manager->register(new \Elementor_tree_list_Widget());
  $widgets_manager->register(new \Elementor_gallery_roulette_Widget());
  $widgets_manager->register(new \Elementor_biography_Widget());
  $widgets_manager->register(new \Elementor_burger_menu_Widget());
  $widgets_manager->register(new \Elementor_carousel_custom_pages_Widget());
  $widgets_manager->register(new \Elementor_grid_gallery_Widget());
}
add_action('elementor/widgets/register', 'register_custom_widget');