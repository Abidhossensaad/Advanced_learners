

<?php
include_once('../dbConnection.php');
if (isset($_POST['stusignup'], $_POST['stuname'], $_POST['stuemail'], $_POST['stupass'])) {

    $stuname = $conn->real_escape_string($_POST['stuname']);
    $stuemail = $conn->real_escape_string($_POST['stuemail']);
    $stupass = $_POST['stupass'];

    // Email format validation
    if (!filter_var($stuemail, FILTER_VALIDATE_EMAIL)) {
        echo json_encode("Invalid email format");
        exit;
    }

    // Check for duplicate email
    $check_email = "SELECT stu_email FROM student WHERE stu_email = '$stuemail'";
    $result = $conn->query($check_email);
    if ($result->num_rows > 0) {
        echo json_encode("Email Already exists");
        exit;
    }

    // Hash password
    $hashed_pass = password_hash($stupass, PASSWORD_BCRYPT);

    $sql = "INSERT INTO student (stu_name, stu_email, stu_pass) VALUES ('$stuname','$stuemail','$hashed_pass')";

    if ($conn->query($sql)) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}
?>