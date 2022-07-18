<?php
    require "db_con.php";
    require "../modules/sessions.php";
    $currUser = $_SESSION['id'];

    if (!isset($_POST['updatePic'])) {
        header("Location: ../../users/dashboard");
    }else{
        // collect Data
        $file = $_FILES['file'];

        print_r($file);
        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        // Allowed Files
        $allowed = array("jpg","png","jpeg","gif");

        $location = "../img/avatars/";
        // Generate the file type
        $fileName = explode(".",$fileName);
        // print_r($fileName);
        $fileName = end($fileName);
        $fileName = strtolower($fileName);

        if (in_array($fileName,$allowed)) {
            if ($fileError == 0) {
                if ($fileSize < 5000000) {
                    // Generate a new Name for your file
                    $fileNewName = "profile".$currUser.".".$fileName;
                   if (file_exists($location.$fileNewName)) {
                        unlink($location.$fileNewName);

                        $move = move_uploaded_file($fileTempName, $location.$fileNewName);
                        if ($move) {
                            $sql = "UPDATE users SET prof_pic = '$fileNewName' WHERE id = '$currUser'";
                            $query = mysqli_query($connectDB,$sql);
                            if ($query) {
                                $_SESSION['success_msg'] = "File upload successful";
                                header("Location: ../../users/dashboard"); 
                            }else{
                                $_SESSION['error_msg'] = "File upload failed";
                                header("Location: ../../users/dashboard"); 
                            }
                            
                        }else{
                            $_SESSION['error_msg'] = "File upload failed";
                            header("Location: ../../users/dashboard"); 
                        }
                   }else{
                        $move = move_uploaded_file($fileTempName, $location.$fileNewName);
                        if ($move) {
                            $sql = "UPDATE users SET prof_pic = '$fileNewName' WHERE id = '$currUser'";
                            $query = mysqli_query($connectDB,$sql);
                            if ($query) {
                                $_SESSION['success_msg'] = "File upload successful";
                                header("Location: ../../users/dashboard"); 
                            }else{
                                $_SESSION['error_msg'] = "File upload failed";
                                header("Location: ../../users/dashboard"); 
                            }
                        }else{
                            $_SESSION['error_msg'] = "File upload failed";
                            header("Location: ../../users/dashboard"); 
                        }
                   }
                    
                }else{
                    $_SESSION['error_msg'] = "File Size too large, max: 5mb";
                    header("Location: ../../users/dashboard"); 
                }
            }else{
                $_SESSION['error_msg'] = "This file is corrupted";
                header("Location: ../../users/dashboard"); 
            }
        }else{
            $_SESSION['error_msg'] = "Please upload either a jpg,png,jpeg or gif file only";
            header("Location: ../../users/dashboard");
        }

    }