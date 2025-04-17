<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../index.php">
            &nbsp; AdvancedLearners &nbsp; <small>(Admin Area)</small>
        </a>
    </div>
</nav>

<!-- Side Bar -->
<div class="container-fluid mt-5">
    <div class="row">
        <nav class="col-sm-3 col-md-2 sidebar py-5 d-print-none" id="sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admindashboard.php' ? 'active' : ''; ?>" href="admindashboard.php">
                            <i class="fas fa-tachometer-alt"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'coursesadmin.php' ? 'active' : ''; ?>" href="coursesadmin.php">
                            <i class="fas fa-book"></i> Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'lessons.php' ? 'active' : ''; ?>" href="lessons.php">
                            <i class="fas fa-file-alt"></i> Lessons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'studentsadmin.php' ? 'active' : ''; ?>" href="studentsadmin.php">
                            <i class="fas fa-users"></i> Students
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'paymentstatus.php' ? 'active' : ''; ?>" href="#">
                            <i class="fas fa-credit-card"></i> Payment Status
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'adminfeedback.php' ? 'active' : ''; ?>" href="adminfeedback.php">
                            <i class="fas fa-comment"></i> Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'adminChangePass.php' ? 'active' : ''; ?>" href="adminChangePass.php">
                            <i class="fas fa-key"></i> ChangePassword
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

        <script>
            function toggleSidebar() {
                document.getElementById('sidebar').classList.toggle('show');
            }
        </script>



    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"> </script>
    <script src="../js/all.min.js"> </script>
    <script type="text/javascript" src="../js/ajaxadminLogin.js"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="../js/custom.js"></script>

</body>

</html>