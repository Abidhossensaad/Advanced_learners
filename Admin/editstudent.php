<?php
if (!isset($_SESSION)) {
    session_start();
}

include('./admininclude/adminheader.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogemail'];
} else {
    echo "<script>location.href='../index.php';</script>";
    exit();
}

if (isset($_POST['id'])) {
    $stu_id = $_POST['id'];
    $sql = "SELECT * FROM student WHERE stu_id = $stu_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_REQUEST['studentUpdateBtn'])) {
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_occ'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All fields</div>';
    } else {
        $stu_id = $_REQUEST['stu_id'];
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_occ = $_REQUEST['stu_occ'];

        $sql = "UPDATE student SET stu_name = '$stu_name', stu_email = '$stu_email', stu_occ = '$stu_occ' WHERE stu_id = $stu_id";

        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Updated Successfully!</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update Student! Error: ' . $conn->error . '</div>';
        }
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header text-center" style="background-color:rgb(255, 0, 0);">
                    <h4 class="mb-0 text-white">Update Student Details</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Student ID (Hidden) -->
                        <input type="hidden" name="stu_id" value="<?php if (isset($row['stu_id'])) { echo $row['stu_id']; } ?>">

                        <!-- Student Name -->
                        <div class="form-group mb-3">
                            <label for="stu_name" class="form-label">Student Name:</label>
                            <input type="text" class="form-control shadow-sm" id="stu_name" name="stu_name" value="<?php if (isset($row['stu_name'])) { echo $row['stu_name']; } ?>">
                        </div>

                        <!-- Student Email -->
                        <div class="form-group mb-3">
                            <label for="stu_email" class="form-label">Student Email:</label>
                            <input type="email" class="form-control shadow-sm" id="stu_email" name="stu_email" value="<?php if (isset($row['stu_email'])) { echo $row['stu_email']; } ?>">
                        </div>
                         <!-- Student occupation -->
                         <div class="form-group mb-3">
                            <label for="stu_occ" class="form-label">Student occupation:</label>
                            <input type="text" class="form-control shadow-sm" id="stu_occ" name="stu_occ" value="<?php if (isset($row['stu_occ'])) { echo $row['stu_occ']; } ?>">
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-danger" name="studentUpdateBtn" style="background-color:rgb(255, 0, 0); color: white;">Update</button>
                            <a type="button" class="btn btn-secondary" href="studentsadmin.php">Close</a>
                        </div>

                        <?php if (isset($msg)) { echo $msg; } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
