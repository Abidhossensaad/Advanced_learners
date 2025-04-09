<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');

// ===================
// Student Signup
// ===================
if (isset($_POST['stusignup'], $_POST['stuname'], $_POST['stuemail'], $_POST['stupass'])) {

    $stuname = $conn->real_escape_string($_POST['stuname']);
    $stuemail = $conn->real_escape_string($_POST['stuemail']);
    $stupass = $_POST['stupass'];

    // Validate email format
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

    // Insert new student 
    $sql = "INSERT INTO student (stu_name, stu_email, stu_pass) VALUES ('$stuname','$stuemail','$stupass')";

    if ($conn->query($sql)) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}


// ===================
// Student Login Verification
// ===================
if(!isset($_SESSION['is_login'])){
   if (isset($_POST['checkLogemail']) && isset($_POST['stuLogemail']) && isset($_POST['stuLogpass'])) {
    
    $stuLogemail = $_POST['stuLogemail'];
    $stuLogpass = $_POST['stuLogpass'];

    // Match email and password
    $sql = "SELECT stu_email, stu_pass FROM student WHERE stu_email = '$stuLogemail' AND stu_pass = '$stuLogpass'";
    $result = $conn->query($sql);
    $row = $result->num_rows;

    // echo json_encode($row); // returns 0 or 1
    if($row===1){
       
        $_SESSION['is_login']=true;
        $_SESSION['stuLogemail']= $stuLogemail;
        echo json_encode($row);
    }
    else if ($row===0){
        echo json_encode($row);
    }
}
}
?>
