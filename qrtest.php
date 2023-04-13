<?php

// Include the PHP QR Code library
include "phpqrcode/qrlib.php";
$card_id = 34;
// Set the link for the user's profile
$link = "https://nukreationzdigital.com/new%20smart%20card/profile2.php?id=$card_id";

// Set the file path for the QR code image
$file_path = "qr_codes/user_qr_code$card_id.png";

// Generate the QR code image
$qrCode = QRcode::png($link, $file_path);

// Display the QR code image
echo '<img src="'.$file_path.'" />';

// $card_id = 14;

// $user_link = "https://nukreationzdigital.com/new%20smart%20card/profile2.php?id=$card_id";
// $file_path = "qr_codes/user$card_id.png";
// $qrCode = QRcode::png("$user_link, $file_path");
// echo '<img src="'.$file_path.'" />';

?>
