<?php
ini_set('display_errors', 'On');
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];

if (!empty($username) || !empty($password) || !empty($gender)) {
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "admin";
  $dbName = "revitalize";

  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

  if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
  } else {
    $SELECT = "SELECT username From accounts where username = ? Limit 1";
    $INSERT = "INSERT Into accounts (username, password, gender) values (?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0) {
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $password, $gender);
      $stmt->execute();
      echo "New record inserted successfully";
    } else {
      echo "Someone already registered using this username";
    }
    $stmt->close();
    $conn->close();
  }
} else {
  echo "All fields are required";
  die();
}
?>