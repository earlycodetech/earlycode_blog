<?php
    require "db_con.php";
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

            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt,"s",$email);
            $execute = mysqli_stmt_execute($stmt);

        $return = mysqli_stmt_get_result($stmt);
        //    var_dump($return);
        $numRows = mysqli_num_rows($return);
        if ($numRows > 0) {
            $_SESSION['error_msg']= "This email is already taken!";
            header("Location: ../../register");
        }
         elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
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
            // Encrypt the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Write the statement;
            $sql = "INSERT INTO users(full_name,email,phone,gender,dob,country,user_password,date_created) VALUES(?,?,?,?,?,?,?,?)";

            // Initialize connection to database
            $stmt = mysqli_stmt_init($connectDB);
            // Prepare Statement
            mysqli_stmt_prepare($stmt,$sql);
            // Bind Parameters 
            mysqli_stmt_bind_param($stmt,"ssssssss",$fname,$email,$phone,$gender,$dob,$country,$password,$date);

            $execute = mysqli_stmt_execute($stmt);
            if ($execute) {
                $_SESSION['success_msg']= "Registration Successfull!";
                 header("Location: ../../register");
            }else{
                $_SESSION['error_msg']= "Something went wrong!";
                header("Location: ../../register");
            }
        }
    }
