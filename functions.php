<?php
//Подключение стилей

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
}
