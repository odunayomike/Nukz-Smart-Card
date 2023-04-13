
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/prototype.css">
    <title></title>
</head>
<body>
    <style>
        .scroll::-webkit-scrollbar {
            display: none;
        }
        .scroll{
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 400;
        }
        .proto-phone{
            font-size: 13px;
        }
        .proto-email{
            font-size: 13px;
        }
        .proto-address{
            font-size: 13px;
        }
    </style>

    <div class="Pcontainer">
        <div class="Pro-profile-img">
            <img id="pimage2" class= "pro-profile-image" src="./img/user-pro.jpg" alt="">
            <input style="opacity: 0; margin-top: -100px;position: absolute;" onchange="display_image(this.files[0])" id="p-files pimage" name="my_image" type="file" class="image" accept="image/jpeg, imgae/png, image/jpg">
            <div class="prototype-profile-name">
                <div>
                    <h2 class="pro-name">Firstname</h2>
                </div>
                <div  id="pro-lname">
                    <h2 class="pro-lname">Lastname</h2>
                </div>
            </div>
           
            <p class="proto-jobtitle" style="margin-top: 20px; margin-bottom: 6px;">job title</p>
            <p><b class="proto-company">Company</b></p>
        </div>
        <!-- ------------ contact ---------- -->
        <div class="pcontact">
            <a href="">
            <div class="img1">
               <i class="bi bi-envelope"></i>
            </div>
            </a>
            <a href="">
            <div class="img2">
                <i class="bi bi-telephone-fill"></i>
            </div>
            </a>
            <a href="">
            <div class="img3">
                <i class="bi bi-chat-dots-fill"></i>
            </div>
            </a>
        </div>
        <!-- -------------- about -------------- -->
        <div class="about">
            <h2>About</h2>
            <textarea style="overflow: auto; text-align: center; display: flex; justify-content: center; align-items: center; width: 300px; border: none;" class="proto-summary scroll" name="" id="" cols="30" rows="10">Professional Summary</textarea>
            
        

        </div>
        <!-- ----------------- contact details -------- -->
        <div class="contact-details">
            <h2 style="font-size: 18px"><i style="border-radius: 50%;
    height: 40px;
    width: 40px;
    background: #000;" class="bi bi-phone"></i> Contact Details</h2>
            <div class="call">
                <h2>Call Me</h2>
                <p class="proto-phone"></p>
            </div>
            <div class="email">
                <h2>Email</h2>
                <p class="proto-email"></p>
            </div>
            <div class="address">
                <h2>Office Address</h2>
                <p class="proto-address"></p>
                <a href="">
                <button><i class="bi bi-cursor-fill"></i>Location</button>
                </a>
            </div>

        </div>
        


       
    
        <div class="pro-social-icon">
            <div class="pro-facebook">
                <h2><i class="bi bi-facebook "></i> Facebook</h2>
            </div>
            <div class="pro-instagram">
                <h2><i class="bi bi-instagram"></i> Instagram</h2>
            </div>
            <div class="pro-twitter">
                <h2><i class="bi bi-twitter"></i> Twitter</h2>
            </div>
            <div class="pro-youtube">
                <h2><i class="bi bi-youtube"></i> Youtube</h2>
            </div>
        </div>
       
        <div class="website">
            <h2>Website</h2>
            <a href=""><i class="bi bi-link-45deg"></i></a>
            <p class="proto-website"></p>
        </div>
        
        <div class="sticky-button">
            <div class="bt-section-1">
                <div class="btn-1">
                <i class="bi bi-qr-code"></i>
                </div>
                <!-- <div style="margin-left: 10px;" class="btn-1">
                <i class="bi bi-cloud-arrow-down-fill"></i>
                </div> -->
            </div>
            
            

            <div class="bt-section-2">
                <a href="">
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
        
    </div>
    

    <script src="./js/main.js"></script>
    <script src="./js/page.js"></script>
   
</body>
</html>