<?php

session_start();
require "conn.php";
$email = "";
$name = "";
$errors = array();

if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $check_email = "SELECT * FROM user WHERE email='$email'";
    $run_sql = mysqli_query($db, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE user SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($db, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: odesanya0olamide@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: new-password.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['email'] = "This email address does not exist!";
    }
}


?>