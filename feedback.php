<!-- feedback start -->
<div class="feedback-section" id="feedback">
  <div class="container">
    <h2 class="section-title">Student's Feedback</h2>

    <!-- Feedback Carousel -->
    <div id="feedbackCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php
        include('./dbConnection.php'); // update path if needed

        $sql = "SELECT f.f_content, s.stu_name 
                FROM feedback f 
                JOIN student s ON f.stu_id = s.stu_id 
                ORDER BY f.f_id DESC";

        $result = $conn->query($sql);
        $isFirst = true;

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '
            <div class="carousel-item' . ($isFirst ? ' active' : '') . '">
              <div class="feedback-card">
                <h5 class="student-name">' . htmlspecialchars($row['stu_name']) . '</h5>
                <p class="feedback-text">"' . htmlspecialchars($row['f_content']) . '"</p>
              </div>
            </div>';
            $isFirst = false;
          }
        } else {
          echo '
          <div class="carousel-item active">
            <div class="feedback-card">
              <h5 class="student-name">No Feedback Yet</h5>
              <p class="feedback-text">"Be the first to leave a review!"</p>
            </div>
          </div>';
        }
        ?>

      </div>

      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</div>
<!-- feedback end -->
