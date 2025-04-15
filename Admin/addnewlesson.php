<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./admininclude/adminheader.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogemail'];
} else {
    echo "<script>location.href='../index.php';</script>";
    exit();
}

$course_id = isset($_GET['course_id']) ? $_GET['course_id'] : '';
$course_name = '';
if (!empty($course_id)) {
    $sql = "SELECT course_name FROM course WHERE course_id = '$course_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $course_name = $result->fetch_assoc()['course_name'];
    }
}

if (isset($_POST['lessonSubmitBtn'])) {
    if ($_POST['lesson_name'] == "" || $_POST['lesson_desc'] == "" || $_POST['lesson_link'] == "" || $_POST['course_id'] == "" || $_POST['course_name'] == "") {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2">Fill all fields</div>';
    } else {
        $lesson_name = $_POST['lesson_name'];
        $lesson_desc = $_POST['lesson_desc'];
        $lesson_link = $_POST['lesson_link'];
        $course_id = $_POST['course_id'];
        $course_name = $_POST['course_name'];

        $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) 
                VALUES ('$lesson_name', '$lesson_desc', '$lesson_link', '$course_id', '$course_name')";

        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 mt-2">Lesson Added Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 mt-2">Unable to Add Lesson</div>';
        }
    }
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color: rgb(221, 122, 23);">
                    <h4 class="mb-0">Add New Lesson</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">

                        <!-- Show Course Info -->
                        <div class="form-group mb-3">
                      
                            <p class="form-control-plaintext fw-bold">Course ID: <?php echo $course_id; ?></p>
                            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                        </div>

                        <div class="form-group mb-4">
                           
                            <p class="form-control-plaintext fw-bold"> Course Name: <?php echo $course_name; ?></p>
                            <input type="hidden" name="course_name" value="<?php echo $course_name; ?>">
                        </div>

                        <!-- Lesson Info -->
                        <div class="form-group mb-3">
                            <label for="lesson_name">Lesson Name:</label>
                            <input type="text" class="form-control shadow-sm" id="lesson_name" name="lesson_name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="lesson_desc">Lesson Description:</label>
                            <textarea class="form-control shadow-sm" id="lesson_desc" name="lesson_desc" rows="3"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="lesson_link">Lesson Link (URL):</label>
                            <input type="text" class="form-control shadow-sm" id="lesson_link" name="lesson_link">
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" id="lessonSubmitBtn" name="lessonSubmitBtn" class="btn btn-danger" style="background-color:rgb(221, 122, 23); color: white;">Submit</button>
                            <a type="button" class="btn btn-secondary" href="lessons.php">Close</a>
                        </div>

                        <?php if (isset($msg)) echo $msg; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
