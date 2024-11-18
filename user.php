<?php require('header.php');
$getUserList = $db->UserList($db, $db->con);

$searchTerm = '';
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $getUserList = $db->searchUserList($db, $db->con, $searchTerm);
}


if (isset($_POST['btntest'])) {
    
    $userId = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 

   $updateQuery = "UPDATE users SET name = ?, email = ?, password = ? WHERE user_id = ?";
$bind = array($username, $email, $password, $userId);

if ($db->executeQuery($db->con, $updateQuery, $bind)) {
    $_SESSION['success'] = "User updated successfully.";
} else {
    $_SESSION['error'] = "Failed to update user.";
}
}

if (isset($_POST['btntest1'])) {
    $userId = $_POST['id'];

    $deleteQuery = "UPDATE users SET is_active = 'N' WHERE user_id = ?";
    
$bind = array($userId);

if ($db->executeQuery($db->con, $deleteQuery, $bind)) {
    $_SESSION['success'] = "User Deleted successfully.";
} else {
    $_SESSION['error'] = "Failed to update user.";
}
}
?>

<div class="content-page">
<div class="content">
<div class="container-xxl">

<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
<div class="flex-grow-1">
<h4 class="fs-18 fw-semibold m-0">Users  <?php //echo gmp_fact(4); ?></h4>
</div>
</div>


<div class="card">
<div class="card-body">
<div class="d-flex align-items-center">
<div class="fs-15 mb-1" style="color:#537AEF"><b>User list</b></div>
</div>


<?php if($_SESSION['user_id']=='1'){ ?>

<div class="row" id="">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <?php if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success">
            <strong>Success!</strong> <?php echo $_SESSION['success']; ?>.
          </div>
        <?php unset($_SESSION['success']); } ?>

        <?php if (isset($_SESSION['error'])) { ?>
          <div class="alert alert-danger">
            <strong>Fail!</strong> <?php echo $_SESSION['error']; ?>.
          </div>
        <?php unset($_SESSION['error']); } ?>

         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-3">
          <div class="py-2">
            <div class="col-md-4" style="display:inline-block;margin-right: 10px;">
              <input type="text" class="form-control" name="searchTerm" placeholder="Search by Username or Email" value="<?php echo htmlspecialchars($searchTerm); ?>">
            </div>
            <div class="col-md-4" style="display:inline-block;margin-right: 10px;">
              <button type="submit" name="search" class="btn btn-primary">Search</button>
              <button type="reset" class="btn btn-primary" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'">Reset</button>
            </div>
          </div>
        </form>

        <div class="table-responsive">
<h6>User List</h6>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <table class="table table-traffic table-bordered ">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php   

              if($getUserList) {
              $i = 1;
              foreach ($getUserList as $users) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?= $users['name'] ?></td>
                  <td><?= $users['email'] ?></td>
                  <td>
                    <a type="button" class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#edituser<?= $users['user_id'] ?>" title="Edit User" style="padding: 4px;"><i data-feather="edit"></i></span></a>
                    <a type="button" class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#deleteuser<?= $users['user_id'] ?>" title="Delete User" style="padding: 4px;"><i data-feather="trash"></i></span></a>
                  </td>

                  <!-- Edit Modal -->
                  <div class="modal fade" id="edituser<?= $users['user_id'] ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header" >
                          <h4 class="modal-title">Update Record</h4>
                        </div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                          <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" value="<?= $users['user_id'] ?>" readonly>
                            <div class="form-group row py-1">
                              <label class="control-label col-md-3">User Name</label>
                              <div class="col-md-8">
                                <input class="form-control" type="text" name="username" value="<?= $users['name'] ?>">
                              </div>
                            </div>
                            <div class="form-group row py-1">
                              <label class="control-label col-md-3">Email</label>
                              <div class="col-md-8">
                                <input class="form-control" type="text" name="email" value="<?= $users['email'] ?>">
                              </div>
                            </div>
                            <div class="form-group row py-1">
                              <label class="control-label col-md-3">Password</label>
                              <div class="col-md-8">
                                <input class="form-control" type="text" name="password" value="<?= $users['password'] ?>">
                                <small class="form-text text-muted">Leave blank to keep current password.</small>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            
                           <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                           <button class="btn btn-primary" name="btntest" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteuser<?= $users['user_id'] ?>" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header" >
                          <h4 class="modal-title" >Delete Record</h4>
                        </div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                          <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" value="<?= $users['user_id'] ?>" readonly>
                            Are you sure you want to delete this record?
                          </div>
                          <div class="modal-footer">
                          	<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" name="btntest1" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Delete Record</button>
                           
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </tr>
              <?php $i++; } } else{  ?> <tr><td colspan="4">No Records Found</td></tr> <?php } ?>
            </tbody>
          </table>
        </form>
    </div>
      </div>            
    </div>
  </div>
</div>

<?php } else { ?>

<h3>No, You dont have access to this page.</h3>
<?php } ?>


</div>
</div>
</div>

</div>
</div>

<?php
require('footer.php'); ?>