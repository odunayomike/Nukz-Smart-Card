<?php
    include("header.php");
    require_once "resset-password-handler.php";
?>

    <div class="container1">
        <div class="login">
            <h2>Forgotten Password?</h2>
        </div>
        <div class="form-content1">
            <form action="resset-password.php" method="POST">
                <input  type="email" name="email" placeholder="Email">
                <input style="width: 100%;" name="check-email" type="submit" value="SEND CODE">
            </form>
           
        </div>
        <div class="forgot-footer">
          
                <p>Enter a valid email used in registration of your account, verification code would be sent to the email, enter the code and reset your password.</p>
           
        </div>
    </div>
</body>
</html>