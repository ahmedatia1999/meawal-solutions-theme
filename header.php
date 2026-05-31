<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="preload" href="<?php echo THEME_URL;?>/assets/fonts/18-Khebrat-Musamim-Regular.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <?php wp_head(); ?>
    
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <script src="<?php echo THEME_URL;?>/assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>

</head>


<?php

function add_language_class_to_body( $classes ) {
    $current_lang = substr( get_locale(), 0, 2 );

    // Add language class to body
    if( $current_lang == 'ar' ) {
        $classes[] = 'ar'; // Arabic
    } else {
        $classes[] = 'en'; // English or other languages
    }
    
    return $classes;
}
add_filter( 'body_class', 'add_language_class_to_body' );


// if is single project then add transparent header class to body
if (is_singular('project')) {
    add_filter('body_class', function($classes) {
        $classes[] = 'transparent-header';
        return $classes;
    });
}


?>
<body <?php body_class(); ?>>

    <div class="main-wrapper <?php if(substr( get_locale(), 0, 2 ) == 'ar') echo 'rtl-style';?>">
  
    <header id="header">
        <div class="header-inner">
<?php



if(is_front_page()){
    $header_slug = 'header';
} else {
    $header_slug = 'header';
}

$header_query = new WP_Query(array(
    'post_type'         => 'header',
    'posts_per_page'    => 1,
    'name'              => $header_slug,
));

if ($header_query->have_posts()) {
    while ($header_query->have_posts()) : $header_query->the_post();
        the_content();
    endwhile;
    wp_reset_postdata();
}


?>

    </div>
</header>



<?php

function meawal_preloader_code() {

        // Options
        $show_preloader = true; // Set to false to disable preloader
        $show_on_mobile = true; // Set to false to disable preloader on mobile devices
        $show_on_admin = true; // Set to false to disable preloader for logged-in admins
        $show_on_elementor_editor = false; // Set to false to disable preloader in Elementor editor

        // Conditions
        if (!$show_preloader) return;
        if (!$show_on_mobile && wp_is_mobile()) return;
        if (!$show_on_admin && current_user_can('manage_options')) return;
        if( class_exists('\Elementor\Plugin') && !$show_on_elementor_editor && \Elementor\Plugin::instance()->editor->is_edit_mode()) return;

        ?>
        <style>
            /* Preloader Wrapper */
            #meawal-preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: white;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 999999;
            }

            /* Logo with pulse effect */
            #meawal-preloader img {
                width: 120px;
                height: auto;
                animation: pulse 1.6s infinite ease-in-out;
            }

            @keyframes pulse {
                0% { transform: scale(1); opacity: 1; }
                50% { transform: scale(1.15); opacity: 0.9; }
                100% { transform: scale(1); opacity: 1; }
            }

            /* Hide preloader after load */
            body.loaded #meawal-preloader {
                opacity: 0;
                visibility: hidden;
                transition: opacity .4s ease, visibility .4s ease;
            }
        </style>

        <div id="meawal-preloader">
            <img src="<?php echo THEME_URL; ?>/assets/images/logo.png" alt="Loading">
        </div>

        <script>
            // Remove preloader when page fully loads
            window.addEventListener('load', function() {
                document.body.classList.add('loaded');
            });
        </script>
        <?php
    }

    meawal_preloader_code();

?>


<div id="content">
