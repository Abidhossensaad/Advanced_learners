<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['is_login']) || !isset($_SESSION['stuLogemail'])) {
    header("Location: ../index.php");
    exit();
}

include_once('../dbConnection.php');
$stuEmail = $_SESSION['stuLogemail'];
$stu_img = 'default-user.png';

// Use session if available
if (isset($_SESSION['stu_img']) && !empty($_SESSION['stu_img'])) {
    $stu_img = $_SESSION['stu_img'];
} else {
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stu_img = !empty($row['stu_img']) ? $row['stu_img'] : 'default-user.png';
        $_SESSION['stu_img'] = $stu_img; // cache to session
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../css/student.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler me-2" type="button" onclick="toggleSidebar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../index.php">
            AdvancedLearners &nbsp;<small>(Student's Profile Area)</small>
        </a>
    </div>
</nav>


<!-- Sidebar -->
<div class="container-fluid mt-5">
    <div class="row">
        <nav class="col-sm-3 col-md-2 sidebar py-5 d-print-none" id="sidebar">
            <div class="sidebar-sticky">
                <div class="text-center mb-4">
                    <img src="../image/stu/<?php echo $stu_img . '?v=' . time(); ?>" alt="Student Profile Pic" class="img-fluid rounded-circle">
                    <h6 class="text-dark mt-2"><?php echo $stuEmail; ?></h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'studentprofile.php' ? 'active' : ''; ?>" href="studentprofile.php">
                            <i class="fas fa-tachometer-alt"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'studentcourses.php' ? 'active' : ''; ?>" href="studentcourses.php">
                            <i class="fas fa-book"></i> My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'studentfeedback.php' ? 'active' : ''; ?>" href="studentfeedback.php">
                            <i class="fas fa-comment"></i> Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'studentchangePass.php' ? 'active' : ''; ?>" href="studentchangePass.php">
                            <i class="fas fa-key"></i>Change Pass
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-sm-9 col-md-10 ms-sm-auto px-md-4 main-content" id="mainContent">

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('show');
}
</script>
