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

if (isset($_REQUEST['studentSubmitBtn'])) {
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "")|| ($_REQUEST['stu_occ'] == "")) {
        $msg = '<div  class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All fields</div>';
    } else {
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

        $sql = "INSERT INTO student (stu_name, stu_email, stu_pass, stu_occ) 
        VALUES ('$stu_name', '$stu_email', '$stu_pass', '$stu_occ')";

        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Student! Error: ' . $conn->error . '</div>';
        }
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header text-center" style="background-color:rgb(221, 101, 41);">
                    <h4 class="mb-0 text-white">Add New Student</h4>
                </div>
                <div class="card-body">
                    <form id="addStudentForm" method="POST">
                        <!-- Student Name -->
                        <div class="form-group mb-3">
                            <label for="stu_name" class="form-label">Student Name:</label>
                            <input type="text" class="form-control shadow-sm" id="stu_name" name="stu_name">
                        </div>

                        <!-- Student Email -->
                        <div class="form-group mb-3">
                            <label for="stu_email" class="form-label">Student Email:</label>
                            <input type="email" class="form-control shadow-sm" id="stu_email" name="stu_email">
                        </div>

                        <!-- Student Password -->
                        <div class="form-group mb-3">
                            <label for="stu_pass" class="form-label">Password:</label>
                            <input type="password" class="form-control shadow-sm" id="stu_pass" name="stu_pass">
                        </div>

                         <!-- Student occupation -->
                         <div class="form-group mb-3">
                            <label for="stu_pass" class="form-label">Student occupation:</label>
                            <input type="text" class="form-control shadow-sm" id="stu_occ" name="stu_occ">
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" id="studentSubmitBtn" name="studentSubmitBtn" class="btn btn-danger" style="background-color:rgb(221, 122, 23); color: white;">Submit</button>
                            <a type="button" class="btn btn-secondary" href="studentsadmin.php"> Close</a>
                        </div>

                        <?php if (isset($msg)) {
                            echo $msg;
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
