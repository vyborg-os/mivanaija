<?php 
include_once('header.php');
if(isset($_POST['update_prof'])){
    $table = 'special_users';
    $email = $_SESSION['email'];
    $id = user_ID($email,$table);
    $image = $_FILES['image']['name'];
    $path = '../img/'.$image;
    $pictype = $_FILES['image']['type'];
    $pic_size = $_FILES['image']['size'];
    $dir = URL_ROOT."/img/";
    $target = $dir.basename($_FILES['image']['name']);
    $type = pathinfo($target,PATHINFO_EXTENSION);
    $void = array('jpeg','png','jpg');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!empty($image)){
        $chk = update_img_func($id,$image,$table);
            if($chk==true){
                echo'<script>
                        alert("Profile Picture Updated Successfully!");
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
        <h2 class="h5 mb-0">Profile</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>
         <section class="pt-0">
          <div class="container-fluid">
               <div class="modal fade" id="prof" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel0">Update Profile Picture<i class="fa fa-user"></i></h5>
                                      </div>
                                      <div class="modal-body">
                                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label class="col-form-label">Image</label>
                                            <input class="dropify form-control" id="exampleInputPassword1" name="image" type="file" data-allowed-file-extensions="jpeg png jpg">
                                          </div>
                                            <center><div class="form-group mt-3">
                                          <input type="submit" class="btn btn-primary form-control" style="width: 50%;" name="update_prof" value="Update">
                                                </div></center>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
            <div class="row gy-4">
                <div class="col-lg-6">                                           
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-3">User Info</h3>
                      <?php
                        $email = $_SESSION['email'];
                            $ad = _user_info($email);
                                  if ($ad->num_rows > 0) {	
                                     while ($fetch = $ad->fetch_assoc()) {
                                      $id = $fetch['id'];
                                      $fn = $fetch['username'];
                                      $em = $fetch['email'];
                                      $img = $fetch['image'];
                                      $dt = $fetch['date'];
                            ?>
                      <a class="d-block d-flex align-items-center text-reset text-decoration-none bg-dash-dark-2 py-2 px-3"> 
                      <div class="position-relative">
                          <img src="../img/<?php echo $img; ?>" width="50%">
                          
                          <p><a class="btn btn-primary" style="background-color: indigo;" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#prof" data-whatever="@fat">Update Picture</a></p>
                          </div>
                      <div class="ms-3">
                          <ul>
                              <li>Username: <span style="font-size: 1.2rem; color: white;"> <?php echo $fn; ?></span></li>
                              <li>Email: <span style="font-size: 1.2rem; color: white;"><?php echo $em; ?></span></li>
                              <li>Date Joined: <span style="font-size: 1.2rem; color: white;"><?php echo $dt; ?></span></li>
                          </ul>
                      </div></a>
                      <?php
                             }
                              } else{
                                  echo '404 Error!';
                              }
                        ?>
                  </div>
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