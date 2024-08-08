<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_carousel_custom_pages_Widget extends \Elementor\Widget_Base
{

  // slot name
  public function get_name()
  {
    return 'carousel_custom_pages';
  }

  // widget title
  public function get_title()
  {
    return esc_html__('carousel_custom_pages', 'custom-widget');
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
    // Content section
    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Content', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'title',
      [
        'label' => esc_html__('Title', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'image',
      [
        'label' => esc_html__('Image', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $repeater->add_control(
      'link',
      [
        'label' => esc_html__('Link', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'slides',
      [
        'label' => esc_html__('Slides', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'title' => esc_html__('Slide 1', 'custom-widget'),
            'link' => '',
          ],
        ],
        'title_field' => '{{{ title }}}',
      ]
    );

    $this->end_controls_section();

    // Style section
    $this->start_controls_section(
      'style_section',
      [
        'label' => esc_html__('Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .carousel-title' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .carousel-title',
      ]
    );

    $this->end_controls_section();
  }

  // render frontend
  protected function render()
  {
    $settings = $this->get_settings_for_display();
    if (empty($settings['slides'])) {
      return;
    }
    ?>
    <div class="carousel-custom-pages owl-carousel owl-theme">
      <?php foreach ($settings['slides'] as $slide): ?>
        <div class="item">
          <?php if (!empty($slide['link']['url'])): ?>
            <a href="<?php echo esc_url($slide['link']['url']); ?>" <?php echo $slide['link']['is_external'] ? 'target="_blank"' : ''; ?>>
              <?php endif; ?>
              <div class="carousel-title"><?php echo esc_html($slide['title']); ?></div>
            <img src="<?php echo esc_url($slide['image']['url']); ?>">
            <?php if (!empty($slide['link']['url'])): ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <script>
      jQuery(document).ready(function ($) {
        $('.carousel-custom-pages.owl-carousel').owlCarousel({
          loop: true,
          margin: 10,
          items: 2.5,
          nav: false,
          dots: false,
          center: false,
        });
      });
    </script>
    <?php
  }
}