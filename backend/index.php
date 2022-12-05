<?php include_once('../model/controller.php'); 
 include_once('session.php');
        if(isset($_POST["login"])){
            $email = secure($_POST["email"]);
            $pass = $_POST['passwordy'];
            if(empty($email) || empty($pass)){
                $err = "Please provide your full details";
            }else if(!s_userExist($email)){
                $err = "Account does not exist!";
            }else{
                if(s_userMatch_($email, $pass)==true){
                    echo'<script>
                        alert("Login Successful");
                    </script>';
                    $_SESSION['email'] = $email;
                    header("location: ./home");
                }else{
                    $err = 'Invalid Email/Password';
                    }
            }
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
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center position-relative py-5">
        <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
          <div class="card-body p-0">
            <div class="row gx-0 align-items-stretch">
              <!-- Logo & Information Panel-->
              <div class="col-lg-6" style="background-color: #B6D0E2;">
                <div class="info d-flex justify-content-center flex-column p-4 h-100" style="background-color: #B6D0E2;">
                  <div class="py-5" style="background-color: #B6D0E2;">
                      <img src="../assets/img/logo.png" alt="site logo">
                    <!--<h1 class="display-6 fw-bold">Special Users (Admin)</h1>-->
                    <p class="fw-light mb-0" style="float: right;">Enter your login credentials</p>
                      
                  </div>
                </div>
              </div>
              <!-- Form Panel    -->
              <div class="col-lg-6 bg-white">
                <div class="d-flex align-items-center px-4 px-lg-5 h-100 bg-dash-dark-2">
                  
                  <form class="login-form py-5 w-100" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <?php
                     if (isset($err)){
                        echo '<span style="color: red;">'.$err.'</span>';
                    }
                    ?>
                    <div class="input-material-group mb-3">
                      <input class="input-material" id="login-username" type="email" name="email" autocomplete="off" required>
                      <label class="label-material" for="login-username">Email</label>
                    </div>
                    <div class="input-material-group mb-4">
                      <input class="input-material" id="login-password" type="password" name="passwordy" required>
                      <label class="label-material" for="login-password">Password</label>
                    </div>
                      <input type="submit" class="btn btn-primary mb-3" name="login" value="Login" style="width: 100%; background-color: #4169E1; border-color: white;">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="js/jquery.3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>