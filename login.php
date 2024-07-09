
<?php include './view/header.php'; ?>

<main>
    <h1>Employee Login</h1>
    <p>Enter your username and password.</p>
    <p class="error"><?php echo $error ?></p>
    

    <form action="." method="post" id="login_form">
    <label>Username:</label>
        <input type="text" name="username" value="<?php echo $userName?>";/>
    <label>Password:</label>
        <input type="password" name="passcode" value="<?php echo $passcode?>";/>
        <input type="hidden" name="action" value="employee_login">
        <input type="submit" value="Login">
      
    </form>
</main>


 <?php include './view/footer.php'; ?>


