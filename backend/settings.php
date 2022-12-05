<?php 
include_once('header.php');
if(isset($_POST['update_site'])){
    $id = $_POST['id'];
    $settings_value = secure($_POST['site_value']);
    if(!empty($settings_value)){
        $chk = update_site_settings($id,$settings_value);
            if($chk==true){
                echo'<script>
                        alert("Updated Successfully!");
                    </script>';
            }else{
                echo'<script>
                        alert("Cannot update try later");
                    </script>';
            }
             
    }else{
        echo'<script>
                alert("All fields are mandatory!");
            </script>';
    }
}
if(isset($_POST['update_ads'])){
    $image = $_FILES['image']['name'];
    $path = '../ads/'.$image;
    $pictype = $_FILES['image']['type'];
    $pic_size = $_FILES['image']['size'];
    $dir = URL_ROOT."/ads/";
    $target = $dir.basename($_FILES['image']['name']);
    $type = pathinfo($target,PATHINFO_EXTENSION);
    $void = array('jpeg','png','jpg');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!empty($image)){
        $chk = update_ads_($image);
            if($chk==true){
                echo'<script>
                        alert("Ads Updated Successfully!");
                    </script>';
                $move = move_uploaded_file($_FILES['image']['tmp_name'], $path);
            }else{
                echo'<script>
                        alert("Cannot update try later");
                    </script>';
            }
             
    }else{
        echo'<script>
                alert("All fields are mandatory!");
            </script>';
    }
}
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
        <h2 class="h5 mb-0">Site Settings</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
        <div class="row gy-4">
          <!-- Basic Form-->
          <div class="col-lg-12">
               <div class="modal fade" id="ads" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel0">Update Ads Banner<i class="fa fa-user"></i></h5>
                                      </div>
                                      <div class="modal-body">
                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label class="col-form-label">Ads Banner</label>
                                            <input class="dropify form-control" id="exampleInputPassword1" name="image" type="file" data-allowed-file-extensions="jpeg png jpg">
                                          </div>
                                            <center><div class="form-group mt-3">
                                          <input type="submit" class="btn btn-primary form-control" style="width: 50%;" name="update_ads" value="Update">
                                                </div></center>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                <?php 
                                $rt =  all_settings();
                                  if ($rt->num_rows > 0) {
                                     while ($fetch = $rt->fetch_assoc()) {
                                      $id = $fetch['id'];
                                      $sk = $fetch['settings_key'];
                                      $val = $fetch['settings_value'];
                                      $desc = $fetch['settings_description'];
                            ?>
                            <div class="modal fade" id="set<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel0">Edit Settings <i class="fa fa-user"></i></h5>
                                      </div>
                                      <div class="modal-body">
                                        <p>Site Key: <span style="font-size: 1rem; color: lightgreen;"><?php echo $sk; ?></span></p>
                                        <p>Site Description: <span style="font-size: 1rem; color: lightgreen;"><?php echo $desc; ?></span></p>
                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label class="col-form-label">settings value</label>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="text" class="form-control" name="site_value" value="<?php echo $val; ?>">
                                          </div>
                                            <div class="form-group mt-3">
                                          <input type="submit" class="btn btn-primary form-control" style="width: 50%;" name="update_site" value="Update">
                                            </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php
                                    }
                                }
                            ?>
             <div class="table-responsive">
                      <table class="table mb-0 table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Key</th>
                            <th>Settings Value</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                                $rt =  all_settings();
                                  if ($rt->num_rows > 0) {
                                     while ($fetch = $rt->fetch_assoc()) {
                                      $id = $fetch['id'];
                                      $sk = $fetch['settings_key'];
                                      $val = $fetch['settings_value'];
                                      $desc = $fetch['settings_description'];
                            ?>
                            <tr>
                                <td><?php echo $sk; ?></td>
                                <td><?php echo $val; ?></td>
                                <td><?php echo $desc; ?></td>
                                <td><a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#set<?php echo $id; ?>" data-whatever="@fat"><i class="fa fa-edit mr-2 "></i>Update</a></td>
                            </tr>
                                        <?php
                                            }
                                        }
                                     ?>
                        </tbody>
                      </table>
                    </div>
        </div>
             <div class="col-lg-12">
                 <h3>Ads Banner</h3>
             <div class="table-responsive">
                      <table class="table mb-0 table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ad = ads_fetch();
                                  if ($ad->num_rows > 0) {
                                     while ($fetch = $ad->fetch_assoc()) {
                                      $id = $fetch['id'];
                                      $im = $fetch['image'];
                            ?>
                          <tr>
                            <td><?php echo '<img src="../ads/'.$im.'" width="40%"'; ?> </td>
                            <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ads" data-whatever="@fat" class="btn btn-primary">Update</a></td>
                          </tr>
                            <?php
                                     }
                                  }
                                         
                            ?>
                        </tbody>
                      </table>
                    </div>
        </div>
     </div>
      </div>
  </section>
<script src="js/jquery.3.2.1.min.js"></script>
<script src="js/dropify.js"></script>
<script>
 $('.dropify').dropify();
</script>
</div>


<?php
include_once('footer.php');
?>