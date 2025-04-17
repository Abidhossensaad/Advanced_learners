<?php
if (!isset($_SESSION)) {
  session_start();
}

include('./admininclude/adminheader.php');
include('../dbConnection.php');

if (!isset($_SESSION['is_admin_login'])) {
  echo "<script>location.href='../index.php';</script>";
  exit();
}

// Delete feedback if requested
if (isset($_REQUEST['delete'])) {
  $feedbackId = $_REQUEST['id'];
  $sql = "DELETE FROM feedback WHERE f_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $feedbackId);
  if ($stmt->execute()) {
    $msg = '<div class="alert alert-success">Feedback deleted successfully.</div>';
  } else {
    $msg = '<div class="alert alert-danger">Unable to delete feedback.</div>';
  }
}

?>

<div class="col-sm-9 col-md-10 ms-sm-auto px-md-4 mt-5">
  <h3 class="bg-dark text-white p-2">Student Feedback</h3>
  <?php if (isset($msg)) echo $msg; ?>

  <?php
  $sql = "SELECT f.f_id, f.f_content, s.stu_name 
          FROM feedback f 
          JOIN student s ON f.stu_id = s.stu_id 
          ORDER BY f.f_id DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo '<table class="table table-striped mt-3">
            <thead>
              <tr>
                <th scope="col">Student Id</th>
                <th scope="col">Student Name</th>
                <th scope="col">Feedback</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_assoc()) {
      echo '<tr>
              <th scope="row">' . $row["f_id"] . '</th>
              <td>' . htmlspecialchars($row["stu_name"]) . '</td>
              <td>' . htmlspecialchars($row["f_content"]) . '</td>
              <td>
                <form method="POST" class="d-inline">
                  <input type="hidden" name="id" value="' . $row["f_id"] . '">
                  <button type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this feedback?\')">
                    Delete
                  </button>
                </form>
              </td>
            </tr>';
    }

    echo '</tbody></table>';
  } else {
    echo '<div class="alert alert-info mt-3">No feedback found.</div>';
  }
  ?>
</div>
