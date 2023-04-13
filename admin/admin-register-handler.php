<?php
include ('conn.php');
session_start();


if ($_SESSION['admin_type'] == 1) {
    echo '<script>alert("Only Superadmin can create a Sub Admin");</script>';
    echo "<script>location.href='admin.php';</script>";
    exit;
    }

// initializing variables
$username = "";
$email    = "";
$errors = array(); 



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM nadmin WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO nadmin (username, firstname, lastname, email, admin_type, password) 
  			  VALUES('$username', '$firstname', '$lastname','$email', '1', '$password')";
  	mysqli_query($db, $query);
  	
  	$_SESSION['success'] = "You are now logged in";
    echo '<script>alert("Admin User Created Successfully!");</script>';
    echo "<script>location.href='admin.php';</script>";
  	//header('location: index.php');
  }
}

?>