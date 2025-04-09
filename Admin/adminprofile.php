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
                <a class="navbar-brand" href="adminprofile.php">
                    &nbsp; AdvancedLearners <small>Admin Area</small>
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
                            <a class="nav-link" href="adminprofile.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="courses.php">
                                <i class="fas fa-book"></i> Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lessons.php">
                                <i class="fas fa-file-alt"></i> Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php">
                                <i class="fas fa-users"></i> Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sellreport.php">
                                <i class="fas fa-chart-line"></i> Sell Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paymentstatus.php">
                                <i class="fas fa-credit-card"></i> Payment Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="feedback.php">
                                <i class="fas fa-comment"></i> Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="changepassword.php">
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
            
            <!-- Main Content -->
            <main class="col-sm-9 col-md-10 ms-sm-auto px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                
                <!-- Your page content goes here -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Welcome to Admin Panel</h5>
                                    <p class="card-text">Manage your AdvancedLearners platform from here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
   
   
   <script>
       // Initialize Bootstrap collapse
var sidebarCollapse = new bootstrap.Collapse(document.getElementById('sidebar'), {
    toggle: false
});

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.querySelector('.navbar-toggler');
    
    if (window.innerWidth <= 991.98 && 
        !sidebar.contains(event.target) && 
        !toggleBtn.contains(event.target) &&
        sidebar.classList.contains('show')) {
        sidebarCollapse.hide();
    }
});

// Adjust main content margin when sidebar is shown/hidden
document.getElementById('sidebar').addEventListener('shown.bs.collapse', function() {
    if (window.innerWidth <= 991.98) {
        document.querySelector('.main-content').style.marginLeft = '0';
    }
});

document.getElementById('sidebar').addEventListener('hidden.bs.collapse', function() {
    if (window.innerWidth <= 991.98) {
        document.querySelector('.main-content').style.marginLeft = '0';
    }
});
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
   
</body>
</html>