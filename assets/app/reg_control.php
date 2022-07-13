<?php
    require "../modules/sessions.php";

    // Sets the timezone on your application
    date_default_timezone_set("Africa/Lagos");

    if (!isset($_POST['register'])) {
        // Redirect the user
        $_SESSION['error_msg']= "Please create an account to continue";
        header("Location: ../../register");
    }else{
         //Collect all data
         $fname = $_POST['fname']; 
         $email = $_POST['email']; 
         $phone = $_POST['phone']; 
         $gender = $_POST['gender']; 
         $dob = $_POST['dob']; 
        // echo $dob = strtotime($dob) /1000; Covert String date value to timestamp
         $country = $_POST['country']; 
         $password = $_POST['pass']; 
         $conPass = $_POST['conPass']; 
         $date = date("Y-m-d");

         if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
            $_SESSION['error_msg']= "Password must contain uppercase, lowercase, number and symbol";
            header("Location: ../../register");
        }
        elseif (strlen($password) < 8) {
            $_SESSION['error_msg']= "Password must not be less than 8 characters!";
            header("Location: ../../register");
        }
        elseif($password != $conPass){
            $_SESSION['error_msg']= "Passwords do not match!";
            header("Location: ../../register");
        }else{
            
        }
    }
