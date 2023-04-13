<?php
include("conn.php");

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if ($_SESSION['status'] == 'suspend') {
    echo '<script>alert("Your admin access have been suspended");</script>';
    exit;
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script defer src="https://cdn.crop.guide/loader/l.js?c=123ABC"></script>


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="./cropperjs/cropper.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin</title>
</head>

<body style="overflow: auto;">
    <!-- <div id="loader"></div> -->
    <style>
    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .mobile-menu-list {
        margin-top: 35px;
        color: #000;
        font-weight: 600;
        font-style: normal;
        text-align: left;
        position: fixed;
        background: #fff;
        width: 300px;
    }

    .mobile-menu-list a ul {
        color: #000;
    }

    a {
        text-decoration: none;
        color: #000;
    }

    ul {
        list-style: none;
    }

    .disapear {
        display: none;
    }

    a:hover {
        color: #FF8B3B !important;
    }
    </style>


    <div class="navbar" style="display: flex; justify-content: space-evenly;">
        <div class="nav" id="myHeader">
            <div>
                <img style="margin-top: 10px;" id="image" class="logo-img" src="../img/NDA Logo 1 3.png" alt="">
            </div>
            <div style="text-align: center; margin-left: 100px; justify-content: center; display: flex;"
                class="nav-text">

                <!-- <a href="">ABOUT US</a> -->
                <a class="<?php if($currentPage =='dashboard'){echo 'active';}?>" href="index.php">DASHBOARD</a>

                <a class="<?php if($currentPage =='admin'){echo 'active';}?>" href="admin.php">ADMIN</a>
                <a class="<?php if($currentPage =='complaint'){echo 'active';}?>" href="complaint.php">COMPLAINT</a>
                <!-- <a class="<?php if($currentPage =='support'){echo 'active';}?>" href="support.php">SUPPORT</a> -->
            </div>

            <div class="mobile-menu icon">
                <button style="color: #fff;" class="icon"><i class="icon fa fa-bars "></i></button>
            </div>

            <?php  if (isset($_SESSION['username'])) :?>



            <div style="display: flex; margin-left: 100px;" id="login-user-button" class="">
                <a href="">
                    <p><?php echo $_SESSION['username']; ?></p>
                </a>



                <img class="img" style="width: 50px; cursor: pointer; height: 50px; margin-top: px; border-radius: 50%; background: #D9D9D9;
                        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.12); padding: 8px;" src="img/user-img.png"
                    alt="nukreationz" ">
                    
                   
                    
                </div>
                
            <?php endif ?>
        </div>

        
        <div class=" top-profile-card " style=" display: none;">
                <div class="top-profile-card-img">
                    <h2>Welcome<br> <?php echo $_SESSION['username']; ?>!</h2>
                </div>

                <ul>
                    <li><a class="<?php if($currentPage =='userProfile'){echo 'active';}?>"
                            href="user-profile.php">Profile</a></li>
                    <li><a class="<?php if($currentPage =='userProfile'){echo 'active';}?>"
                            href="user-profile.php">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="mobile-menu-list" style="display: none;">
            <ul class="">
                <li><a class="<?php if($currentPage =='home'){echo 'active';}?>" href="index.php">HOME</a></li><br>
                <!-- <a href="">ABOUT US</a> -->
                <li><a class="<?php if($currentPage =='createCard'){echo 'active';}?>"
                        href="card_details.php">DASHBOARD</a></li><br>

                <li><a class="<?php if($currentPage =='tools'){echo 'active';}?>" href="tools.php">TOOLS</a></li><br>

                <li><a href="">SUPPORT</a></li>
            </ul>
        </div>

        <!-- <script src="js/main.js"></script> -->
        <!-- <script src="js/page.js" ></script> -->
        <script>
        // -------- top Profile card
        const menu = document.querySelector('.icon');
        const menu_link = document.querySelector('.mobile-menu-list');
        const user_button = document.getElementById('login-user-button');
        const user_profile_card = document.querySelector('.top-profile-card');
        const user_image = document.querySelector('.img');

        user_image.addEventListener('click', function() {
            console.log('clicked');

            if (user_profile_card.style.display === "none") {
                user_profile_card.style.display = "block";
            } else {
                user_profile_card.style.display = "none";
            }

        });
        user_profile_card.addEventListener('mouseout', function() {
            if (user_profile_card.style.display === "none") {
                user_profile_card.style.display = "block";
            } else {
                user_profile_card.style.display = "block";
            }

        })




        menu.addEventListener('click', function() {
            console.log('clicked');
            if (menu_link.style.display === "block") {
                menu_link.style.display = "none";
            } else {
                menu_link.style.display = "block";
            }
        });
        </script>