<center >
    <div class="signup-card-wrapper mt-5 mb-5 pt-5 pb-5 shadow-lg p-3 mb-5 bg-body rounded card " style="max-width:550px; padding: 20px;display:flex;justify-content:center;align-items:center;flex-direction:column">
    <div class="mb-2">
    <img src="assets/img/pictogram.png" width="125px" alt="">
    </div>
    
   <h1 >Login to your account</h1>
    <br>
    <?php
    error_reporting(0);
    session_start();
    if(isset($_SESSION['password_change']) && $_SESSION['password_change']){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Password Changed Successfully</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      <?php
      unset($_SESSION['password_change']);
  }
    // include('assets/php/functions.ph
    if($_SESSION['error_status']){
        ?>
    <div class=" d-flex mt-2 mb-0 text-center alert alert-danger alert-dismissible fade show" style="justify-content:center;flex-direction:column;"role="alert">
  <strong><?=$_SESSION['error_msg'];?>!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

        <?php
        unset($_SESSION['error_status']);
        unset($_SESSION);
    }



?>
    

<form method="post" action="assets/php/actions.php?try-login">
<div class="mb-3">
<div class="d-flex mb-3">
                    
                    
    <!-- <label for="exampleInputEmail1" class="form-label" >Username</label> -->
    <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Username" name="username" required> -->
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <!-- <label for="exampleInputEmail1" class="form-label"  >Email address</label> -->
    <input type="email" class="form-control" id="exampleInputEmail1" name ="email" placeholder ="Email" aria-describedby="emailHelp" required>
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <!-- <label for="exampleInputPassword1" class="form-label"  required>Password</label> -->
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder ="Password" name = "password" required>
  </div>
  
    <div class="d-flex" style="flex-direction:column">
  <button type="submit" class="btn btn-primary ">Sign In</button>
  <a class= " text-decoration-none mt-3"href="?forgot"><h6>Forgotten Password?</h6></a>
  <hr>
  <a class="btn btn-success" href="?signup" role="button">Create New Account</a>
  </div>
  <div id="emailHelp" class=" my-3 form-text  text-decoration-none"> By signing up you agree to our<a class= "text-decoration-none" href="#"> Term and conditions  <a> </div>

  </div>
  <!-- <div id="emailHelp" class="form-text mt-2">By signing up you agree to our <a href="#"> Term and conditions <a></div> -->
</form>
</div>
</div>
</center>