<?php
session_start();
include('conn.php');

if (!isset($_GET['reference'], $_GET['plan'], $_GET['period'])) {
    echo 'Missing parameters';
    exit;
}

$reference = mysqli_real_escape_string($db, $_GET['reference']);
$plan = mysqli_real_escape_string($db, $_GET['plan']);
$period = mysqli_real_escape_string($db, $_GET['period']);
$future_date_month = date('Y-m-d', strtotime('+30 days'));
$future_date_year = date('Y-m-d', strtotime('+365 days'));
$date_now = date('Y-m-d');

$user_id = $_SESSION['user_id'];
echo $period;

$sql2 = mysqli_query($db, "SELECT * from user WHERE user_id = $user_id ");
if(mysqli_num_rows($sql2)>0){
    while($row = mysqli_fetch_assoc($sql2)){        
        $created_at = $row['created_at'];  
        $userplan = $row['plan'];              
    }  
}

if($plan === 'starter' && $period === 'monthly'){
    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_end='$future_date_month', created_at='$created_at' WHERE user_id = $user_id";
    if ($db->query($sql) === TRUE) {
         echo "<script>location.href='tools.php';</script>";
    } else {
        echo "Error updating status: " . $db->error;
    }
} elseif($plan === 'business' && $period === 'monthly'){
    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_end='$future_date_month', created_at='$created_at' WHERE user_id = $user_id";
    if ($db->query($sql) === TRUE) {
        echo "<script>location.href='tools.php';</script>";
    } else {
        echo "Error updating status: " . $db->error;
    }
}elseif($plan === 'ultimal' && $period === 'monthly'){
    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_end='$future_date_month', created_at='$created_at' WHERE user_id = $user_id";
    if ($db->query($sql) === TRUE) {
        echo "<script>location.href='tools.php';</script>";
    } else {
        echo "Error updating status: " . $db->error;
    }
}elseif($plan === 'starter' && $period === 'yearly'){
    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_end='$future_date_year', created_at='$created_at' WHERE user_id = $user_id";
    if ($db->query($sql) === TRUE) {
        echo "<script>location.href='tools.php';</script>";
    } else {
        echo "Error updating status: " . $db->error;
    }
}elseif($plan === 'business' && $period === 'yearly'){
    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_end='$future_date_year', created_at='$created_at' WHERE user_id = $user_id";
    if ($db->query($sql) === TRUE) {
        echo "<script>location.href='tools.php';</script>";
    } else {
        echo "Error updating status: " . $db->error;
    }
}elseif($plan === 'ultimal' && $period === 'yearly'){
    $sql = "UPDATE user SET plan='$plan', sub_start='$date_now', sub_end='$future_date_year', created_at='$created_at' WHERE user_id = $user_id";
    if ($db->query($sql) === TRUE) {
        echo "<script>location.href='tools.php';</script>";
    } else {
        echo "Error updating status: " . $db->error;
    }
}
echo $userplan
?>