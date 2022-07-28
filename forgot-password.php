<?php
require_once "assets/app/db_con.php";
require_once "assets/modules/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earlycode Blog</title>
    <link rel="stylesheet" href="assets/css/bootstrap5.min.css">
    <link rel="stylesheet" href="assets/fontawsome/css/all.css">

    <!-- Icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">
</head>

<body>
    <!-- Navbar -->
    <?php require_once "assets/modules/navbar.php"; ?>
    <section>
        <div class="container mt-5">
            <?php echo errorMsg();
            echo successMsg(); ?>
            <div class="card mx-auto shadow" style="max-width: 600px">
                <?php if (!isset($_GET['reset']) || $_GET['reset'] != '1') { ?>
                    <div class="card-body">
                        <h3 class="text-center">PLease Enter your Email to Reset your Password</h3>
                        <form action="assets/app/reset_control" method="post" class="row">
                            <div class="col-md-12 mb-2">
                                <label>Email: </label>
                                <input type="email" name="email" class="form-control rounded-0 shadow-sm">
                            </div>

                            <div class="text-center my-3">
                                <button type="submit" name="resetEmail" class="btn btn-primary rounded-0 px-5 py-2">Reset </button>
                            </div>
                        </form>
                    </div>
                <?php }else{ ?>
                    <div class="card-body">
                        <h3 class="text-center">Reset Password</h3>
                        <form action="assets/app/reset_control" method="post" class="row">
                            <div class="col-md-6 mb-2">
                                <label>Token: </label>
                                <input type="text" name="token" class="form-control rounded-0 shadow-sm">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Password: </label>
                                <input type="password" name="pass" class="form-control rounded-0 shadow-sm">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Confirm Password: </label>
                                <input type="password" name="conpass" class="form-control rounded-0 shadow-sm">
                            </div>

                            <div class="text-center my-3">
                                <button type="submit" name="resetPassword" class="btn btn-primary rounded-0 px-5 py-2">Reset </button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
                <div class="text-center py-2">
                    <small>Login Instead? <a href="login" class="nav-link p-0 d-inline">Login</a></small>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>