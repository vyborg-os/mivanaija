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
        <h2 class="h5 mb-0">Home</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a> / Viewblog / <a href="blogs" class="btn btn-primary" style="background-color: orange;">Go Back</a></li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-md-12 col-sm-12">
                <div class="card mb-0">
                  <div class="card-body" style="background-color: white;">
                      <?php
                      if(isset($_GET['url'])){
                      $blogurl = $_GET['url'];
                      $table = 'blogs';
                      $rt = url_fetch_tbl($blogurl);
                      if ($rt->num_rows > 0) {
                         while ($fetch = $rt->fetch_assoc()) {
                            $id = $fetch['id'];
                            $title = $fetch['title'];
                            $content = $fetch['content'];
                            $image = $fetch['image'];
                            $date = $fetch['created_at'];
                      ?>
                       <h3><?php echo strtoupper($title); ?></h3>
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <img src="../blog/<?php echo $image; ?>" style="width: 100%;">
                    </div>
                      <p><?php echo html_entity_decode($content); ?></p>
                      <a href="postblog?edit=<?php echo $id; ?>" class="btn btn-primary">Edit</a> <a id="<?php echo $id; ?>" class="blogdel btn btn-danger">Delete Blog</a> <?php 
                                    $blog_id = $id;
                                    $tc = comid_fetch_tbl($blog_id);
                                    echo '('.number_format($tc->num_rows).')'; ?> Comments
                  </div>
                <div class="col-lg-12">                                           
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-3">Comments</h3>
                      <?php 
                        $blog_id = $id;
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
                      <a class="d-block d-flex align-items-center text-reset text-decoration-none bg-dash-dark-2 py-2 px-3" href="#"> 
                      <div class="position-relative">
                          <img class="avatar" src="../img/<?php echo $ggg; ?>" alt=""></div>
                      <div class="ms-3">
                        <p class="fw-bold mb-0"><?php echo $gg; ?> || <span class="comdel btn btn-danger" style="float: right;" id="<?php echo $iddd; ?>">Delete</span></p>
                        <p class="text-sm fw-light mb-0"><?php echo $comment; ?></p>
                        <p class="small fw-light mb-0"><?php echo $date; ?></p>
                      </div></a>
                      <?php
                             }
                           }else{
                               echo 'No Comments yet!';
                           }
                             ?>
                      
                  </div>
                </div>
              </div>
                    <?php
                         }
                      }
                      }else{
                          echo '<h3 style="color: orange;">404 Error!</h3>';
                      }
                      ?>
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