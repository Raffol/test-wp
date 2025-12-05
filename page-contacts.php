<?php
/*
Template Name: Мой шаблон страницы Контактная информация
Template Post Type: post, page, product, contacts
*/

 get_header();?>
<!--MAIN BANNER AREA START -->
<div class="banner-area banner-3">
    <div class="overlay dark-overlay"></div>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                        <div class="banner-content content-padding">
                            <h5 class="subtitle"><?php echo get_post_meta( $post->ID, 'subtitle', true );?></h5>
                            <h1 class="banner-title"><?php echo get_post_meta( $post->ID, 'banner-title', true );?></h1>
                            <p>We provide marketing services to startups and small businesses to looking for a partner for their digital media, design-area.We are a a startup company to be commited to work and time management.</p>

                            <a href="#" class="btn btn-white btn-circled">lets start</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MAIN HEADER AREA END -->
<?php the_content();?>
<!-- HTML для вставки на страницу -->
<div id="map-yandex" style="width: 100%; height: 400px;"></div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=ваш_api_ключ"></script>
<script>
    ymaps.ready(function() {
        var map = new ymaps.Map("map-yandex", {
            center: [52.275140, 104.281137], // Координаты ИРНИТУ
            zoom: 16
        });

        var marker = new ymaps.Placemark([52.275140, 104.281137], {
            balloonContent: 'Иркутский национальный исследовательский технический университет (ИРНИТУ)'
        }, {
            preset: 'islands#blueEducationIcon'
        });

        map.geoObjects.add(marker);
        map.controls.remove('geolocationControl');
        map.controls.remove('searchControl');
        map.controls.remove('trafficControl');
        map.controls.remove('typeSelector');
        map.controls.remove('fullscreenControl');
        map.controls.remove('rulerControl');
    });
</script>

<?php get_footer();?>
