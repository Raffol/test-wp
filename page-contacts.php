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
<?php get_footer();?>
