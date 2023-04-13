<?php
// Include qrcode.php file.
include "qrcode.php";
// Create object
$qc = new QRCODE();
// Create Text Code
$qc->URL("Knowband");
// Save QR Code
$qc->QRCODE(400,"Knowband_text.png");
?>
