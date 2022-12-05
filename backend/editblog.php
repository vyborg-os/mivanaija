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
        <h2 class="h5 mb-0">Edit Blog</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
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
                <h3 class="h4 mb-0">Edit Post Blog</h3>
              </div>
              <div class="card-body pt-0">
                <p class="text-sm">Edit Post blog form</p>
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Blog Title</label>
                    <textarea id="summernote" class="form-control" name="blog_title">
                      
                    </textarea>
                  </div>
                      <select class="form-select mb-3" name="blog_category">
                        <option>Choose Category</option>
                        <option>Trending</option>
                        <option>Fashion</option>
                        <option>News</option>
                      </select>
                     <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1" >Blog Contents</label>
                    <textarea id="editor" class="form-control" name="blog_content" rows="8">
                      
                    </textarea>
                  </div>
                  <button class="btn btn-primary" type="submit" style="width: 100%;">Submit</button>
                </form>
              </div>
            </div>
        </div>
     </div>
      </div>
  </section>
<script src="js/jquery.3.2.1.min.js"></script>
<script src="js/dropify.js"></script>
<!--<script src="ckeditor5-build-decoupled-document-35.2.0/ckeditor5-build-decoupled-document/ckeditor.js"></script>-->
<script src="ckeditor5-build-classic-35.2.0/ckeditor5-build-classic/ckeditor.js"></script>
<script>
 $('.dropify').dropify();
</script>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
 </script>
<!--
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