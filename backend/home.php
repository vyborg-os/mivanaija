<?php 
include_once('header.php');
?>
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
          <li class="breadcrumb-item"><a href="home">Home</a></li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#user-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Users</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-1"><?php 
                                    $table = 'users';
                                    $tc = total_tbl_fetch($table);
                                    echo $tc->num_rows; ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total News</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-2">
                        <?php 
                                    $table = 'blogs';
                                    $tc = total_tbl_fetch($table);
                                    echo $tc->num_rows; ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#survey-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Comments</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-3"><?php 
                                    $table = 'comments';
                                    $tc = total_tbl_fetch($table);
                                    echo $tc->num_rows; ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#paper-stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Categories</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-4"><?php 
                                    $table = 'category';
                                    $tc = total_tbl_fetch($table);
                                    echo $tc->num_rows; ?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-lg-12">
                <div class="card">
                  <div class="card-body"><strong>Recent Users</strong>
                    <div class="table-responsive">
                      <table class="table mb-0 table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Fullname</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php
                            $count = 1;
                            $table = 'users';
                            $tc = recent_tbl($table);
                                    if ($tc->num_rows > 0) {
                                       while ($ft = $tc->fetch_assoc()) {

                                     echo'
                                        <tr>
                                            <td>'.$count++.'</td>
                                            <td>
                                                '.$ft['email'].'
                                            </td>
                                            <td>
                                                '.$ft['name'].'
                                            </td>
                                            <td>'.$ft['updated_at'].'</td>
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
            </div>
          </div>
  </section>
<script src="js/jquery.3.2.1.min.js"></script>
</div>


<?php
include_once('footer.php');
?>