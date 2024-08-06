<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_fly_private_first_section_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'fly_private_first_section';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('fly_private_first_section', 'custom-widget');
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

    $this->add_control(
      'image',
      [
        'label' => esc_html__('Choose Image', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'title',
      [
        'label' => esc_html__('Title', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Schedule Flexibility', 'custom-widget'),
      ]
    );

    $this->add_control(
      'subtitle',
      [
        'label' => esc_html__('Subtitle', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Tailor your travel to your needs', 'custom-widget'),
      ]
    );

    $this->add_control(
      'description',
      [
        'label' => esc_html__('Description', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('When you fly private, you’re not restricted by commercial airline schedules. Choose your departure time to fit your needs, whether it’s an early morning meeting or a late-night return. With our private jet services, your itinerary is truly your own.', 'custom-widget'),
      ]
    );

    $this->end_controls_section();

    // Style section for typography and color
    $this->start_controls_section(
      'style_section_title',
      [
        'label' => esc_html__('Title Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .fly_private_first_section-text-container .title' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .fly_private_first_section-text-container .title',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'style_section_subtitle',
      [
        'label' => esc_html__('Subtitle Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'subtitle_color',
      [
        'label' => esc_html__('Subtitle Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .fly_private_first_section-text-container .sub-title' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'subtitle_typography',
        'selector' => '{{WRAPPER}} .fly_private_first_section-text-container .sub-title',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'style_section_description',
      [
        'label' => esc_html__('Description Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'description_color',
      [
        'label' => esc_html__('Description Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .fly_private_first_section-text-container .description' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'selector' => '{{WRAPPER}} .fly_private_first_section-text-container .description',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'style_section_text_container',
      [
        'label' => esc_html__('Text Container Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'text_container_top',
      [
        'label' => esc_html__('Text Container Top Position', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .fly_private_first_section-text-container' => 'top: {{SIZE}}px;',
        ],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <div class="fly_private_first_section-main-container">
      <div class="fly_private_first_section-text-container">
        <div class="title text-clip-bg"><?php echo esc_html($settings['title']); ?></div>
        <div class="sub-title"><?php echo esc_html($settings['subtitle']); ?></div>
        <div class="description"><?php echo esc_html($settings['description']); ?></div>
      </div>
      <div class="fly_private_first_section-img-container">
        <img src="<?php echo esc_url($settings['image']['url']); ?>" class="fly_private_first_section-img-fade">
      </div>
    </div>
    <?php
  }
}
