<?php include_once('head.php'); 
    if(isset($_POST["reachout"])){
            $fullname = secure($_POST['fullname']);
            $email = secure($_POST["email"]);
            $message = secure($_POST['message']);
            if(empty($email) || empty($fullname) || empty($message)){
                $err = "Please provide your full details";
            }else{
                if(send_reach_($fullname,$email,$message)==true){
                    $suc = 'Message Sent!, Kindly Check your Mail for further updates';
                }else{
                    $err = 'Message cannot be sent, try again later!';
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
            </div>
        </nav>
    </div>
  <div class="banner-area banner-inner-1 bg-black" id="banner">
       <div class="container">
           <div class="row">
               <div class="mt-3 col-lg-6 col-md-6 col-sm-6">
                   <div class="widget" style="color: white; font-size: 1.5em;">
                        <h5 class="widget-title" style="color: orange;">CONTACTS</h5>
                        <ul class="contact_info_list">
                            <li><i class="fa fa-map-marker"></i> 6th Ave, Gwarinpa Estate 900108, Abuja</li>
                            <li><i class="fa fa-phone"></i> +088 012121240</li>
                            <li><i class="fa fa-envelope-o"></i> <?php echo SITE_MAIL; ?></li>
                        </ul>
                    </div>
               </div>
               <div class="mt-3 col-lg-6 col-md-6 col-sm-6">
                   <form class="form-group" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                       <?php
                         if (isset($err)){
                            echo '<p style="color: red;">'.$err.'</p>';
                        }
                        ?>
                       <?php
                         if (isset($suc)){
                            echo '<p style="color: lightgreen;">'.$suc.'</p>';
                        }
                        ?>
                       <label style="color: white;" for="fullname">Fullname</label>
                       <input type="text" class="form-control" placeholder="Fullname"  name="fullname" required style="background-color: transparent; color: white;">
                       <label style="color: white;" for="email">Email</label>
                       <input type="email" class="form-control" placeholder="Email address" name="email" required style="background-color: transparent; color: white;">
                       <label style="color: white;" for="fullname">Message</label>
                       <textarea name="message" rows="4" class="form-control" required style="background-color: transparent; color: white;"></textarea>
                       <input type="submit" class="btn btn-primary form-control mt-3" value="Send" name="reachout">
                   </form>
               </div>
           </div>
      </div>
</div>
<?php include_once('foot.php'); ?>