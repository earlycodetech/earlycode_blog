<?php
    require "db_con.php";
    require "../modules/sessions.php";
    $currUser = $_SESSION['id'];

    if (!isset($_POST['updateDetails'])) {
        header("Location: ../../users/dashboard");
    }else{
        //Collect all data
        $fname = $_POST['fname']; 
        $phone = $_POST['phone']; 
        $gender = $_POST['gender']; 
        $dob = $_POST['dob']; 

        // Checks if first name is empty and updates the column
        if (!empty($fname)) {
            $sql = "UPDATE users SET full_name = '$fname' WHERE id = '$currUser'";
            $query = mysqli_query($connectDB,$sql);
            if ($query) {
                $_SESSION['success_msg'] = "Update Successful";
                header("Location: ../../users/dashboard");
            }
        }else{
            header("Location: ../../users/dashboard");
        }
        // Checks if Phone name is empty and updates the column
        if (!empty($phone)) {
            $sql = "UPDATE users SET phone = '$phone' WHERE id = '$currUser'";
            $query = mysqli_query($connectDB,$sql);
            if ($query) {
                $_SESSION['success_msg'] = "Update Successful";
                header("Location: ../../users/dashboard");
            }
        }else{
            header("Location: ../../users/dashboard");
        }

        // Checks if gender name is empty and updates the column
        if (!empty($gender)) {
            $sql = "UPDATE users SET gender = '$gender' WHERE id = '$currUser'";
            $query = mysqli_query($connectDB,$sql);
            if ($query) {
                $_SESSION['success_msg'] = "Update Successful";
                header("Location: ../../users/dashboard");
            }
        }else{
            header("Location: ../../users/dashboard");
        }

        // Checks if do name is empty and updates the column
        if (!empty($dob)) {
            $sql = "UPDATE users SET dob = '$dob' WHERE id = '$currUser'";
            $query = mysqli_query($connectDB,$sql);
            if ($query) {
                $_SESSION['success_msg'] = "Update Successful";
                header("Location: ../../users/dashboard");
            }
        }else{
            header("Location: ../../users/dashboard");
        }
    }