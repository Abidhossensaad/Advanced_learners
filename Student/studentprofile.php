<?php
if (!isset($_SESSION)) {
    session_start();
}

include('./stuinclude/stuheader.php');
include('../dbConnection.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogemail'];
} else {
    echo "<script>location.href='../index.php';</script>";
    exit();
}

// Initialize variables
$stuId = $stuName = $stuOcc = '';
$stuImg = 'default-user.png';
$msg = '';

// Load student data
$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row['stu_id'];
    $stuName = $row['stu_name'];
    $stuOcc = $row['stu_occ'] ?? 'Not specified';
    $stuImg = $row['stu_img'] ?? 'default-user.png';
}

// Handle profile update
if (isset($_POST['updateProfile'])) {
    $newName = $_POST['stu_name'];
    $newOcc = $_POST['stu_occ'];

    // Handle image upload
    if ($_FILES['stu_img']['name'] != "") {
        $img = time() . '_' . $_FILES['stu_img']['name']; // add timestamp
        $temp_name = $_FILES['stu_img']['tmp_name'];
        $img_folder = '../image/stu/' . $img;
        move_uploaded_file($temp_name, $img_folder);

        // Delete old image if not default
        if (!empty($stuImg) && $stuImg != 'default-user.png') {
            $oldImgPath = "../image/stu/" . $stuImg;
            if (file_exists($oldImgPath) && is_file($oldImgPath)) {
                unlink($oldImgPath);
            }
        }

        $stuImg = $img;
    }

    $sql = "UPDATE student SET 
                stu_name = '$newName', 
                stu_occ = '$newOcc', 
                stu_img = '$stuImg' 
            WHERE stu_id = $stuId";

    if ($conn->query($sql) === TRUE) {
        $msg = '<div class="alert alert-success mt-3">Profile updated successfully!</div>';

        // Update session for new image
        $_SESSION['stu_img'] = $stuImg;

        // Update displayed values
        $stuName = $newName;
        $stuOcc = $newOcc;
    } else {
        $msg = '<div class="alert alert-danger mt-3">Unable to update profile!</div>';
    }
}
?>

<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="pt-3 pb-3 card-header text-center" style="background-color:rgb(0, 0, 0);">
                    <h4 class="mb-0 text-white">My Profile</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="mb-3">
                                <p class="mb-0 fw-bold">
                                    Student ID: <span class="fw-normal"><?php echo $stuId; ?></span> </p>
                                <p class="mb-0 fw-bold">
                                    Student Email: <span class="fw-normal"><?php echo $stuEmail; ?></span>
                                </p>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="stu_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="stu_name" name="stu_name"
                                   value="<?php echo $stuName; ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="stu_occ" class="form-label">Occupation</label>
                            <input type="text" class="form-control" id="stu_occ" name="stu_occ"
                                   value="<?php echo $stuOcc; ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="stu_img" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="stu_img" name="stu_img" accept="image/*">
                            <?php if ($stuImg != 'default-user.png'): ?>
                                <img src="../image/stu/<?php echo $stuImg . '?v=' . time(); ?>" class="img-thumbnail mt-2" width="150">
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" name="updateProfile" class="btn btn-primary" style="background-color:black;">Update Profile</button>
                            <a href="studentprofile.php" class="btn btn-secondary">Cancel</a>
                        </div>

                        <?php if (isset($msg)) echo $msg; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
