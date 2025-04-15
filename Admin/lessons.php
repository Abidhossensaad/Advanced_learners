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
?>

<div class="col-sm-9 col-md-10 ms-sm-auto px-md-4 main-content mt-5">
    <!-- Search by Course ID -->
    <form action="" method="POST" class="mt-3 d-flex align-items-center d-print-none">
        <label for="checkid" class="me-2">Enter Course ID:</label>
        <input type="text" class="form-control form-control-sm me-2" id="checkid" name="checkid" style="width: 180px;">
        <button type="submit" class="btn btn-sm btn-dark">Search</button>
    </form>

    <?php
    if (isset($_POST['checkid']) && $_POST['checkid'] != '') {
        $course_id = $_POST['checkid'];
        $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo '<h5 class="mt-4">Course ID: <strong>' . $row['course_id'] . '</strong></h5>';
            echo '<h5>Course Name: <strong>' . $row['course_name'] . '</strong></h5>';

            $lessonSql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
            $lessonResult = $conn->query($lessonSql);
            if ($lessonResult->num_rows > 0) {
                echo '<p class="bg-dark text-white p-2 mt-4">List of Lessons</p>';
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Lesson ID</th>
                                <th scope="col">Lesson Name</th>
                                <th scope="col">Lesson Link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                while ($lesson = $lessonResult->fetch_assoc()) {
                    echo '<tr>
                            <th scope="row">' . $lesson['lesson_id'] . '</th>
                            <td>' . $lesson['lesson_name'] . '</td>
                            <td>' . $lesson['lesson_link'] . '</td>
                            <td>
                                <form action="editlesson.php" method="POST" class="d-inline">
                                    <input type="hidden" name="lesson_id" value="' . $lesson["lesson_id"] . '">
                                    <button type="submit" class="btn btn-info btn-sm" name="edit" value="edit">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </form>
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="lesson_id" value="' . $lesson["lesson_id"] . '">
                                    <button type="submit" class="btn btn-secondary btn-sm" name="delete" value="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<div class="alert alert-warning mt-4">No lessons found for this course.</div>';
            }

            echo '<a class="btn btn-danger box mt-3" href="addnewlesson.php?course_id=' . $row['course_id'] . '&course_name=' . urlencode($row['course_name']) . '">
                    <i class="fas fa-plus fa-2x"></i>
                  </a>';
        } else {
            echo '<div class="alert alert-danger mt-4">Invalid Course ID</div>';
        }
    }

    // Delete Lesson
    if (isset($_POST['delete'])) {
        $lesson_id = $_POST['lesson_id'];
        $delSql = "DELETE FROM lesson WHERE lesson_id = '$lesson_id'";
        if ($conn->query($delSql) === TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo '<div class="alert alert-danger mt-4">Unable to delete lesson.</div>';
        }
    }
    ?>
</div>
