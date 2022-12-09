    <center>
    <!-- <div class="shadow-lg p-3 mb-5 bg-body rounded">Larger shadow</div> -->
    <!-- <div class="shadow-lg p-3 mb-5 bg-body rounded"> -->
    <div class="login " style="margin-top:5%;">
        <div class="col-lg-4 col-md-8 col-sm-12 bg-white border rounded p-4 shadow-lg">
            <form method="post" action="assets/php/actions.php?forgot">
                <div class="d-flex justify-content-center">


                </div>
                <h1 class="h5 mb-3 fw-normal">Forgot Your Password ?</h1>
            <?php
                if(!isset($_SESSION['hide_input_email']) || !$_SESSION['hide_input_email']){
?>
<div class="form-floating">
                    <input type="email" name="email" class="form-control rounded-0" placeholder="username/email" required>
                    <label for="floatingInput">enter your email</label>
</div>
<?php
                }
            ?>
  
<?php
    if(isset($_SESSION['forgot_code_sent']) && $_SESSION['forgot_code_sent']){
        ?>
    <p class="text-success ">Verification Code Sent!</p>
    <?php
    }
?>
<?php
if(!isset($_SESSION['hide_input_email']) || !$_SESSION['hide_input_email']){
    ?>
                <button class="btn btn-primary my-3" type="submit">Send Verification Code</button>
                <?php
}
?>

</form>

<hr>
   
<?php
if(isset($_SESSION['hide_input_code']) && !$_SESSION['hide_input_code']){
    ?>
<form action="assets/php/actions.php?" method="get">
<p>Enter 4 Digit Code sent to  -  <?php if(isset($_SESSION['forgot_code_sent_to'])){
        echo $_SESSION['forgot_code_sent_to'];
}
    ?></p>
                <div class="form-floating mt-1">

                    <input type="text" name="code" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">####</label>
                </div>

                <?php
                if(isset($_SESSION['forgot_verification']) && !$_SESSION['forgot_verification']){
                    ?>
    <p class="text-danger">Incorrect Verification Code!</p>
    <?php
                }
                ?>
                <div class="d-flex" style="justify-content: space-between;">
                <button class="btn btn-primary mt-3" type="submit">Verify Code</button>
                <a class="mt-3 text-decoration-none" href="assets/php/actions.php?re-enter" class="">Re-enter Email id</a>
                </div>
                </form>  
                <hr>
            <?php
}
            ?>



<?php
if(isset($_SESSION['show_change_password'])&& $_SESSION['show_change_password']){
    ?>

<form action="assets/php/actions.php?forgotpassword" method="post">
<p class="mt-3">Enter your new password </p>
<div class="form-floating mt-1">
                    <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">new password</label>
                </div> 

                <br>
                <button class="btn btn-primary" type="submit">Change Password</button>



                <?php
}
?>


                 
            

                <a href="?login" class="text-decoration-none mt-5"><i class="bi bi-arrow-left-circle-fill"></i> Go Back
                    To
                    Login</a>
            </form>
        </div>
    </div>

</center>
