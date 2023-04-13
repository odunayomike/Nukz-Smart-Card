<?php
 session_start(); 
if(!isset($_SESSION)) 
{ 
   
} 

    $user_id = $_SESSION['user_id'];
    $currentPage = 'userProfile';
    include("user-header.php");


  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  $sql2 = "SELECT * from user WHERE user_id = $user_id";
  if ($sql2 = mysqli_query($db, $sql2)){
    $rs_result = mysqli_num_rows($sql2);
}
  

?>

    <div class="user-profile-body">
        <?php  if (isset($_SESSION['username'])) :?>
        <div class="user-profile-top">
            <div class="user-profile-img">
                <img src="img/user-img.png" alt="">
            </div>
            <div class="user-profile-name">
                <h2>Hello</h2>
                <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
        </div>
        
        
        <div class="user-profile-info">
            <div class="user-profile-info-text">
                <h3>Personal Information</h3>
            </div>
            <div class="user-profile-info-button">
               <button style="background: #FF8B3B; padding: 15px 20px 15px 20px; color: white; border-radius: 12px; ">Your QR Code  List</button>
               <button style=" margin-left: 20px; background: #FF8B3B; padding: 15px 20px 15px 20px; color: white; border-radius: 12px; ">Create New QR Code </button>
            </div>
        </div>
       
        <?php

        $sql2 = mysqli_query($db, "SELECT * from user WHERE user_id = $user_id");
        if(mysqli_num_rows($sql2)>0){
        
            while($row = mysqli_fetch_assoc($sql2)){
                                            
                $email = $row['email'];
                $password = $row['password'];
                

                                        
        ?>
        <div class="user-settings-form">
            <form action="">
                <div class="name-input">
                    <input type="text" name="" id="" value="<?php echo $_SESSION['username']; ?>">
                    <img src="img/settings-icon.png" alt="">
                </div>
                <div class="name-input">
                    <input type="email" name="email" id="" value="<?php echo $email; ?>">
                    <img src="img/settings-icon.png" alt="">
                </div>
                <div class="name-input">
                    <input type="text" name="phone" id="" value="Current Password">
                    <img src="img/settings-icon.png" alt="">
                </div>
                
                <input type="text" name="" id="" placeholder=""><br>
                <input type="text" name="" id="" placeholder=""><br>
                <input type="text" name="" id="" placeholder=""><br>
                <input class="user-profile-submit" type="submit" value="SAVE CHANGES">
            </form>
        </div>
        <?php
            }
            }
        ?>
        <?php endif ?>
        

        <div class="user-profile-bottom">
            <div class="btn1">
                <a href="logout.php">
                <button>SIGN OUT</button>
                </a>
            </div>
            <div class="btn2">
                <button>CREATE NEW ACCOUNT</button>
            </div>
            <div class="btn3">
                <button>DELETE ACCOUNT</button>
                <P>If you delete your profile, you will lose all your data including QR codes. </P>
            </div>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>
    <script src="js/main.js"></script>
</body>


</html>