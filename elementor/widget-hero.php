<?php

if (!defined('ABSPATH')) exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

class SC_Hero_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'sc_hero';
    }

    public function get_title()
    {
        return __('Hero Section', 'sc');
    }

    public function get_icon()
    {
        return 'eicon-slider-full-screen';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_hero',
            [
                'label' => __('Hero Content', 'sc'),
            ]
        );

        // ── Background Images ──────────────────────────────────────────
        $this->add_control(
            'background_image',
            [
                'label'   => __('Background Image (Desktop)', 'sc'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'background_image_mobile',
            [
                'label'       => __('Background Image (Mobile)', 'sc'),
                'type'        => Controls_Manager::MEDIA,
            ]
        );
        // ───────────────────────────────────────────────────────────────

        $this->add_control(
            'small_text',
            [
                'label'   => __('Small Text', 'sc'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('We Turn Insights into', 'sc'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'sc'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Tangible <span>Results</span>', 'sc'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label'   => __('Description', 'sc'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __('At Solutions, we blend the legacy...', 'sc'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'   => __('Button Text', 'sc'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Get Free Consultation', 'sc'),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'       => __('Button Link', 'sc'),
                'type'        => Controls_Manager::URL,
                'placeholder' => __('https://example.com', 'sc'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $s = $this->get_settings_for_display();

        $bg_desktop = !empty($s['background_image']['url'])        ? $s['background_image']['url']        : '';
        $bg_mobile  = !empty($s['background_image_mobile']['url']) ? $s['background_image_mobile']['url'] : $bg_desktop;

        $btn_url = !empty($s['button_link']['url']) ? $s['button_link']['url'] : '';

        $widget_id = 'sc-hero-' . $this->get_id();
?>
        <style>
            #<?php echo esc_attr($widget_id); ?> {
                background-image: url('<?php echo esc_url($bg_desktop); ?>');
            }

            @media (max-width: 767px) {
                #<?php echo esc_attr($widget_id); ?> {
                    background-image: url('<?php echo esc_url($bg_mobile); ?>');
                }
            }
        </style>

        <div id="<?php echo esc_attr($widget_id); ?>" class="section_home">
            <div class="container">
                <div class="home_txt">
                    <span class="wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <?php echo wp_kses_post($s['small_text']); ?>
                    </span>

                    <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                        <?php echo wp_kses_post($s['title']); ?>
                    </h1>

                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <?php echo wp_kses_post($s['description']); ?>
                    </p>

                    <?php if ($btn_url) : ?>
                        <a data-wow-delay="0.6s" href="<?php echo esc_url($btn_url); ?>"
                            class="tj-primary-btn wow fadeInUp snipcss-sS22g style-CPhmi" id="style-CPhmi">
                            <span class="btn_inner">
                                <span class="btn_icon">
                                    <span>
                                        <svg width="20px" class="tji-arrow-right tji" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 105.4-105.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                        </svg>
                                        <svg width="20px" class="tji-arrow-right tji" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 105.4-105.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="btn_text">
                                    <span><?php echo esc_html($s['button_text']); ?></span>
                                </span>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
    }
}
