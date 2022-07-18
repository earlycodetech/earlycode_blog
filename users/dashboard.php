<?php
require_once "../assets/app/db_con.php";
require_once "../assets/modules/sessions.php";
auth();

$currUser = $_SESSION['id'];
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
                    <?php echo successMsg();
                    echo errorMsg(); ?>
                    <h2 class="mt-4">Dashboard</h2>

                    <?php
                        $sql = "SELECT * FROM users WHERE id = '$currUser'";
                        $query = mysqli_query($connectDB,$sql);

                        $row = mysqli_fetch_assoc($query);
                        // print_r($row);
                    ?>

                    <div class="card mx-auto" style="max-width: 600px;">
                            <form action="../assets/app/file_control" enctype="multipart/form-data" method="post" class="d-flex p-2 justify-content-end">
                                <div class="border p-1 shadow-sm">
                                    <img src="../assets/img/avatars/<?php 
                                        $img = $row['prof_pic'];
                                        if (empty($img)) {
                                           echo "logo.png";
                                        }else{
                                            echo "$img?".mt_rand();
                                        }
                                    ?>" width="100" height="100" class="rounded-circle shadow d-block mx-auto" alt="">
                                    <input type="file" name="file" class="form-control my-3">

                                    <div class="text-center">
                                        <button type="submit" name="updatePic" class="btn btn-primary">
                                            Change Picture
                                        </button>
                                    </div>
                                </div>
                            </form>

                        <form action="../assets/app/update_control" method="post" class="row card-body">
                            <div class="col-md-6 mb-2">
                                <label>Full Name: </label>
                                <input type="text" name="fname" placeholder="<?php echo $row['full_name']; ?>" class="form-control rounded-0 shadow-sm">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Email: </label>
                                <input type="email" value="<?php echo $row['email']; ?>" class="form-control rounded-0 shadow-sm" disabled>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Phone: </label>
                                <input type="tel" name="phone" placeholder="<?php echo $row['phone']; ?>" class="form-control rounded-0 shadow-sm">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Gender: </label>
                                <select name="gender" class="form-select rounded-0">
                                    <option disabled selected><?php echo $row['gender']; ?></option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Date of Birth </label>
                                <input type="text" placeholder="<?php 
                                    $date = date_create($row['dob']);
                                    echo date_format($date,"D d, M. Y");
                                ?>" name="dob" onfocus="this.type='date'" class="form-control rounded-0 shadow-sm">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>Country: </label>
                                <input type="text" value="<?php echo $row['country']; ?>" class="form-control rounded-0" disabled>
                            </div>

                            <div class="text-center my-3">
                                <button type="submit" name="updateDetails" class="btn btn-primary rounded-0 px-5 py-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <!-- Footer -->
            <?php require "../assets/modules/dashfoot.php"; ?>
        </div>
    </div>
</body>

</html>