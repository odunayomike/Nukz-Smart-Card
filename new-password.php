<?php
    include("header.php");
    require_once "resset-password-handler.php";
?>


<div class="container1">
        <div class="login">
            <h2>Resset Password</h2>
        </div>
        <div class="form-content1">
            <form action="" method="POST">
                <input  type="text" name="email" placeholder="Verification Code">
                <input  type="password" name="email" placeholder="Password">
                <input  type="password" name="email" placeholder="Confirm Password">
                <input style="width: 100%;" name="check-email" type="submit" value="CHANGE PASSWORD">
            </form>
           
        </div>
        <!-- <div class="forgot-footer">
                <p>Enter a valid email used in registration of your account, verification code would be sent to the email, enter the code and reset your password.</p>
           
        </div> -->
    </div>
</body>
</html>