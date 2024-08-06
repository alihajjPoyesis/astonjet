<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_tree_list_Widget extends \Elementor\Widget_Base
{
  public function get_name()
  {
    return 'tree_list';
  }

  public function get_title()
  {
    return esc_html__('Tree List', 'custom-widget');
  }

  public function get_icon()
  {
    return 'eicon-wordpress';
  }

  public function get_categories()
  {
    return ['general'];
  }

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
      'title',
      [
        'label' => esc_html__('Title', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Highest Safety Level', 'custom-widget'),
      ]
    );

    $this->add_control(
      'sub_title',
      [
        'label' => esc_html__('Subtitle', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Commitment to Excellence in Safety', 'custom-widget'),
      ]
    );

    $this->add_control(
      'description',
      [
        'label' => esc_html__('Description', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('We adhere to the highest safety standards in the aviation industry. Our aircraft undergo rigorous maintenance, and our pilots are highly trained professionals. Your safety is our paramount concern, ensuring you reach your destination securely every time.', 'custom-widget'),
      ]
    );

    $this->add_control(
      'list_items',
      [
        'label' => esc_html__('List Items', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'list_item_title',
            'label' => esc_html__('List Item Title', 'custom-widget'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('List Item', 'custom-widget'),
          ],
          [
            'name' => 'list_item_image',
            'label' => esc_html__('List Item Image', 'custom-widget'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
          ],
        ],
        'default' => [
          [
            'list_item_title' => esc_html__('Experienced Crew', 'custom-widget'),
            'list_item_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
          ],
          [
            'list_item_title' => esc_html__('Recurrent Crew Training', 'custom-widget'),
            'list_item_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
          ],
          [
            'list_item_title' => esc_html__('Latest-Generation Aircraft', 'custom-widget'),
            'list_item_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
          ],
          [
            'list_item_title' => esc_html__('Manufacturer Maintenance', 'custom-widget'),
            'list_item_image' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
          ],
        ],
        'title_field' => '{{{ list_item_title }}}',
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

    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .tree_list-right-section .title' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Title Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .tree_list-right-section .title',
      ]
    );

    $this->add_control(
      'sub_title_color',
      [
        'label' => esc_html__('Subtitle Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .tree_list-right-section .sub-title' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'sub_title_typography',
        'label' => esc_html__('Subtitle Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .tree_list-right-section .sub-title',
      ]
    );

    $this->add_control(
      'description_color',
      [
        'label' => esc_html__('Description Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .tree_list-right-section .description' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'label' => esc_html__('Description Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .tree_list-right-section .description',
      ]
    );

    $this->add_control(
      'list_item_color',
      [
        'label' => esc_html__('List Item Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .tree_list-right-section .single-list-tree' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'list_item_typography',
        'label' => esc_html__('List Item Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .tree_list-right-section .single-list-tree',
      ]
    );
    $this->add_control(
      'active_list_item_color',
      [
        'label' => esc_html__('Active List Item Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .tree_list-right-section .single-list-tree.active' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'active_list_item_typography',
        'label' => esc_html__('Active List Item Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .tree_list-right-section .single-list-tree.active',
      ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <script>
      jQuery(document).ready(function ($) {
        function setActiveListItem($item) {
          $('.lists-tree .single-list-tree').removeClass('active');
          $item.addClass('active');
          var bgImage = $item.data('bg-image');
          $('.tree_list-bg').css('background-image', 'url(' + bgImage + ')');
        }

        // Set the first item as active initially
        setActiveListItem($('.lists-tree .single-list-tree').first());

        $('.lists-tree .single-list-tree').on('click', function () {
          setActiveListItem($(this));
        });
      });
    </script>
    <div class="tree_list-container">
      <div class="tree_list-bg"></div>
      <div class="tree_list-right-section">
        <div class="content-container">
          <div class="title text-clip-bg"><?php echo esc_html($settings['title']); ?></div>
          <div class="sub-title"><?php echo esc_html($settings['sub_title']); ?></div>
          <div class="description"><?php echo esc_html($settings['description']); ?></div>
        </div>
        <div class="lists-tree">
          <?php foreach ($settings['list_items'] as $index => $item): ?>
            <?php if ($index > 0): ?>
              <div class="list-separator"></div>
            <?php endif; ?>
            <div class="single-list-tree" data-bg-image="<?php echo esc_url($item['list_item_image']['url']); ?>">
              <?php echo esc_html($item['list_item_title']); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php
  }
}