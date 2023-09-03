<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST['firstName'];
  $gender = $_POST['gender'];
  $phone_no = $_POST['phone_no'];
  $password = $_POST['password'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];

  // Database Connection
  $conn = new mysqli('localhost', 'root', '', 'hospital_management');
  if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
  } else {
    $success = $conn->prepare("INSERT INTO registration(lastName, firstName, gender, email, phone_no, password) VALUES (?, ?, ?, ?, ?, ?)");
    $success->bind_param("ssssis", $lastName, $firstName, $gender, $email, $phone_no, $password);
    $success->execute();
    $success->close();
    $conn->close();

    // Redirect to the display page
    header("Location: display.php?firstName=$firstName&lastName=$lastName&gender=$gender&email=$email&phone_no=$phone_no");
    exit();
  }
}
?>
