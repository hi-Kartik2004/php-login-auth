<?php
    require_once('assets/php/functions.php');
    require_once('assets/php/actions.php');
    if(isset($_GET['signup'])){
        showPage('header',['page_title'=>'UVCE Community - Signup']);
        showPage('signup');   
    }
    // showPage('header',['page_title'=>'UVCE Community - Login']);
    //     showPage('login');
    //     if(isset($_SESSION['entered_verification']) && $_SESSION['entered_verification']){
    //         unset($_SESSION);
    //         session_destroy();
    //         // exit();
    //     }
    if(isset($_GET['login'])){
        
        showPage('header',['page_title'=>'UVCE Community - Login']);
        showPage('login');
        if(isset($_SESSION['entered_verification']) && $_SESSION['entered_verification']){
            unset($_SESSION);
            session_destroy();
            // exit();
        }
        // if(isset($_SESSION['forgot_verification']) && $_SESSION['forgot_verification']){
            // $_SESSION['forgot_verification']=0;
            unset($_SESSION['show_change_password']);
            unset($_SESSION['forgot_code_sent_to']);
            unset($_SESSION['forgot_code_sent']);
            unset($_SESSION['forgot_verification']);
            unset($_SESSION['hide_input_email']);
            unset($_SESSION['hide_input_code']);

            
        // }
    }

    if(isset($_GET['verify'])){
        showPage('header',['page_title'=>'User Verification']);
        showPage('verification_page');
    }

    if(isset($_GET['re-verify'])){
        showPage('header',['page_title'=>'User Verification']);
        showPage('verify');
    }
   if(isset($_GET['home'])){
    // showPage('header',['page_title'=>$_SESSION['userdata']['username']]);
    // showPage("navbar");
    // showPage('wall');
    // logout button.
    echo'
    <form action="assets/php/actions.php?logout" method="post">
    <div class="d-flex" style="flex-direction:column">
    <button type="submit" class="btn btn-primary my-3">Logout</button>
    </div>
    </form>';
    $response=checkUserStatus($_SESSION['userdata']['email']);
    // print_r($response);
        if(($response['ac_status'])==1){
            // print_r($response['ac_status']);
            showPage('header',['page_title'=>$_SESSION['userdata']['username']]);

            print_r($_SESSION['userdata']);
        }
        else if(!($response['ac_status'])){
            // print_r($response['ac_status']);
            header("location:?login");
        }
        else if($response['ac_status']==9){
            // unset($_SESSION);
            // session_destroy();
            // exit();
            echo "<h1>Your Account has been Blocked, Please contact Admin</h1>";
            // header("location:?login");
            // print_r($_SESSION['userdata']);
        }

   }
    if(isset($_GET['forgot'])){
        showPage('header',['page_title'=>'Forgot Password']);
        showPage('forgot');
    }
   
    showPage('footer');
?>