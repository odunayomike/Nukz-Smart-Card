<?php
session_start();

if ( $_SESSION['user_id'] == 0 || $_SESSION['user_id'] == '' ) {
    header('location: login.php');
    exit();
}

require_once('conn.php');
?>