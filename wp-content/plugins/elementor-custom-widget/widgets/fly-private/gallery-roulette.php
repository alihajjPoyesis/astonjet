<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_gallery_roulette_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'gallery_roulette';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('gallery_roulette', 'custom-widget');
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
    // Content Section
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
      'subtitle',
      [
        'label' => esc_html__('Subtitle', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Subtitle', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'description',
      [
        'label' => esc_html__('Description', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Description', 'custom-widget'),
        'show_label' => false,
      ]
    );

    $repeater->add_control(
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
      'gallery_items',
      [
        'label' => esc_html__('Gallery Items', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'title' => esc_html__('Title #1', 'custom-widget'),
            'subtitle' => esc_html__('Subtitle #1', 'custom-widget'),
            'description' => esc_html__('Description #1', 'custom-widget'),
          ],
          [
            'title' => esc_html__('Title #2', 'custom-widget'),
            'subtitle' => esc_html__('Subtitle #2', 'custom-widget'),
            'description' => esc_html__('Description #2', 'custom-widget'),
          ],
        ],
        'title_field' => '{{{ title }}}',
      ]
    );

    $this->end_controls_section();

    // Typography and color section
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
          '{{WRAPPER}} .gallery-text-content .title' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'subtitle_color',
      [
        'label' => esc_html__('Subtitle Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .gallery-text-content .subtitle' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'description_color',
      [
        'label' => esc_html__('Description Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .gallery-text-content .desc' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Title Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .gallery-text-content .title',
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'subtitle_typography',
        'label' => esc_html__('Subtitle Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .gallery-text-content .subtitle',
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'label' => esc_html__('Description Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .gallery-text-content .desc',
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

    if (!empty($settings['gallery_items'])) {
      ?>
      <div class="gallery-roulette">
        <div id="gallery-text-content-container">
          <div class="gallery-text-content">
            <div class="title text-clip-bg"><?php echo esc_html($settings['gallery_items'][0]['title']); ?></div>
            <div class="subtitle"><?php echo esc_html($settings['gallery_items'][0]['subtitle']); ?></div>
            <div class="desc"><?php echo esc_html($settings['gallery_items'][0]['description']); ?></div>
          </div>
          <div class="gallery-numbering hide-on-1100">
            <?php foreach ($settings['gallery_items'] as $index => $item): ?>
              <div class="gallery-number <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
                <svg class="default-white-circle" width="15" height="15" viewBox="0 0 15 15" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.5" y="0.5" width="14" height="14" rx="7" stroke="#00BFF1" />
                </svg>
                <svg class="active-white-circle" width="15" height="15" viewBox="0 0 15 15" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <rect x="0.5" y="0.5" width="14" height="14" rx="7" stroke="#00BFF1" />
                  <circle cx="7.5" cy="7.5" r="2.5" fill="#00BFF1" />
                </svg>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="gallery-images owl-carousel">
          <?php foreach ($settings['gallery_items'] as $index => $item): ?>
            <div class="item" data-index="<?php echo $index; ?>">
              <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="gallery-numbering hide-before-1100">
        <?php foreach ($settings['gallery_items'] as $index => $item): ?>
          <div class="gallery-number <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
            <svg class="default-white-circle" width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <rect x="0.5" y="0.5" width="14" height="14" rx="7" stroke="#00BFF1" />
            </svg>
            <svg class="active-white-circle" width="15" height="15" viewBox="0 0 15 15" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <rect x="0.5" y="0.5" width="14" height="14" rx="7" stroke="#00BFF1" />
              <circle cx="7.5" cy="7.5" r="2.5" fill="#00BFF1" />
            </svg>
          </div>
        <?php endforeach; ?>
      </div>
      <script>
        jQuery(document).ready(function ($) {
          var items = <?php echo json_encode($settings['gallery_items']); ?>;
          var totalItems = items.length;

          // Initialize Owl Carousel
          var $galleryImages = $('.gallery-images').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            items: 2.5,
            margin: 10,
            center: false,
            autoplay: false,
            mouseDrag: false,
            touchDrag: false,
            smartSpeed: 5000,
            responsive: {
              0: {
                items: 1,
                center: true,
                margin: 10,
                stagePadding: 50
              },
              500: {
                items: 3,
                margin: 10,
                center: true,
              },
              1100: {
                items: 2.5,
                center: false,
                margin: 10
              }
            },
            onChanged: function (event) {
              var index = event.item.index - event.relatedTarget._clones.length / 2;
              index = index % totalItems;
              if (index < 0) {
                index = totalItems + index;
              }
              updateContent(index);
            }
          });
          // Add click event to the images in the carousel
          $('.gallery-images .item').on('click', function () {
            var index = $(this).data('index');
            $galleryImages.trigger('to.owl.carousel', [index, 1500]);
            updateContent(index);
          });
          function updateContent(index) {
            var item = items[index % totalItems];

            $('#gallery-text-content-container .title').text(item.title);
            $('#gallery-text-content-container .subtitle').text(item.subtitle);
            $('#gallery-text-content-container .desc').text(item.description);

            // Update the active state of the SVGs
            $('.gallery-number').removeClass('active');
            $('.gallery-number[data-index="' + (index % totalItems) + '"]').addClass('active');

            // Update the custom class for the first active item
            $('.owl-item').removeClass('first-active');
            $('.owl-item.active').first().addClass('first-active');
          }

          // Initial setup
          $('.gallery-number').on('click', function () {
            var index = $(this).data('index');
            $galleryImages.trigger('to.owl.carousel', [index, 300]);
            updateContent(index);
          });

          // Update positions on window resize
          $(window).resize(function () {
            $galleryImages.trigger('refresh.owl.carousel');
          });

          // Add the custom class to the first active item initially
          $('.owl-item.active').first().addClass('first-active');
        });
      </script>
      <?php
    }
  }
}
