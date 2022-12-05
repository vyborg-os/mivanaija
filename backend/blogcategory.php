<?php 
include_once('header.php');
if(isset($_POST['addcat'])){
    $table = 'category';
    $category_name = secure($_POST['category_name']);
    $category_description = secure($_POST['category_description']);
    if(!empty($category_name) || !empty($category_description)){
        $chk = add_category($category_name,$category_description,$table);
            if($chk==true){
                echo'<script>
                        alert("Blog Category Created Successfully!");
                    </script>';
            }else{
                echo'<script>
                        alert("Cannot Create try later");
                    </script>';
            }
             
    }else{
        echo'<script>
                alert("All fields are mandatory!");
            </script>';
    }
}
if(isset($_POST['editcat'])){
    $table = 'category';
    $id = $_POST['cid'];
    $category_name = secure($_POST['category_name']);
    $category_description = secure($_POST['category_description']);
    if(!!empty($category_name) || !empty($category_description)){
        $chk = update_category($id,$category_name,$category_description,$table);
            if($chk==true){
                echo'<script>
                        alert("Category Updated Successfully!");
                    </script>';
            }else{
                echo'<script>
                        alert("Cannot Update try later");
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
        <h2 class="h5 mb-0">Blog Categories</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
        <div class="row gy-4">
             <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="mb-0">Create Category</h3>
                  </div>
                  <div class="card-body pt-0 text-center">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Create + </button>
                    <!-- Modal-->
                    <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">New Category</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Create New Category</p>
                             <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                              <div class="mb-3">
                                <label class="form-label" for="modalInputEmail1">Category Name</label>
                                <input class="form-control" id="modalInputText1" type="text" name="category_name" aria-describedby="textHelp">
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="modalInputPassword1">Category Description</label>
                                <input class="form-control" id="modalInputPassword1" name="category_description" type="text">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                             <input type="submit" value="Save" name="addcat" class="btn btn-primary">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <div class="col-lg-12">
             <div class="table-responsive">
                      <table class="table mb-0 table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                             <?php
                            $table = 'category';
                            $rt = total_($table);
                            $count = 1;
                            if ($rt->num_rows > 0) {
                                 while ($fetch = $rt->fetch_assoc()) {
                                  $id = $fetch['id'];
                                  $ctn = $fetch['category_name'];
                                  $ctd = $fetch['category_description'];
                                ?>
                          <tr>
                            <th scope="row"><?php echo $count++; ?></th>
                            <td><?php echo $ctn; ?></td>
                            <td><?php echo $ctd; ?></td>
                            <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cat<?php echo $id; ?>">Edit</a></td>
                          </tr>
                    <div class="modal fade text-start" id="cat<?php echo $id; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Edit Category</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Category</p>
                              <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="cid" value="<?php echo $id; ?>">
                              <div class="mb-3">
                                <label class="form-label" for="modalInputEmail1">Category Name</label>
                                <input class="form-control" id="modalInputText1" type="text" name="category_name" value="<?php echo $ctn; ?>" aria-describedby="textHelp">
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="modalInputPassword1">Category Description</label>
                                <input class="form-control" id="modalInputPassword1" name="category_description" value="<?php echo $ctd; ?>" type="text">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <input type="submit" value="Save" name="editcat" class="btn btn-primary">
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
</div>


<?php
include_once('footer.php');
?>