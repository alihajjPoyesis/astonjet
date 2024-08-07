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
  require_once (__DIR__ . '/widgets/airplane_table/airplane_table.php');

  $widgets_manager->register(new \Elementor_Contact_Button_Widget());
  $widgets_manager->register(new \Elementor_Cities_Carousel_Widget());
  $widgets_manager->register(new \Elementor_First_Section_Widget());
  $widgets_manager->register(new \Elementor_animated_first_section_Widget());
  $widgets_manager->register(new \Elementor_anchor_scroller_Widget());
  $widgets_manager->register(new \Elementor_fly_private_first_section_Widget());
  $widgets_manager->register(new \Elementor_time_roulette_Widget());
  $widgets_manager->register(new \Elementor_Airplane_Table_Widget());
}
add_action('elementor/widgets/register', 'register_custom_widget');