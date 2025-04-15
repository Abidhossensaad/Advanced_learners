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
  

if (isset($_REQUEST['courseSubmitBtn'])) {
    if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "")) {
        $msg = '<div  class="alert alert-warning col-sm-6 ml-5 mt-2>
        Fill All fields </div>';
    } else {
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_price = $_REQUEST['course_price'];
        $course_image = $_FILES['course_img']['name'];
        $ourse_imqge_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../image/courseimg/' . $course_image;
        move_uploaded_file($ourse_imqge_temp, $img_folder);

        $sql = "INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) 
        VALUES ('$course_name', '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";

        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course! Error: ' . $conn->error . '</div>';
        }
    }
}


?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header text-center" style="background-color:rgb(221, 101, 41);">
                    <h4 class="mb-0 text-white">Add New Course</h4>
                </div>
                <div class="card-body">
                    <form id="addCourseForm" method="POST" enctype="multipart/form-data">
                        <!-- Course Name -->
                        <div class="form-group mb-3">
                            <label for="course_name" class="form-label">Course Name:</label>
                            <input type="text" class="form-control shadow-sm" id="course_name" name="course_name">
                        </div>

                        <!-- Course Description -->
                        <div class="form-group mb-3">
                            <label for="course_desc" class="form-label">Course Description:</label>
                            <textarea class="form-control shadow-sm" id="course_desc" name="course_desc" rows="3" style="box-shadow: 0 0 10px rgba(0,0,0,0.1) !important;"></textarea>
                        </div>

                        <!-- Author -->
                        <div class="form-group mb-3">
                            <label for="course_author" class="form-label">Author:</label>
                            <input type="text" class="form-control shadow-sm" id="course_author" name="course_author">
                        </div>

                        <div class="form-group mb-3">
                            <!-- Course Duration -->
                            <div class="col-md-6 mb-3">
                                <label for="course_duration" class="form-label">Course Duration (hours):</label>
                                <input type="number" class="form-control shadow-sm" id="course_duration" name="course_duration" min="1">
                            </div>

                            <!-- Original Price -->
                            <div class="form-group col-md-6 mb-3">
                                <label for="course_original_price" class="form-label">Original Price :</label>
                                <input type="number" step="0.01" class="form-control shadow-sm" id="course_original_price" name="course_original_price" min="0">
                            </div>
                        </div>

                        <!-- Selling Price -->
                        <div class="form-group mb-3">
                            <label for="course_price" class="form-label">Selling Price :</label>
                            <input type="number" step="0.01" class="form-control shadow-sm" id="course_price" name="course_price" min="0">
                        </div>

                        <!-- Course Image -->
                        <div class="form-group mb-3">
                            <label for="course_img" class="form-label">Course Image:</label>
                            <input type="file" class="form-control shadow-sm" id="course_img" name="course_img" accept="image/*">

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">

                            <button type="submit" id="courseSubmitBtn" name="courseSubmitBtn" class="btn btn-danger" style="background-color:rgb(221, 122, 23); color: white;">Submit</button>
                            <a type="button" class="btn btn-secondary" href="coursesadmin.php"> Close</a>
                        </div>

                        <?php if (isset($msg)) {
                            echo $msg;
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>