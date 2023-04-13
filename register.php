<?php
    include("header.php");
    include("register-handler.php");
?>

<div class="container1">
    <div class="login">
        <a style="text-decoration: none;" href="login.html">
            <h3>Login&nbsp;| </h3>
        </a>&nbsp;<h2>Sign Up</h2>
    </div>
    <div class="form-content1">
        <form id="prospects_form" action="register.php" method="POST">
            <?php include('errors.php'); ?>
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
            <input type="password" name="password_1" placeholder="Password">
            <input type="password" name="password_2" placeholder="Confirm Password">
            <input style="width: 100%;" type="submit" name="reg_user" value="SIGN UP">
        </form>

    </div>

</div>
<script src="js/main.js"></script>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

</body>

</html>