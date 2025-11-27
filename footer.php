<?php
/*
 * Подключение стилей
 */


// Подключение стилей и скриптов
add_action('wp_enqueue_scripts', 'test-project-wp_scripts');
function test_scripts()
{
    // Основной style.css темы
    wp_enqueue_style(
        'test-style',
        get_stylesheet_uri()
    );

    // Bootstrap
    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css',
        [],
        null
    );

    // Bootstrap Icons
    wp_enqueue_style(
        'bootstrap-icons',
        get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css',
        [],
        null
    );

    // AOS animations
    wp_enqueue_style(
        'aos',
        get_template_directory_uri() . '/assets/vendor/aos/aos.css',
        [],
        null
    );

    // Основной main.css
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        ['bootstrap'], // можно указать зависимости
        null
    );

    // Если нужен JS пример:
    // wp_enqueue_script(
    //     'example-script',
    //     get_template_directory_uri() . '/js/example.js',
    //     [],
    //     '1.0.0',
    //     true
    // );
}
