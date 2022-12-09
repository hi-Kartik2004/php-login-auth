<?php
    // connection to the db
    session_start();
    require_once("config.php");
    $conn = mysqli_connect(db_host,db_username,db_password,db_database) or die ("Could'nt connect with database");


    //To show the page
    function showPage($page,$data=""){
        include("assets/pages/$page.php");
    }

    // To check duplicate email id
    function validateUser($data){
        global $conn;
        $_SESSION['error_status'] = false;
        $inputted_email = $data['email'];
        $inputted_username = $data['username'];
        $sql_query = "SELECT * from `users_information` WHERE `ac_status`= '-1' AND `username`='$inputted_email';";
        $run = mysqli_query($conn,$sql_query);
        $number_of_rows = mysqli_num_rows($run);
        if($number_of_rows>0){
            $_SESSION['error_status'] = true;
            $_SESSION['error_field'] = 'verified';
            $_SESSION['error_msg'] = "Verification incomplete";
            //redirect to verification page...
        }
       
        $sql_query = "SELECT * from `users_information` WHERE `email`= '$inputted_email';";
        $run = mysqli_query($conn,$sql_query);
        $number_of_rows = mysqli_num_rows($run);
        // echo $number_of_rows;
        if($number_of_rows>0){
            $_SESSION['error_status'] = true;
            $_SESSION['error_field'] = 'email';
            $_SESSION['error_msg'] = "Email already exsists";
        }
        $sql_query = "SELECT * from `users_information` WHERE `username`= '$inputted_username';";
        $run = mysqli_query($conn,$sql_query);
        $number_of_rows = mysqli_num_rows($run);
        // echo $number_of_rows;
        if($number_of_rows>0){
            $_SESSION['error_status'] = true;
            $_SESSION['error_field'] = 'username';
            $_SESSION['error_msg'] = "Username already taken";
        }
        if($data['cpassword']!=$data['password']){
            $_SESSION['error_status'] = true;
            $_SESSION['error_field'] = 'password';
            $_SESSION['error_msg'] = "Password Mismatch Please recheck";
        }




        // $run = mysqli_query()
    }

    // To insert the user into db or Create User
    function insertUser($data){
        // echo "Hello insertuser here";
        global $conn;
        if(!empty(trim($data['password']))){
            $first_name = trim($data['first_name']);
            $last_name = trim($data['last_name']);
            $gender = trim($data['gender']);
            $email = trim($data['email']);
            $username = trim($data['username']);
            $password = md5(trim($data['password']));
            $cpassword = trim($data['cpassword']);
            $year = trim($data['year']);
            $branch = trim($data['branch']);
            $sql_query = "INSERT INTO `users_information` (`first_name`, `last_name`,`gender`,`username`, `email`, `password`, `year`, `branch`, `profile_pic`, `created_at`, `updated_at`, `ac_status`) VALUES ('$first_name', '$last_name', '$gender', '$username', '$email', '$password', '$year', '$branch','' ,current_timestamp(), current_timestamp(), '0')";

            $run = mysqli_query($conn,$sql_query);
        }
    //    $return_data = mysqli_fetch_assoc($run);
    //    return $return_data;
    //    print_r($return_data);
    }

    // To validate User Login
    function validateUserLogin($data){
        global $conn;
        $response = array();
        $inputted_email = $data['email'];
        $inputted_password = md5(trim($data['password']));
        $sql_query = "SELECT * from `users_information` WHERE `email`= '$inputted_email' AND `password`='$inputted_password'AND `ac_status`='0';";
        $run = mysqli_query($conn,$sql_query);
        $number_of_rows = mysqli_num_rows($run);
        if($number_of_rows==1){
            unset($_SESSION); //doubt
            session_destroy();
            session_start();
            $sql = "UPDATE `users_information` SET `ac_status` = '1' WHERE `email` = '$inputted_email';";
            $run = mysqli_query($conn,$sql);
            $data_query = "SELECT * FROM `users_information` WHERE `email` = '$inputted_email';";
            $run = mysqli_query($conn,$data_query);
            $userdata = mysqli_fetch_assoc($run);
            // $data = mysqli_fetch_assoc($run)??array();
            // print_r($data);
            $_SESSION['userdata'] = $userdata;
            $response['status']=true;
            return $response;
            //redirect to verification page...
        }
        $sql_query = "SELECT * from `users_information` WHERE `email`= '$inputted_email' AND `password`='$inputted_password' AND (`ac_status`!= '0' || `ac_status`!='1') ;";
        $run = mysqli_query($conn,$sql_query);
        $number_of_rows = mysqli_num_rows($run);
        if($number_of_rows==1){
            $data_query = "SELECT * FROM `users_information` WHERE `email` = '$inputted_email';";
            $run = mysqli_query($conn,$data_query);
            $userdata = mysqli_fetch_assoc($run);
            // $data = mysqli_fetch_assoc($run)??array();
            // print_r($data);
            $_SESSION['userdata'] = $userdata;
            $response['status'] = true;
            return $response;
        }
        $sql_query = "SELECT * from `users_information` WHERE `email`= '$inputted_email';";
        $run = mysqli_query($conn,$sql_query);
        $number_of_rows = mysqli_num_rows($run);
        if($number_of_rows==0){
            $response['status']=false;
            $response['msg'] = 'User Does not Exsists, Please Sign Up';
            //redirect to verification page...
        }
        else{
            $response['status'] = false;
            $response['msg'] = 'Password Incorrect, Please Re-Check';
        }

        return $response;
    }
    // get user data
    function getUserData($data){
        global $conn;
        $email = $data['email'];
        $sql = "SELECT * FROM `users_information` WHERE `email` = '$email';";
        $run = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($run);
        return $data;
    }
    // to get User data
    // function getUserData($data){
    //     $usercheck = validateUserLogin($data)['status'];
    //     if($usercheck){
    //         echo 
    //     }
    // }
    
    // to logout user
    function logoutUser($user_email){
        global $conn;
        // print_r($_SERVER['userinfo']);
        // $user_email = $_SESSION['userinfo']['username'];
        // echo $user_email;
        if($_SESSION['userdata']['ac_status']==1){
            $logout_sql = "UPDATE `users_information` SET `ac_status` = '0' WHERE `email` = '$user_email';";
            
            $run = mysqli_query($conn,$logout_sql);
            unset($_SESSION);
            session_destroy(); 
            header("location:../../?login"); 
        }
        else if (($_SESSION['userdata']['ac_status']!=1) || ($_SESSION['userdata']['ac_status']!=0)){
            unset($_SESSION);
            session_destroy(); 
            header("location:../../?login"); 
        }
        else{
            unset($_SESSION);
            session_destroy(); 
            header("location:../../?login"); 
        }
    }

    //Check user status
    function checkUserStatus($email){
        global $conn;
        $sql = "SELECT `ac_status` FROM `users_information` WHERE `email` = '$email';";
        $run = mysqli_query($conn,$sql);
        $response = mysqli_fetch_assoc($run);
        $rowCount = mysqli_num_rows($run);
        return $response;
        // if($rowCount==1){
        //     return $response;
        // }
        // else if($rowCount == 0){
        //     return false;
        // }
        // else{
        //     return false;
        // }
        // return $run;
        // echo $run;
    }

    // to check verification code : 
        function verifyEmail($inputted_code,$actual_code){

            if($inputted_code == $actual_code){
                // echo $inputted_code;
                // echo $actual_code;
                $response['status'] = 1;
                return $response['status'];
            }
            else{
                // echo $inputted_code;
                // echo $actual_code;
                $response['status'] = 0;
                return $response['status'];
            }
        }


?>