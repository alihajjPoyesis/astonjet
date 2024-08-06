<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_time_roulette_Widget extends \Elementor\Widget_Base
{
  // Slot name
  public function get_name()
  {
    return 'time_roulette';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('time_roulette', 'custom-widget');
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

    // Repeater for times
    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'time',
      [
        'label' => esc_html__('Time', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('8:00AM', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'text',
      [
        'label' => esc_html__('Text', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Online flight request', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'image',
      [
        'label' => esc_html__('Image', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'times',
      [
        'label' => esc_html__('Times', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'time' => esc_html__('8:00AM', 'custom-widget'),
            'text' => esc_html__('Online flight request', 'custom-widget'),
            'image' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
          ],
        ],
        'title_field' => '{{{ time }}} - {{{ text }}}',
      ]
    );

    // Controls for time_roulette-right-section content
    $this->add_control(
      'title',
      [
        'label' => esc_html__('Title', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Time Efficiency', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'sub_title',
      [
        'label' => esc_html__('Sub Title', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__('Maximize your productivity', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'description',
      [
        'label' => esc_html__('Description', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => esc_html__('Private flying means no long security lines, no waiting at the gate, and no layovers. Board minutes before departure and arrive just as efficiently. Spend less time in transit and more time where it matters most – at your destination or with your loved ones.', 'custom-widget'),
        'label_block' => true,
      ]
    );

    $this->end_controls_section();

    // Style Section
    $this->start_controls_section(
      'style_section',
      [
        'label' => esc_html__('Style', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'active_time_color',
      [
        'label' => esc_html__('Active Time Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .time-entry.active .time' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'active_time_typography',
        'label' => esc_html__('Active Time Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .time-entry.active .time',
      ]
    );

    $this->add_control(
      'non_active_time_color',
      [
        'label' => esc_html__('Non-Active Time Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .time-entry:not(.active) .time' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'non_active_time_typography',
        'label' => esc_html__('Non-Active Time Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .time-entry:not(.active) .time',
      ]
    );

    $this->add_control(
      'active_text_color',
      [
        'label' => esc_html__('Active Text Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .time-entry.active .text' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'active_text_typography',
        'label' => esc_html__('Active Text Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .time-entry.active .text',
      ]
    );

    $this->add_control(
      'non_active_text_color',
      [
        'label' => esc_html__('Non-Active Text Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .time-entry:not(.active) .text' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'non_active_text_typography',
        'label' => esc_html__('Non-Active Text Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .time-entry:not(.active) .text',
      ]
    );
    // Add these controls inside the register_controls() method in the appropriate section
    $this->add_control(
      'title_color',
      [
        'label' => esc_html__('Title Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .time_roulette-right-section .title' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => esc_html__('Title Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .time_roulette-right-section .title',
      ]
    );

    $this->add_control(
      'sub_title_color',
      [
        'label' => esc_html__('Sub Title Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .time_roulette-right-section .sub-title' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'sub_title_typography',
        'label' => esc_html__('Sub Title Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .time_roulette-right-section .sub-title',
      ]
    );

    $this->add_control(
      'description_color',
      [
        'label' => esc_html__('Description Color', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .time_roulette-right-section .description' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'label' => esc_html__('Description Typography', 'custom-widget'),
        'selector' => '{{WRAPPER}} .time_roulette-right-section .description',
      ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $times = $settings['times'];
    ?>
    <style>

    </style>
    <div class="time_roulette-main-container">
      <div class="time-image bg-img-changer"></div>
      <div class="time_roulette-right-section">
        <div class="title text-clip-bg"><?php echo esc_html($settings['title']); ?></div>
        <div class="sub-title"><?php echo esc_html($settings['sub_title']); ?></div>
        <div class="description"><?php echo esc_html($settings['description']); ?></div>
      </div>
      <div id="time-list">
        <?php foreach ($times as $index => $entry) { ?>
          <div class="time-entry" data-index="<?php echo $index; ?>">
            <div class="time"><?php echo esc_html($entry["time"]); ?></div>
            <div class="text"><?php echo esc_html($entry["text"]); ?></div>
          </div>
        <?php } ?>
      </div>
    </div>
    <script>
      jQuery(document).ready(function ($) {
        let times = <?php echo json_encode($times); ?>;
        let activeIndex = 0;

        function updateTimes(direction) {
          // Remove existing classes
          $('.time-entry').removeClass('active next previous active-to-prev active-to-next prev-to-active next-to-active show-next show-prev next-out prev-out');

          // Add classes based on the current active index
          $('.time-entry').each(function () {
            let index = $(this).data('index');
            if (index === activeIndex) {
              $(this).addClass('active');
            } else if (index === activeIndex - 1) {
              $(this).addClass('previous');
            } else if (index === activeIndex + 1) {
              $(this).addClass('next');
            } else {
              $(this).addClass('hidden');
            }
          });
          $('.time-image').css('background-image', `url("${times[activeIndex].image.url}")`);

          if (direction === 'next') {
            $('.time-entry.active').addClass('next-to-active');
            $('.time-entry.previous').addClass('active-to-prev');
            $('.time-entry.next').addClass('show-next');
          } else if (direction === 'prev') {
            $('.time-entry.active').addClass('prev-to-active');
            $('.time-entry.next').addClass('active-to-next');
            $('.time-entry.previous').addClass('show-prev');
          }
        }

        $(document).on('click', '.time-entry', function () {
          let clickedIndex = $(this).data('index');
          let direction = clickedIndex > activeIndex ? 'next' : 'prev';

          if (clickedIndex !== activeIndex) {
            activeIndex = clickedIndex;
            updateTimes(direction);
          }
        });

        updateTimes();
      });
    </script>
    <?php
  }
}
