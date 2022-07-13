<?php
    $server = "localhost";
    $dbusername = "root";
    $dbpassword = ""; 
    $dbname = "early_blog";


    $connectDB = mysqli_connect($server,$dbusername,$dbpassword,$dbname);
    if (!$connectDB) {
        die("Failed to connect").mysqli_connect_error();
        // header("Location: ../../register");
    }