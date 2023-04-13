<?php
    //session_start();
    // echo $_SESSION['loggedin'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>

<body>
    <div class="navbar">
        <div style="display: flex; justify-content: space-between;" class="nav" id="myHeader">
            <div>
                <img id="image" class="logo-img" src="img/NDA Logo 1 3.png" alt="">
            </div>

            <div class="mobile-menu">
                <button style="color: #fff;" class="icon"><i class=" icon fa fa-bars "></i></button>
            </div>


            <div class="button" id="btn-sticky">
                <a href="login.php">
                    <button
                        style="background: #FF8B3B; padding: 14px 32px 14px 32px; color: white; border-radius: 12px; border: none;">LOGIN</button>
                </a>
                <a href="register.php">
                    <button
                        style="margin-left: 0px; background: #F8F8F8; padding: 12px 30px 12px 30px; border: 2px solid #686868; border-radius: 12px;">SIGN
                        UP</button>
                </a>
            </div>
        </div>


        <div class="mobile-menu-list" style="display: none;">
            <ul class="">
                <!-- <li><a class="<?php if($currentPage =='home'){echo 'active';}?>" href="index.php">HOME</a></li> -->
                <!-- <a href="">ABOUT US</a> -->
                <li><a class="<?php if($currentPage =='createCard'){echo 'active';}?>" href="login.php">LOGIN</a></li>
                <li><a href="#">CARD DETAILS</a></li><br>
                <li><a class="<?php if($currentPage =='userProfile'){echo 'active';}?>" href="register.php">SIGN UP</a>
                </li>

            </ul>
        </div>


    </div>

    <script>
    const menu = document.querySelector('.icon')
    const menu_link = document.querySelector('.mobile-menu-list');
    menu.addEventListener('click', function() {
        console.log('clicked');
        if (menu_link.style.display === "block") {
            menu_link.style.display = "none";
        } else {
            menu_link.style.display = "block";
        }
    });
    </script>
    <style>
    .mobile-menu-list {
        margin-top: 20px;
        color: #A9A9A9;
        font-weight: 700;
        font-style: normal;
    }

    .mobile-menu-list a ul {
        color: #A9A9A9;
    }

    a {
        text-decoration: none;
        color: #A9A9A9;
    }

    ul {
        list-style: none;
    }
    </style>