<?php

$password = md5("12345678");

echo $password;


$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$complaintTicket = '';
for ($i = 0; $i < 6; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $complaintTicket .= $characters[$index];
}
echo $complaintTicket;

?>