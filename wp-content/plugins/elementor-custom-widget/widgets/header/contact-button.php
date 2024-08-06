<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_Contact_Button_Widget extends \Elementor\Widget_Base {

  // slot name
  public function get_name() {
      return 'contact_button';
  }

  // widget title
  public function get_title() {
      return esc_html__('Header Contact Button', 'custom-widget');
  }

  // widget icon
  public function get_icon() {
      return 'eicon-wordpress';
  }

  // widget category
  public function get_categories() {
      return ['general'];
  }

  // widget controls
  protected function register_controls() {

      $this->start_controls_section(
          'content_section',
          [
              'label' => esc_html__('Content', 'custom-widget'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
          ]
      );

      $this->add_control(
          'button_text',
          [
              'label' => esc_html__('Button Text', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('CONTACT', 'custom-widget'),
          ]
      );

      $this->add_control(
          'europe_title',
          [
              'label' => esc_html__('Europe Title', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('EUROPE', 'custom-widget'),
          ]
      );

      $this->add_control(
          'europe_whatsapp',
          [
              'label' => esc_html__('Europe Whatsapp', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('Whatsapp', 'custom-widget'),
          ]
      );

      $this->add_control(
          'europe_phone_number',
          [
              'label' => esc_html__('Europe Phone Number', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('+33 1 39 56 99 33', 'custom-widget'),
          ]
      );

      $this->add_control(
          'europe_email',
          [
              'label' => esc_html__('Europe Email', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('ccr@astonjet.com', 'custom-widget'),
          ]
      );

      $this->add_control(
          'middle_east_africa_title',
          [
              'label' => esc_html__('Middle East & Africa Title', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('Middle East & Africa', 'custom-widget'),
          ]
      );

      $this->add_control(
          'middle_east_africa_phone_number',
          [
              'label' => esc_html__('Middle East & Africa Phone Number', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('+971 67 45 56 76', 'custom-widget'),
          ]
      );

      $this->add_control(
          'middle_east_africa_email',
          [
              'label' => esc_html__('Middle East & Africa Email', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('ccr@astonjet.com', 'custom-widget'),
          ]
      );

      $this->add_control(
          'asia_title',
          [
              'label' => esc_html__('Asia Title', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('Asia', 'custom-widget'),
          ]
      );

      $this->add_control(
          'asia_phone_number',
          [
              'label' => esc_html__('Asia Phone Number', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('+60 65 54 65 67', 'custom-widget'),
          ]
      );

      $this->add_control(
          'asia_email',
          [
              'label' => esc_html__('Asia Email', 'custom-widget'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => esc_html__('ccr@astonjet.com', 'custom-widget'),
          ]
      );

      $this->end_controls_section();
  }

  // render frontend
  protected function render() {
      $settings = $this->get_settings_for_display();
      ?>
      <div class="header_contact_button_wrap flex flex-row align-i-center justify-between">
          <div class="header_contact_button">
              <span><?php echo esc_html($settings['button_text']); ?></span>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_down.svg" alt="Down Arrow" />
          </div>
          <div class="header_contact_content">
              <div class="px-15">
                  <div class="mb-5"><?php echo esc_html($settings['europe_title']); ?></div>
                  <div class="flex flex-col gap-5">
                      <div class="flex flex-row align-i-center">
                          <img style="margin-right:8px" src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" alt="whatsapp" />
                          <a><?php echo esc_html($settings['europe_whatsapp']); ?></a>
                      </div>
                      <div class="flex flex-row align-i-center">
                          <img style="margin-right:8px" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="phone" />
                          <a href="tel:<?php echo esc_html($settings['europe_phone_number']); ?>"><?php echo esc_html($settings['europe_phone_number']); ?></a>
                      </div>
                      <div class="flex flex-row align-i-center">
                          <img style="margin-right:8px" src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt="mail" />
                          <a href="mailto:<?php echo esc_html($settings['europe_email']); ?>"><?php echo esc_html($settings['europe_email']); ?></a>
                      </div>
                  </div>
              </div>

              <div class="white-spacer"></div>

              <div class="px-15">
                  <div class="mb-5"><?php echo esc_html($settings['middle_east_africa_title']); ?></div>
                  <div class="flex flex-col gap-5">
                      <div class="flex flex-row align-i-center">
                          <img style="margin-right:8px" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="phone" />
                          <a href="tel:<?php echo esc_html($settings['middle_east_africa_phone_number']); ?>"><?php echo esc_html($settings['middle_east_africa_phone_number']); ?></a>
                      </div>
                      <div class="flex flex-row align-i-center">
                          <img style="margin-right:8px" src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt="mail" />
                          <a href="mailto:<?php echo esc_html($settings['middle_east_africa_email']); ?>"><?php echo esc_html($settings['middle_east_africa_email']); ?></a>
                      </div>
                  </div>
              </div>

              <div class="white-spacer"></div>

              <div class="px-15">
                  <div class="mb-5"><?php echo esc_html($settings['asia_title']); ?></div>
                  <div class="flex flex-col gap-5">
                      <div class="flex flex-row">
                          <img style="margin-right:8px" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="phone" />
                          <a href="tel:<?php echo esc_html($settings['asia_phone_number']); ?>"><?php echo esc_html($settings['asia_phone_number']); ?></a>
                      </div>
                      <div class="flex flex-row">
                          <img style="margin-right:8px" src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt="mail" />
                          <a href="mailto:<?php echo esc_html($settings['asia_email']); ?>"><?php echo esc_html($settings['asia_email']); ?></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php
  }
}

