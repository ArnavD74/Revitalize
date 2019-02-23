<?php
// ini_set('display_errors', 'On');
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];

function redirect($url, $permanent = false) {
  header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
  exit();
}

if (!empty($username) || !empty($password) || !empty($gender)) {
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "admin";
  $dbName = "revitalize";

  $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

  if (!$conn) {
    echo "Cannot connect";
    die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
  } else {
    $SELECT = "SELECT username From accounts where username = '$username'";
    $INSERT = "INSERT Into accounts (username, password, gender) values ('$username', '$password', '$gender')";
    // if (mysqli_query($conn, $INSERT)) {
    //   echo $SELECT;
    //   echo "New record created successfully";
    //   die();
    // }
    
    $result = $conn->query($SELECT);
    $row_count = $result->num_rows;
    if ($row_count == 0) {
      if ($conn->query($INSERT) === true) {} 
      else {
        $conn->error;
      }
      redirect("http://localhost/revitalize/login.html");
    } else {
      redirect("http://localhost/revitalize/signup.html");
    }

    // $stmt = $conn->prepare($SELECT);
    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $stmt->bind_result($username);
    // $stmt->store_result();
    // $rnum = $stmt->num_rows;

    // if ($rnum == 0) {
    //   $stmt->close();

    //   $stmt = $conn->prepare($INSERT);
    //   $stmt->bind_param("ssssii", $username, $password, $gender);
    //   $stmt->execute();
    //   echo "New record inserted successfully";
    // } else {
    //   echo "Someone already registered using this username";
    // }
    // $stmt->close();
    // $conn->close();
  }
} else {
  echo "All fields are required";
  die();
}
?>