<?php
    require_once "../assets/app/db_con.php";
    require_once "../assets/modules/sessions.php";
    auth();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Earlycode Blog</title>
        <link href="../assets/img/logo.png" rel="shortcut icon" />
        <link href="../assets/css/styles.css" rel="stylesheet" />
       <link rel="stylesheet" href="../assets/fontawsome/css/all.css">
       <link rel="stylesheet" href="../assets/css/animate.css">
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
          <?php require "../assets/modules/dashnav.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php  echo successMsg(); echo errorMsg(); ?>
                        <h2 class="mt-4">Dashboard</h2>
                        <?php echo $_SESSION['id']; ?>
                    </div>
                </main>
                <!-- Footer -->
                <?php require "../assets/modules/dashfoot.php"; ?>
            </div>
        </div>
    </body>
</html>
