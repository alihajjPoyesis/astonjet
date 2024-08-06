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
    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Content', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    $this->end_controls_section();
  }

  protected function render()
  {
    $times = [
      ["time" => "8:00AM", "text" => "Online flight request", "image" => "url-to-image-1.jpg"],
      ["time" => "8:15AM", "text" => "Flight Confirmation", "image" => "url-to-image-2.jpg"],
      ["time" => "8:30AM", "text" => "Luggage Check-in", "image" => "url-to-image-3.jpg"],
      ["time" => "8:45AM", "text" => "Boarding", "image" => "url-to-image-4.jpg"],
      ["time" => "9:00AM", "text" => "Takeoff", "image" => "url-to-image-5.jpg"],
    ];
    ?>
    <style>
      #time-list {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 70%;
      }

      .time-entry {
        cursor: pointer;
        position: absolute;
        opacity: 0;
        animation: fadeIn 5s forwards;
      }

      .time-entry.active .time::before {
        opacity: 1;
      }

      .time-entry .time::before {
        content: "";
        display: block;
        width: 20px;
        height: 20px;
        background-image: url("https://poyesisdemo.fr/astonjet/wp-content/uploads/2024/08/9ff488ef0aee8292a7980cb531486062-scaled.webp");
        background-size: cover;
        border-radius: 50%;
        position: absolute;
        top: 40%;
        left: -44px;
        transform: translateY(-50%);
        opacity: 0.5;
      }

      .time-entry .time {
        font-size: 70px;
      }

      .active {
        font-weight: bold;
        color: red;
      }

      .previous {
        color: gray;
      }

      .next {
        color: blue;
      }

      .time_roulette-main-container {
        height: 100vh;
      }

      .bg-img-changer {
        background-image: url('http://localhost/astonjet/wp-content/uploads/2024/08/Rectangle-162.webp');
        background-size: cover;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }

      .time-entry.active {
        left: 145px;
        top: 50%;
        transform: translateY(-50%);
      }

      .time-entry.next {
        left: 115px;
        transform: rotate(30deg);
        bottom: 0;
      }

      .time-entry.previous {
        left: 115px;
        transform: rotate(-30deg);
        top: 0;
      }
/* active-to-prev  */
      @keyframes active-to-prev {
        0% {
          opacity: 0.5;
        }

        100% {
          opacity: 1;
        }
      }
    </style>
    <div class="time_roulette-main-container">
      <div class="time-image bg-img-changer"></div>
      <div id="time-list">
        <?php foreach ($times as $index => $entry) { ?>
          <div class="time-entry" data-index="<?php echo $index; ?>">
            <div class="time"><?php echo $entry["time"]; ?></div>
            <div class="text"><?php echo $entry["text"]; ?></div>
          </div>
        <?php } ?>
      </div>
    </div>
    <script>
      jQuery(document).ready(function ($) {
        let times = <?php echo json_encode($times); ?>;
        let activeIndex = 0;

        function updateTimes() {
          $('#time-list').empty();
          for (let i = 0; i < times.length; i++) {
            let entryClass = 'time-entry';
            if (i === activeIndex) {
              entryClass += ' active';
              $('#time-list').append(`
                                                <div class="${entryClass}" data-index="${i}">
                                                    <div class="time">${times[i].time}</div>
                                                    <div class="text">${times[i].text}</div>
                                                </div>
                                            `);
            } else if (i === activeIndex - 1) {
              entryClass += ' previous';
              $('#time-list').append(`
                                                <div class="${entryClass}" data-index="${i}">
                                                    <div class="time">${times[i].time}</div>
                                                    <div class="text">${times[i].text}</div>
                                                </div>
                                            `);
            } else if (i === activeIndex + 1) {
              entryClass += ' next';
              $('#time-list').append(`
                                                <div class="${entryClass}" data-index="${i}">
                                                    <div class="time">${times[i].time}</div>
                                                    <div class="text">${times[i].text}</div>
                                                </div>
                                            `);
            }
          }

          $('.time-image').attr('background-image', `url("${times[activeIndex].image}")`);
        }

        $(document).on('click', '.time-entry', function () {
          let clickedIndex = $(this).data('index');
          if (clickedIndex !== activeIndex) {
            activeIndex = clickedIndex;
            updateTimes();
          }
        });

        updateTimes();
      });
    </script>
    <?php
  }
}
