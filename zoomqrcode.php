<?php
session_start();
include "user-header.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>


<div class="qrcode-link">
    <div class="qrcode-first-section">
        <h2 style="padding: 30px 50px 30px 50px;">QR Code Generatorfor Zoom Meeting</h2>
        <form action="" method="POST">
            <div class="qrcode-basic-info">
                <h2>Basic Information</h2>
                <div style="margin-bottom: 40px;" class="qrcode-form">
                    <label style="padding: 15px 30px 15px 30px;" for="">Zoom Meeting URL</label>
                    <input style="width: 300px;" type="text" name="qrcode" placeholder="https://www.nukreationzdigital.com" required>
                </div>
            </div>
            <div class="qrcode-footer">
                
                <button class="save-qr-code" style="padding: 10px 50px 10px 50px; width: 100%; border: none; background: #FF8B3B; border-radius: 5px; color: #fff;" name="qrcode-btn" type="submit"> Save QR Code <i class="bi bi-chevron-right"></i> </button>
                      
            </div>
        </form>
    </div>
    <div class="qrcode-second-section">



    <div class="qr-code-ntcreated">
        <h2 class="qr-text" style="font-size: 20px; display: block;">Your QR Code will appear here for download</h2>
    </div>
        
    <?php
    if(isset($_POST["qrcode-btn"])){
        $qrlink = mysqli_real_escape_string($db, $_POST['qrcode']);
    
            
        
    
                // Include the PHP QR Code library
                include "phpqrcode/qrlib.php";

                $string = "$qrlink";
                $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

                
                // Set the link for the user's profile
            
                $link = $qrlink;
                // Set the file path for the QR code image
                $file_path = "qr_codes/$string.png";

                // Generate the QR code image
                $qrCode = QRcode::png($link, $file_path);
                
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
            a.download = 'zoomqrcode.png';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        });

    });



</script>