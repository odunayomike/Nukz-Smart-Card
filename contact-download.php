<?php

    include("conn.php");
    $id=$_GET['id'];



    $sql2 = mysqli_query($db, "SELECT * from card_details WHERE card_id = $id ");
                if(mysqli_num_rows($sql2)>0){
                
                    while($row = mysqli_fetch_assoc($sql2)){
                
                        $id = $row['card_id'];                           
                        $fname = $row['firstname'];
                        $lname = $row['lastname'];
                        $email = $row['email'];
                        $phone = $row['phone'];

            $vcard = "BEGIN:VCARD\n";
$vcard .= "VERSION:3.0\n";
$vcard .= "N:$fname\n";
$vcard .= "EMAIL;TYPE=INTERNET:$email\n";
$vcard .= "TEL;TYPE=CELL:$phone\n";
$vcard .= "END:VCARD";

// Set the content type and disposition headers
header('Content-Type: text/x-vcard; charset=utf-8');
header("Content-Disposition: attachment; filename=contact.vcf");

// Output the vCard data
echo $vcard;

                    }
                }

?>
