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

$adminEmail = $_SESSION['adminLogemail'];
$row = [];

$lesson_id = $_POST['lesson_id'] ?? $_GET['lesson_id'] ?? null;

// Fetch lesson info with course name using JOIN
if ($lesson_id) {
    $sql = "SELECT lesson.*, course.course_name 
            FROM lesson 
            JOIN course ON lesson.course_id = course.course_id 
            WHERE lesson.lesson_id = '$lesson_id'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        $msg = '<div class="alert alert-danger mt-2">Lesson not found.</div>';
    }
}

// Handle update
if (isset($_POST['updateLesson'])) {
    $lesson_id = $_POST['lesson_id'];
    $lesson_name = $_POST['lesson_name'];
    $lesson_desc = $_POST['lesson_desc'];
    $lesson_link = $_POST['lesson_link'];

    $sql = "UPDATE lesson SET 
                lesson_name = '$lesson_name',
                lesson_desc = '$lesson_desc',
                lesson_link = '$lesson_link'
            WHERE lesson_id = '$lesson_id'";

    if ($conn->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success col-sm-6 mt-2'>Lesson Updated Successfully!</div>";

        // Refresh course name again
        $sql = "SELECT lesson.*, course.course_name 
                FROM lesson 
                JOIN course ON lesson.course_id = course.course_id 
                WHERE lesson.lesson_id = '$lesson_id'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
    } else {
        $msg = "<div class='alert alert-danger col-sm-6 mt-2'>Failed to Update Lesson</div>";
    }
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color: rgb(221, 122, 23);">
                    <h4 class="mb-0">Edit Lesson</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($row)) : ?>
                        <form method="POST">
                            <input type="hidden" name="lesson_id" value="<?php echo $row['lesson_id']; ?>">

                            <!-- Course Info -->
                            <div class="form-group mb-3">
                                <label class="form-label mr-2">Course ID:</label>
                                <p class="form-control-plaintext fw-bold mb-0"><?php echo $row['course_id']; ?></p>
                                <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label mr-2">Course Name:</label>
                                <p class="form-control-plaintext fw-bold mb-0"><?php echo $row['course_name']; ?></p>
                                <input type="hidden" name="course_name" value="<?php echo $row['course_name']; ?>">
                            </div>

                            <!-- Lesson Info -->
                            <div class="form-group mb-3">
                                <label for="lesson_name">Lesson Name:</label>
                                <input type="text" class="form-control shadow-sm" id="lesson_name" name="lesson_name" value="<?php echo $row['lesson_name']; ?>">
                            </div>

                            <div class="form-group mb-3">
                                <label for="lesson_desc">Lesson Description:</label>
                                <textarea class="form-control shadow-sm" id="lesson_desc" name="lesson_desc" rows="3"><?php echo $row['lesson_desc']; ?></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="lesson_link">Lesson Link (URL):</label>
                                <input type="text" class="form-control shadow-sm" id="lesson_link" name="lesson_link" value="<?php echo $row['lesson_link']; ?>">
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" name="updateLesson" class="btn btn-danger" style="background-color:rgb(221, 122, 23); color: white;">Update</button>
                                <a href="lessons.php" class="btn btn-secondary">Back</a>
                            </div>

                            <?php if (isset($msg)) echo $msg; ?>
                        </form>

                    <?php else : ?>
                        <div class="alert alert-info">No lesson selected for editing.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
