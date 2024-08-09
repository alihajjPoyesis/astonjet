<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_single_biography_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'single_biography';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('Single Biography', 'custom-widget');
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

    // position
    $this->add_control(
      'position',
      [
        'label' => esc_html__('Position', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => esc_html__('CEO & Founder', 'custom-widget'),
      ]
    );

    // single Bio Text 1
    $this->add_control(
      'single_bio_text_one',
      [
        'label' => esc_html__('single Bio Text One', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Enter the first part of the biography', 'custom-widget'),
      ]
    );

    // Bio Text 2
    $this->add_control(
      'single_bio_text_two',
      [
        'label' => esc_html__('single Bio Text Two', 'custom-widget'),
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
    // Image 3
    $this->add_control(
      'image_three',
      [
        'label' => esc_html__('Image Three', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
      ]
    );


    $this->add_control(
      'link_text',
      [
        'label' => esc_html__('Link Text', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('see more', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'link_url',
      [
        'label' => esc_html__('Link URL', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'custom-widget'),
        'default' => [
          'url' => '',
          'is_external' => true,
          'nofollow' => true,
        ],
        'label_block' => true,
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
        'selector' => '{{WRAPPER}} .single-biography-title',
      ]
    );

    // Title color
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single-biography-title' => 'color: {{VALUE}}',
        ],
      ]
    );

    // Description typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'label' => esc_html__('Description Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .single-biography-description',
      ]
    );

    // Description color
    $this->add_control(
      'description_color',
      [
        'label' => esc_html__('Description Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single-biography-description' => 'color: {{VALUE}}',
        ],
      ]
    );

    // Position typography
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'position_typography',
        'label' => esc_html__('Position Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .single-biography-position',
      ]
    );

    // Position color
    $this->add_control(
      'position_color',
      [
        'label' => esc_html__('Position Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single-biography-position' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_control(
      'link_color',
      [
        'label' => esc_html__('Link Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .single-bio-link' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'link_typography',
        'label' => esc_html__('Link Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .single-bio-link',
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <style>
      .single-biography-widget {
        background-image: url('<?php echo esc_url($settings['image_one']['url']); ?>');
      }
    </style>
    <div class="single-biography-widget">
      <div class="single-bio-right-section-content-container">
        <div class="single-biography-title text-clip-bg"><?php echo esc_html($settings['title']); ?></div>
        <div class="single-biography-description"><?php echo esc_html($settings['description']); ?></div>
        <div class="single-bio-sign-and-position">
          <?php if (!empty($settings['image_three']['url'])): ?>
            <img src="<?php echo esc_url($settings['image_three']['url']); ?>" class="single-biography-image-three" alt="">
          <?php endif; ?>
          <div class="single-biography-position"><?php echo esc_html($settings['position']); ?></div>
        </div>
        <a href="<?php echo esc_url($settings['link_url']['url']); ?>"
          class="single-bio-link"><?php echo esc_html($settings['link_text']); ?></a>
        <?php if (!empty($settings['image_two']['url'])): ?>
          <img src="<?php echo esc_url($settings['image_two']['url']); ?>" class="single-biography-image-two" alt="">
        <?php endif; ?>
      </div>
    </div>
    <?php
  }
}
