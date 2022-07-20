<?php
require_once "../assets/app/db_con.php";
require_once "../assets/modules/sessions.php";
adminAuth();

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
                    echo errorMsg(); echo $_SESSION['role']; ?>
                    <h2 class="mt-4">Unverified Posts</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Post ID</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM tbl_posts WHERE post_status = '0'";
                                    $query = mysqli_query($connectDB,$sql);
                                    while ($row = mysqli_fetch_assoc($query)){
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['post_id']; ?></th>
                                        <td>
                                            <?php 
                                                $user = $row['userid'];
                                                $uql = "SELECT full_name FROM users WHERE id = '$user'";
                                                $getName = mysqli_query($connectDB,$uql);
                                                $user = mysqli_fetch_assoc($getName);
                                                echo ucwords($user['full_name']);
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo substr($row['title'],0,40)."..."; ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </main>
            <!-- Footer -->
            <?php require "../assets/modules/dashfoot.php"; ?>
        </div>
    </div>
</body>

</html>