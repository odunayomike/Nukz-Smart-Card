<?php

include('conn.php');
// Check if the user has entered a username and password
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Store the username and password in variables
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
//   $db = new mysqli('localhost', 'username', 'password', 'database');
    $password = md5($password);
  // Query the database to see if the entered username and password match a record
  $result = $db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

  // If a match is found, log the user in
  if ($result->num_rows > 0) {
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
  } else {
    // If no match is found, display an error message
    echo "Incorrect username or password";
  }
}

?>

