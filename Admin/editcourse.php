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
  
// Initialize row
$row = [];

// Load course data if 'id' is provided (e.g., from "edit" button)
if (isset($_POST['id'])) {
    $course_id = $_POST['id'];
    $sql = "SELECT * FROM course WHERE course_id = $course_id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
}

// Handle form submission
if (isset($_POST['courseSubmitBtn'])) {
    $id = $_POST['course_id'];
    $name = $_POST['course_name'];
    $desc = $_POST['course_desc'];
    $author = $_POST['course_author'];
    $duration = $_POST['course_duration'];
    $original_price = $_POST['course_original_price'];
    $price = $_POST['course_price'];

    // If new image uploaded
    if ($_FILES['course_img']['name'] != "") {
        $img = $_FILES['course_img']['name'];
        $temp_name = $_FILES['course_img']['tmp_name'];
        $img_folder = '../image/courseimg/' . $img;
        move_uploaded_file($temp_name, $img_folder);
    } else {
        $img = $_POST['old_img'] ?? ''; // fallback to old image
    }

    $sql = "UPDATE course SET 
                course_name = '$name', 
                course_desc = '$desc', 
                course_author = '$author', 
                course_duration = '$duration', 
                course_price = '$price', 
                course_original_price = '$original_price', 
                course_img = '$img' 
            WHERE course_id = $id";

    if ($conn->query($sql) === TRUE) {
        $msg = '<div class="alert alert-success mt-3">Course Updated Successfully</div>';
    } else {
        $msg = '<div class="alert alert-danger mt-3">Unable to Update Course</div>';
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="pt-3 pb-3 card-header text-center" style="background-color:rgb(255, 0, 0); ">
                    <h4 class="mb-0 text-white">Edit Course Details</h4>
                </div>
                <div class="card-body">
                    <form id="addCourseForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="course_id" value="<?php echo $row['course_id'] ?? ''; ?>">
                        <input type="hidden" name="old_img" value="<?php echo $row['course_img'] ?? ''; ?>">

                        <div class="form-group mb-3">
                            <label for="course_name" class="form-label">Course Name:</label>
                            <input type="text" class="form-control shadow-sm" id="course_name" name="course_name" value="<?php echo $row['course_name'] ?? ''; ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="course_desc" class="form-label">Course Description:</label>
                            <textarea class="form-control shadow-sm" id="course_desc" name="course_desc" rows="3"><?php echo $row['course_desc'] ?? ''; ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="course_author" class="form-label">Author:</label>
                            <input type="text" class="form-control shadow-sm" id="course_author" name="course_author" value="<?php echo $row['course_author'] ?? ''; ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="course_duration" class="form-label">Course Duration (hours):</label>
                            <input type="number" class="form-control shadow-sm" id="course_duration" name="course_duration" min="1" value="<?php echo $row['course_duration'] ?? ''; ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="course_original_price" class="form-label">Original Price:</label>
                            <input type="number" step="0.01" class="form-control shadow-sm" id="course_original_price" name="course_original_price" min="0" value="<?php echo $row['course_original_price'] ?? ''; ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="course_price" class="form-label">Selling Price:</label>
                            <input type="number" step="0.01" class="form-control shadow-sm" id="course_price" name="course_price" min="0" value="<?php echo $row['course_price'] ?? ''; ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="course_img" class="form-label">Course Image:</label>
                            <input type="file" class="form-control shadow-sm" id="course_img" name="course_img" accept="image/*">
                            <?php if (!empty($row['course_img'])): ?>
                                <img src="../image/courseimg/<?php echo $row['course_img']; ?>" class="img-thumbnail mt-2" width="150">
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" id="courseSubmitBtn" name="courseSubmitBtn" class="btn btn-danger" style="background-color:rgb(255, 0, 0); color: white;">Update</button>
                            <a type="button" class="btn btn-secondary" href="coursesadmin.php">Close</a>
                        </div>

                        <?php if (isset($msg)) echo $msg; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
