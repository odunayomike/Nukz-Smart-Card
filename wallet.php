<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
    $currentPage = 'wallet';
    include("home-header.php");


  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

?>

<div class="wallet">
    <div class="coming-soon">
        <h2>COMING SOON</h2>
    </div>
</div>