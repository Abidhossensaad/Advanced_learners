<?php
if (!isset($_SESSION)) {
    session_start();
}

include('./stuinclude/stuheader.php');
include('../dbConnection.php');

if (!isset($_SESSION['is_login'])) {
    echo "<script>location.href='../index.php';</script>";
    exit();
}

$stuEmail = $_SESSION['stuLogemail'];
$stuQuery = "SELECT stu_id FROM student WHERE stu_email = '$stuEmail'";
$stuResult = $conn->query($stuQuery);
$stuRow = $stuResult->fetch_assoc();
$stu_id = $stuRow['stu_id'];

// Get enrolled courses
$courseQuery = "SELECT c.course_id, c.course_name, c.course_img
                FROM studentcourse sc
                JOIN course c ON sc.course_id = c.course_id
                WHERE sc.stu_id = $stu_id";
$courseResult = $conn->query($courseQuery);
?>

<div class="container mt-5 pt-5">
    <h2 class="mb-4">📚 My Enrolled Courses</h2>

    <?php if ($courseResult->num_rows > 0): ?>
        <?php while ($course = $courseResult->fetch_assoc()): ?>
            <div class="mb-4">
                <h4><?php echo $course['course_name']; ?></h4>
                <img src="../image/courseimg/<?php echo $course['course_img']; ?>" class="img-fluid rounded shadow-sm mb-3" style="max-width: 300px;">

                <!-- Lessons Table -->
                <?php
                $courseId = $course['course_id'];
                $lessonQuery = "SELECT lesson_name, lesson_link FROM lesson WHERE course_id = $courseId";
                $lessonResult = $conn->query($lessonQuery);
                ?>

                <?php if ($lessonResult && $lessonResult->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Lesson Name</th>
                                    <th>Watch</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($lesson = $lessonResult->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $lesson['lesson_name']; ?></td>
                                        <td>
                                            <a href="<?php echo $lesson['lesson_link']; ?>" target="_blank" class="btn btn-sm btn-primary">
                                                ▶ Watch
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted">No lessons available for this course.</p>
                <?php endif; ?>
            </div>
            <hr>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-muted">You have not enrolled in any courses yet.</p>
    <?php endif; ?>
</div>
