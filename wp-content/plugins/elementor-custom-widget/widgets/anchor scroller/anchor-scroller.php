<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_anchor_scroller_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'anchor_scroller';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('Anchor Scroller', 'custom-widget');
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
      'title_text',
      [
        'label' => esc_html__('Title', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Title Here', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'anchor_href',
      [
        'label' => esc_html__('Anchor Href', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => '#something_here',
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'anchor_text',
      [
        'label' => esc_html__('Anchor Text', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('text_here', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'anchors_list',
      [
        'label' => esc_html__('Anchors List', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'anchor_href' => '#something_here',
            'anchor_text' => esc_html__('text_here', 'custom-widget'),
          ],
        ],
        'title_field' => '{{{ anchor_text }}}',
      ]
    );

    $this->add_control(
      'button_text',
      [
        'label' => esc_html__('Button Text', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Download brochure', 'custom-widget'),
      ]
    );

    $this->add_control(
      'button_link',
      [
        'label' => esc_html__('Button Link', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
      ]
    );

    $this->end_controls_section();

    // Style section for title typography and background
    $this->start_controls_section(
      'title_style_section',
      [
        'label' => esc_html__('Title Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .anchor-scroller-title',
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
      [
        'name' => 'title_background',
        'label' => esc_html__('Background', 'custom-widget'),
        'types' => ['classic', 'gradient'],
        'selector' => '{{WRAPPER}} .anchor-scroller-title',
      ]
    );

    $this->end_controls_section();

    // Style section for anchors
    $this->start_controls_section(
      'anchors_style_section',
      [
        'label' => esc_html__('Anchors Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'anchor_typography',
        'label' => esc_html__('Anchor Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} a.anchor-scroller-link',
      ]
    );

    // Style section for active anchors
    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'active_anchor_typography',
        'label' => esc_html__('Active Anchor Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} a.anchor-scroller-link.active',
      ]
    );

    $this->add_control(
      'anchor_text_color',
      [
        'label' => esc_html__('Text Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} a.anchor-scroller-link' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'anchor_active_background_image',
      [
        'label' => esc_html__('Active Background Image', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'selectors' => [
          '{{WRAPPER}} a.anchor-scroller-link.active' => 'background-image: url({{URL}});',
        ],
      ]
    );

    $this->add_control(
      'anchor_active_border_color',
      [
        'label' => esc_html__('Active Border Bottom Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} a.anchor-scroller-link.active::before' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'anchor_active_border_thickness',
      [
        'label' => esc_html__('Active Border Bottom Thickness', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 10,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} a.anchor-scroller-link.active::before' => 'height: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <div class="anchor-scroller-main-container">
      <!-- Render the title -->
      <div class="anchor-scroller-title text-clip-bg">
        <?php echo esc_html($settings['title_text']); ?>
      </div>
      <!-- Render the anchor tags -->
      <?php
      if (!empty($settings['anchors_list'])) {
        foreach ($settings['anchors_list'] as $index => $item) {
          ?>
          <a href="<?php echo esc_attr($item['anchor_href']); ?>"
            class="anchor-scroller-link <?php echo $index === 0 ? 'active' : ''; ?>">
            <?php echo esc_html($item['anchor_text']); ?>
          </a>
          <?php
        }
      }
      ?>
      <?php
      if($settings['button_text'] && $settings['button_link']){
      ?>
      <div class="header_contact_button_wrap button_no_hover">
        <div class="header_contact_button">
          <a href="<?php echo $settings['button_link']; ?>">
            <?php echo esc_html($settings['button_text']); ?>
          </a>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
    <?php
  }
}
