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
        <a class="navbar-brand" href="#">
            &nbsp; AdvancedLearners- <span>(Student Area)</span>
        </a>
    </div>
</nav>

<!-- Sidebar + Content -->
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-sm-3 col-md-2 sidebar py-5 d-print-none" id="sidebar">
        <div class="sidebar-sticky">
          <div class="text-center mb-4">
            <img src="../images/default-profile.jpg" alt="Profile Pic" class="img-fluid rounded-circle" width="120"/>
            <h5 class="mt-2">Student Name</h5>
          </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link " href="studentProfile.php"><i class="fas fa-user"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myCourses.php"><i class="fas fa-book-open"></i> My Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php"><i class="fas fa-comment-dots"></i> Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="changePassword.php"><i class="fas fa-key"></i> Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main content -->
        <main class="col-sm-9 col-md-10 main-content">
            <h3>Welcome, Student!</h3>
            <p>This is your dashboard. Use the sidebar to navigate.</p>
        </main>
    </div>
</div>

<!-- Scripts -->
<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
