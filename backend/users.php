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
        <h2 class="h5 mb-0">All Users</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">All users</li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
        <div class="row gy-4">
          <!-- Basic Form-->
          <div class="col-lg-12">
             <div class="table-responsive">
                      <table class="table mb-0 table-striped table-hover" id="example">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Date Joined</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $count = 1;
                            $table = 'users';
                            $tc = fetch_all_data_raw($table);
                                    if ($tc->num_rows > 0) {
                                       while ($ft = $tc->fetch_assoc()) {

                                     echo'
                                        <tr>
                                            <td>'.$count++.'</td>
                                            <td>
                                                '.$ft['name'].'
                                            </td>
                                            <td>
                                                '.$ft['email'].'
                                            </td>
                                            <td>'.$ft['created_at'].'</td>
                                            <td><a href="javascript:void(0);" class="userdel btn btn-danger" id="'.$ft['id'].'">Delete</a></td>
                                         </tr>';
                                    }
                                }else{
                                    echo'<tr><td><td>No Data</td></td></tr>';
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