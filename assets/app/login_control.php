<?php
    require "db_con.php";
    require "../modules/sessions.php";


    if (!isset($_POST['login'])) {
        // Redirect the user
        header("Location: ../../login");
    }else{
        // colect data
        $email = $_POST['email'];
        $password = $_POST['pass'];

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
            $_SESSION['error_msg']= "This user does not exist!";
            header("Location: ../../register");
       }else{
            $row = mysqli_fetch_assoc($result);
           $returnedPassword = $row['user_password'];
           if (!password_verify($password,$returnedPassword)) {
                $_SESSION['error_msg']= "incorrect password!";
                header("Location: ../../login");
           }else{
            // When password is correct
            $_SESSION['id'] = $row['id'];
            $_SESSION['success_msg'] = "Login Successful, Welcome ".$row['full_name'];
            header("Location: ../../users/dashboard");
           }
       }
    }