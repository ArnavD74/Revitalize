<?php
$username = $_POST['username'];
$password = $_POST['password'];

function redirect($url, $permanent = false) {
  header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
  exit();
}

if (!empty($username) || !empty($password)) {
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "admin";
  $dbName = "revitalize";

  $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

  if (!$conn) {
    echo "Cannot connect";
    die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
  } else {
    $SELECT = "SELECT * From accounts where username = '$username' and password = '$password'";

    $result = $conn->query($SELECT);
    $row_count = $result->num_rows;
    if ($row_count == 0) {
      echo "Incorrect username or password";
    } else {
      redirect("http://localhost/revitalize/index.html?username=$username");
    }
  }
}
?>