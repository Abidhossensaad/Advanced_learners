<?php
if (!isset($_SESSION)) {
    session_start();
}

include('./stuinclude/stuheader.php');
include('../dbConnection.php');

// Check if student is logged in
if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogemail'];
} else {
    echo "<script>location.href='../index.php';</script>";
    exit();
}

// Get student details
$sql = "SELECT stu_id, stu_name FROM student WHERE stu_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $stuEmail);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$stu_id = $row['stu_id'] ?? 0;
$stu_name = $row['stu_name'] ?? '';

// Handle feedback form submission
$msg = "";
if (isset($_POST['submitFeedbackBtn'])) {
    $f_content = trim($_POST['f_content']);

    if (!empty($f_content)) {
        $insert_sql = "INSERT INTO feedback (f_content, stu_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("si", $f_content, $stu_id);

        if ($insert_stmt->execute()) {
            $msg = '<div class="alert alert-success mt-2">Feedback submitted successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger mt-2">Failed to submit feedback.</div>';
        }
    } else {
        $msg = '<div class="alert alert-warning mt-2">Please write your feedback before submitting.</div>';
    }
}
?>

<!-- Feedback Form -->
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">Student Feedback</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="stuName" class="form-label">Name:</label>
            <input type="text" class="form-control" id="stuName" name="stuName" value="<?php echo htmlspecialchars($stu_name); ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="f_content" class="form-label">Your Feedback:</label>
            <textarea class="form-control" id="f_content" name="f_content" rows="4" required></textarea>
        </div>

        <button type="submit" name="submitFeedbackBtn" class="btn btn-primary" style="background-color:black;">Submit</button>
        <?php if (!empty($msg)) echo $msg; ?>
    </form>
</div>


