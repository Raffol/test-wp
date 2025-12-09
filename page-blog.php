<?php
/*
Template Name: Блог
Template Post Type: post, page, product, contacts
*/
get_header();
?>
<br>

<section class="section-padding">
    <div class="container">
        <div class="row">

            <!-- ЛЕНТА БЛОГА -->
            <div class="col-lg-8">
                <div class="row">

                    <?php
                    // Запрос постов
                    $query = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => 5
                    ]);

                    $cnt = 0;

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $cnt++;

                            // Шаблон для 3-й записи (широкий блок)
                            if ($cnt === 3) : ?>
                                <div class="col-lg-12">
                                    <div class="blog-post">

                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('medium', ['class' => "img-fluid w-100"]);
                                        } else {
                                            echo '<img class="img-fluid" src="'.get_template_directory_uri().'/assets/img/blog/blog-1.jpg" />';
                                        }
                                        ?>

                                        <div class="mt-4 mb-3 d-flex">
                                            <div class="post-author mr-3">
                                                <i class="fa fa-user"></i>
                                                <span class="h6 text-uppercase"><?php the_author(); ?></span>
                                            </div>

                                            <div class="post-info">
                                                <i class="fa fa-calendar-check"></i>
                                                <span><?php the_time('j F Y'); ?></span>
                                            </div>
                                        </div>

                                        <a href="<?php echo get_permalink(); ?>" class="h4"><?php the_title(); ?></a>

                                        <p class="mt-3"><?php the_excerpt(); ?></p>

                                        <a href="<?php echo get_permalink(); ?>" class="read-more">
                                            Read More <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>

                            <?php
                            // Шаблон для остальных постов (2 в строке)
                            else : ?>
                                <div class="col-lg-6">
                                    <div class="blog-post">

                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('medium', ['class' => "img-fluid"]);
                                        } else {
                                            echo '<img class="img-fluid" src="'.get_template_directory_uri().'/assets/img/blog/blog-1.jpg" />';
                                        }
                                        ?>

                                        <div class="mt-4 mb-3 d-flex">
                                            <div class="post-author mr-3">
                                                <i class="fa fa-user"></i>
                                                <span class="h6 text-uppercase"><?php the_author(); ?></span>
                                            </div>

                                            <div class="post-info">
                                                <i class="fa fa-calendar-check"></i>
                                                <span><?php the_time('j F Y'); ?></span>
                                            </div>
                                        </div>

                                        <a href="<?php echo get_permalink(); ?>" class="h4"><?php the_title(); ?></a>

                                        <p class="mt-3"><?php the_excerpt(); ?></p>

                                        <a href="<?php echo get_permalink(); ?>" class="read-more">
                                            Read More <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>

                            <?php endif; ?>

                        <?php endwhile;
                    else :
                        echo '<p>Записей нет.</p>';
                    endif;

                    wp_reset_postdata();
                    ?>

                </div>
            </div>

            <!-- САЙДБАР -->
            <div class="col-lg-4">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="sidebar-widget search">
                            <div class="form-group">
                                <input type="text" placeholder="search" class="form-control">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sidebar-widget about-bar">
                            <h5 class="mb-3">About us</h5>
                            <p>Nostrum ullam porro iusto. Fugit eveniet sapiente nobis nesciunt velit cum fuga doloremque dignissimos asperiores.</p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sidebar-widget category">
                            <h5 class="mb-3">Category</h5>
                            <ul class="list-styled">
                                <li>Marketing</li>
                                <li>Digital</li>
                                <li>SEO</li>
                                <li>Web Design</li>
                                <li>Development</li>
                                <li>Video</li>
                                <li>Audio</li>
                                <li>Slider</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sidebar-widget tag">
                            <a href="#">web</a>
                            <a href="#">development</a>
                            <a href="#">seo</a>
                            <a href="#">marketing</a>
                            <a href="#">branding</a>
                            <a href="#">web design</a>
                            <a href="#">tutorial</a>
                            <a href="#">tips</a>
                            <a href="#">design trend</a>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="sidebar-widget download">
                            <h5 class="mb-4">Download Files</h5>
                            <a href="#"><i class="fa fa-file-pdf"></i> Company Manual</a>
                            <a href="#"><i class="fa fa-file-pdf"></i> Company Profile</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<br>
<?php get_footer(); ?>
