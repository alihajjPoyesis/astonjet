<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_animated_first_section_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'animated_first_section';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('Animated First Section', 'custom-widget');
  }

  // Widget icon
  public function get_icon()
  {
    return 'eicon-wordpress';
  }

  // Widget category
  public function get_categories()
  {
    return ['general'];
  }

  // Widget controls
  protected function register_controls()
  {
    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Content', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'background_image',
      [
        'label' => esc_html__('Background Image', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'title_text',
      [
        'label' => esc_html__('Title Text', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('FLY PRIVATE', 'custom-widget'),
        'placeholder' => esc_html__('Enter your title', 'custom-widget'),
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'style_section',
      [
        'label' => esc_html__('Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .animated-first-section-title',
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <style>
      .animated-first-section-main-container {
        background-image: url('<?php echo esc_url($settings['background_image']['url']); ?>');
      }
    </style>
    <div class="animated-first-section-main-container">
      <div class="animated-first-section-title text-clip-bg"><?php echo esc_html($settings['title_text']); ?></div>
    </div>
    <?php
  }
}
