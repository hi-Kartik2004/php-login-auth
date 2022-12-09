<?php 
    require_once('functions.php');
    require_once('send_code.php');
    // $username = $_POST['username'];
    // echo $username;

    //Managing the signup;
    if(isset($_GET['try-signup'])){
        validateUser($_POST);
        if($_SESSION['error_status']){
            // print_r($_POST);
            // validateUser($_POST);
            // echo $_SESSION['error_msg'];
            header("location:../../?signup");
        }
        else{
                
                // $_SESSION['error_status'] = true;
                // $_SESSION['code']=sendVerificationCode($_POST['email']);
                // insertUser($_POST);
                // echo $_SESSION['code'];
                $_SESSION['userdata']=$_POST;
                $_SESSION['code']=sendVerificationCode($_SESSION['userdata']['email']);
                header("location:../../?verify");
        // $_SESSION['code']=sendVerificationCode($_SESSION['userdata']['email']);

                // print_r($_SESSION['userdata']);
                // header('location:../../?verify');
                // echo '<script>location.replace("../../?verify")</script>'; //Y not header ??
                // insertUser($_POST);
                // $_SESSION['userdata']=$_POST;
                
        }
    }

    // Managing the login:
    if(isset($_GET['try-login'])){
        // print_r($_POST);
        $response=validateUserLogin($_POST);
        // print_r($response);
        if(!$response['status']){
            // echo $response['msg'];
            $_SESSION['error_status']=true;
            $_SESSION['error_msg'] = $response['msg'];
            // echo $_SESSION['error_msg'];
            header("location:../../?login");
        }
        else{
            // session_start();
            $userdata=validateUserLogin($_POST);
            // $_SESSION['userdata'] = array();
            // $_SESSION['userdata'] = $userdata;
            // print_r($_SESSION['userdata']);
            // print_r($userdata);
            // $_SESSION['code']=sendVerificationCode($_SESSION['userdata']['email']);
            // echo $_SESSION['code'];
            header('location:../../?home');
        }

    }

    //Managaing the logout;

    if(isset($_GET['logout'])){
        logoutUser($_SESSION['userdata']['email']);
    }

    //Managing the Verification Code mailing system;
    if(isset($_GET['verify_email'])){

        $_SESSION['entered_verification']=1;
        // echo "Hello";
        // print_r($_POST);
        // echo $_SESSION['code'];
        // if($_SESSION['code')
        echo $_SESSION['code'];
        echo $_POST['code'];
        if( $_SESSION['code'] == $_POST['code'] ){
            insertUser($_SESSION['userdata']);
            $_SESSION['error_status']=1;
            $_SESSION['error_msg'] = "Sign Up Success!! Please Login";
            header("location:../../?login");
        }
        else{
            $_SESSION['verification_status'] = 0;
            $_SESSION['resend_code'] = 0;
            $_SESSION['verification_error'] = 'Incorrect Verification Code';
            header("location:../../?verify");
        }
        $response['status']=verifyEmail($_POST['code'],$_SESSION['code']);
        // print_r($response);
        // if(!$response['status']){
        //     $_SESSION['auth'] = 0;
        //     header("location:../../?verify");
        //     // $_SESSION['error_msg'] = 'Sign Up Success, Please login';
        //     //     header('location:../../?login');
        //     // header("location:../../?login");
        // }
        // else{
        //     $_SESSION['auth'] = 1;
        //     $_SESSION['error_msg'] = 'Sign Up Success, Please login';
        //     insertUser($_SESSION['userdata']);
        //     header("location:../../?login");
        // }
    }

    // //Managing resend code :
    // if(isset($_GET['resend_code'])){
    //     $_SESSION['code']=sendVerificationCode($_SESSION['userdata']['email']);
    //     $_SESSION['resend_code'] = 1;
    //     header("location:../../?verify");
    // }

    //Managing resend code :
    if(isset($_GET['resend_code'])){
        $_SESSION['verification_status'] = 1;
        $_SESSION['resend_code'] = 1;
        $_SESSION['code']=sendVerificationCode($_SESSION['userdata']['email']);
        // print_r($_SESSION);
        header("location:../../?verify");
    }
    

    //Managing Forgot password :
    if(isset($_GET['forgot'])){
        // $_SESSION['code']=sendVerificationCode($_SESSION['userdata']['email']);
        // $email = array();
        if(isset($_POST['email']) && !empty(trim($_POST['email']))){
            $email = $_POST['email'];
            $_SESSION['code']=sendVerificationCode($email);
            $_SESSION['forgot_code_sent'] = 1;
            $_SESSION['forgot_code_sent_to'] = $_POST['email'];
            $_SESSION['hide_input_email']=1;
            $_SESSION['hide_input_code']=0;
            $_SESSION['user_email'] = $email;
            header("location:../../?forgot");
        }
        // echo $email;
        
        // if( $_SESSION['code'] == $_POST['code'] ){
        // //    $_SESSION['show_change_password']=1;
        // }
        // else{
        //    $_SESSION['verification_status']=0;
        // }
        // $response['status']=verifyEmail($_POST['code'],$_SESSION['code']);
    }

    //forgot and check... 
    if(isset($_GET['code'])){
        if($_GET['code'] == $_SESSION['code']){
            $_SESSION['show_change_password']=1;
            $_SESSION['forgot_verification']=1;
            // $_SESSION['user_email'] = 
            $_SESSION['hide_input_code']=1;
            header("location:../../?forgot");
        }
        else{
            $_SESSION['forgot_verification'] = 0;
            $_SESSION['forgot_code_sent']=0;
            unset($_SESSION['user_email']);
            // $_SESSION['show_change_password']=0;
            header("location:../../?forgot");

        }
    }

    //re enter email id:
    if(isset($_GET['re-enter'])){
            unset($_SESSION['show_change_password']);
            unset($_SESSION['forgot_code_sent_to']);
            unset($_SESSION['forgot_code_sent']);
            unset($_SESSION['forgot_verification']);
            unset($_SESSION['hide_input_email']);
            unset($_SESSION['code']);
            unset($_SESSION['hide_input_code']);
        header("location:../../?forgot");
    }

    //change the password from forgot password 

    if(isset($_GET['forgotpassword'])){
        global $conn;
        $newpassword = $_POST['password'];
        $newpassword = md5($newpassword);
        if(isset($_SESSION['user_email'])){
            $userEmail = $_SESSION['user_email'];
            $sql = "UPDATE `users_information` SET `password` = '$newpassword' WHERE `email` = '$userEmail';";
            $run = mysqli_query($conn,$sql);
            $_SESSION['password_change'] = 1;
            header("location:../../?login");
        }
    }

 
    

?>