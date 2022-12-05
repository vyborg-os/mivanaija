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
    <meta property="og:image" content="https://mivanaija.com/assets/img/banner/1.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="all,follow">
    <title><?php echo SITE_NAME; ?></title>
    
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
