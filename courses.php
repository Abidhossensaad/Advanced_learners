  <!-- Start navigation -->
    <?php
  include('./dbConnection.php');
  include('./maininclude/header.php');
  ?>
  
  <!-- End navigation -->
   
  <div class="container mt-5 pt-5">
    <h1 class="text-center mb-5">All Courses</h1>
    <div class="mt-4"> 
      <?php
      $sql = "SELECT * FROM course";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          $count = 0;
          echo '<div class="row g-4">'; // Start first row
          while ($row = $result->fetch_assoc()) {
              echo <<<HTML
                <div class="col-md-4 mb-3"> <!-- 3 columns per row on medium+ screens -->
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

              $count++;
              if ($count % 3 == 0) {
                  echo '</div><div class="row g-4">'; // Close and start a new row after every 3 cards
              }
          }
          echo '</div>'; // Close the last row
      }
      ?>
    </div>
</div>

 <!-- Footer start -->
 <?php
  include('./maininclude/footer.php')
  ?>
  <!-- Footer end -->