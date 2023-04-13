<?php 
include("conn.php");
if(session_id() == ''){
    //session has not started
    session_start();
}



//include("login-handler.php");
    $currentPage = 'home';
    
    if (isset($_SESSION['username'])){
        include("home-header.php");
        //echo $_SESSION["user_id"];
    }else{
        //header("Location: login.php/");
        include("header.php");
    }
    
?>

    <div class="content-body">
        <div class="content">
            <div class="header-text">
                <h2>Clean, Sleek,<br> And Contactless</h2>
                <p>Nukreationz Digital offers a way to securely and accurately share all your contact information with one tap.</p>
                <a style="z-index: 1; " href="card_details.php">
                    <button class="create">CREATE YOUR NUKZ SMART CARD</button>
                </a>
            </div>
            <div class="header-img">
                <img style="width: 600px;" src="img/Nukreakionz Card Pack 1.png" alt="">
            </div>
        </div>

        

        <div class="lowercontent">
            <div class="card-img">
                <img style="width: 800px; margin-top: 60px;" src="img/Nukreakionz Card Pack 2 1.png" alt="">
            </div>

            <div class="lower-text">
                <p style="color: #FF8B3B; font-weight: 600;">The Nukreationz Digital NFC business card is your<br>
                   solution. With one tap, you can send the following information:
                </p>
                
                   <ul>
                        <li>Phone number</li>
                        <li>Email address  </li>
                        <li>Social media account links (facebook,twitter, instagram)</li>
                        <li>Image (personal photo and/or company logo) for QR scan</li>
                    </ul> 
                   
                <p style="padding-left: 200px;">
                    All of this information is stored on the card so that
                    it never leaves your hand and is impossible to lose.
                    Share all of your contact info with one tap!
                </p>
                <a href="card_details.php">
                    <button class="create">CREATE YOUR NUKZ SMART CARD</button>
                </a>
            </div>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>
    <script src="js/main.js"></script>
</body>
</html>