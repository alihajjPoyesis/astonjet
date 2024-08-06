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

        $this->end_controls_section();

        $sections = [
            'max_passengers' => 'Maximum Passengers',
            'cabin_height_width' => 'Cabin Height / Width',
            'max_range' => 'Maximum Range',
            'interior_zones' => 'Interior Zones'
        ];

        foreach ($sections as $section => $label) {
            $this->start_controls_section(
                $section . '_section',
                [
                    'label' => esc_html__($label, 'custom-widget'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                $section . '_icon',
                [
                    'label' => esc_html__($label . ' Icon', 'custom-widget'),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-info-circle',
                        'library' => 'fa-solid',
                    ],
                ]
            );

            $this->add_control(
                $section . '_title',
                [
                    'label' => esc_html__($label . ' Title', 'custom-widget'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__($label, 'custom-widget'),
                ]
            );

            $this->add_control(
                $section,
                [
                    'label' => esc_html__($label, 'custom-widget'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('Value', 'custom-widget'),
                ]
            );

            $this->end_controls_section();
        }

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
                'name' => 'section_title_typography',
                'label' => esc_html__('Section Title Typography', 'custom-widget'),
                'selector' => '{{WRAPPER}} .first_section_content_title',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_year_typography',
                'label' => esc_html__('Section Title Year', 'custom-widget'),
                'selector' => '{{WRAPPER}} .first_section_content_year',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'section_serial_typography',
                'label' => esc_html__('Section Title Serial', 'custom-widget'),
                'selector' => '{{WRAPPER}} .first_section_content_serial',
            ]
        );

        $this->add_control(
            'detail_title_color',
            [
                'label' => esc_html__('Detail Title Color', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .detail_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'detail_title_typography',
                'label' => esc_html__('Detail Title Typography', 'custom-widget'),
                'selector' => '{{WRAPPER}} .detail_title',
            ]
        );

        $this->add_control(
            'detail_value_color',
            [
                'label' => esc_html__('Detail Value Color', 'custom-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .detail_value' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'detail_title_value',
                'label' => esc_html__('Detail Value Typography', 'custom-widget'),
                'selector' => '{{WRAPPER}} .detail_value',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="first_section_widget">';
        echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['title']) . '">';
        echo '<div class="first_section_content">';
        echo '<div class="first_section_content_title">' . esc_html($settings['title']) . '</div>';
        echo '<div class="first_section_content_year">' . esc_html($settings['year']) . '</div>';
        echo '<div class="first_section_content_serial">' . esc_html($settings['serial_number']) . '</div>';
        echo '</div>';
        echo '<div class="details flex flex-row align-i-center justify-between">';
        echo '<div class="detail_wrap flex flex-row align-i-center justify-between">';

        $sections = ['max_passengers', 'cabin_height_width', 'max_range', 'interior_zones'];
        $totalSections = count($sections);
        $currentSection = 1;

        foreach ($sections as $section) {
            echo '<div class="detail">';
            echo '<div class="detail_content">';
            echo '<div class="detail_title">' . esc_html($settings[$section . '_title']) . '</div>';
            echo '<div class="detail_value">' . esc_html($settings[$section]) . '</div>';
            echo '</div>';
            echo '<div class="detail_icon">';
            \Elementor\Icons_Manager::render_icon($settings[$section . '_icon'], ['aria-hidden' => 'true']);
            echo '</div>';
            echo '</div>';

            if ($currentSection < $totalSections) {
                echo '<div class="blue_spacer"></div>';
            }

            $currentSection++;
        }


        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
