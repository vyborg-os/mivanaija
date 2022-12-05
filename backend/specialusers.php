<?php 
include_once('header.php');
if(isset($_POST['addspecials'])){
    $table = 'special_users';
    $name = secure($_POST['name']);
    $email = secure($_POST['email']);
    $pass = secure($_POST['password']);
    $passwordy = password_hash($pass, PASSWORD_BCRYPT);
    $role_type = secure($_POST['role_type']);
    if(!empty($name) || !empty($email) || !empty($pass) || !empty($role_type)){
        $chk = add_admin_($name,$email,$passwordy,$role_type,$table);
            if($chk==true){
                echo'<script>
                        alert("Account Created Successfully!");
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
if(isset($_POST['editspecials'])){
    $table = 'special_users';
    $id = $_POST['uid'];
    $name = secure($_POST['name']);
    $email = secure($_POST['email']);
    $role_type = secure($_POST['role_type']);
    if(!empty($name) || !empty($email) || !empty($role_type)){
        $chk = update_special_user($id,$name,$email,$role_type,$table);
            if($chk==true){
                echo'<script>
                        alert("Account Updated Successfully!");
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
  <div class="page-content form-page">
    <!-- Page Header-->
    <div class="bg-dash-dark-2 py-4">
      <div class="container-fluid">
        <h2 class="h5 mb-0">Special Users</h2>
      </div>
    </div>
    <!-- Breadcrumb-->
    <div class="container-fluid py-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 py-3 px-0">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Special-Users</li>
        </ol>
      </nav>
    </div>
      <section class="pt-0"> 
      <div class="container-fluid">
        <div class="row gy-4">
             <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="mb-0">Create Special User</h3>
                  </div>
                  <div class="card-body pt-0 text-center">
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Create + </button>
                    <!-- Modal-->
                    <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">New Special User</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Create new</p>
                              <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                              <div class="mb-3">
                                <label class="form-label" for="modalInputEmail1">Username</label>
                                <input class="form-control" id="modalInputText1" type="text" name="name" aria-describedby="textHelp" required autocomplete="off">
                              </div>
                                <div class="mb-3">
                                <label class="form-label" for="modalInputEmail1">Email</label>
                                <input class="form-control" id="modalInputText1" type="email" name="email" aria-describedby="textHelp" required autocomplete="off">
                              </div>
                                <label class="form-label" for="modalInputEmail1">Choose User Role</label>
                                 <select class="form-select mb-3" name="role_type">
                                    <option selected disabled>Choose Role</option>
                                    <option>Moderator</option>
                                    <option>Writer</option>
                                  </select>
                              <div class="mb-3">
                                <label class="form-label" for="modalInputPassword1">Password</label>
                                <input class="form-control" id="modalInputPassword1" name="password" type="password" required autocomplete="off">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <input type="submit" value="Save" name="addspecials" class="btn btn-primary">
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $table = 'special_users';
                            $rt = total_2($table);
                            $count = 1;
                            if ($rt->num_rows > 0) {
                                 while ($fetch = $rt->fetch_assoc()) {
                                  $id = $fetch['id'];
                                  $nm = $fetch['username'];
                                  $mail = $fetch['email'];
                                  $role = $fetch['role_type'];
                                ?>
                          <tr>
                            <th scope="row"><?php echo $count++; ?></th>
                            <td><?php echo $nm; ?></td>
                            <td><?php echo $mail; ?></td>
                            <td><?php echo $role; ?></td>
                            <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uedit<?php echo $id; ?>">Edit</a><a href="#" class="delsuser btn btn-danger" id="<?php echo $id; ?>">Delete</a></td>
                          </tr>
                    <div class="modal fade text-start" id="uedit<?php echo $id; ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Edit Special User</h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Edit Special User</p>
                              <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="<?php echo $id; ?>">
                              <div class="mb-3">
                                <label class="form-label" for="modalInputEmail1">Username</label>
                                <input class="form-control" id="modalInputText1" type="text" name="name" aria-describedby="textHelp" required autocomplete="off" value="<?php echo $nm; ?>">
                              </div>
                                <div class="mb-3">
                                <label class="form-label" for="modalInputEmail1">Email</label>
                                <input class="form-control" id="modalInputText1" type="email" name="email" aria-describedby="textHelp" required autocomplete="off" value="<?php echo $mail; ?>">
                              </div>
                                <label class="form-label" for="modalInputEmail1">Choose User Role</label>
                                 <select class="form-select mb-3" name="role_type">
                                    <option><?php echo $role; ?></option>
                                    <option>Moderator</option>
                                    <option>Writer</option>
                                  </select>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                              <input type="submit" value="Save" name="editspecials" class="btn btn-primary">
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                            <?php
                                 }
                            }else{
                                echo'<tr><td><td>No Special users </td></td></tr>';
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