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

<body>
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
          <li class="nav-item my-1 my-lg-0">
            <!-- Updated Signup button with modal trigger -->
            <a class="nav-link custom-nav-item signup-btn mx-lg-1" data-bs-toggle="modal" data-bs-target="#stusignupModal"
              href="#">
              Signup
            </a>

          <li class="nav-item my-1 my-lg-0">
            <a class="nav-link custom-nav-item login-btn mx-lg-1" data-bs-toggle="modal" data-bs-target="#stuloginModal"
              href="#">
              Login
            </a>
          </li>
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
          include('./studentregistration.php')
          ?>
          <!--  end student signup form -->
        </div>
      </div>
    </div>
  </div>


  <!-- Refgistration Modal End -->



  <!-- Login Modal form Start -->

  <div class="modal fade" id="stuloginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title w-100 text-center" style="color: #2c3e50;">Student Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4">
          <form id="stuLoginForm">
            <div class="mb-3">
              <label class="form-label text-secondary">Email</label>
              <input type="email" class="form-control rounded-pill" placeholder="Enter email" required id="stuLogemail" name="stuLogemail">
            </div>
            <div class="mb-3">
              <label class="form-label text-secondary">Password</label>
              <input type="password" class="form-control rounded-pill" placeholder="Enter password" required id="stuLogpass" name="stuLogpass">
            </div>
            <div class="mb-3 text-end">
              <a href="#" class="text-decoration-none" style="color: #ff8000;">Forgot password?</a>
            </div>
            <button id="stuLoginBtn" type="submit" class="btn w-100 rounded-pill" style="background-color: #ff8000; color: white;">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Modal end -->