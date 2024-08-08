<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_burger_menu_Widget extends \Elementor\Widget_Base
{

  // slot name
  public function get_name()
  {
    return 'burger_menu';
  }

  // widget title
  public function get_title()
  {
    return esc_html__('burger_menu', 'custom-widget');
  }

  // widget icon
  public function get_icon()
  {
    return 'eicon-wordpress';
  }

  // widget category
  public function get_categories()
  {
    return ['general'];
  }

  // widget controls
  protected function register_controls()
  {

    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Content', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    $this->end_controls_section();
  }

  // render frontend
  protected function render()
  {
    ?>
    <div class="burger-menu">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <?php
  }
}

