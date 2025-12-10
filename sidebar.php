<!-- САЙДБАР -->
            <div class="col-lg-4">
                <?php if ( ! dynamic_sidebar('sidebar-blog') ) {
                    dynamic_sidebar( 'sidebar-blog' );
                } ?>
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
