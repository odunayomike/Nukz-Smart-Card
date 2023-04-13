<?php
session_start();
include "user-header.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>

<style>
    @media screen and (max-width: 600px){
        .ssid{
            margin-left: 20px !important;
            width: 90% !important;
        }
        /* .qrcode-form label{

        } */
    }

</style>
<div class="qrcode-link">
    <div class="qrcode-first-section">
        <h2 style="padding: 30px 50px 30px 50px;">QR Code Generator for Google Maps</h2>
        <form action="" method="POST">
            <div class="qrcode-basic-info">
                <h2>Basic Information</h2>
                <div style="margin-bottom: 40px;" class="qrcode-form">
                    <!-- <label style="padding: 15px 15px 15px 30px;" for="">Address</label> -->
                    <textarea class="ssid" style=" margin-left: 40px; width: 80%;" type="text" name="address" placeholder="Enter your address" required></textarea>
                    
                </div>
            </div>
            <div class="qrcode-footer">
                
                <button class="save-qr-code" style="padding: 10px 50px 10px 50px; width: 100%; border: none; background: #FF8B3B; border-radius: 5px; color: #fff;" name="qrcode-btn" type="submit"> Generate QR Code <i class="bi bi-chevron-right"></i> </button>
                      
            </div>
        </form>
    </div>
    <div class="qrcode-second-section">



    <div class="qr-code-ntcreated">
        <h2 class="qr-text" style="font-size: 20px; display: block;">Your QR Code will appear here for download</h2>
    </div>
        
    <?php
    if(isset($_POST["qrcode-btn"])){
        $address = mysqli_real_escape_string($db, $_POST['address']);
        
    
        $urlprefix = "https://www.google.com/maps/search/" ;
        
    
                // Include the PHP QR Code library
                include "phpqrcode/qrlib.php";

                

                
                // Set the link for the user's profile
            
                $google_maps_link = "https://www.google.com/maps/place/{$address}";
                // Set the file path for the QR code image
                $file_path = "qr_codes/$address.png";

                // Generate the QR code image
                $qrCode = QRcode::png($google_maps_link, $file_path);
                
                // Display the QR code image
                echo '<img id="qr-image" class="qr-image" style=" width: 270px;
                height: 270px;  padding: 8px;
                background: #FFFFFF; margin-top: 30px;
                box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.09);" src="'.$file_path.'" />';
                

                

echo "<script>var qr_file_path = '$file_path';</script>";


    }
    ?>
        <button id="qrcodedownloadBtn" >Download QR Code</button>
    
    </div>
</div>


<script>
    const save_qr_code = document.querySelector('.save-qr-code');
    const qr_text = document.querySelector('.qr-text');

    save_qr_code.addEventListener('click', function(){
        console.log('save btn clicked');
        if(qr_text.style.display === "block"){
            qr_text.style.display = 'none';
        }else{
            
        }
    })

    var canvas = document.getElementById("qr-image");
    var qr_btn = document.getElementById("qrcodedownloadBtn");

    qr_btn.addEventListener("click", function(){
        
        fetch(qr_file_path)
        .then(response => response.blob())
        .then(blob => {
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'addressqrcode.png';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        });

    });



</script>