<?php
if(!isset($_SESSION)){
    session_start();
    }
include_once('../dbConnection.php');

// Optional: Show errors for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Admin Login Verification
if (isset($_POST['checkLogemail']) && isset($_POST['adminLogemail']) && isset($_POST['adminLogpass'])) {

    $adminLogemail = $_POST['adminLogemail'];
    $adminLogpass = $_POST['adminLogpass'];

    // WARNING: For production, use hashed passwords with prepared statements
    $sql = "SELECT admin_email FROM admin WHERE admin_email = '$adminLogemail' AND admin_pass = '$adminLogpass'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $_SESSION['is_admin_login'] = true;
        $_SESSION['adminLogemail'] = $adminLogemail;
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
}
?>
