<?php
    session_start();
    include('conn.php');

    $errors = array(); 
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
     $status = 'active';
     $username = mysqli_real_escape_string($db, $_POST["username"]);
     $password = md5(mysqli_real_escape_string($db, $_POST["password"]));
     $sql = "SELECT * FROM nadmin WHERE username = '".$username."' AND password = '".$password."' AND status = '".$status."' ";
     $result = mysqli_query($db, $sql);
     $num_row = mysqli_num_rows($result);
     if($num_row > 0)
     {
      $data = mysqli_fetch_array($result);
      $_SESSION['loggedin'] = TRUE;
      $_SESSION["username"] = $data["username"];
      $_SESSION["user_id"] = $data["user_id"];
      $_SESSION["email"]= $data["email"];
      $_SESSION["user_type"]= $data["user_type"];
      $_SESSION["admin_type"]= $data["admin_type"];
      $_SESSION["status"]= $data["status"];
      
      echo "<script>location.href='index.php';</script>";
      //header("Location: index.php");
     }else {
        echo '<script>alert("Your admin access have been suspended");</script>';
        array_push($errors, "Wrong username/password combination");
    }

    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>

</body>

</html>

<div class="container1">
    <div class="login">
        <h2>Login</h2>

    </div>
    <div class="form-content1">
        <form action="" method="POST">
            <?php include('errors.php'); ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input style="width: 100%;" name="" type="submit" value="LOGIN">
        </form>

    </div>
    <div class="login-footer">
        <p class="checkbox" style="font-size: 13px;"> Remember Me </p><input type="checkbox">
        <a href="resset-password.php">
            <p style="margin-left: 190px; font-size: 13px;">Forgotten Password?</p>
        </a>
    </div>
</div>

<script src="js/main.js"></script>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

</body>

</html>