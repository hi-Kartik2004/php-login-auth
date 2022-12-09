<center>
<div class="login" style="margin-top : 7%;">
  <div class="col-md-4 col-sm-11 bg-white border rounded p-4 shadow-sm">
    <form method="post" action="assets/php/actions.php?verify_email">
      <div class="d-flex justify-content-center"></div>
      <h1 class="h5 mb-3 fw-normal">
        Verify Your Email Id (<?=$_SESSION['userdata']['email']; ?>)
      </h1>

      <p>Enter 4 Digit Code sent to You</p>
      <div class="form-floating mt-1">
        <input
          type="text"
          name="code"
          class="form-control rounded-0"
          id="floatingPassword"
          placeholder="Password"
          required
        />
        <label for="floatingPassword">####</label>
      </div>

      <?php
      // session_start();
      if(isset($_SESSION['verification_status']) && !$_SESSION['verification_status']){
        ?>

        <p class="text-danger">Incorrect verification Code, Please retry !</p>
      <!-- // header("location:?verify"); -->
      <?php
      }
      if(isset(($_SESSION['resend_code'])) && $_SESSION['resend_code']){
        ?>
        <p class="text-success">Verification code resent !</p>
        <!-- header("location:?verify"); -->
        <?php

      }
      ?>

      

                
     

      <div class="mt-3 d-flex justify-content-between align-items-center">
        <button class="btn btn-primary" type="submit">Verify Code</button>
        <a
          href="assets/php/actions.php?resend_code"
          class="text-decoration-none"
          type="submit"
          >Resend Code</a
        >
      </div>
      <br />
      <!-- <a href="assets/php/actions.php?logout" class="text-decoration-none mt-5"
        ><i class="bi bi-arrow-left-circle-fill"></i> Logout</a
      > -->
    </form>
  </div>
</div>

</center>
