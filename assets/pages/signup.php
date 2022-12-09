
<?php
    // if(isset($_SESSION['entered_verification']) && $_SESSION['entered_verification']==1){
    //   // print_r($_SESSION);
    //   // start_session();
    //   unset($_SESSION);
    //   session_destroy();
    //   exit();
    // }
?>
<center >
    <div class="signup-card-wrapper my-3 py-5 shadow-lg p-3 mb-5 bg-body rounded card " style="max-width:550px; padding: 20px;display:flex;justify-content:center;align-items:center;flex-direction:column">
    <div class="mb-2">
    <img src="assets/img/pictogram.png" width="125px" alt="">
    </div>
    
   <h1 >Create New Account</h1>
    <br>
    <?php
    error_reporting(0);
    session_start();
    // include('assets/php/functions.php');
    if($_SESSION['error_status']){
        ?>
<div class=" text-center alert alert-danger alert-dismissible fade show" role="alert">
  <strong><?=$_SESSION['error_msg'];?>!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        <?php
        unset($_SESSION['error_status']);
        unset($_SESSION);
    }



?>
    

<form method="post" action="assets/php/actions.php?try-signup">
<div class="mb-3">
<div class="d-flex mb-3">
                    
                    <div class="form mt-1 col-6 mx-0 ">
                        <input type="text" class="form-control rounded"  name = "first_name" placeholder="First Name" required>
                        <!-- <label for="floatingInput">First name</label> -->
                    </div>
                    <div class="form mt-1 col-6 mx-1">
                        <input type="text" class="form-control rounded" placeholder="Last Name" name ="last_name"required>
                        <!-- <label for="floatingInput">Last name</label> -->
                    </div>
                </div>
                <div class="d-flex gap-3 my-3" style="align-items:center;justify-content:center">
            <div class="form-check">
                <!-- <label for="">Gender</label> -->
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="exampleRadios1"
                value="1"
              />
              <label class="form-check-label" for="exampleRadios1">
                Male
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="exampleRadios3"
                value="0"
              />
              <label class="form-check-label" for="exampleRadios3">
                Female
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="exampleRadios2"
                value="11"
              />
              <label class="form-check-label" for="exampleRadios2">
                Other
              </label>
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="exampleRadios2"
                value="9"
                checked
              />
            </div>
          </div>
    <!-- <label for="exampleInputEmail1" class="form-label" >Username</label> -->
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Username" name="username" required>
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
  <div class="mb-3">
    <!-- <label for="exampleInputPassword1" class="form-label" required>Confirm Password</label> -->
    <input type="password" class="form-control" name="cpassword" placeholder ="Confirm Password" required id="exampleInputPassword1">
  </div>
  <div class="d-flex" style="flex-direction:column">
  <!-- <label for="branch" class="field-label mb-3">Choose Year</label -->
                
  <select class="form-select form-select-sm mb-3" required
                  id="year"
                  name="year"
                  data-name="year"
                  required=""
                  class="select-field"
                  placeholder="Choose Year"
                >
                  <option value="1">1st year</option>
                  <option value="2">2nd year</option>
                  <option value="3">3rd Year</option>
                  <option value="4">4th year</option>
                  <option value="M.tech">M.tech</option>
                  <option value="PHD">PHD</option></select
                >
  <!-- <label for="branch" class="field-label mb-2 rounded">Choose Branch</label -->
                <select class="form-select form-select-sm"
                  id="branch"
                  name="branch"
                  data-name="branch"
                  required=""
                  class="select-field"
                >
                <!-- <option value="">open the list</option> -->
                  <option value="CSE">CSE</option>
                  <option value="ISE">ISE</option>
                  <option value="AIML">AIML</option>
                  <option value="ECE">ECE</option>
                  <option value="EEE">EEE</option>
                  <option value="Mech">Mech</option>
                  <option value="Civil">Civil</option></select
                >
  <div >
  </div>
    <div class="d-flex" style="flex-direction:column">
  <button type="submit" class="btn btn-primary my-3">Sign Up</button>
  </div>
  <div id="emailHelp" class="form-text mt-0 text-decoration-none">By signing up you agree to our <a class= "text-decoration-none" href="#"> Term and conditions <a></div>

  <a class= " text-decoration-none mt-3"href="?login"><h6>Already have an Account?</h6></a>
  </div>
  <!-- <div id="emailHelp" class="form-text mt-2">By signing up you agree to our <a href="#"> Term and conditions <a></div> -->
</form>
</div>
</div>
</center>