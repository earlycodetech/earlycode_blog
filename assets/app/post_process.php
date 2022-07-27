<?php
require "db_con.php";
require "../modules/sessions.php";
$currUser = $_SESSION['id'];

if (isset($_POST['addNewPost'])) {
    // Collect Data
    //   echo  $postId = "EB".rand(100000,999999);
    $postId = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $postId = str_shuffle($postId);
    $postId = substr($postId, 1, 9);
    $title = $_POST['title'];
    $article = $_POST['article'];

    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    $status = "0";

    // Allowed Files
    $allowed = array("jpg", "png", "jpeg", "gif");

    $location = "../img/postImages/";
    // Generate the file type
    $fileName = explode(".", $fileName);
    // print_r($fileName);
    $fileName = end($fileName);
    $fileName = strtolower($fileName);

    if (in_array($fileName, $allowed)) {
        if ($fileError == 0) {
            if ($fileSize < 5000000) {
                // Generate a new Name for your file
                $fileNewName = "post" . $currUser . $postId . "." . $fileName;
                move_uploaded_file($fileTempName,$location.$fileNewName);
                $sql = "INSERT INTO tbl_posts(post_id,userid,title,main_img,post_article,post_status) VALUES(?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($connectDB);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "ssssss", $postId, $currUser, $title, $fileNewName, $article, $status);
                $execute = mysqli_stmt_execute($stmt);
                if ($execute) {
                    $_SESSION['success_msg'] = "Post added successfully, Pending verification!";
                    header("Location: ../../users/new-post");
                } else {
                    $_SESSION['error_msg'] = "Post upload failed";
                    header("Location: ../../users/new-post");
                }
            } else {
                $_SESSION['error_msg'] = "File Size too large, max: 5mb";
                header("Location: ../../users/new-post");
            }
        } else {
            $_SESSION['error_msg'] = "This file is corrupted";
            header("Location: ../../users/new-post");
        }
    } else {
        $_SESSION['error_msg'] = "Please upload either a jpg,png,jpeg or gif file only";
        header("Location: ../../users/new-post");
    }
}
elseif(isset($_GET['confirmPost'])){
    $id = $_GET['confirmPost'];
    $sql = "UPDATE tbl_posts SET post_status = '1' WHERE post_id = '$id'";
    $query = mysqli_query($connectDB,$sql);
    if ($query) {
        $_SESSION['success_msg'] = "Post has been verified successfully!";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['error_msg'] = "Post verification failed!";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
elseif (isset($_POST['addComment'])) {
    if (!isset($_SESSION['id'])) {
        $_SESSION['error_msg'] = "Please Login to add a comment";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{

        // Collect data
        $postId = $_POST['postId'];
        $uid = $_SESSION['id'];
        $comment = addslashes($_POST['comment']);

        $sql = "INSERT INTO tbl_comments(post_id,userid,comment) VALUES(?,?,?)";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $postId, $uid, $comment);
        $execute = mysqli_stmt_execute($stmt);
        if ($execute) {
            $_SESSION['success_msg'] = "Comment added!";
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['error_msg'] = "Comment failed";
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }
    
}
elseif (isset($_GET['delComment'])) {
    $del = $_GET['delComment'];
    $sql = "DELETE FROM tbl_comments WHERE id = '$del'";
    $query = mysqli_query($connectDB,$sql);

    if ($query) {
        $_SESSION['success_msg'] = "Comment deleted!";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['error_msg'] = "Delete failed";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}


// Main Else
else {
    header("Location: ../../users/dashboard");
}
