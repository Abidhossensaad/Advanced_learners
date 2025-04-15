<?php
if (!isset($_SESSION)) {
  session_start();
}

include('./admininclude/adminheader.php');
include('../dbConnection.php');

if (!isset($_SESSION['is_admin_login']) || !isset($_SESSION['adminLogemail'])) {
  echo "<script>location.href='../index.php';</script>";
  exit();
}

$adminEmail = $_SESSION['adminLogemail']; // Get admin email
$msg = "";

if (isset($_POST['adminPassUpdateBtn'])) {
  $old_pass = trim($_POST['old_pass']);
  $new_pass = trim($_POST['new_pass']);

  if (empty($old_pass) || empty($new_pass)) {
    $msg = '<div class="alert alert-warning col-sm-6 mt-2">All fields are required.</div>';
  } else {
    $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail' AND admin_pass = '$old_pass'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
      $update_sql = "UPDATE admin SET admin_pass = '$new_pass' WHERE admin_email = '$adminEmail'";
      if ($conn->query($update_sql) === TRUE) {
        $msg = '<div class="alert alert-success col-sm-6 mt-2">Password Updated Successfully!</div>';
      } else {
        $msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Update Password!</div>';
      }
    } else {
      $msg = '<div class="alert alert-danger col-sm-6 mt-2">Old Password is Incorrect!</div>';
    }
  }
}
?>

<div class="col-sm-9 col-md-10 ms-sm-auto px-md-4 mt-5">
  <p class="bg-dark text-white p-2">Change Admin Password</p>

  <form method="POST">
    <div class="form-group mb-3">
      <label class="form-label">Admin Email:</label>
      <p class="form-control-plaintext fw-bold"><?php echo $adminEmail; ?></p>
    </div>

    <div class="form-group mb-3">
      <label for="old_pass" class="form-label">Old Password</label>
      <input type="password" class="form-control" name="old_pass" id="old_pass" required>
    </div>

    <div class="form-group mb-3">
      <label for="new_pass" class="form-label">New Password:</label>
      <input type="password" class="form-control" name="new_pass" id="new_pass" required>
    </div>

    <button type="submit" class="btn btn-danger" name="adminPassUpdateBtn">Update Password:</button>

    <?php if (isset($msg)) echo $msg; ?>
  </form>
</div>
