<?php 
include_once('header.php');
?>
<link
  rel="stylesheet"
  href="css/dropify.css"
  type="text/css"
/>
  <div class="page-content form-page">
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
      <div class="container-fluid">
        <h2 class="h5 mb-0">Reachouts</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Reachouts</li>
        </ol>
      </nav>
    </div>
         <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-6">                                           
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-3">New messages</h3>
                      <?php
                            $ad = reachout_fetch();
                                  if ($ad->num_rows > 0) {	
                                     while ($fetch = $ad->fetch_assoc()) {
                                      $id = $fetch['id'];
                                      $fn = $fetch['fullname'];
                                      $em = $fetch['email'];
                                      $msg = $fetch['message'];
                                      $dt = $fetch['date'];
                            ?>
                      <a class="d-block d-flex align-items-center text-reset text-decoration-none bg-dash-dark-2 py-2 px-3" href="reachouts?msg=<?php echo $id; ?>"> 
                      <div class="position-relative">
                          <i class="fa fa-user fa-3x"></i></div>
                      <div class="ms-3">
                        <p class="fw-bold mb-0"><?php echo $fn; ?></p>
                        <p class="text-sm fw-light mb-0"><?php echo substr($msg,0,20); ?>....</p>
                        <p class="small fw-light mb-0"><?php echo $dt; ?></p>
                      </div></a>
                      <?php
                             }
                              } else{
                                  echo 'No Messages yet!';
                              }
                        ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-3">View Message</h3>
                      <?php 
                      if(isset($_GET['msg'])){
                          $id = $_GET['msg'];
                          $fr = reachout_fetch_($id);
                           if ($fr->num_rows > 0) {	
                                 while ($fetch = $fr->fetch_assoc()) {
                                  $id = $fetch['id'];
                                  $fn = $fetch['fullname'];
                                  $em = $fetch['email'];
                                  $msg = $fetch['message'];
                                  $dt = $fetch['date'];
                        }
                      ?>
                      <a href="javascript:void(0);" class="reachdel btn btn-danger" id="<?php echo $id; ?>" style="float: right;">Delete</a>
                       <div class="ms-3">
                           <p class="fw-bold mb-0">Name: <?php echo $fn; ?>   </p><p>  Email: <?php echo $em; ?></p>
                        <p class="text-sm fw-light mb-0"><?php echo $msg; ?></p>
                        <p class="small fw-light mb-0" style="color: lightgrey;"><?php echo $dt; ?></p>
                      </div>
                      <?php
                               
                           }
                      }
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
<script src="js/jquery.3.2.1.min.js"></script>
</div>


<?php
include_once('footer.php');
?>