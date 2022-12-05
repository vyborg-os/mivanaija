<?php
include_once('../model/controller.php');
include_once('session.php');
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
		$chk = treat_session($email);
			if($chk==false){
			session_destroy();
			header("Location: ./");
		}
	}else{
		session_destroy();
		header("Location: ./");
	}
 ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo SITE_NAME ?></title>
     <meta name="description" content="The best blogsite for latest and trending updates">
    <meta name="keywords" content="Mivanaija, blog, mivanaija, news">
    <meta name="author" content="Vyborg">
    <meta property="og:image" content="https://mivanaija.com/assets/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Choices.js-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="datatable/datatables.css">
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
        <div class="container-fluid d-flex align-items-center justify-content-between py-1">
          <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset" href="#">
              <div class="brand-text brand-big"><strong class="text-primary">Miva</strong><strong>Naija</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">M</strong><strong>N</strong></div></a>
            <button class="sidebar-toggle">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                    <use xlink:href="#arrow-left-1"> </use>
                  </svg>
            </button>
          </div>
          <ul class="list-inline mb-0">
            <li class="list-inline-item logout px-lg-2">                 <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="logout"> <span class=" btn btn-danger d-none d-sm-inline-block">Logout </span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#disable-1"> </use>
                    </svg></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4">
            <?php
            $table = 'special_users';
            ?>
            <img class="avatar shadow-0 img-fluid rounded-circle" src="../img/<?php echo _userImg($email,$table); ?>" alt="Profile Picture">
          <div class="ms-3 title">
              <h1 class="h5 mb-1"><a href="profile" style="color: lightgrey;"><?php echo _userNme($email); ?></a></h1>
            <p class="text-sm text-gray-700 mb-0 lh-1"><?php echo _userRole($email); ?></p>
          </div>
        </div>
        <ul class="list-unstyled">
            <?php 
            function active($current_page){
                $url_array = explode('/', $_SERVER['REQUEST_URI']);
                $url = end($url_array);
                if($current_page == $url){
                    echo 'active';
                }
            }
            $email = $_SESSION['email'];
            $rolechk = _userRole($email);
            if($rolechk=='Writer'){
                ?>
                <li class="sidebar-item <?php active('home'); ?>"><a class="sidebar-link" href="home"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Home </span></a></li>
             <li class="sidebar-item <?php active('postblog'); ?>"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#browser-window-1"> </use>
                      </svg><span>Blog </span></a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  <li><a class="sidebar-link" href="postblog">Create blog</a></li>
                  <li><a class="sidebar-link" href="blogs">View blog</a></li>
                  <li><a class="sidebar-link" href="blogcategory">Blog Category</a></li>
                </ul>
              </li>
            <?php
            }else if($rolechk=='Moderator'){
            ?>
            <li class="sidebar-item <?php active('home'); ?>"><a class="sidebar-link" href="home"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Home </span></a></li>
             <li class="sidebar-item <?php active('postblog'); ?>"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#browser-window-1"> </use>
                      </svg><span>Blog </span></a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  <li><a class="sidebar-link" href="postblog">Create blog</a></li>
                  <li><a class="sidebar-link" href="blogs">View blog</a></li>
                  <li><a class="sidebar-link" href="blogcategory">Blog Category</a></li>
                </ul>
              </li>
              <li class="sidebar-item <?php active('users'); ?>"><a class="sidebar-link" href="users"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#portfolio-grid-1"> </use>
                      </svg><span>Users </span></a></li>
              <li class="sidebar-item <?php active('sendmassmail'); ?>"><a class="sidebar-link" href="sendmassmail"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#sales-up-1"> </use>
                      </svg><span>Mass Mail </span></a></li>
              <li class="sidebar-item <?php active('reachouts'); ?>"><a class="sidebar-link" href="reachouts"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                      </svg><span>Reachouts </span></a></li>
            <?php    
            }else{
                ?>
              
              <li class="sidebar-item <?php active('home'); ?>"><a class="sidebar-link" href="home"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Home </span></a></li>
             <li class="sidebar-item <?php active('postblog'); ?>"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#browser-window-1"> </use>
                      </svg><span>Blog </span></a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  <li><a class="sidebar-link" href="postblog">Create blog</a></li>
                  <li><a class="sidebar-link" href="blogs">View blog</a></li>
                  <li><a class="sidebar-link" href="blogcategory">Blog Category</a></li>
                </ul>
              </li>
              <li class="sidebar-item <?php active('users'); ?>"><a class="sidebar-link" href="users"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#portfolio-grid-1"> </use>
                      </svg><span>Users </span></a></li>
              <li class="sidebar-item <?php active('sendmassmail'); ?>"><a class="sidebar-link" href="sendmassmail"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#sales-up-1"> </use>
                      </svg><span>Mass Mail </span></a></li>
              <li class="sidebar-item <?php active('reachouts'); ?>"><a class="sidebar-link" href="reachouts"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                      </svg><span>Reachouts </span></a></li>
              <li class="sidebar-item <?php active('specialusers'); ?>"><a class="sidebar-link" href="specialusers"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#disable-1"> </use>
                        </svg><span>Special Users </span></a>
            </li>
            <li class="sidebar-item <?php active('settings'); ?>"><a class="sidebar-link" href="settings"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#disable-1"> </use>
                        </svg><span>Settings </span></a>
            </li>
             <?php
            }
            
            ?>
        </ul>
      </nav>