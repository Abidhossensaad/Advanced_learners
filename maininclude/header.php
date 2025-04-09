<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Advancedlearners.com</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- !-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
.profile-btn, .logout-btn {
  color: white !important;
  background-color: rgb(255, 128, 0) !important;
  border-radius: 8px;
  min-width: 80px;
  text-align: center;
}

.profile-btn:hover, .logout-btn:hover {
  background-color: rgba(9, 9, 9, 0.8)!important;
}
</style>



<body>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!-- Start navigation -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top underline-nav">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">AdvancedLearners</a>
    <button class="navbar-toggler" type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav custom-nav mx-auto me-lg-0 fw-bold text-center">
  <li class="nav-item">
    <a class="nav-link custom-nav-item" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link custom-nav-item" href="courses.php">Courses</a>
  </li>
  <li class="nav-item">
    <a class="nav-link custom-nav-item" href="index.php#contact">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link custom-nav-item" href="index.php#feedback">Feedback</a>
  </li>

  <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true): ?>
    <!-- Logged-in User -->
    <li class="nav-item my-1 my-lg-0">
    <a class="nav-link custom-nav-item profile-btn mx-lg-1" href="Student/studentprofile.php">My Profile</a>
    </li>
    <li class="nav-item my-1 my-lg-0">
    <a class="nav-link custom-nav-item logout-btn mx-lg-1" href="logout.php">Logout</a>
    </li>
  <?php else: ?>
    <!-- Guest View -->
    <li class="nav-item my-1 my-lg-0">
      <a class="nav-link custom-nav-item signup-btn mx-lg-1" data-bs-toggle="modal" data-bs-target="#stusignupModal" href="#">
        Signup
      </a>
    </li>
    <li class="nav-item my-1 my-lg-0">
      <a class="nav-link custom-nav-item login-btn mx-lg-1" data-bs-toggle="modal" data-bs-target="#stuloginModal" href="#">
        Login
      </a>
    </li>
  <?php endif; ?>
</ul>

    </div>
  </div>
</nav>
<!-- End navigation -->



  <!-- Registration Modal start -->
  <!-- Signup Modal -->

  <div class="modal fade" id="stusignupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title w-100 text-center" style="color: #2c3e50;">Create Student Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4">
          <!--  start student signup form -->
          <?php
          include('Student/studentregistration.php')
          ?>
          <!--  end student signup form -->
        </div>
      </div>
    </div>
  </div>


  <!-- Refgistration Modal End -->
  <script>
  // When the modal is fully hidden, reset the form
  var signupModal = document.getElementById('stusignupModal');
  signupModal.addEventListener('hidden.bs.modal', function () {
    document.getElementById('stuSignupForm').reset();
    document.getElementById('statusMsg1').innerHTML = "";
    document.getElementById('statusMsg2').innerHTML = "";
    document.getElementById('statusMsg3').innerHTML = "";
    document.getElementById('signupSuccessMessage').innerHTML = "";
  });
</script>



  <!-- Login Modal form Start -->

  <div class="modal fade" id="stuloginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title w-100 text-center" style="color: #2c3e50;">Student Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4">
           <!--  start student login form -->
           <?php
          include('Student/studentlogin.php')
          ?>
          <!--  end student login form -->
        </div>
      </div>
    </div>
  </div>

  <script>
  // Clear login form on modal close
  var loginModal = document.getElementById('stuloginModal');
  loginModal.addEventListener('hidden.bs.modal', function () {
    document.getElementById('stuLoginForm').reset();
    document.getElementById('statusLogMsg').innerHTML = "";
  });
</script>

  <!-- Login Modal end -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"> </script>
  <script src="js/all.min.js"> </script>
  <script type="text/javascript" src="js/ajaxrequest.js"></script>
  <script type="text/javascript" src="js/ajaxstuLogin.js"></script>
  <script type="text/javascript" src="js/ajaxadminLogin.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>