<?php
session_start();

$currentPage = 'tools';
include "home-header.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$plan =  $_SESSION["plan"];
$user_plan = strval($plan);

?>


<div class="tools-header">
    <h2>QR Code Solutions and Services</h2>
</div>

<div class="tools">
    <div class="tool-cards">
        <div class="tools-card-1">
            <a style="color: #000;" href="card_details.php">
                <div style="display: flex; justify-content: space-between;">
                    <div style=" margin-top: 20px; margin-left: 20px; ">
                        <i class="bi bi-person-vcard"></i>
                        <p style="font-weight: 800; margin-top: -5px;">Vcard</p>
                    </div>
                    <div class="free" style=" margin-top: 20px; margin-right: 20px; font-weight: 500; ">
                        <p>Free</p>
                    </div>
                </div>

                <img style="width: 250px;" src="./img/vcardWeb.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">vCard Plus helps you generate
                stunning profile pages for business cards. Makes it very easy for others to add you to contact book and
                set followup reminders.</p>

        </div>

        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="zoomqrcode.php">
                <div style="  margin-left: 20px; margin-top: 20px;">
                    <i class="bi bi-camera-reels"></i>
                    <p style="font-weight: 800; margin-top: -5px;">Zoom Meeting</p>
                </div>
                <img src="./img/zoomMeeting.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Zoom meetings are extremely
                popular. Now it would be extremely easy for you to promote your Zoom meeting with these fast and simple
                QR codes.</p>
        </div>



        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="whatsappqrcode.php">
                <div style=" margin-top: 20px; margin-left: 20px; ">
                    <i class="bi bi-whatsapp"></i>
                    <p style="font-weight: 800; margin-top: -5px;">WhatsApp</p>
                </div>
                <img src="./img/whatsapp image.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Let your customers WhatsApp
                you from the offline world by scanning your WhatsApp QR Code. Builds the customer connections and
                increases customer satisfaction.</p>
        </div>

        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="qrcode.php">
                <div style=" margin-top: 20px; margin-left: 20px; ">
                    <i class="bi bi-globe"></i>
                    <p style="font-weight: 800; margin-top: -5px;">URL</p>
                </div>
                <img src="./img/link-rq.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Create QR code to let your
                customer scan and access your business website or landing page.</p>

        </div>

        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="wifi.php">
                <div style=" margin-top: 20px; margin-left: 20px; ">
                    <i class="bi bi-wifi"></i>
                    <p style="font-weight: 800; margin-top: -5px;">Wifi</p>
                </div>
                <img src="./img/qrwifi.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Create QR code to let your
                customer scan and access your company wifi, hotel wifi etc.</p>

        </div>

        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="googlemap.php">
                <div style=" margin-top: 20px; margin-left: 20px; ">
                    <i class="bi bi-geo-alt-fill"></i>
                    <p style="font-weight: 800; margin-top: -5px;">Google Map</p>
                </div>
                <img style="width: 250px;" src="./img/googleMaps.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Make Google Map QR Codes to
                take consumers to your location easily. Enable them to rate you to make you popular in your local
                community.</p>

        </div>

        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="googleform.php">
                <div style=" margin-top: 20px; margin-left: 20px; ">
                    <i class="bi bi-file-earmark-text"></i>
                    <p style="font-weight: 800; margin-top: -5px;">Google Forms</p>
                </div>
                <img style="width: 250px;" src="./img/googleForms.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Make Google Forms QR Codes to
                collect consumers responses from the offline world. Complete analytics and management at your fingertip.
            </p>

        </div>

        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="youtube.php">
                <div style=" margin-top: 20px; margin-left: 20px; ">
                    <i class="bi bi-youtube"></i>
                    <p style="font-weight: 800; margin-top: -5px;">Youtube</p>
                </div>
                <img style="width: 250px;" src="./img/youtubeimg.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Take users to your YouTube
                video with this QR Code Generator page. A perfect way to increase traffic to your online video channel
                from the offline world for your marketing and promotions.
            </p>

        </div>

        <div class="tools-card-1">
            <a id="myLink" style="color: #000;" href="resume.php">
                <div style=" margin-top: 20px; margin-left: 20px; ">
                    <i class="bi bi-file-person"></i>
                    <p style="font-weight: 800; margin-top: -5px;">Resume</p>
                </div>
                <img style="width: 250px;" src="./img/resume.png" alt="">
            </a>
            <p style="font-size: 13px; padding: 9px; margin-left: 20px; margin-top: 4px;">Stand out from the crowd by
                using Resume and portfolio QR codes. Let your prospective employers instantly download your resume and
                know you.
            </p>

        </div>




    </div>
</div>

<?php
include('footer.php');

?>
<script>
var user_plan = "<?php echo $user_plan; ?>";
console.log(user_plan);

if (user_plan === "free") {
    var links = document.querySelectorAll("#myLink");

    for (var i = 0; i < links.length; i++) {
        links[i].setAttribute("href", "pricing.php");
    }
}
</script>

<script src="js/main.js"></script>
</body>

</html>