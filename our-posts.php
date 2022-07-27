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
            <div class="card mx-auto shadow">
                <div class="card-body">
                    <?php
                    if (!isset($_GET['q'])) {
                        $name = "Showing Recent Posts";
                    } else {
                        $name = "Showing Results For " . $_GET['q'];
                    }

                    ?>
                    <h2><?php echo $name; ?></h2>

                    <div class="row">
                        <?php
                        if (isset($_GET['q'])) {
                            // When users search for a post
                            $search = $_GET['q'];
                            $sql = "SELECT * FROM tbl_posts WHERE title LIKE '%$search%' OR post_article LIKE '%$search%' AND post_status = '1'";
                            $query = mysqli_query($connectDB, $sql);
                            if (mysqli_num_rows($query) < 1) {
                                $sql = "SELECT * FROM users WHERE full_name LIKE '%$search%' OR date_created LIKE '%$search%'";
                                $query = mysqli_query($connectDB, $sql);
                            }
                        } else {
                            // When users don't search for a post
                            if (!isset($_GET['s']) && !isset($_GET['e'])) {
                                $start = 0;
                                $end = 10;
                                $pageNum = 1;

                                $sql = "SELECT * FROM tbl_posts ORDER BY date_created DESC LIMIT $start,$end";
                                $query = mysqli_query($connectDB, $sql);
                            }else{
                                $start = $_GET['s'];
                                $end = $_GET['e'];
                                $pageNum = $_GET['p'];

                                
                                $sql = "SELECT * FROM tbl_posts ORDER BY date_created DESC LIMIT $start,$end";
                                $query = mysqli_query($connectDB, $sql);
                            }
                            
                            
                        }

                        while ($row = mysqli_fetch_assoc($query)) {
                           
                        ?>
                            <div class="col-md-6 col-lg-4 mb-2" id="Posts">
                                <div onclick="window.location = 'post?q=<?php echo $row['post_id']; ?>'" class="card" style="cursor: pointer;">
                                    <img src="assets/img/postImages/<?php echo $row['main_img']; ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h2><?php echo substr(ucwords($row['title']), 0, 50) . '...'; ?></h2>
                                        <h6>Date:<?php
                                                    $date = date_create($row['date_created']);
                                                    echo date_format($date, "D, d M. Y h:i a");
                                                    ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php }
                            if (mysqli_num_rows($query) <= 0) {
                        ?>
                            <h1 class="text-center text-danger fw-lighter my-5">No More posts</h1>

                        <?php }  ?>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php if ($start < 1){echo "disabled";} {
                                # code...
                            } ?>">
                                <a class="page-link" href="our-posts?s=<?php echo $start - 10; ?>&e=<?php echo $end - 10 ?>&p=<?php echo $pageNum - 1; ?>">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link"><?php echo $pageNum; ?></a></li>
                            <li class="page-item <?php if(mysqli_num_rows($query) <= 0){echo 'disabled';} ?>">
                                <a class="page-link" href="our-posts?s=<?php echo $start + 10; ?>&e=<?php echo $end + 10 ?>&p=<?php echo $pageNum + 1; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <style>
        #Posts img {
            height: 220px;
        }
    </style>
</body>

</html>