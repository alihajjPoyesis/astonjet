<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_grid_gallery_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'grid_gallery';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('Grid gallery', 'custom-widget');
  }

  // Widget icon
  public function get_icon()
  {
    return 'eicon-gallery-grid';
  }

  // Widget category
  public function get_categories()
  {
    return ['general'];
  }

  // Widget controls
  protected function register_controls()
  {
    // Content section for repeater
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
        'default' => esc_html__('Grid Item Title', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'background',
      [
        'label' => esc_html__('Background Image', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $repeater->add_control(
      'link_text',
      [
        'label' => esc_html__('Link Text', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('see more', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
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

    $this->add_control(
      'gallery_items',
      [
        'label' => esc_html__('Gallery Items', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'title' => esc_html__('Grid Item #1', 'custom-widget'),
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
          '{{WRAPPER}} .grid-item-title' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_control(
      'link_color',
      [
        'label' => esc_html__('Link Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .grid-item-link' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Title Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .grid-item-title',
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'link_typography',
        'label' => esc_html__('Link Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .grid-item-link',
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

    if (!empty($settings['gallery_items'])) {
      $item_count = count($settings['gallery_items']);
      $item_width = 100 / $item_count . "%";

      ?>
      <style>
        .grid-gallery {
          display: flex;
        }

        .grid-gallery .grid-item {
          position: relative;
          width:
            <?php echo $item_width; ?>
          ;
          height: 750px;
          background-size: cover;
          background-position: top center;
        }

        .grid-gallery .grid-item:hover {
          width: 30%;
        }

        .full-shadow {
          background: rgba(14, 17, 21, 0.4);
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          z-index: 1;
          pointer-events: none;
          opacity: 1;
        }

        .bottom-shadow {
          background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, #030405 100%);
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          height: 100px;
          z-index: 2;
          pointer-events: none;
          opacity: 1;
        }

        .grid-gallery .content-container {
          position: absolute;
          bottom: 30px;
          left: 0;
          padding: 40px 50px;
          background-color: transparent;
          text-align: center;
          width: 100%;
          z-index: 2;
        }

        .grid-gallery .content-container a {
          display: none;
          border: 1px solid #FFF;
          padding: 10px 30px;
          max-width: 146px;
          margin: auto;
          border-radius: 2rem;
          margin-top: 15px;
        }

        .grid-gallery .grid-item:hover .content-container a {
          display: block;
        }

        .grid-gallery .grid-item:hover .content-container {
          background-color: rgba(2, 3, 4, 0.8);
          backdrop-filter: blur(10px);
          -webkit-backdrop-filter: blur(10px);
          bottom: 0;
          padding: 40px 10px;
        }

        .grid-gallery .grid-item:hover~.grid-item .content-container,
        .grid-gallery .grid-item:not(:hover) .content-container {
          padding: 40px 10px;
        }

        .grid-gallery .grid-item:hover .full-shadow,
        .grid-gallery .grid-item:hover .bottom-shadow {
          opacity: 0;
        }

        .grid-gallery .grid-item,
        .full-shadow,
        .bottom-shadow {
          transition: all 1s ease-in-out;
        }

        @media(max-width:1000px) {
          .grid-gallery .grid-item {
            width: 100%;
            height: 185px;
          }

          .grid-gallery {
            flex-direction: column;
          }
        .grid-gallery .content-container {
          bottom: 0;
          padding: 15px !important;
        }
        .grid-gallery .grid-item:hover {
          height: 300px;
          width: 100%;
        }

        .grid-gallery .grid-item:hover .content-container {
          backdrop-filter: unset;
          -webkit-backdrop-filter: unset;
          padding: unset;
        }

        .grid-gallery .grid-item:hover~.grid-item .content-container,
        .grid-gallery .grid-item:not(:hover) .content-container {
          padding: unset;
        }
        }
      </style>
      <div class="grid-gallery">
        <?php foreach ($settings['gallery_items'] as $item) { ?>
          <div class="grid-item" style="background-image: url('<?php echo esc_url($item['background']['url']); ?>');">
            <div class="full-shadow"></div>
            <div class="bottom-shadow"></div>
            <div class="content-container">
              <div class="grid-item-title"><?php echo esc_html($item['title']); ?></div>
              <a href="<?php echo esc_url($item['link_url']['url']); ?>"
                class="grid-item-link"><?php echo esc_html($item['link_text']); ?></a>
            </div>
          </div>
        <?php } ?>
      </div>
      <?php
    }
  }
}