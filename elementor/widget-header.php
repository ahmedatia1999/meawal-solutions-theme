<?php

if (!defined('ABSPATH')) exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class SC_Header_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'sc_header';
    }

    public function get_title()
    {
        return __('Header', 'sc');
    }

    public function get_icon()
    {
        return 'eicon-header';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function _register_controls()
    {

        // Menu select from WordPress menus
        $this->start_controls_section('section_menu', [
            'label' => __('WordPress Menu', 'sc'),
        ]);

        $menus = wp_get_nav_menus();
        $menus_array = [];

        if (!empty($menus)) {
            foreach ($menus as $menu_obj) {
                $menus_array[$menu_obj->term_id] = $menu_obj->name;
            }
        }

        $this->add_control('menu_id', [
            'label' => __('Select Menu', 'sc'),
            'type' => Controls_Manager::SELECT,
            'options' => $menus_array,
            'default' => !empty($menus_array) ? array_key_first($menus_array) : '',
        ]);

        $this->end_controls_section();

        // Logo
        $this->start_controls_section('section_logo', [
            'label' => __('Logo', 'sc'),
        ]);

        $this->add_control('logo', [
            'label' => __('Logo Image', 'sc'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => defined('THEME_URL') ? THEME_URL . '/assets/images/logo.svg' : '',
            ],
        ]);

        $this->end_controls_section();
    }

    protected function build_menu_array($menu_id)
    {
        $menu = [];

        if (!$menu_id) {
            return $menu;
        }

        $items = wp_get_nav_menu_items($menu_id);
        if (empty($items)) {
            return $menu;
        }

        $items_by_id = [];

        // Index items by ID and prepare children array
        foreach ($items as $item) {
            $item->children = [];
            $items_by_id[$item->ID] = $item;
        }

        // Attach children to parents
        foreach ($items as $item) {
            if ($item->menu_item_parent && isset($items_by_id[$item->menu_item_parent])) {
                $items_by_id[$item->menu_item_parent]->children[] = $item;
            }
        }

        // Build flat array of top level items with children as simple arrays
        foreach ($items_by_id as $item) {
            if ((int) $item->menu_item_parent !== 0) {
                continue;
            }

            $children = [];
            if (!empty($item->children)) {
                foreach ($item->children as $child) {
                    $children[] = [
                        'title' => $child->title,
                        'url'   => $child->url,
                    ];
                }
            }

            $menu[] = [
                'title'    => $item->title,
                'url'      => $item->url,
                'children' => $children,
            ];
        }

        return $menu;
    }

    protected function render_menu_list($menu, $is_mobile = false)
    {
?>
        <ul class="main_menu">
            <?php foreach ($menu as $index => $item): ?>
                <?php
                $has_children = !empty($item['children']);
                $li_classes   = [];
                if ($index === 0) {
                    $li_classes[] = 'active';
                }
                if ($has_children) {
                    $li_classes[] = 'dropdown';
                }
                $li_class_attr = !empty($li_classes) ? ' class="' . esc_attr(implode(' ', $li_classes)) . '"' : '';
                ?>
                <li<?php echo $li_class_attr; ?>>
                    <a
                        class="page-scroll<?php echo $has_children ? ' dropdown-toggle' : ''; ?>"
                        href="<?php echo esc_url($item['url']); ?>"
                        <?php echo $has_children ? 'id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false"' : ''; ?>>
                        <?php echo esc_html($item['title']); ?>
                    </a>

                    <?php if ($has_children): ?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($item['children'] as $child): ?>
                                <li>
                                    <a
                                        class="dropdown-item page-scroll"
                                        href="<?php echo esc_url($child['url']); ?>">
                                        <?php echo esc_html($child['title']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    </li>
                <?php endforeach; ?>
        </ul>
    <?php
    }

    protected function render()
    {
        global $wp;
        $s = $this->get_settings_for_display();

        $menu_id = !empty($s['menu_id']) ? (int) $s['menu_id'] : 0;
        $menu    = $this->build_menu_array($menu_id);
        $logo    = !empty($s['logo']['url']) ? $s['logo']['url'] : '';

        $other_lang = 'en';
        $other_lang_label = 'Eng';
        
        if(get_locale() === 'en_US') {
            $other_lang = 'ar';
            $other_lang_label = 'عربي';
        }

        $current_url = home_url(add_query_arg(array(), $wp->request));
        $other_lang_url = add_query_arg('lang', $other_lang, $current_url);

    ?>
        <style>
            .search-popup-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.85);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 99999;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .search-popup-overlay.active {
                display: flex;
                opacity: 1;
            }

            .search-popup-content {
                background: #fff;
                padding: 40px;
                border-radius: 15px;
                width: 90%;
                max-width: 600px;
                position: relative;
                transform: scale(0.9);
                transition: transform 0.3s ease;
            }

            .search-popup-overlay.active .search-popup-content {
                transform: scale(1);
            }

            .search-popup-close {
                position: absolute;
                top: 15px;
                right: 15px;
                background: transparent;
                border: none;
                font-size: 28px;
                color: #666;
                cursor: pointer;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: color 0.3s ease;
            }

            .rtl-style .search-popup-close {
                right: auto;
                left: 15px;
            }

            .search-popup-close:hover {
                color: #2F969E;
            }

            .search-popup-form {
                display: flex;
                gap: 10px;
                margin-top: 20px;
            }

            .search-popup-input {
                flex: 1;
                padding: 15px 20px;
                border: 2px solid #E5E7EB;
                border-radius: 8px;
                font-size: 16px;
                transition: border-color 0.3s ease;
            }

            .search-popup-input:focus {
                outline: none;
                border-color: #2F969E;
            }

            .search-popup-btn {
                padding: 15px 30px;
                background: #2F969E;
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: background 0.3s ease;
            }

            .search-popup-btn:hover {
                background: #26868D;
            }

            .search-popup-title {
                color: #00242A;
                font-size: 24px;
                font-weight: 600;
                margin: 0;
            }

            /* Mobile Styles */
            @media (max-width: 768px) {
                .search-popup-overlay {
                    align-items: flex-start;
                    padding: 0;
                }

                .search-popup-content {
                    width: 100%;
                    max-width: 100%;
                    height: 100vh;
                    border-radius: 0;
                    padding: 20px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    transform: translateY(100%);
                }

                .search-popup-overlay.active .search-popup-content {
                    transform: translateY(0);
                }

                .search-popup-close {
                    top: 20px;
                    right: 20px;
                    font-size: 32px;
                    width: 45px;
                    height: 45px;
                    background: #f5f5f5;
                    border-radius: 50%;
                }

                .rtl-style .search-popup-close {
                    right: auto;
                    left: 20px;
                }

                .search-popup-title {
                    font-size: 28px;
                    text-align: center;
                    margin-bottom: 10px;
                }

                .search-popup-form {
                    flex-direction: column;
                    gap: 15px;
                    margin-top: 30px;
                }

                .search-popup-input {
                    padding: 18px 20px;
                    font-size: 18px;
                    border-radius: 12px;
                }

                .search-popup-btn {
                    padding: 18px 30px;
                    font-size: 18px;
                    border-radius: 12px;
                    width: 100%;
                }
            }

            @media (max-width: 480px) {
                .search-popup-content {
                    padding: 15px;
                }

                .search-popup-title {
                    font-size: 24px;
                }

                .search-popup-input,
                .search-popup-btn {
                    font-size: 16px;
                }
            }
        </style>

        <div>
            <div class="mobile-menu">
                <div class="logo-mobile">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo); ?>" alt="Logo">
                    </a>
                    <div class="is-closed"><i class="fa-solid fa-xmark"></i></div>
                </div>
                <div class="mmenu">
                    <?php $this->render_menu_list($menu, true); ?>
                </div>
            </div>

            <div class="container">

                <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; gap: 16px;">
                    <div class="logo-site">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($logo); ?>" alt="">
                        </a>
                    </div>

                    <?php $this->render_menu_list($menu, false); ?>
                    <div class="meun_ed">
                        <ul>
                            <li>
                                <a href="#" class="page-scroll open-search-popup">
                                    <i class="icon icon-search"></i>
                                </a>
                            </li>
                            <!-- dark mode -->
                             <li class="dark-mode-toggle">
                                <label class="dm-toggle-wrapper">
                                    <input type="checkbox" id="dmSwitch" hidden="">
                                    <div class="dm-toggle"></div>
                                </label>
                            </li>
                            <li class="dropdown">
                                <a href="<?php echo esc_url($other_lang_url); ?>">
                                    <img src="https://solutions.meawal.sa/wp-content/uploads/2025/11/Globe.png" alt="Language" style="width: 20px; height: 20px; margin-inline-end: 5px;">
                                    <?php echo esc_html($other_lang_label); ?>
                                </a>
                            </li>
                            <li class="hamburger">
                                <i class="icon icon-hamburger"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-popup-overlay" id="searchPopup">
            <div class="search-popup-content">
                <button class="search-popup-close" id="closeSearchPopup">&times;</button>
                <h3 class="search-popup-title"><?php echo esc_html__('البحث في الموقع', 'sc'); ?></h3>
                <form class="search-popup-form" id="searchPopupForm" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <input
                        type="text"
                        name="s"
                        class="search-popup-input"
                        placeholder="<?php echo esc_attr__('ابحث هنا...', 'sc'); ?>"
                        required>
                    <button type="submit" class="search-popup-btn">
                        <?php echo esc_html__('بحث', 'sc'); ?>
                    </button>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const openBtn = document.querySelector('.open-search-popup');
                const closeBtn = document.getElementById('closeSearchPopup');
                const popup = document.getElementById('searchPopup');
                const searchInput = popup.querySelector('.search-popup-input');

                openBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    popup.classList.add('active');
                    setTimeout(() => searchInput.focus(), 300);
                });

                closeBtn.addEventListener('click', function() {
                    popup.classList.remove('active');
                });

                popup.addEventListener('click', function(e) {
                    if (e.target === popup) {
                        popup.classList.remove('active');
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && popup.classList.contains('active')) {
                        popup.classList.remove('active');
                    }
                });
            });
        </script>
<?php
    }
}
