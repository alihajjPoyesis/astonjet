<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_biography_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'biography';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('Biography', 'custom-widget');
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
    // Content section for title and anchors
    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Content', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    // Title
    $this->add_control(
      'title',
      [
        'label' => esc_html__('Title', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Enter your title', 'custom-widget'),
      ]
    );

    // Description
    $this->add_control(
      'description',
      [
        'label' => esc_html__('Description', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => esc_html__('Enter your description', 'custom-widget'),
      ]
    );

    // Bio Text 1
    $this->add_control(
      'bio_text_one',
      [
        'label' => esc_html__('Bio Text One', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Enter the first part of the biography', 'custom-widget'),
      ]
    );

    // Bio Text 2
    $this->add_control(
      'bio_text_two',
      [
        'label' => esc_html__('Bio Text Two', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Enter the second part of the biography', 'custom-widget'),
      ]
    );

    // Image 1
    $this->add_control(
      'image_one',
      [
        'label' => esc_html__('Image One', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
      ]
    );

    // Image 2
    $this->add_control(
      'image_two',
      [
        'label' => esc_html__('Image Two', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
      ]
    );

    $this->end_controls_section();

    // Style section for typography and colors
    $this->start_controls_section(
      'style_section',
      [
        'label' => esc_html__('Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    // Title typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Title Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .biography-title',
      ]
    );

    // Title color
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .biography-title' => 'color: {{VALUE}}',
        ],
      ]
    );

    // Description typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'label' => esc_html__('Description Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .biography-description',
      ]
    );

    // Description color
    $this->add_control(
      'description_color',
      [
        'label' => esc_html__('Description Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .biography-description' => 'color: {{VALUE}}',
        ],
      ]
    );

    // Bio Text One typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'bio_text_one_typography',
        'label' => esc_html__('Bio Text One Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .biography-bio-text-one',
      ]
    );

    // Bio Text One color
    $this->add_control(
      'bio_text_one_color',
      [
        'label' => esc_html__('Bio Text One Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .biography-bio-text-one' => 'color: {{VALUE}}',
        ],
      ]
    );

    // Bio Text Two typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'bio_text_two_typography',
        'label' => esc_html__('Bio Text Two Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .biography-bio-text-two',
      ]
    );

    // Bio Text Two color
    $this->add_control(
      'bio_text_two_color',
      [
        'label' => esc_html__('Bio Text Two Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .biography-bio-text-two' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <style>
      .biography-widget {
        background-image: url('<?php echo esc_url($settings['image_one']['url']); ?>');
      }
    </style>
    <div class="biography-widget">

      <div class="bio-right-section-content-container">
        <div class="biography-title text-clip-bg"><?php echo esc_html($settings['title']); ?></div>
        <div class="biography-description"><?php echo esc_html($settings['description']); ?></div>
        <?php if (!empty($settings['image_two']['url'])): ?>
          <img src="<?php echo esc_url($settings['image_two']['url']); ?>" class="biography-image-two" alt="">
        <?php endif; ?>
      </div>

      <div class="bio-content-container">
        <?php if (!empty($settings['bio_text_one'])): ?>
          <div class="biography-bio-text-one"><?php echo esc_html($settings['bio_text_one']); ?></div>
        <?php endif; ?>
        <?php if (!empty($settings['bio_text_two'])): ?>
          <div class="biography-bio-text-two"><?php echo esc_html($settings['bio_text_two']); ?></div>
        <?php endif; ?>
      </div>

    </div>
    <?php
  }
}
