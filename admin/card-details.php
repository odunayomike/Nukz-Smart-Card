<?php
include("conn.php");


$id=$_GET['id'];
//$fname=$_GET['fname'];
// phpinfo();
if(session_id() == ''){
        //session has not started
        session_start();
    }

    if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
    }
    if ($_SESSION['user_type'] == 'user') {
    echo "you are not authorised to access this page";

    exit;
    }

    if ($_SESSION['status'] == 'suspended') {
    echo '<script>alert("Your admin access have been suspended");</script>';

    exit;
    }

      $errors = array(); 

    $user_id = $_SESSION['user_id'];
    //include("login-handler.php");
    $currentPage = 'admin';
    
    if (isset($_SESSION['username'])){
        include("admin-header.php");
        //echo $_SESSION["user_id"];
    }


    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <style>
    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Montserrat', sans-serif;
    }

    a[href='#'] {
        display: none;
    }

    a {
        text-decoration: none;
        color: #000;
        font-weight: 600;

    }

    .social {
        pointer-events: none;
        cursor: default;
    }

    a::hover {
        color: #000;
    }
    </style>
    <div class="container rounded bg-white mt-5 mb-5">
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
                        $date_created = $row['created_on'];
                        
                
                        
                
                                                
            ?>
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" style="height: 170px; width: 170px; object-fit: cover;"
                        src="uploads/<?=$row['images'] ?>" alt="gyhfast"><span
                        class="font-weight-bold"><?php echo $fname; ?></span><span
                        class="text-black-50"><?php echo $email; ?></span>
                    <?php
            $sql33 = mysqli_query($db, "SELECT * from user_social_link WHERE card_id = $id ");
                if(mysqli_num_rows($sql33)>0){
                
                    while($row = mysqli_fetch_assoc($sql33)){

                        $facebook = $row['facebook'];
                        $instagram = $row['instagram'];
                        $linkedin = $row['linkedin'];
                        $twitter = $row['twitter'];
                        $whatsapp = $row['whatsapp'];
                        $pintrest = $row['pintrest'];
                        $youtube = $row['youtube'];

            ?>
                    <a class="social" style="margin-top: 70px;" href="<?php if($facebook == NULL){
                echo '#';
            }else{
                echo $facebook;
            } ?>">
                        <span>
                            <div class="col-md-12"><label class="labels"><i style="color: blue;"
                                        class="bi bi-facebook "></i> &nbsp; Facebook </label><input type="text" readonly
                                    class="form-control" placeholder="" value="<?php echo $facebook; ?>"></div>
                        </span>
                    </a>

                    <a class="social" href="<?php if($instagram == NULL){
                echo '#';
            }else{
                echo $instagram;
            } ?>">
                        <span>
                            <div class="col-md-12"><label class="labels"><i style="color: #fa7e1e;"
                                        class="bi bi-instagram"></i> &nbsp; Instagram </label><input type="text"
                                    readonly class="form-control" placeholder="" value="<?php echo $instagram; ?>">
                            </div>
                        </span>
                    </a>
                    <a class="social" href="<?php if($linkedin == NULL){
                echo '#';
            }else{
                echo $linkedin;
            } ?>">
                        <span>
                            <div class="col-md-12"><label class="labels"><i class="bi bi-linkedin"></i> &nbsp; LinkedIn
                                </label><input type="text" readonly class="form-control" placeholder=""
                                    value="<?php echo $linkedin; ?>"></div>
                        </span>
                    </a>
                    <a class="social" href="<?php if($twitter == NULL){
                echo '#';
            }else{
                echo $twitter;
            } ?>">
                        <span>
                            <div class="col-md-12"><label class="labels"><i style="color: blue;"
                                        class="bi bi-twitter"></i> &nbsp; Twitter </label><input type="text" readonly
                                    class="form-control" placeholder="" value="<?php echo $twitter; ?>"></div>
                        </span>
                    </a>

                    <a class="social" href="<?php if($whatsapp == NULL){
                echo '#';
            }else{
                echo $whatsapp;
            } ?>">
                        <span>
                            <div class="col-md-12"><label class="labels"><i style="color: green;"
                                        class="bi bi-whatsapp"></i> &nbsp; WhatsApp </label><input type="text" readonly
                                    class="form-control" placeholder="" value="<?php echo $whatsapp; ?>"></div>
                        </span>
                    </a>

                    <a class="social" href="<?php if($pintrest == NULL){
                echo '#';
            }else{
                echo $pintrest;
            } ?>">
                        <span>
                            <div class="col-md-12"><label class="labels"><i style="color: #FF0000;"
                                        class="bi bi-pinterest"></i> &nbsp; Pinterest </label><input type="text"
                                    readonly class="form-control" placeholder="" value="<?php echo $pintrest; ?>"></div>
                        </span>
                    </a>

                    <a class="social" href="<?php if($youtube == NULL){
                echo '#';
            }else{
                echo $youtube;
            } ?>">
                        <span>
                            <div class="col-md-12"><label class="labels"><i style="color: #FF0000;"
                                        class="bi bi-youtube"></i> &nbsp; Youtube</label><input type="text" readonly
                                    class="form-control" placeholder="" value="<?php echo $youtube; ?>"></div>
                        </span>
                    </a>
                    <?php
                }
            }
            ?>
                </div>
            </div>
            <div class="col-md-5 border-right">

                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Card Details</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" readonly
                                class="form-control" placeholder="" value="<?php echo $fname; ?>"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" readonly
                                class="form-control" value="<?php echo $lname; ?>" placeholder="surname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" readonly
                                class="form-control" placeholder="enter phone number" value="<?php echo $phone; ?>">
                        </div>
                        <div class="col-md-12"><label class="labels">Email </label><input type="text" readonly
                                class="form-control" placeholder="" value="<?php echo $email; ?>"></div>
                        <div class="col-md-12"><label class="labels">Address </label><input type="text" readonly
                                class="form-control" placeholder="" value="<?php echo $address; ?>"></div>
                        <div class="col-md-12"><label class="labels">Job TItle</label><input type="text" readonly
                                class="form-control" placeholder="" value="<?php echo $jobtitle; ?>"></div>
                        <div class="col-md-12"><label class="labels">Company Name</label><input type="text" readonly
                                class="form-control" placeholder="" value="<?php echo $company; ?>"></div>
                        <div class="col-md-12"><label class="labels">Profile Summary</label><textarea type="text"
                                readonly class="form-control" placeholder="<?php echo $summary; ?>" value=""></textarea>
                        </div>
                        <!-- <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div> -->
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Website</label><input type="text" readonly
                                class="form-control" placeholder="country" value="<?php echo $website; ?>"></div>
                        <div class="col-md-6"><label class="labels">Date Created</label><input type="text" readonly
                                class="form-control" value="<?php echo $date_created; ?>" placeholder="state"></div>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div class="mt-5 text-center"><a href="index.php"><button class="btn btn-primary profile-button"
                                    type="button">Back</button></a></div>

                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>User Link & QR Code
                            Section</span></div><br>
                    <!-- <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value="<?php echo "https://nukreationzdigital/profile.php?id='.$id.'" ?>"></div> <br> -->
                    <div class="col-md-12"><label class="labels">User Profile Link</label><input type="text" readonly
                            class="form-control" value="<?php echo "http://localhost/Nukz card/profile2.php?id=$id" ?>">
                    </div>

                </div>

                <!-- ---------- QR CODE GENERATION ----------------- -->

                <div style="margin-left: 20px;;" class="col-md-12"><label class="labels">User QR CODE</label></div>
                <?php
                // Include the PHP QR Code library
                include "../phpqrcode/qrlib.php";
                
                // Set the link for the user's profile
                $link = "https://nukreationzdigital.com/new%20smart%20card/profile2.php?id=$id";

                // Set the file path for the QR code image
                $file_path = "qr_codes/$fname$lname$id.png";

                // Generate the QR code image
                $qrCode = QRcode::png($link, $file_path);

                // Display the QR code image
                echo '<img class="qr-image" style=" width: 196px;
                height: 196px; margin-left: 20px; margin-top: 20px; padding: 8px;
                background: #FFFFFF;
                box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.09);" src="'.$file_path.'" />';
                
            
            ?>
            </div>
        </div>
    </div>
    </div>

    <?php 
                    }
                    }
            ?>
    </div>