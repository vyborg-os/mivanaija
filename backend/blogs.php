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
          <li class="breadcrumb-item"><a href="home">Home</a> / Blogs  <a href="postblog" class="btn btn-primary" style="background-color: purple;">Post Blog</a></li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
            <div class="row gy-4">
                <?php
                 $rt =  fetch_all_blog();
                  if ($rt->num_rows > 0) {
                     while ($fetch = $rt->fetch_assoc()) {
                        $idd = $fetch['id'];
                        $title = $fetch['title'];
                        $content = $fetch['content'];
                        $image = $fetch['image'];
                        $burl = $fetch['blogurl'];
                        $date = $fetch['created_at'];
                ?>
              <div class="col-md-4 col-sm-4">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <img src="../blog/<?php echo $image; ?>" style="width: 100%;">
                    </div>
                      <a href="viewblog?url=<?php echo $burl; ?>" style="color: lightblue;"><?php echo $title; ?></a>
                      <a href="postblog?edit=<?php echo $idd; ?>" class="btn btn-primary">Edit</a> <a id="<?php echo $idd; ?>" class="blogdel btn btn-danger">Delete</a> <?php 
                                    $blog_id = $idd;
                                    $tc = comid_fetch_tbl($blog_id);
                                    echo '('.number_format($tc->num_rows).')'; ?> Comments
                  </div>
                </div>
              </div>
                <?php
                     }
                  }else{
                      echo 'No blogpost yet!';
                  }
                ?>
            </div>
          </div>
  </section>
<script src="js/jquery.3.2.1.min.js"></script>
</div>


<?php
include_once('footer.php');
?>