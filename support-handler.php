<?php
include ('conn.php');
session_start();

$username = $_SESSION['username'];


$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$complaintTicket = '';
for ($i = 0; $i < 6; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $complaintTicket .= $characters[$index];
}
// echo $complaintTicket;

$sql_query = "SELECT user_id from user where username like '$username'";
    $result = mysqli_query($db, $sql_query);
    
    if(mysqli_num_rows($result) > 0 ){
    
        $row = mysqli_fetch_assoc($result);
        $user_id =  $row['user_id'];
    }
if(isset($_POST['send_msg'])){
    $message = mysqli_real_escape_string($db, $_POST['complaint']);
    $email = mysqli_real_escape_string($db, $_POST['email']);

    $query = "INSERT INTO complaints (user_id, complaint, complaint_ticket, email, status) VALUES('$user_id', '$message', '$complaintTicket', '$email)";

    mysqli_query($db, $query);

    echo "message sent succesfully";
   echo "<script>location.href='support.php';</script>";
}



?>