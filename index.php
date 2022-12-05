<?php include_once('head.php');
?>
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo d-lg-none d-block">
                        <a class="main-logo" href="#"><img src="assets/img/logo.png" alt="img"></a>
                    </div>
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#nextpage_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="nextpage_main_menu">
                    <ul class="navbar-nav menu-open">
                        <li class="current-menu-item">
                            <a href="#banner">Home</a>
                        </li> 
                        <li class="current-menu-item">
                            <a href="blogs">Blog</a>
                        </li>
                        <?php
                            $table = 'category';
                            $rt =  fetchdata_all($table);
                              if ($rt->num_rows > 0) {
                                 while ($fetch = $rt->fetch_assoc()) {
                                    $idd = $fetch['id'];
                                    $cid = $fetch['category_name'];
                                ?>
                            <li><a href="blogs?tagid=<?php echo $idd; ?>"><?php echo ucfirst($cid); ?></a></li>
                            <?php } } ?>
                        <!--<li class="current-menu-item">-->
                        <!--    <a href="#trending">Trending News</a>-->
                        <!--</li>                        -->
                        <!--<li class="current-menu-item">-->
                        <!--    <a href="#latest">Latest News</a>-->
                        <!--</li>                        -->
                        <!--<li class="current-menu-item">-->
                        <!--    <a href="#grid">News Grid</a>-->
                        <!--</li>                        -->
                        
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <marquee style="color: white;"><?php echo SITE_NAME; ?></marquee>
                </div>
            </div>
        </nav>
    </div>
    <!-- navbar end -->

    <!-- banner area start -->
    <div class="banner-area banner-inner-1 bg-black" id="banner">
        <!-- banner area start -->
        <div class="banner-inner pt-5">
            <div class="container">
                <div class="row">
                    <?php
                     $rt =  fetch_all_blog_one();
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $idd = $fetch['id'];
                            $cid = $fetch['blog_category'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $image = $fetch['image'];
                            $burl = $fetch['blogurl'];
                            $date = $fetch['created_at'];
                    ?>
                    <div class="col-lg-6">
                        <div class="thumb after-left-top">
                            <img src="assets/img/banner/1.png" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="banner-details mt-4 mt-lg-0">
                            <div class="post-meta-single">
                                <ul>
                                    <li><a class="tag-base tag-blue" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a></li>
                                    <li class="date"><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></li>
                                </ul>
                            </div>
                            <h2><?php echo $title; ?></h2>
                            <p style="color: white;"><?php echo substr(html_entity_decode($content),0,150); ?> ...</p>
                            <a class="btn btn-blue" href="blogs?url=<?php echo $burl; ?>">Read More</a>
                        </div>
                    </div>
                    <?php
                         }
                      }
                     ?>
                </div>
            </div>
        </div>
        <!-- banner area end -->

        <div class="container">
            <div class="row">
                   <?php
                     $rt =  fetch_all_blog_four();
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $idd = $fetch['id'];
                            $cid = $fetch['blog_category'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $image = $fetch['image'];
                            $burl = $fetch['blogurl'];
                            $date = $fetch['created_at'];
                    ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="blog/<?php echo $image; ?>" alt="img">
                            <a class="tag-base tag-orange" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?></a></h6>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>  
    </div>
    <!-- banner area end -->

    <div class="post-area pd-top-75 pd-bottom-50" id="trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Trending News</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <div class="trending-post">
                                  <?php
                                     $rt =  fetch_all_blog_rand_three();
                                      if ($rt->num_rows > 0) {
                                         while ($fetch = $rt->fetch_assoc()) {
                                            $idd = $fetch['id'];
                                            $cid = $fetch['blog_category'];
                                            $title = $fetch['title'];
                                            $content = $fetch['content'];
                                            $image = $fetch['image'];
                                            $burl = $fetch['blogurl'];
                                            $date = $fetch['created_at'];
                                    ?>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="blog/<?php echo $image; ?>" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></p>
                                        </div>
                                        <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?> </a></h6>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="trending-post">
                                  <?php
                                     $rt =  fetch_all_blog_rand_three();
                                      if ($rt->num_rows > 0) {
                                         while ($fetch = $rt->fetch_assoc()) {
                                            $idd = $fetch['id'];
                                            $cid = $fetch['blog_category'];
                                            $title = $fetch['title'];
                                            $content = $fetch['content'];
                                            $image = $fetch['image'];
                                            $burl = $fetch['blogurl'];
                                            $date = $fetch['created_at'];
                                    ?>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="blog/<?php echo $image; ?>" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></p>
                                        </div>
                                        <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?> </a></h6>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                         <div class="item">
                            <div class="trending-post">
                                  <?php
                                     $rt =  fetch_all_blog_rand_three();
                                      if ($rt->num_rows > 0) {
                                         while ($fetch = $rt->fetch_assoc()) {
                                            $idd = $fetch['id'];
                                            $cid = $fetch['blog_category'];
                                            $title = $fetch['title'];
                                            $content = $fetch['content'];
                                            $image = $fetch['image'];
                                            $burl = $fetch['blogurl'];
                                            $date = $fetch['created_at'];
                                    ?>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="blog/<?php echo $image; ?>" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></p>
                                        </div>
                                        <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?> </a></h6>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Latest News</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <?php
                                 $rt =  fetch_all_blog_five();
                                  if ($rt->num_rows > 0) {
                                     while ($fetch = $rt->fetch_assoc()) {
                                        $idd = $fetch['id'];
                                        $cid = $fetch['blog_category'];
                                        $title = $fetch['title'];
                                        $content = $fetch['content'];
                                        $image = $fetch['image'];
                                        $burl = $fetch['blogurl'];
                                        $date = $fetch['created_at'];
                                    ?>
                            <div class="single-post-list-wrap">
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
                                            <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?> </a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                            
                        </div>
                        <div class="item">
                            <div class="item">
                            <?php
                                 $rt =  fetch_all_blog_five();
                                  if ($rt->num_rows > 0) {
                                     while ($fetch = $rt->fetch_assoc()) {
                                        $idd = $fetch['id'];
                                        $cid = $fetch['blog_category'];
                                        $title = $fetch['title'];
                                        $content = $fetch['content'];
                                        $image = $fetch['image'];
                                        $burl = $fetch['blogurl'];
                                        $date = $fetch['created_at'];
                                    ?>
                            <div class="single-post-list-wrap">
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
                                            <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?> </a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">What’s new</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                             <?php
                                 $rt =  fetch_all_blog_rand_onea();
                                  if ($rt->num_rows > 0) {
                                     while ($fetch = $rt->fetch_assoc()) {
                                        $idd = $fetch['id'];
                                        $cid = $fetch['blog_category'];
                                        $title = $fetch['title'];
                                        $content = $fetch['content'];
                                        $image = $fetch['image'];
                                        $burl = $fetch['blogurl'];
                                        $date = $fetch['created_at'];
                                    ?>
                            <div class="single-post-wrap">
                                <div class="thumb">
                                    <img src="blog/<?php echo $image; ?>" alt="img">
                                </div>
                                <div class="details">
                                    <div class="post-meta-single mb-4 pt-1">
                                        <ul>
                                            <li><a class="tag-base tag-blue" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a></li>
                                            <li><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?></a></h6>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                        <div class="item">
                               <?php
                                 $rt =  fetch_all_blog_rand_oneb();
                                  if ($rt->num_rows > 0) {
                                     while ($fetch = $rt->fetch_assoc()) {
                                        $idd = $fetch['id'];
                                        $cid = $fetch['blog_category'];
                                        $title = $fetch['title'];
                                        $content = $fetch['content'];
                                        $image = $fetch['image'];
                                        $burl = $fetch['blogurl'];
                                        $date = $fetch['created_at'];
                                    ?>
                            <div class="single-post-wrap">
                                <div class="thumb">
                                    <img src="blog/<?php echo $image; ?>" alt="img">
                                </div>
                                <div class="details">
                                    <div class="post-meta-single mb-4 pt-1">
                                        <ul>
                                            <li><a class="tag-base tag-blue" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a></li>
                                            <li><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?></a></h6>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Join With Us</h6>
                    </div>
                    <div class="social-area-list mb-4">
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook social-icon"></i><span>Facebook</span><span>Like Page</span> <i class="fa fa-plus"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter social-icon"></i><span>Twitter</span><span>Follower us</span> <i class="fa fa-plus"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-youtube-play social-icon"></i><span>Youtube</span><span>Subscribe</span> <i class="fa fa-plus"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram social-icon"></i><span>Instagram</span><span>Follow us</span> <i class="fa fa-plus"></i></a></li>
<!--                            <li><a class="google-plus" href="#"><i class="fa fa-google social-icon"></i><span>19,101</span><span>Subscribers</span> <i class="fa fa-plus"></i></a></li>-->
                        </ul>
                    </div>
                    <div class="add-area">
                        <a href="#"><img class="w-100" src="assets/img/add/6.png" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-sky pd-top-80 pd-bottom-50" id="latest">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                     <?php
                         $rt =  fetch_single_catcode();
                          if ($rt->num_rows > 0) {
                             while ($fetch = $rt->fetch_assoc()) {
                                $idd = $fetch['id'];
                                $cid = $fetch['blog_category'];
                                $title = $fetch['title'];
                                $content = $fetch['content'];
                                $image = $fetch['image'];
                                $burl = $fetch['blogurl'];
                                $date = $fetch['created_at'];
                            ?>
                    <div class="single-post-wrap style-overlay-bg">
                        <div class="thumb">
                            <img src="assets/img/post/9.png" alt="img">
                        </div>
                        <div class="details">
                            <div class="post-meta-single mb-3">
                                <ul>
                                    <li><a class="tag-base tag-blue" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a></li>
                                    <li><p><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></p></li>
                                </ul>
                            </div>
                            <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?></a></h6>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <?php
                         $rt =  fetch_single_catcodeb();
                          if ($rt->num_rows > 0) {
                             while ($fetch = $rt->fetch_assoc()) {
                                $idd = $fetch['id'];
                                $cid = $fetch['blog_category'];
                                $title = $fetch['title'];
                                $content = $fetch['content'];
                                $image = $fetch['image'];
                                $burl = $fetch['blogurl'];
                                $date = $fetch['created_at'];
                            ?>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="blog/<?php echo $image; ?>" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?></a></h6>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <?php
                         $rt =  fetch_single_catcodebb();
                          if ($rt->num_rows > 0) {
                             while ($fetch = $rt->fetch_assoc()) {
                                $idd = $fetch['id'];
                                $cid = $fetch['blog_category'];
                                $title = $fetch['title'];
                                $content = $fetch['content'];
                                $image = $fetch['image'];
                                $burl = $fetch['blogurl'];
                                $date = $fetch['created_at'];
                            ?>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="blog/<?php echo $image; ?>" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?></a></h6>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="trending-post style-box">
                        <div class="section-title">
                            <h6 class="title">Trending News</h6>
                        </div>
                        <div class="post-slider owl-carousel">
                            <div class="item">
                                <?php
                                 $rt =  fetch_all_blog_rand_five();
                                  if ($rt->num_rows > 0) {
                                     while ($fetch = $rt->fetch_assoc()) {
                                        $idd = $fetch['id'];
                                        $cid = $fetch['blog_category'];
                                        $title = $fetch['title'];
                                        $content = $fetch['content'];
                                        $image = $fetch['image'];
                                        $burl = $fetch['blogurl'];
                                        $date = $fetch['created_at'];
                                    ?>
                                <div class="single-post-list-wrap">
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
                                                <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?></a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="item">
                                 <?php
                                 $rt =  fetch_all_blog_rand_fiveb();
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
                                <div class="single-post-list-wrap">
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
                </div>
            </div>
        </div>
    </div>

    <div class="pd-top-80 pd-bottom-50" id="grid">
        <div class="container">
            <div class="row">
                 <?php
                     $rt =  fetch_bottom_blog_eight();
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $idd = $fetch['id'];
                            $cid = $fetch['blog_category'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $image = $fetch['image'];
                            $burl = $fetch['blogurl'];
                            $date = $fetch['created_at'];
                        ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="blog/<?php echo $image; ?>" alt="img">
                            <a class="tag-base tag-purple" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a>
                        </div>
                        <div class="details mt-3">
                            <div class="post-meta-single">
<!--                                <p><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></p>-->
                            </div>
                            <h6 class="title"><a href="blogs?url=<?php echo $burl; ?>"><?php echo $title; ?> </a></h6>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>  
    </div>
<?php include_once('foot.php'); ?>