<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Cities_Carousel_Widget extends \Elementor\Widget_Base
{

    // slot name
    public function get_name()
    {
        return 'cities_carousel';
    }

    // widget title
    public function get_title()
    {
        return esc_html__('Footer Cities Carousel', 'custom-widget');
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

        $this->add_control(
            'carousel_items',
            [
                'label' => esc_html__('Carousel Items', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'custom-widget'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Item Title', 'custom-widget'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'city',
                        'label' => esc_html__('City', 'custom-widget'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('City Name', 'custom-widget'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'title' => esc_html__('Item #1', 'custom-widget'),
                        'city' => esc_html__('City #1', 'custom-widget'),
                    ],
                    [
                        'title' => esc_html__('Item #2', 'custom-widget'),
                        'city' => esc_html__('City #2', 'custom-widget'),
                    ],
                ],
                'title_field' => '{{{ title }}} - {{{ city }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="cities-carousel-wrap">';
        if (!empty($settings['carousel_items'])) {
            echo '<div class="owl-carousel owl-theme cities-carousel">';
            foreach ($settings['carousel_items'] as $item) {
                echo '<div class="cities-item">';
                echo '<div class="cities-item-title">' . esc_html($item['title']) . '</div>';
                echo '<div class="cities-item-subtitle">' . esc_html($item['city']) . '</div>';
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
    }

}

