<?php
    require "db_con.php";
    require "../modules/sessions.php";

    if(isset($_POST['resetEmail'])){
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s",$email);
        $execute = mysqli_stmt_execute($stmt);

       $result = mysqli_stmt_get_result($stmt);
    //    var_dump($result);
       $numRows = mysqli_num_rows($result);
    //   Check if the user email does not exist
       if ($numRows < 1) {
            $_SESSION['error_msg']= "This email does not exist!";
            header("Location: ../../forgot-password");
       }else{
        // Generate a token
        $token = rand(100000,999999);

        $to = $email;
        $subject = "Password Reset";
        $message = "Hello, Please use the OTP code provided to reset your password: $token";
        $message = wordwrap($message,170,"\r\n");
        $headers = "From: Earlycode <support@earlycode_blog.com>";
        $sendMail = mail($to,$subject,$message,$headers);

        if ($sendMail) {
           $sql = "UPDATE users SET password_reset = '$token' WHERE email = '$email'";
           $query = mysqli_query($connectDB,$sql);
           if ($query) {
                $_SESSION['success_msg']= "Reset Email sent successfully, Please enter Token!";
                header("Location: ../../forgot-password?reset=1");
           }else{
            $_SESSION['error_msg']= "Reset Failed, please try again!";
            header("Location: ../../forgot-password");
           }
        }else{
            $_SESSION['error_msg']= "Reset Failed, please try again!";
            header("Location: ../../forgot-password");
        }
       }
    }

    // Reset Passeord
    elseif(isset($_POST['resetPassword'])){
        $token = $_POST['token'];
        $password = $_POST['pass'];
        $conPassword = $_POST['conpass'];

        $sql = "SELECT * FROM users WHERE password_reset = '$token'";
       $result = mysqli_query($connectDB,$sql);
    //    var_dump($result);
       $numRows = mysqli_num_rows($result);
    //   Check if the token does not exist
       if ($numRows < 1) {
            $_SESSION['error_msg']= "Token expired, please try again!";
            header("Location: ../../forgot-password");
       }else{
        if (strlen($password) < 6) {
            $_SESSION['error_msg']= "New Password too short!";
            header("Location: ../../forgot-password?reset=1");
        }
        elseif ($password != $conPassword) {
            $_SESSION['error_msg']= "Password do not match!";
            header("Location: ../../forgot-password?reset=1");
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET user_password = '$password', password_reset = 'SET' WHERE password_reset = '$token'";
            $query = mysqli_query($connectDB,$sql);
            if ($query) {
                $_SESSION['success_msg']= "Reset Successfull, Please log in!";
                header("Location: ../../login");
           }else{
            $_SESSION['error_msg']= "Reset Failed, please try again!";
            header("Location: ../../forgot-password");
           }
        }
       }
    }

    else{
        header("location: ../../login");
    }