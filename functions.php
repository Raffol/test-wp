<?php
//Лого сайта
if (!function_exists('testprojectwp_setup')){
    function testprojectwp_setup(){
        add_theme_support( 'custom-logo', [
            'height'      => 50,
            'width'       => 190,
            'flex-width'  => false,
            'flex-height' => false,
            'header-text' => '',
        ] );
    }
    add_action('wp_enqueue_scripts', 'testprojectwp_script');

}
// Подключение стилей темы
add_action('wp_enqueue_scripts', 'testprojectwp_script');
function testprojectwp_script()
{
    // Подключаем Bootstrap
    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.css',
        [],
        null
    );

    // Flaticon
    wp_enqueue_style(
        'flaticon',
        get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css',
        [],
        null
    );

    // Font Awesome (all.css)
    wp_enqueue_style(
        'fontawesome-all',
        get_template_directory_uri() . '/assets/css/all.css',
        [],
        null
    );

    // Icofont
    wp_enqueue_style(
        'icofont',
        get_template_directory_uri() . '/assets/css/icofont.css',
        [],
        null
    );

    // Animate.css
    wp_enqueue_style(
        'animate',
        get_template_directory_uri() . '/assets/css/animate.min.css',
        [],
        null
    );

    // Основной style.css шаблона
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        filemtime(get_template_directory() . '/assets/css/style.css') // чтобы обновлялось без кеша
    );

    // Responsive
    wp_enqueue_style(
        'responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        [], // зависит от основного
        null
    );

    // style.css из корня темы – WP стандарт
    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri()
    );
    //Подключение JS
    wp_enqueue_script('jquery');

    // contact.js
    wp_enqueue_script(
        'contact',
        get_template_directory_uri() . '/assets/js/contact.js',
        ['jquery'],
        null,
        true
    );

    // Popper
    wp_enqueue_script(
        'popper',
        get_template_directory_uri() . '/assets/bootstrap/js/popper.min.js',
        [],
        null,
        true
    );

    // Bootstrap
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js',
        ['jquery', 'popper'],
        null,
        true
    );

    // Waypoints
    wp_enqueue_script(
        'waypoints',
        get_template_directory_uri() . '/assets/js/jquery.waypoints.js',
        ['jquery'],
        null,
        true
    );

    // CounterUp
    wp_enqueue_script(
        'counterup',
        get_template_directory_uri() . '/assets/js/jquery.counterup.min.js',
        ['jquery', 'waypoints'],
        null,
        true
    );

    // jQuery easing
    wp_enqueue_script(
        'easing',
        get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js',
        ['jquery'],
        null,
        true
    );

    // WOW.js
    wp_enqueue_script(
        'wow',
        get_template_directory_uri() . '/assets/js/wow.min.js',
        [],
        null,
        true
    );

    // custom.js (твой основной скрипт)
    wp_enqueue_script(
        'custom-js',
        get_template_directory_uri() . '/assets/js/custom.js',
        ['jquery', 'bootstrap'],
        filemtime( get_template_directory() . '/assets/js/custom.js' ),
        true
    );
}
