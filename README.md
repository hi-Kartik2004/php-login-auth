/* Author : Kartikeya Saini */


# Steps to use/download this project.
1. fork and clone using command git clone repository_url_here
or  Download as zip



*******************************************************************************
# Import database
You can download the users_information sql file and import it into your phpmyadmin panel by clicking on the import button present on the panel header.


 //or run the following codes in console one after the other.
 
      CREATE DATABASE `community`;

    CREATE TABLE `users_information` (
      `id` int(11) NOT NULL,
      `first_name` varchar(255) NOT NULL,
      `last_name` varchar(255) NOT NULL,
      `gender` int(11) NOT NULL,
      `username` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `password` varchar(255) NOT NULL,
      `year` int(11) NOT NULL,
      `branch` varchar(255) NOT NULL,
      `profile_pic` int(11) NOT NULL,
      `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
      `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
      `ac_status` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    ALTER TABLE `users_information`
      ADD PRIMARY KEY (`id`);

     ALTER TABLE `users_information`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
    COMMIT;

*******************************************************************************

# Setup Mailer
1. Open assets folder.
2. then Open php folder.
3. open send_code.php file. [assets -> php -> send_code.php]
4. Do the following changes in the code present in send_code.php file.

//Send using SMTP:

    $mail->Host       = 'smtp.gmail.com';        //if you will use gmail to send verification email don't change             //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'username@gmail.com';      //Gmail userid              //SMTP username
    $mail->Password   = 'App_password';        // Note Smtp password is different from gmail password please refer https://www.youtube.com/watch?v=1YXVdyVuFGA to get your app password.                      //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('username@gmail.com', 'Your company/website name');
    $mail->addAddress($receiver);               //Name is optional
  
# How it looks:
Login Page:
![image](https://user-images.githubusercontent.com/111000515/207064872-40c453fc-3c4f-4808-aeaf-3dce45de3294.png)
 
 Signup Page
  ![image](https://user-images.githubusercontent.com/111000515/207065162-a3250c09-cfad-46c1-857e-9d53d8e209d0.png)
 
   Verification Page
  ![image](https://user-images.githubusercontent.com/111000515/207065434-75032551-db00-49ba-9f8a-1646a1ea4519.png)
  ![image](https://user-images.githubusercontent.com/111000515/207065560-f391807a-02bd-4958-bb7d-3374cf6eb0c3.png)
 Forgot Password
 ![image](https://user-images.githubusercontent.com/111000515/207066341-8afc160e-1418-4ddc-9569-963e59253e4b.png)

    
# Temporary Credentials
if you want to try out the login system temporary login usernames and passwords are present below :

test email is : test@gmail.com 

test password is : test

You can signup and add new accounts...
Thanks for reading :)


