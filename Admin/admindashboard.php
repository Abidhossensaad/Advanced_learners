
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
            <main class="col-sm-9 col-md-10 ms-sm-auto px-md-4 main-content">


                <div class="row mx-5 text-center">
                    <!-- Courses Card (Original) -->
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Total Courses</div>
                            <div class="card-body">
                                <h4 class="card-title">5</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Students Card -->
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">Total Students</div>
                            <div class="card-body">
                                <h4 class="card-title">120</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Sold Courses Card -->
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Sold Courses</div>
                            <div class="card-body">
                                <h4 class="card-title">9</h4>
                                <a class="btn text-white" href="#">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <!-- Table Header -->
                    <p class="bg-dark text-white p-2">Course Ordered</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Course ID</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>22</td>
                                <td>3</td>
                                <td>abid@gmail.com</td>
                                <td>10/04/2025</td>
                                <td>1500tk</td>
                                <td>
                                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

   