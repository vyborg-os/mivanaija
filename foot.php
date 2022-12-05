
    <div class="footer-area bg-black pd-top-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">ABOUT US</h5>
                        <div class="widget_about">
                            <img src="assets/img/logo.png" alt="site logo">
                            <p>Mivanaija is the best blog for trending news, better updates, fast, verified and dependable</p>
                            <ul class="social-area social-area-2 mt-4">
                                <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_tag_cloud">
                        <h5 class="widget-title">TAGS</h5>
                        <div class="tagcloud">
                            <?php
                            $table = 'category';
                            $rt =  fetchdata_all($table);
                              if ($rt->num_rows > 0) {
                                 while ($fetch = $rt->fetch_assoc()) {
                                    $idd = $fetch['id'];
                                    $cid = $fetch['category_name'];
                                ?>
                            <a href="blogs?tagid=<?php echo $idd; ?>"><?php echo $cid; ?></a>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">CONTACTS</h5>
                        <ul class="contact_info_list">
                            <li><i class="fa fa-map-marker"></i> 6th Ave, Gwarinpa Estate 900108, Abuja</li>
                            <li><i class="fa fa-phone"></i> +088 012121240</li>
                            <li><i class="fa fa-envelope-o"></i> <?php echo SITE_MAIL; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_recent_post">
                        <h5 class="widget-title">MORE NEWS</h5>
                         <?php
                     $rt =  fetch_all_blog_rand_two();
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $idd = $fetch['id'];
                            $cid = $fetch['blog_category'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $image = $fetch['image'];
                            $blogurl = $fetch['blogurl'];
                            $date = $fetch['created_at'];
                        ?>
                        <div class="single-post-list-wrap style-white">
                            <div class="media">
                                <div class="media-left">
                                    <img src="blog/<?php echo $image; ?>" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="blogs?url=<?php echo $blogurl; ?>"><?php echo $title; ?></a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <ul class="widget_nav_menu">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
                <p>Copyright ©<?php echo date("Y"); ?> <a href="#"><?php echo SITE_NAME; ?></a></p>
            </div>
        </div>
    </div>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- all plugins here -->
    <script src="assets/js/vendor.js"></script>
    <!-- main js  -->
    <script src="assets/js/main.js"></script>
</body>
</html>