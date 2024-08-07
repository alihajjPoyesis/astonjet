<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

class Elementor_Airplane_Table_Widget extends \Elementor\Widget_Base
{

  // Slot name
  public function get_name()
  {
    return 'airplane_table';
  }

  // Widget title
  public function get_title()
  {
    return esc_html__('Airplane Table', 'custom-widget');
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
        'label' => __('Content', 'custom-widget'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'engine_1',
      [
        'label' => __('Engine 1', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('1530 x 76', 'custom-widget'),
      ]
    );

    $this->add_control(
      'engine_2',
      [
        'label' => __('Engine 2', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('1530 x 76', 'custom-widget'),
      ]
    );

    $this->add_control(
      'engine_3',
      [
        'label' => __('Engine 3', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('1530 x 76', 'custom-widget'),
      ]
    );

    $this->add_control(
      'apu',
      [
        'label' => __('APU', 'custom-widget'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('WILLIAMS', 'custom-widget'),
      ]
    );

    // Add controls for other fields here...

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    ?>
    <div class="airplane_table">
      <table>
        <tr class="first_row">
          <th class="text-left border-left">ENGINES</th>
          <th>ENGINE 1</th>
          <th>ENGINE 2</th>
          <th>ENGINE 3</th>
          <th class="border-right">APU</th>
        </tr>
        <tr>
          <td class="text-left">Manufacturer</td>
          <td>WILLIAMS</td>
          <td></td>
          <td></td>
          <td><?php echo esc_html($settings['apu']); ?></td>
        </tr>
        <tr>
          <td class="text-left">Model</td>
          <td>FJ44-4A</td>
          <td>FJ44-4A</td>
          <td>FJ44-4A</td>
          <td>FJ44-4A</td>
        </tr>
        <tr>
          <td class="text-left">Serial Number</td>
          <td>211389</td>
          <td>211389</td>
          <td>211389</td>
          <td>211389</td>
        </tr>
        <tr>
          <td class="text-left">Total Hours Since New</td>
          <td>1,909</td>
          <td>1,909</td>
          <td>1,909</td>
          <td>1,909</td>
        </tr>
        <tr>
          <td class="text-left">Total Cycles Since New</td>
          <td>1,665</td>
          <td>1,665</td>
          <td>1,665</td>
          <td>1,665</td>
        </tr>
        <tr>
          <td class="text-left">Engine Program Coverage</td>
          <td>TOP ADVANTAGE ELITE</td>
          <td>TOP ADVANTAGE ELITE</td>
          <td>TOP ADVANTAGE ELITE</td>
          <td>TOP ADVANTAGE ELITE</td>
        </tr>
      </table>

      <table>
        <tr class="first_row">
          <th class="text-left border-left">Airframe program</th>
          <th class="border-right"></th>
        </tr>
        <tr>
          <td class="text-left">Parts Program</td>
          <td>FALCONCARE</td>
        </tr>
        <tr>
          <td class="text-left">Labor Program</td>
          <td>FALCONCARE</td>
        </tr>
      </table>

      <table>
        <tr class="first_row">
          <th class="text-left border-left">CONNECTIVITY</th>
          <th class="border-right"></th>
        </tr>
        <tr>
          <td class="text-left">Internet Access</td>
          <td>STARLINK</td>
        </tr>
        <tr>
          <td class="text-left">Phone System</td>
          <td>SATCOM</td>
        </tr>
      </table>

    </div>
    <?php
  }
}
