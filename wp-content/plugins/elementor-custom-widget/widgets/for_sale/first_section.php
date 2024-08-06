<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_First_Section_Widget extends \Elementor\Widget_Base
{
    // Slot name
    public function get_name()
    {
        return 'first_section';
    }

    // Widget title
    public function get_title()
    {
        return esc_html__('For Sale First Section', 'custom-widget');
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
                'default' => esc_html__('DASSAULT FALCON 7X', 'custom-widget'),
            ]
        );

        $this->add_control(
            'year',
            [
                'label' => esc_html__('Year', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('2009', 'custom-widget'),
            ]
        );

        $this->add_control(
            'serial_number',
            [
                'label' => esc_html__('Serial Number', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('S/N 047', 'custom-widget'),
            ]
        );

        $this->add_control(
            'max_passengers',
            [
                'label' => esc_html__('Maximum Passengers', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('14', 'custom-widget'),
            ]
        );

        $this->add_control(
            'cabin_height_width',
            [
                'label' => esc_html__('Cabin Height / Width', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('6 ft 2 in / 7 ft 8 in', 'custom-widget'),
            ]
        );

        $this->add_control(
            'max_range',
            [
                'label' => esc_html__('Maximum Range', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('5950 nm', 'custom-widget'),
            ]
        );

        $this->add_control(
            'interior_zones',
            [
                'label' => esc_html__('Interior Zones', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('4 zones', 'custom-widget'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="first_section">';
        echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['title']) . '">';
        echo '<div class="first_section_content">';
        echo '<div class="first_section_content_title">' . esc_html($settings['title']) . '</div>';
        echo '<div class="first_section_content_year">' . esc_html($settings['year']) . '</div>';
        echo '<div class="first_section_content_serial">' . esc_html($settings['serial_number']) . '</div>';
        echo '</div>';
        echo '<div class="details">';
        echo '<div class="detail"><div>Maximum Passengers:</div> <div>' . esc_html($settings['max_passengers']) . '</div ></div>';
        echo '<div class="detail"><div>Cabin Height / Width:</div> <div>' . esc_html($settings['cabin_height_width']) . '</div> </div>';
        echo '<div class="detail"><div>Maximum Range:</div> <div>' . esc_html($settings['max_range']) . '</div> </div>';
        echo '<div class="detail"><div>Interior Zones:</div> <div>' . esc_html($settings['interior_zones']) . '</div> </div>';
        echo '</div>';
        echo '</div>';
    }

}
