<?php
if(!isset($_SESSION)){
  session_start();
}

include('./admininclude/adminheader.php');
include ('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogemail'];
} else {
  echo "<script>location.href='../index.php';</script>";
  exit(); 
}

?>

<div class="col-sm-9 col-md-10 ms-sm-auto px-md-4 main-content mt-5">
  <!-- Table Header -->
  <p class="bg-dark text-white p-2">List of Courses</p>

  <?php
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) { 
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Course ID</th>
        <th scope="col">Course Name</th>
        <th scope="col">Author</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
       while($row = $result->fetch_assoc()){ 
        echo '<tr>';
        echo '<th scope="row">' . $row['course_id'] . '</th>';
        echo '<td>' . $row['course_name'] . '</td>';
        echo '<td>' . $row['course_author'] . '</td>';
        echo '<td>';
        
        // Fixed: added semicolon after first echo block
        echo '
        <form  action="editcourse.php" method="POST" class="d-inline">
          <input type="hidden" name="id" value=' . $row["course_id"] . '>
          <button
            type="submit"
            class="btn btn-info mr-3"
            name="view"
            value="view">
            <i class="fas fa-pen"></i>
          </button>
        </form>';

        // Second form remains the same
        echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value=' . $row["course_id"] . '>
                <button
                  type="submit"
                  class="btn btn-secondary"
                  name="delete"
                  value="Delete">
                  <i class="far fa-trash-alt"></i>
                </button>
              </form>';
        echo '</td></tr>';
      } ?>
    </tbody>
  </table>

  <?php 
    } else {
      echo "0 Result";
    }

    if (isset($_REQUEST['delete'])) {
      $sql = "DELETE FROM course WHERE course_id= {$_REQUEST['id']}";
      if ($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>
</div>

<div>
  <a class="btn btn-danger box" href="addCourse.php">
    <i class="fas fa-plus fa-2x"></i>
  </a>
</div>
