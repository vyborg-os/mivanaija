<?php 
include_once('header.php');
if(isset($_POST['addblog'])){
    $title = secure($_POST['title']);
    $content = $_POST['content'];
    $blog_category = $_POST['blog_category'];
    $blogt = $new_str = preg_replace("/\s+/", "_", $title);
    $blogd = date("Y_m_d_h_i");
    $blogurl = $blogt.'_'.$blogd;
    $table = 'blogs';
    $created_at = date("Y-m-d h-i-s");
    $folder = "blog/";
    $image = $_FILES['image']['name'];
    $pictype = $_FILES['image']['type'];
    $pic_size = $_FILES['image']['size'];
    $path = '../blog/'.$image;
    $dir = URL_ROOT."/blog/";
    $target = $dir.basename($_FILES['image']['name']);
    $type = pathinfo($target,PATHINFO_EXTENSION);
    $void = array('jpeg','png','jpg');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(empty($title) || empty($content)){
        echo'<script>
            alert("All fields are required!");
        </script>';
    }else if(!in_array($ext,$void)){
        echo'<script>
            alert("Picture not allowed, only jpg,jpeg,png");
        </script>';
    }else{
    $upl = post_blog($title,$content,$image,$blog_category,$blogurl,$created_at,$table);
    if($upl==true){
        echo'<script>
            alert("Blog Posted Sucessfully");
        </script>';
        $move = move_uploaded_file($_FILES['image']['tmp_name'], $path);
     }else{
        echo'<script>
            alert("Failed to Post Blog, Try again");
        </script>';
     }
    }
}
if(isset($_POST['editblog'])){
    $id = $_GET['edit'];
    $title = secure($_POST['title']);
    $content = secure($_POST['content']);
    $blog_category = $_POST['blog_category'];
    $table = 'blogs';
        if(empty($title) || empty($content)){
            echo'<script>
                alert("All fields are required!");
            </script>';
        }else{
        $upl = update_blog($id,$title,$content,$table);
            if($upl==true){
                echo'<script>
                    alert("Blog Updated Sucessfully");
                </script>';
             }else{
                echo'<script>
                    alert("Failed to Update Blog, Try again");
                </script>';
             }
        }
}
?>
<link
  rel="stylesheet"
  href="css/dropify.css"
  type="text/css"
/>
 <link href="https://cdn.jsdelivr.net/npm/froala-editor/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <div class="page-content form-page">
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
      <div class="container-fluid">
        <h2 class="h5 mb-0">Post Blog</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
        <div class="row gy-4">
          <!-- Basic Form-->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="h4 mb-0">Post Blog  <a href="postblog" class="btn btn-primary" style="background-color: orange;">Back</a>    </h3> 
              </div>
                <?php 
                if(isset($_GET['edit'])){
                    $id = $_GET['edit'];
                    $table = 'blogs';
                    $rrt = id_fetch_tbl($table,$id);
                    if ($rrt->num_rows > 0) {
                     while ($fetch = $rrt->fetch_assoc()) {
                        $idd = $fetch['id'];
                        $title = $fetch['title'];
                        $content = $fetch['content'];
                        $image = $fetch['image'];
                        $blog_cat = $fetch['blog_category'];
                        $date = $fetch['created_at'];
                         ?>
                  <div class="card-body pt-0">
                <p class="text-sm">Edit blog form</p>
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="bid" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Blog Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                  </div>
                      <select class="form-select mb-3" name="blog_category">
                        <option value="<?php echo $blog_cat; ?>"><?php 
                         $cid = $blog_cat; 
                         echo cat_id($cid); 
                        ?></option>
                         <?php
                            $table = 'category';
                            $rt = total_($table);
                            $count = 1;
                            if ($rt->num_rows > 0) {
                                 while ($fetch = $rt->fetch_assoc()) {
                                  $id = $fetch['id'];
                                  $ctn = $fetch['category_name'];
                                ?>
                        <option value="<?php echo $id; ?>"><?php echo $ctn; ?></option>
                          <?php } } ?>
                      </select>
                     <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Blog Contents</label>
                    <textarea id="additional-mskjg" class="ckeditor form-control" name="content" rows="8">
                      <?php echo $content; ?>
                    </textarea>
                  </div>
                   <input type="submit" name="editblog" class="btn btn-primary" value="Save" style="width: 100%">
                </form>
              </div>
                <?php
                     }
                    }else{
                        echo 'Error 404!';
                    }
                }
                else{
                    ?>
              <div class="card-body pt-0">
                <p class="text-sm">Post blog form</p>
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Blog Title</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                      <select class="form-select mb-3" name="blog_category">
                        <option>Choose Category</option>
                         <?php
                            $table = 'category';
                            $rt = total_($table);
                            $count = 1;
                            if ($rt->num_rows > 0) {
                                 while ($fetch = $rt->fetch_assoc()) {
                                  $id = $fetch['id'];
                                  $ctn = $fetch['category_name'];
                                ?>
                        <option value="<?php echo $id; ?>"><?php echo $ctn; ?></option>
                          <?php } } ?>
                      </select>
                     <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Blog Contents</label>
                    <textarea placeholder="Content" id="additional-mskjg" class="ckeditor form-control" name="content" rows="8">
                      
                    </textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="exampleInputPassword1">Blog Display Image</label>
                    <input class="dropify form-control" id="exampleInputPassword1" type="file" data-allowed-file-extensions="jpeg png jpg" name="image">
                  </div>
                   <input type="submit" name="addblog" class="btn btn-primary" value="Save" style="width: 100%">
                </form>
              </div>
            <?php
                }
                ?>
            </div>
        </div>
     </div>
      </div>
  </section>
<script src="js/jquery.3.2.1.min.js"></script>
<script src="js/dropify.js"></script>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor/js/froala_editor.pkgd.min.js"></script>-->
<!--<script src="ckeditor5-build-decoupled-document-35.2.0/ckeditor5-build-decoupled-document/ckeditor.js"></script>-->
<!--<script src="ckeditor5-build-classic-35.2.0/ckeditor5-build-classic/ckeditor.js"></script>-->
<script>
 $('.dropify').dropify();
</script>
<!--<script>
//         new FroalaEditor('textarea');
</script>

<script>
    DecoupledEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
-->
</div>


<?php
include_once('footer.php');
?>