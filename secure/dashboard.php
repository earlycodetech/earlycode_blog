<?php
require_once "../assets/app/db_con.php";
require_once "../assets/modules/sessions.php";
adminAuth();

$currUser = $_SESSION['id'];
// Change name
if (isset($_GET['q'])) {
    $filter = $_GET['q'];
    switch ($filter) {
        case '0':
            $name = "Unverified";
            break;
        case '1':
            $name = "Verified";
            break;
        case '2':
            $name = "Canceled";
            break;
        
        default:
            $name = "No";
            break;
    }
}else{
    $name = "Unverified";
}
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
                    <div class="my-3 text-end">
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort <i class="fa fa-filter"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="dashboard?q=0">Unverified</a></li>
                        <li><a class="dropdown-item" href="dashboard?q=1">Verified</a></li>
                        <li><a class="dropdown-item" href="dashboard?q=2">Canceled</a></li>
                    </ul>
                    </div>
                    </div>
                    <h2 class="mt-4"><?php echo $name; ?> Posts</h2>

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
                                if (isset($_GET['q'])) {
                                    $filter = $_GET['q'];
                                    $sql = "SELECT * FROM tbl_posts WHERE post_status = '$filter'";
                                }else{
                                    $name = "Unverified";
                                    $sql = "SELECT * FROM tbl_posts WHERE post_status = '0'";
                                }
                                $query = mysqli_query($connectDB, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['post_id']; ?></th>
                                        <td>
                                            <?php
                                            $user = $row['userid'];
                                            $uql = "SELECT full_name FROM users WHERE id = '$user'";
                                            $getName = mysqli_query($connectDB, $uql);
                                            $user = mysqli_fetch_assoc($getName);
                                            echo ucwords($user['full_name']);
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo substr($row['title'], 0, 40) . "..."; ?>
                                        </td>
                                        <td>
                                            <a href="read?q=<?php echo $row['post_id']; ?>&author=<?php echo ucwords($user['full_name']); ?>&date=<?php echo $row['date_created']; ?>" class="btn btn-primary">
                                                <i class="fa fa-book-open"></i>
                                            </a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal<?php echo $row['id']; ?>">
                                                <i class="fa fa-check"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="postModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo substr($row['title'],0,25).'...'; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Do you want to confirm this post?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="../assets/app/post_process?confirmPost=<?php echo $row['post_id']; ?>" class="btn btn-success">Verify</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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