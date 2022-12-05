<?php include_once('model/controller.php'); 
include_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="The best blogsite for latest and trending updates">
    <meta name="keywords" content="Mivanaija, blog, mivanaija, news">
    <meta name="author" content="Vyborg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="all,follow">
    <?php
        $table = 'blogs';
        $blogurl = $_GET['url'];
         $rt =  url_fetch_tbl($blogurl);
          if ($rt->num_rows > 0) {
             while ($fetch = $rt->fetch_assoc()) {
                $idd = $fetch['id'];
                $cid = $fetch['blog_category'];
                $title = $fetch['title'];
                $content = $fetch['content'];
                $blogurl = $fetch['blogurl'];
                $image = $fetch['image'];
                ?>
    <title><?php echo $fetch['title']; ?></title>
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:image" content="https://mivanaija.com/blog/<?php echo $image; ?>">
    <meta property="og:description" content="Mivanaija - The best blogsite for latest and trending updates">
    <?php
             }
          }else{
              ?>
               <meta property="og:image" content="https://mivanaija.com/assets/img/banner/1.png">
    <title><?php echo SITE_NAME; ?></title>
              <?php
          }
          ?>
    
    <!-- favicon -->
    <link rel=icon href="assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/vendor.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>

    <!-- preloader area start -->
    <!--<div class="preloader" id="preloader">-->
    <!--    <div class="preloader-inner">-->
    <!--        <div class="spinner">-->
    <!--            <div class="dot1"></div>-->
    <!--            <div class="dot2"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- search popup start-->
    <div class="td-search-popup" id="td-search-popup">
        <form action="#" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- search popup end-->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- header start -->
    <div class="navbar-area">
        <!-- topbar end-->
        <div class="topbar-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 align-self-center">
                        <div class="topbar-menu text-md-left text-center">
                            <ul class="align-self-center">
                                <li><a href="#">Author</a></li>
                                <li><a href="mailto:<?php echo SITE_MAIL ?>?subject=Advert Placement" target="_blank">Advertisement</a></li>
                                <li><a href="contact">Contact</a></li>
                                <?php
                                	    if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
    
                                        $email = $_SESSION['email'];
                                        $chk = treat_session_usr($email);
                                            if($chk==true){
                                           ?>
                                <li><a href="#"><?php echo _userNme_usr($email); ?></a></li>
                                <li><a href="logout">Logout</a></li>
                                
                                <?php
                                        }else{
                                            echo '<li><a href="login">Login</a></li>';
                                        }
                                    }else{ 
                                        ?>
                                <li><a href="login">Login</a></li>
                                <?php
                                        
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-5 mt-2 mt-md-0 text-md-right text-center">
                        <div class="topbar-social">
                            <div class="topbar-date d-none d-lg-inline-block"><i class="fa fa-calendar"></i> <?php echo date("h:ia d-M-Y") ?></div>
                            <ul class="social-area social-area-2">
                                <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- topbar end-->

        <!-- adbar end-->
        <div class="adbar-area bg-black d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 align-self-center">
                        <div class="logo text-md-left text-center">
                            <a class="main-logo" href="#">
                                  <img src="assets/img/logo.png" alt="img">
                                <!--<h3 style="color: blue"><b>Miva<span style="color: orange;">Naija</span></b></h3>-->
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 text-md-right text-center">
                        <a href="#" class="adbar-right">
                            <img src="assets/img/add/1.png" alt="img">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- adbar end-->
<?php
if(isset($_POST["commentnow"])){
            $user_id = secure($_POST["user_id"]);
            $blog_id = secure($_POST['blog_id']);
            $comment = secure($_POST['comment']);
            if(empty($comment)){
                $err = "Comment cannot be empty";
            }else{
                if(com_($blog_id,$user_id,$comment)==true){
                    echo'<script>
                        alert("Comment Successful");
                    </script>';
                }else{
                    $err = 'Cannot comment, try later!';
                    }
            }
        }
?>
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
                            <a href="./">Home</a>
                        </li>
                        <li class="current-menu-item">
                            <a href="./blogs">Blog</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <div class="menu-search-inner">
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="get" class="blog-search" enctype="multipart/form-data">
                        <input type="text" placeholder="Search For" name="search">
                        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
  <div class="banner-area banner-inner-1 bg-black" id="banner">
       <div class="container">
           <?php 
           if(isset($_GET['url'])){
               ?>
               <center><h3 style="color: white; mb-3">Blog Updates</h3></center>
            <div class="row">
                   <?php
                    $table = 'blogs';
                    $blogurl = $_GET['url'];
                     $rt =  url_fetch_tbl($blogurl);
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $idd = $fetch['id'];
                            $cid = $fetch['blog_category'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $blogurl = $fetch['blogurl'];
                            $image = $fetch['image'];
                            $date = $fetch['created_at'];
                    ?>
                <div class="col-lg-12 col-lg-12 col-sm-12">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="blog/<?php echo $image; ?>" alt="img" width="100%">
                            <a class="tag-base tag-orange" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a>
                        </div>
                        <style>
                            li{
                                color: black;
                            }
                            p{
                                color: black;
                            }
                        </style>
                        <div class="details">
                            <h6 class="title"><a style="font-size: 1.7em; color: orange;" href="blogs?url=<?php echo $blogurl; ?>"><?php echo $title; ?></a></h6>
                            <p><?php echo html_entity_decode($content); ?></p>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></li>
                                </ul>
                            </div>
                                  <div class="card-body">
                            <h3 class="h4 mb-3" style="color: white;">Comments</h3>
                              <?php 
                                $blog_id = $idd;
                                $tcc = comid_fetch_tbl($blog_id);
                                   if ($tcc->num_rows > 0) {
                                     while ($fetch = $tcc->fetch_assoc()) {
                                        $iddd = $fetch['id'];
                                        $user_id = $fetch['user_id'];
                                        $comment = $fetch['comment'];
                                        $date = $fetch['date'];

                                      $table = 'users';
                                      $gg = username_fetch($user_id,$table);
                                      $ggg = username_img_fetch($user_id,$table);
                            ?>
                              <a class="row mt-2" style="border-color: lightgrey; border-style: solid; border-top: none; border-left: none; border-right: none; border-width: 0.5px;"> 
                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                  <img class="avatar" src="img/<?php echo $ggg; ?>" alt="users image" style="width: 73px;"></div>
                              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ms-3">
                                <p class="fw-bold mb-0" style="color: lightblue;"><?php echo $gg; ?> </p>
                                <p class="text-sm fw-light mb-0"><?php echo $comment; ?></p>
                                <p class="small fw-light mb-0" style="color: lightgrey;"><?php echo $date; ?></p>
                              </div></a>
                              <?php
                                     }
                                   }else{
                                       echo '<span style="color: yellow;">No Comments yet!</span>';
                                   }
                                     ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                  <?php
                                	 if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
                                        $email = $_SESSION['email'];
                                        $chk = treat_session_usr($email);
                                            if($chk==true){
                                           ?>
                                 <?php
                                     if (isset($err)){
                                        echo '<p style="color: red;">'.$err.'</p>';
                                    }
                                    ?>
                               <form class="form-group" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                   <input type="hidden" name="blog_id" value="<?php echo $idd; ?>">
                                   <input type="hidden" name="user_id" value="<?php echo user_ID($_SESSION['email'],'users'); ?>">
                                <center class="mt-3"><label for="comment" style="color: white;">Comment Now!</label></center>
                                <textarea name="comment" class="form-control" rows="4" style="background-color: transparent; color: white;"></textarea>
                                <input type="submit" value="Post" class="mt-3 btn btn-primary" name="commentnow" style="float: right; width: 20%;" required>
                            </form>
                                
                                <?php
                                        }else{
                                            ?>
                                            <li><center><a class="btn btn-primary" href="login" style="font-size: 1.4em; color: white;">Login to comment</a></center></li>
                                            <?
                                        }
                                    }else{
                                        ?>
                                <li><center><a class="btn btn-primary" href="login" style="font-size: 1.4em; color: white;">Login to comment</a></center></li>
                                <?php
                                        
                                    }
                                ?>
                            
                                      </div>

                          </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
           <?php
           }else if(isset($_GET['tagid'])){
               $cid = $_GET['tagid'];
               ?>
               <center><h3 style="color: white; mb-3"><?php echo cat_id($cid); ?>  Updates</h3></center>
            <div class="row">
                   <?php
                    $table = 'blogs';
                    $id = $_GET['tagid'];
                     $rt =  cid_fetch_tbl($table,$id);
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $idd = $fetch['id'];
                            $cid = $fetch['blog_category'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $blogurl = $fetch['blogurl'];
                            $image = $fetch['image'];
                            $date = $fetch['created_at'];
                    ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="blog/<?php echo $image; ?>" alt="img">
                            <a class="tag-base tag-orange" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="blogs?url=<?php echo $blogurl; ?>"><?php echo $title; ?></a></h6>
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
           <?php
           }
           else if(isset($_GET['search'])){
               $param = "%{$_GET['search']}%";
               $params = "%{$_GET['search']}%";
               ?>
           <center><h3 style="color: white; mb-3">Search results for  ' <span style="color: blue;"><?php echo $_GET['search']; ?> </span> ' </h3></center>
            <div class="row">
                   <?php
                     $rt =  getSearch($param,$params);
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $idd = $fetch['id'];
                            $cid = $fetch['blog_category'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $blogurl = $fetch['blogurl'];
                            $image = $fetch['image'];
                            $date = $fetch['created_at'];
                    ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="blog/<?php echo $image; ?>" alt="img">
                            <a class="tag-base tag-orange" href="blogs?tagid=<?php echo $cid; ?>"><?php echo cat_id($cid); ?></a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="blogs?url=<?php echo $blogurl; ?>"><?php echo $title; ?></a></h6>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i><?php echo substr($date,0,10); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } else{ echo '<h5 style="color: yellow;">Not found!</h5>';}?>
            </div>
           <?php
           }else{
               ?>
           <center><h3 style="color: white; mb-3">All Blog Updates</h3></center>
            <div class="row">
                   <?php
                    $table = 'blogs';
                     $rt =  fetchdata_all_new($table);
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
           <?php } ?>
        </div>  
    </div>
</div>
<?php include_once('foot.php'); ?>