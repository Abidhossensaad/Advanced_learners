  <!-- Start Header -->
  <?php
  include('./dbConnection.php');
  include('./maininclude/header.php');
  ?>

  <!-- End Header-->


  <?php
  if (!isset($_SESSION['is_login'])) {

    echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#stuRegModalCenter">GetStarted</a>';
  } else {
    echo '<a href="student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>';
  }
  ?>
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
  <!-- Start Most Popular Courses Section -->
  <div class="container mt-5">
    <h1 class="text-center mb-5"> Most Popular Courses</h1>
    <div class="row mt-4">

        <?php
        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo <<<HTML
            <div class="col" > <!-- Add col to make grid work -->
                <div class="card h-100"> 
                    <img src="image/courseimg/{$row['course_img']}" class="card-img-top" alt="{$row['course_name']}">
                    <div class="card-body">
                        <h5 class="card-title">{$row['course_name']}</h5>
                        <p class="card-text">{$row['course_desc']}</p>
                        <p class="card-text"><small class="text-muted"><b>By:</b> {$row['course_author']}</small></p>
                        <p class="card-text"><small>Duration: {$row['course_duration']}</small></p>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-danger font-weight-bold">TK {$row['course_price']}</span>
                                <small class="text-muted ml-2"><del>TK {$row['course_original_price']}</del></small>
                            </div>
                            <a class="enroll-btn" href="coursedetail.php?course_id={$row['course_id']}" style="float: right; text-decoration: none;">Enroll</a>

                        </div>
                    </div>
                </div>
            </div>
            HTML;
          }
        }
        ?>

    </div>
  </div>

  <div class="text-center mt-5">
    <a href="courses.php" class="btn view-all-btn btn-lg" style="color: white; background-color:rgb(255, 128, 0);">View All Courses</a>
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