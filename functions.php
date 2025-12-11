<?php
//Лого сайта
if (!function_exists('testprojectwp_setup')){
    function testprojectwp_setup(){
        //добавляем лого
        add_theme_support( 'custom-logo', [
            'height'      => 50,
            'width'       => 190,
            'flex-width'  => false,
            'flex-height' => false,
            'header-text' => '',
        ] );
        //динамический тэг заголовка
        add_theme_support('title-tag');
        //миниатюры для постов и страниц
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 730, 480, true ); //размер миниатюры поста по умолчанию
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
//Регистрация нескольких областей меню
function testprojectwp_menus()
{
    //сбор несколько зон меню
    $menu = ( [
        'header' => __('header menu', 'testprojectwp'),
        'footer' => __('footer menu', 'testprojectwp'),
    ] );
    //регистрация областей
register_nav_menus( $menu );
}
//хук событие
add_action('init', 'testprojectwp_menus');
//добавим класс nav-item ко всему меню
add_filter('nav_menu_css_class', 'custom_nav_menu_css_class', 10, 1);
//получение списка классов
function custom_nav_menu_css_class($classes){
    //добавление к списку классов свой класс
    $classes[] = 'nav-item';
    //возврат списка классов
    return $classes;
}
//повесить на все ссылки свой класс
add_filter('nav_menu_link_attributes', 'custom_nav_menu_link_attibutes', 10, 1);
function custom_nav_menu_link_attibutes($atts){
    $atts['class'] = 'nav-link';
    return $atts;
}
require_once('wp_files/bs4navwalker.php');
register_nav_menu('top', 'Top menu');

## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );

function delete_intermediate_image_sizes( $sizes ){

    // размеры которые нужно удалить
    return array_diff( $sizes, [
        'medium_large',
        'large',
        '1536x1536',
        '2048x2048',
    ] );
}
// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

// выводим пагинацию
the_posts_pagination( array(
    'end_size' => 2,
) );

function testprojectwp_widgets_init(){
    register_sidebar([
        'name'          => esc_html__('Sidebar-blog', 'testprojectwp'),
        'id'            => "sidebar-blog",
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title mb-3">',
        'after_title'   => '</h5>'
    ]);
}
add_action('widgets_init', 'testprojectwp_widgets_init');


/**
 * Добавление нового виджета Foo_Widget.
 */
class Foo_Widget extends WP_Widget {

    // Регистрация виджета используя основной класс
    function __construct() {
        // вызов конструктора выглядит так:
        // __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
        parent::__construct(
            'foo_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: foo_widget
            'Заголовок виджета',
            array( 'description' => 'Описание виджета', /*'classname' => 'my_widget',*/ )
        );

        // скрипты/стили виджета, только если он активен
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
            add_action('wp_enqueue_scripts', array( $this, 'add_my_widget_scripts' ));
            add_action('wp_head', array( $this, 'add_my_widget_style' ) );
        }
    }

    /**
     * Вывод виджета во Фронт-энде
     *
     * @param array $args     аргументы виджета.
     * @param array $instance сохраненные данные из настроек
     */
    function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        echo __( 'Hello, World!', 'text_domain' );
        echo $args['after_widget'];
    }

    /**
     * Админ-часть виджета
     *
     * @param array $instance сохраненные данные из настроек
     */
    function form( $instance ) {
        $title = @ $instance['title'] ?: 'Заголовок по умолчанию';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    /**
     * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance новые настройки
     * @param array $old_instance предыдущие настройки
     *
     * @return array данные которые будут сохранены
     */
    function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

    // скрипт виджета
    function add_my_widget_scripts() {
        // фильтр чтобы можно было отключить скрипты
        if( ! apply_filters( 'show_my_widget_script', true, $this->id_base ) )
            return;

        $theme_url = get_stylesheet_directory_uri();

        wp_enqueue_script('my_widget_script', $theme_url .'/my_widget_script.js' );
    }

    // стили виджета
    function add_my_widget_style() {
        // фильтр чтобы можно было отключить стили
        if( ! apply_filters( 'show_my_widget_style', true, $this->id_base ) )
            return;
        ?>
        <style type="text/css">
            .my_widget a{ display:inline; }
        </style>
       <?php
    }

}?>