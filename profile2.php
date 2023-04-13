<?php
include("conn.php");

$id=$_GET['id'];
//$fname=$_GET['fname'];
$sql2 = mysqli_query($db, "SELECT * from card_details WHERE card_id = $id ");
if(mysqli_num_rows($sql2)>0){
                
    while($row = mysqli_fetch_assoc($sql2)){
                
        $card_id = $row['card_id'];  
        $created_at = $row['created_on'];                
    }
                
    $db->query("UPDATE card_details SET hit = hit +1, created_on = $created_at  WHERE card_id = $id");
}
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profile.css">
    <title></title>
</head>

<body>

    <style>
    .no-link {
        display: none !important;
    }

    a[href='#'] {
        display: none;
    }
    </style>


    <?php
                $sql2 = mysqli_query($db, "SELECT * from card_details WHERE card_id = $id ");
                if(mysqli_num_rows($sql2)>0){
                
                    while($row = mysqli_fetch_assoc($sql2)){
                        
                
                        $id = $row['card_id'];                           
                        $fname = $row['firstname'];
                        $lname = $row['lastname'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $date = $row['created_on'];
                        $jobtitle = $row['jobtitle'];
                        $address = $row['caddress'];
                        $summary = $row['psummary'];
                        $website = $row['website_link'];
                        $company = $row['company_name'];
                        $color = $row['color'];
                        $date_created = $row['created_on'];
                
                        
                
                                                
            ?>
    <div class="container">
        <div class="profile-img">
            <img src="uploads/<?=$row['images'] ?>" alt="">
            <h2><?php echo $fname, ' ', $lname?></h2>
            <p><?php echo $jobtitle; ?></p>
            <p><b><?php echo  $company;?></b></p>
        </div>
        <!-- ------------ contact ---------- -->
        <div class="contact">
            <a style="margin-right: 15px;" href="mailto:<?php echo $email; ?>">
                <div class="img1">
                    <i class="bi bi-envelope"></i>
                </div>
            </a>
            <a href="tel:<?php echo $phone; ?>">
                <div class="img2">
                    <i class="bi bi-telephone-fill"></i>
                </div>
            </a>
            <a style="margin-left: 15px;" href="sms:<?php echo $phone; ?>">
                <div class="img3">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>
            </a>
        </div>
        <!-- -------------- about -------------- -->
        <div class="about">
            <h2>About</h2>
            <p><?php echo $summary ?>
            </p>

        </div>
        <!-- ----------------- contact details -------- -->
        <div class="contact-details">
            <h2><img src="img/Cell phone.png" alt=""></i>Contact Details</h2>
            <div class="call">
                <h2>Call Me</h2>
                <p><?php echo $phone; ?></p>
            </div>
            <div class="email">
                <h2>Email</h2>
                <p><?php echo $email; ?></p>
            </div>
            <div class="address">
                <h2>Office Address</h2>
                <p><?php echo $address; ?></p>
                <a href="https://www.google.com/maps/search/<?php echo $address; ?>">
                    <button><i class="bi bi-cursor-fill"></i>Location</button>
                </a>
            </div>

        </div>
        <?php
        echo "<script>const color = '$color';</script>";
                    }
                }
        ?>
        <!-- ---------- slide --------------- -->
        <!-- <div class="slide">
            <img src="img/" alt="">
        </div> -->


        <!-- ------------ social button ------------- -->
        <div class="pro-social-icon">
            <?php
                $facebook = mysqli_query($db, "SELECT facebook FROM user_social_link WHERE card_id = $id");
                if(mysqli_num_rows($facebook)>0){
                    while($row = mysqli_fetch_assoc($facebook)){
                        $facebook_link = $row['facebook'];
                    
                
            ?>
            <a href="<?php echo $facebook_link ?>" target="_blank">
                <div class="pro-facebook">
                    <h2><i class="bi bi-facebook "></i> Facebook</h2>
                </div>
            </a>
            <?php
                    }
                }

            ?>



            <?php
                $instagram = mysqli_query($db, "SELECT instagram FROM user_social_link WHERE card_id = $id");
                if(mysqli_num_rows($instagram)>0){
                    while($row2 = mysqli_fetch_assoc($instagram)){
                        $instagram_link = $row2['instagram'];
                    
                
            ?>
            <a href="<?php if($instagram_link ==NULL){
                echo '#';
            }else{
                echo $instagram_link;
            } ?>" target="_blank">
                <div class="pro-instagram">
                    <h2><i class="bi bi-instagram"></i> Instagram</h2>
                </div>
            </a>
            <?php
                    }
                }
            ?>

            <?php
                $twitter = mysqli_query($db, "SELECT twitter FROM user_social_link WHERE card_id = $id");
                if(mysqli_num_rows($twitter)>0){
                    while($row3 = mysqli_fetch_assoc($twitter)){
                        $twitter_link = $row3['twitter'];
                    
                
            ?>
            <a href="<?php if($twitter_link == NULL){ 
                
                echo "#"; }else{
                    echo $twitter_link;
                } ?>" target="_blank">
                <div class="pro-twitter">
                    <h2><i class="bi bi-twitter"></i> Twitter</h2>
                </div>
            </a>
            <?php
                    }
                }
            ?>
            <?php
                $youtube = mysqli_query($db, "SELECT youtube FROM user_social_link WHERE card_id = $id");
                if(mysqli_num_rows($youtube)>0){
                    while($row4 = mysqli_fetch_assoc($youtube)){
                        $youtube_link = $row4['youtube'];
                        
                    
                
            ?>
            <a href="<?php if($youtube_link == NULL){
                echo '#';
            }else{
                echo $youtube_link;
            } ?>" target="_blank">
                <div class="pro-youtube">
                    <h2><i class="bi bi-youtube"></i> Youtube</h2>
                </div>
            </a>
            <?php
                    }
                }
            ?>


            <?php
                $whatsapp = mysqli_query($db, "SELECT whatsapp FROM user_social_link WHERE card_id = $id");
                if(mysqli_num_rows($whatsapp)>0){
                    while($row5 = mysqli_fetch_assoc($whatsapp)){
                        $whatsapp_link = $row5['whatsapp'];
                        
                    
                
            ?>
            <a href="<?php if($whatsapp_link == NULL){
                echo '#';
            }else{
                echo $whatsapp_link;
            } ?>" target="_blank">
                <div class="pro-youtube">
                    <h2><i style="color: green;" class="bi bi-whatsapp"></i> WhatsApp</h2>
                </div>
            </a>
            <?php
                    }
                }
            ?>


            <?php
                $linkedin = mysqli_query($db, "SELECT linkedin FROM user_social_link WHERE card_id = $id");
                if(mysqli_num_rows($linkedin)>0){
                    while($row6 = mysqli_fetch_assoc($linkedin)){
                        $linkedin_link = $row6['linkedin'];
                        
                    
                
            ?>
            <a href="<?php if($linkedin_link == NULL){
                echo '#';
            }else{
                echo $linkedin_link;
            } ?>" target="_blank">
                <div class="pro-youtube">
                    <h2><i style="color: #0072b1;" class="bi bi-linkedin"></i> LinkedIn</h2>
                </div>
            </a>
            <?php
                    }
                }
            ?>


            <?php
                $pintrest = mysqli_query($db, "SELECT pintrest FROM user_social_link WHERE card_id = $id");
                if(mysqli_num_rows($pintrest)>0){
                    while($row7 = mysqli_fetch_assoc($pintrest)){
                        $pintrest_link = $row7['pintrest'];
                        
                    
                
            ?>
            <a href="<?php if($pintrest_link == NULL){
                echo '#';
            }else{
                echo $pintrest_link;
            } ?>" target="_blank">
                <div class="pro-youtube">
                    <h2><i class="bi bi-pintrest"></i> Pintrest</h2>
                </div>
            </a>
            <?php
                    }
                }
            ?>

        </div>




        <?php
        $sql2 = mysqli_query($db, "SELECT website_link from card_details WHERE card_id = $id ");
        if(mysqli_num_rows($sql2)>0){
            while($row = mysqli_fetch_assoc($sql2)){
                                        
                $website = $row['website_link'];
        ?>
        <div class="website">
            <h2>Website</h2>
            <a href="https://<?php if($website == NULL){
                echo '#';
            }else{
                echo $website;
            } ?>" target="_blank"><i class="bi bi-link-45deg"></i><?php echo $website; ?></a>
        </div>
        <?php
                    }
                }
    ?>
        <div class="sticky-button">
            <div class="bt-section-1">
                <div class="btn-1">
                    <button style="border: none; background: transparent;" class="qr">
                        <i class="bi bi-qr-code"></i>
                    </button>
                </div>
                <!-- <div style="margin-left: 10px;" class="btn-1">
                <i class="bi bi-cloud-arrow-down-fill"></i>
                </div> -->
            </div>



            <div class="bt-section-2">
                <a href="<?php echo "contact-download.php?id=$id" ?>">
                    <div class="bt-section-inner">
                        <div class="bt-text">
                            <p>Add To<br> Contacts </p>
                        </div>
                        <div class="bt-plus">
                            <i class="bi bi-plus"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <?php
                // Include the PHP QR Code library
                include "phpqrcode/qrlib.php";
                
                // Set the link for the user's profile
                $link = "https://nukreationzdigital.com/new%20smart%20card/profile2.php?id=$id";

                // Set the file path for the QR code image
                $file_path = "qr_codes/$fname$lname$id.png";

                // Generate the QR code image
                $qrCode = QRcode::png($link, $file_path);

                // Display the QR code image
                echo '<img class="qr-image" style=" width: 270px;
                height: 270px; display: none; margin-left: 65px; position: fixed; margin-top: -1300px; padding: 8px;
                background: #FFFFFF;
                box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.09);" src="'.$file_path.'" />';
                
            
            ?>

    </div>

    <script src="./js/page.js"></script>

    <script>
    // $(document).ready(function(){
    //     $('a[href="#"').hide();
    // });


    const btn1 = document.querySelector('.qr');
    const qr_image = document.querySelector('.qr-image');

    btn1.addEventListener('click', function() {
        console.log('bar code was clicked');
        if (qr_image.style.display === "none") {
            qr_image.style.display = 'block';
        } else {
            qr_image.style.display = 'none';
        }
    })

    var root = document.querySelector(':root');
    fetch(color)
    root.style.setProperty('--primary', color);
    console.log(color)
    </script>

</body>

</html>

<?php

?>