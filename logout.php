<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="refresh" content="1;url=index.php">
  <title>Logging Out...</title>
  <style>
    body {
      text-align: center;
      margin-top: 20%;
      font-family: Arial, sans-serif;
    }
    .loader {
      border: 6px solid #f3f3f3;
      border-top: 6px solid orange;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 0.8s linear infinite;
      display: inline-block;
      margin-top: 20px;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>
  <h4>Logging you out, please wait...</h4>
  <div class="loader"></div>
</body>
</html>
