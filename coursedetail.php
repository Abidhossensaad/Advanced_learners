<!-- Start navigation -->
<?php
include('./maininclude/header.php');
include_once('./dbConnection.php');

if (!isset($_SESSION)) {
    session_start();
}

// Success message handler
$successMsg = "";
$errorMsg = "";

// Handle course ID
if (isset($_GET['course_id'])) {
    $course_id = intval($_GET['course_id']);

    // Fetch course info
    $sql = "SELECT * FROM course WHERE course_id = $course_id";
    $result = $conn->query($sql);
    $course = $result->fetch_assoc();

    // Fetch lessons
    $lessons_sql = "SELECT lesson_id, lesson_name FROM lesson WHERE course_id = $course_id";
    $lessons_result = $conn->query($lessons_sql);
} else {
    echo "<script>location.href='index.php';</script>";
}
?>

<div class="container mt-5 pt-5" style="margin-top: 100px;">

    <?php
    // Handle course purchase
    if (isset($_POST['buy_course']) && isset($_SESSION['stuLogemail'])) {
        $stu_email = $_SESSION['stuLogemail'];
        $stu_sql = "SELECT stu_id FROM student WHERE stu_email = '$stu_email'";
        $stu_result = $conn->query($stu_sql);
        $stu_row = $stu_result->fetch_assoc();
        $stu_id = $stu_row['stu_id'];
        $course_id = intval($_POST['course_id']);

        $check_sql = "SELECT * FROM studentcourse WHERE stu_id = $stu_id AND course_id = $course_id";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 0) {
            $enroll_sql = "INSERT INTO studentcourse (stu_id, course_id) VALUES ($stu_id, $course_id)";
            if ($conn->query($enroll_sql)) {
                $successMsg = "🎉 You have successfully purchased this course!";
            } else {
                $errorMsg = "❌ Something went wrong. Please try again.";
            }
        } else {
            $errorMsg = "⚠️ You already purchased this course.";
        }
    }

    if ($successMsg != "") {
        echo '<div class="alert alert-success">' . $successMsg . '</div>';
    }
    if ($errorMsg != "") {
        echo '<div class="alert alert-danger">' . $errorMsg . '</div>';
    }
    ?>

    <div class="row">
        <div class="col-md-5">
            <img src="image/courseimg/<?php echo $course['course_img']; ?>" class="img-fluid" alt="<?php echo $course['course_name']; ?>">
        </div>

        <div class="col-md-7">
            <h2><?php echo $course['course_name']; ?></h2>
            <p><?php echo $course['course_desc']; ?></p>
            <p><b>Instructor:</b> <?php echo $course['course_author']; ?></p>
            <p><b>Duration:</b> <?php echo $course['course_duration']; ?></p>
            <p>
                <del>TK <?php echo $course['course_original_price']; ?></del>
                <span class="text-danger fw-bold fs-5 ms-2">TK <?php echo $course['course_price']; ?></span>
            </p>
            <?php
            if (isset($_SESSION['is_login'])) {
                echo '
                <form method="POST" action="">
                    <input type="hidden" name="course_id" value="' . $course_id . '">
                    <button type="submit" name="buy_course" class="buy-btn btn btn-success">Buy Now</button>
                </form>';
            } else {
                echo '<a href="#" class="buy-btn" style="text-decoration: none;" data-toggle="modal" data-target="#stuLoginModalCenter">Login to Buy</a>';
            }
            ?>
        </div>
    </div>

    <!-- Lesson List -->
    <div class="mt-5">
        <?php if ($lessons_result->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Course Lesson</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($lesson = $lessons_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $lesson['lesson_name']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-muted">No lessons added yet for this course.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Footer start -->
<?php include('./maininclude/footer.php') ?>
<!-- Footer end -->
