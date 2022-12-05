<?php include_once('model/controller.php'); 
include_once('session.php');
        if(isset($_POST["loginow"])){
            $email = secure($_POST["email"]);
            $pass = $_POST['passwordy'];
            if(empty($email) || empty($pass)){
                $err = "Please provide your full details";
            }else if(!userExist($email)){
                $err = "Account does not exist!";
            }else{
                if(userMatch_($email, $pass)==true){
                    echo'<script>
                        alert("Login Successful");
                    </script>';
                    $_SESSION['email'] = $email;
                    header("Location: ./");
                }else{
                    $err = 'Invalid Email/Password';
                    }
            }
        }
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
     <meta name="description" content="The best blogsite for latest and trending updates">
    <meta name="keywords" content="Mivanaija, blog, mivanaija, news">
    <meta name="author" content="Vyborg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>

    <!-- search popup end-->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- header start -->
    <div class="navbar-area">

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
            </div>
        </nav>
    </div>
  <div class="banner-area banner-inner-1 bg-black" id="banner">
       <div class="container">
           <div class="row">
               <div class="mt-3 col-lg-6 col-md-6 col-sm-6">
                   <marquee style="margin-top: 100px;"><img src="assets/img/logo.png" alt="site logo"></marquee>
               </div>
               <div class="mt-3 col-lg-6 col-md-6 col-sm-6">
                   <form class="form-group" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                       
                       <h5 style="color: white;">Enter Login Credentials</h5>
                        <?php
                         if (isset($err)){
                            echo '<p style="color: red;">'.$err.'</p>';
                        }
                        ?>
                       <label for="email" style="color: white;">Email</label>
                       <input type="email" class="form-control" placeholder="Enter Mail"  name="email" required style="background-color: transparent; color: white;">
                       <label for="password" style="color: white;">Password</label>
                       <input type="password" class="form-control" placeholder="Password" name="passwordy" required style="background-color: transparent; color: white;">
                       <input type="submit" class="btn btn-primary form-control mt-3" value="Sign in" name="loginow">
                       <a href="register" style="color: orange;">OR Create Account</a>
                   </form>
               </div>
           </div>
      </div>
</div>
<?php include_once('foot.php'); ?>