<?php
require_once "../assets/app/db_con.php";
require_once "../assets/modules/sessions.php";
adminAuth();
if(!isset($_GET['q'])){
    header("Location: dashboard");
}
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
                    echo errorMsg(); 
                    $post = $_GET['q'];
                    $sql= "SELECT * FROM tbl_posts WHERE post_id = '$post'";
                    $query = mysqli_query($connectDB,$sql);
                    $row = mysqli_fetch_assoc($query);
                    
                    ?>
                    <div class="card mx-auto shadow-sm mt-4" style="max-width: 990px;">
                        <div class="card-header">
                            <h2 class="fw-bold"><?php echo ucwords($row['title']); ?></h2>
                            <h5 class="text-end">Author: <span class="fw-lighter"><?php echo $_GET['author'] ?></span></h5>
                            <h6 class="text-end">Date: <span class="fw-lighter"><?php 
                                $date = date_create($_GET['date']);
                                echo date_format($date,"D, d M. Y g:i A")
                                ?></span></h6>
                        </div>
                        <img src="../assets/img/postImages/<?php echo $row['main_img'] ?>" alt="post" class="card-img-top">
                        <div class="card-body">
                            <?php echo $row['post_article']; ?>
                        </div>
                        <div class="card-footer">
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
                        </div>
                    </div>


                </div>
            </main>
            <!-- Footer -->
            <?php require "../assets/modules/dashfoot.php"; ?>
        </div>
    </div>
</body>

</html>