  <!-- Start navigation -->
  <?php
  include('./maininclude/header.php')
  ?>
  
  <!-- End navigation -->


<!-- Start coursedetail -->

    <!-- Main Content -->
    <div class="container py-4 mt-5">
        <div class="row g-4">
            <!-- Course Details -->
            <div class="col-lg-8">
                <div class="course-card p-4 mb-4">
                    <h1 class="h4 fw-bold mb-3">Learn Python Programming</h1>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="badge bg-light text-dark small">Beginner</span>
                        <span class="badge bg-light text-dark small">8 Hours</span>
                        <span class="badge bg-light text-dark small">Certificate</span>
                    </div>
                    <img src="image/pythonimg.jpg" class="img-fluid rounded mb-3" alt="Python Course">
                    <p class="small mb-4">Master Python programming from basics to advanced concepts including OOP, data structures, and popular libraries like NumPy and Pandas.</p>
                    
                    <h3 class="h5 fw-bold mb-3">Course Outline</h3>
                    <div class="list-group list-group-flush small mb-4">
                        <div class="list-group-item py-2">
                            <div class="d-flex justify-content-between">
                                <span class="fw-medium">Module : Python Basics</span>
                                <span class="text-muted">8h</span>
                            </div>
                        </div>
                        <div class="list-group-item py-2">
                            <div class="d-flex justify-content-between">
                                <span>→ Introduction to Python</span>
                                <span class="text-muted">45m</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enrollment Form -->
            <div class="col-lg-4">
                <div class="enroll-form p-4">
                    <h3 class="h5 fw-bold mb-3">Enroll Now</h3>
                    
                    <form action="process_enrollment.php" method="POST">
                        <!-- Hidden Course ID -->
                        <input type="hidden" name="course_id" value="python_basic">
                                                <!-- Personal Information -->
                                                <div class="mb-3">
                            <label for="fullname" class="form-label small fw-bold">Full Name</label>
                            <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control form-control-sm" id="phone" name="phone" required>
                        </div>

                        
                       
                        
                        <!-- Course Pricing -->
                        <div class="bg-light p-3 rounded mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="small">Course Fee:</span>
                                <span class="small">৳15,000</span>
                            </div>
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Discount:</span>
                                <span class="text-danger">-৳3,000</span>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total Payable:</span>
                                <span>৳12,000</span>
                            </div>
                        </div>
                        
                        <!-- Terms Agreement -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label small" for="terms">
                                I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a>
                            </label>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-enroll w-100">Complete Enrollment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
<!-- End coursedetail -->

  <!-- Footer start -->
 <?php
  include('./maininclude/footer.php')
  ?>
  <!-- Footer end -->