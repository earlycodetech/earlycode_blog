<?php
    require "../modules/sessions.php";
    if (!isset($_POST['register'])) {
        // Redirect the user
        $_SESSION['error_msg']= "Please create an account to continue";
        header("Location: ../../register");
    }else{
        $_SESSION['success_msg']= null;
        header("Location: ../../register");
    }
