<?php

if (!defined('ABSPATH')) exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class SC_Footer_Widget extends Widget_Base {

    public function get_name() {
        return 'sc_footer';
    }

    public function get_title() {
        return __('Footer', 'sc');
    }

    public function get_icon() {
        return 'eicon-footer';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {

        // Logo
        $this->start_controls_section(
            'section_logo',
            [
                'label' => __('Logo & Social', 'sc'),
            ]
        );

        $this->add_control(
            'footer_logo',
            [
                'label' => __('Footer Logo', 'sc'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $social_repeater = new Repeater();

        $social_repeater->add_control(
            'social_icon',
            [
                'label' => __('Social Icon Class', 'sc'),
                'type' => Controls_Manager::TEXT,
                'default' => 'fa-brands fa-facebook-f',
            ]
        );

        $social_repeater->add_control(
            'social_link',
            [
                'label' => __('Social Link', 'sc'),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'social_media',
            [
                'label' => __('Social Media', 'sc'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $social_repeater->get_controls(),
                'title_field' => '{{{ social_icon }}}',
            ]
        );

        $this->end_controls_section();

        // Quick Links
        $this->start_controls_section(
            'section_quick_links',
            [
                'label' => __('Quick Links', 'sc'),
            ]
        );

        $links_repeater = new Repeater();

        $links_repeater->add_control(
            'link_label',
            [
                'label' => __('Label', 'sc'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $links_repeater->add_control(
            'link_url',
            [
                'label' => __('URL', 'sc'),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'quick_links',
            [
                'label' => __('Links', 'sc'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $links_repeater->get_controls(),
                'title_field' => '{{{ link_label }}}',
            ]
        );

        $this->end_controls_section();

        // Trusted Partner
        $this->start_controls_section(
            'section_trusted_partner',
            [
                'label' => __('Policy Links', 'sc'),
            ]
        );

        $trusted_repeater = new Repeater();

        $trusted_repeater->add_control(
            'trusted_label',
            [
                'label' => __('Label', 'sc'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $trusted_repeater->add_control(
            'trusted_url',
            [
                'label' => __('URL', 'sc'),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'trusted_links',
            [
                'label' => __('Trusted Partner Links', 'sc'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $trusted_repeater->get_controls(),
                'title_field' => '{{{ trusted_label }}}',
            ]
        );

        $this->end_controls_section();

        // Contact Info
        $this->start_controls_section(
            'section_contact',
            [
                'label' => __('Contact Info', 'sc'),
            ]
        );

        $contact_repeater = new Repeater();

        $contact_repeater->add_control(
            'contact_icon',
            [
                'label' => __('Icon Class', 'sc'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $contact_repeater->add_control(
            'contact_text',
            [
                'label' => __('Text', 'sc'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $contact_repeater->add_control(
            'contact_link',
            [
                'label' => __('Link (Optional)', 'sc'),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'contact_items',
            [
                'label' => __('Contact Info', 'sc'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $contact_repeater->get_controls(),
                'title_field' => '{{{ contact_text }}}',
            ]
        );

        $this->end_controls_section();

        // Bottom Text
        $this->start_controls_section(
            'section_bottom',
            [
                'label' => __('Bottom Text', 'sc'),
            ]
        );

        $this->add_control(
            'bottom_text',
            [
                'label' => __('Copyright Text', 'sc'),
                'type' => Controls_Manager::TEXT,
                'default' => '©2025 Solutions Consultancy. All rights reserved',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        // check if is editor mode
        $is_editor = \Elementor\Plugin::$instance->editor->is_edit_mode();
        ?>

        <footer id="footer">
            <div class="container">
                <div class="top-footer">
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="cont-ft <?php if (!$is_editor) echo 'wow fadeInUp'; ?>">
                                <figure class="logo-ft">
                                    <img src="<?php echo esc_url($s['footer_logo']['url']); ?>" alt="Logo" class="img-fluid">
                                </figure>

                                <ul class="social-media">
                                    <?php foreach ($s['social_media'] as $sm): ?>
                                        <li>
                                            <a href="<?php echo esc_url($sm['social_link']['url']); ?>">
                                                <i class="<?php echo esc_attr($sm['social_icon']); ?>"></i>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="menu-ft <?php if (!$is_editor) echo 'wow fadeInUp'; ?>">
                                <h5>تواصل معنا</h5>
                                <ul class="list-contact">
                                    <?php foreach ($s['contact_items'] as $ci): ?>
                                        <li>
                                            <a href="<?php echo esc_url($ci['contact_link']['url']); ?>">
                                                <span><i class="footer-icon <?php echo esc_attr($ci['contact_icon']); ?>"></i></span>
                                                <?php echo $ci['contact_text']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-6">
                            <div class="menu-ft <?php if (!$is_editor) echo 'wow fadeInUp'; ?>">
                                <h5>روابط سريعة</h5>
                                <ul class="li-ft">
                                    <?php foreach ($s['quick_links'] as $ql): ?>
                                        <li><a href="<?php echo esc_url($ql['link_url']['url']); ?>"><?php echo $ql['link_label']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-6">
                            <div class="menu-ft <?php if (!$is_editor) echo 'wow fadeInUp'; ?>">
                                <h5>سياسة الموقع</h5>
                                <ul class="li-ft">
                                    <?php foreach ($s['trusted_links'] as $tl): ?>
                                        <li><a href="<?php echo esc_url($tl['trusted_url']['url']); ?>"><?php echo $tl['trusted_label']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bottom-ft">
                    <div class="cont-bt <?php if (!$is_editor) echo 'wow fadeInUp'; ?>">
                        <p><?php echo $s['bottom_text']; ?></p>
                    </div>
                </div>

            </div>
        </footer>

        <?php
    }
}
