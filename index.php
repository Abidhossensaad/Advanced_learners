  <!-- Start Header -->
  <?php
  include('./maininclude/header.php')
  ?>
  
  <!-- End Header-->
  <?php if (!isset($_SESSION)) { session_start(); } ?>
<?php if (!isset($_SESSION['is_login'])): ?>
  <!-- Miidle text -->
  <section class="welcome-section">
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-10 col-lg-8 text-center">
          <h1 class="display-5 fw-bold mb-3">Welcome to <span class="text-white">Advanced Learners</span></h1>
          <p class="lead mb-0">Your gateway to knowledge</p>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <!-- text banner -->
  <div class="container-fluid bg-dark text-white py-2">
    <div class="row text-center">
      <div class="col-sm">
        <h5><i class="fas fa-book-open me-2"></i> 100+ Online Courses</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-users me-2"></i> Expert Instructors</h5>
      </div>
      <div class="col-sm">
        <h5><i class="fas fa-keyboard me-2"></i> Lifetime Access</h5>
      </div>
    </div>
  </div>
  <!-- text banner end -->




  <!-- Start Most Popular Courses Section -->
  <div class="container mt-5">
    <h1 class="text-center mb-5"> Most Popular Courses</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">


      <!-- Course 1: Python -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="image/courseimg/pythonimg.jpg" class="card-img-top" alt="Learn Python">
          <div class="card-body">
            <h5 class="card-title">Learn Python</h5>
            <p class="card-text">Master Python programming from basics to advanced concepts including OOP, data structures, and popular libraries like NumPy and Pandas.</p>
          </div>
          <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted"><del>৳15,000</del></small>
                <span class="fw-bold text-danger ms-2">৳12,000</span>
              </div>
              <a href="coursedetail.php" class="btn btn-sm enroll-btn">Enroll</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Course 2: AI -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="image/courseimg/ai.jpg" class="card-img-top" alt="Artificial Intelligence">
          <div class="card-body">
            <h5 class="card-title">Artificial Intelligence</h5>
            <p class="card-text">Learn AI fundamentals including machine learning, neural networks, and deep learning using TensorFlow and PyTorch frameworks.</p>
          </div>
          <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted"><del>৳25,000</del></small>
                <span class="fw-bold text-danger ms-2">৳20,000</span>
              </div>
              <a href="#" class="btn btn-sm enroll-btn">Enroll</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Course 3: React -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="image/courseimg/react.jpg" class="card-img-top" alt="React JS">
          <div class="card-body">
            <h5 class="card-title">React JS Development</h5>
            <p class="card-text">Build modern web applications with React, covering hooks, context API, Redux, and React Router for single-page applications.</p>
          </div>
          <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted"><del>৳18,000</del></small>
                <span class="fw-bold text-danger ms-2">৳15,000</span>
              </div>
              <a href="#" class="btn btn-sm enroll-btn">Enroll</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Course 4: Data Science -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="image/courseimg/data science.jpg" class="card-img-top" alt="Data Science">
          <div class="card-body">
            <h5 class="card-title">Data Science Bootcamp</h5>
            <p class="card-text">Complete data science training covering data analysis, visualization, machine learning, and statistical modeling with Python.</p>
          </div>
          <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted"><del>৳22,000</del></small>
                <span class="fw-bold text-danger ms-2">৳18,000</span>
              </div>
              <a href="#" class="btn btn-sm enroll-btn">Enroll</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Course 5: JavaScript -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="image/courseimg/js.jpg" class="card-img-top" alt="JavaScript">
          <div class="card-body">
            <h5 class="card-title">Modern JavaScript</h5>
            <p class="card-text">Master JavaScript ES6+, asynchronous programming, DOM manipulation, and modern JS frameworks preparation.</p>
          </div>
          <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted"><del>৳16,000</del></small>
                <span class="fw-bold text-danger ms-2">৳13,000</span>
              </div>
              <a href="#" class="btn btn-sm enroll-btn">Enroll</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Course 6: Node.js -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="image/courseimg/NodeJS.jpg" class="card-img-top" alt="Node JS">
          <div class="card-body">
            <h5 class="card-title">Node.js Backend Development</h5>
            <p class="card-text">Learn to build scalable server-side applications using Node.js, Express, MongoDB, and RESTful API development.</p>
          </div>
          <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <small class="text-muted"><del>৳20,000</del></small>
                <span class="fw-bold text-danger ms-2">৳16,000</span>
              </div>
              <a href="#" class="btn btn-sm enroll-btn">Enroll</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="text-center mt-5">
      <a href="courses.php" class="btn view-all-btn btn-lg">View All Courses</a>
    </div>
  </div>
  </div>

  <!-- course section end -->





  <!-- contact section start -->
  <?php
  include('./contact.php')
  ?>
  <!-- contact section end -->
  


  <!-- feedback start -->
  <?php
  include('./feedback.php')
  ?>
  
  <!-- feedback end -->


  <!-- Footer start -->
  <?php
  include('./maininclude/footer.php')
  ?>
  <!-- Footer end -->


  


</body>

</html>

