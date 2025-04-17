<?php
 if(!isset($_SESSION)){
    session_start();
  }
  
  include('./admininclude/adminheader.php');
  include ('../dbConnection.php');
  
  if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogemail'];
  } else {
    echo "<script>location.href='../index.php';</script>";
    exit(); 
  }
  
?>

            <!-- Main Content -->
            <?php
// Fetch dynamic counts from the database
$totalCourses = $conn->query("SELECT COUNT(*) AS total FROM course")->fetch_assoc()['total'];
$totalStudents = $conn->query("SELECT COUNT(*) AS total FROM student")->fetch_assoc()['total'];
$totalEnrollments = $conn->query("SELECT COUNT(*) AS total FROM studentcourse")->fetch_assoc()['total'];
?>

<!-- Main Content -->
<main class="col-sm-9 col-md-10 ms-sm-auto px-md-4 main-content">

    <div class="row mx-5 text-center">
        <!-- Total Courses Card -->
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Courses</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totalCourses; ?></h4>
                   
                </div>
            </div>
        </div>

        <!-- Total Students Card -->
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Total Students</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totalStudents; ?></h4>
             
                </div>
            </div>
        </div>

        <!-- Enrolled Courses Card -->
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Enrolled Courses</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totalEnrollments; ?></h4>
             
                </div>
            </div>
        </div>
    </div>

    <!-- Course Orders Table -->
    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white p-2">Course Ordered</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Enrollment ID</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Enrollment Date</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orderQuery = "SELECT sc.id, sc.course_id, s.stu_email, sc.enrollment_date, c.course_price
                               FROM studentcourse sc
                               JOIN student s ON sc.stu_id = s.stu_id
                               JOIN course c ON sc.course_id = c.course_id
                               ORDER BY sc.id ASC";
                $orderResult = $conn->query($orderQuery);

                if ($orderResult->num_rows > 0) {
                    while ($row = $orderResult->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['course_id'] . '</td>';
                        echo '<td>' . $row['stu_email'] . '</td>';
                        echo '<td>' . $row['enrollment_date'] . '</td>';
                        echo '<td>' . $row['course_price'] . ' TK</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-muted">No enrollments found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</main>