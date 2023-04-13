<?php
    session_start();
    include('conn.php');

    $errors = array(); 
    // LOGIN USER
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
    
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
    
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT user_id, email, username, password FROM user WHERE username='$username' AND password='$password'";
            
            $results = mysqli_query($db, $query);
            //$row = mysqli_fetch_array($results);
            if (mysqli_num_rows($results) == 1) {
            // $_SESSION['loggedin'] = TRUE;
            // $_SESSION['username'] = $username;
            // $_SESSION['email'] = $email;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['success'] = "You are now logged in";
            header("Location: footer.php");
            //echo "<script>location.href='index.php';</script>";

            }else {
                array_push($errors, "Wrong username/password combination");
            }
                
        }
        mysqli_close($db);
    } 







?>