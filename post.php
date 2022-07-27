<?php
    include_once "assets/app/db_con.php";
    

if (!isset($_GET['q'])) {
    header("Location: index");
}


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
    <?php include "assets/modules/navbar.php";

    echo successMsg(); echo errorMsg();

    $post = $_GET['q'];
    $sql = "SELECT * FROM tbl_posts WHERE post_id = '$post'";
    $query = mysqli_query($connectDB, $sql);
    if (mysqli_num_rows($query) < 1) {
        echo "<h1 class=\"text-center py-5 fw-bold\">Post Not Found</h1>";
    } else {
        $row = mysqli_fetch_assoc($query);

    ?>
        <section>
            <div class="container mt-5">
                <div class="card">
                    <img src="assets/img/postImages/<?php echo $row['main_img']; ?>" alt="postImg" class="card-img-top">
                    <div class="card-header">
                        <h2><?php echo ucwords($row['title']); ?></h2> 
                        <h5 class="">Author: <span class="fw-lighter">
                            <?php 
                                $uid = $row['userid'];
                                
                                $user = getValue($connectDB,"full_name","users","id",$uid);
                                echo ucwords($user['full_name']);
                            ?>
                        </span>
                        </h5>
                        <h6 class="">Date: <span class="fw-lighter">
                            <?php
                                $date = date_create($row['date_created']);
                                echo date_format($date, "D, d M. Y g:i A")
                                ?>
                                </span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <?php echo $row['post_article']; ?>
                    </div>


                    <div class="card-footer">
                        <h3>Comments</h3>
                        <!-- Button trigger modal -->
                     <div class="text-end my-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Comment
                        </button>

                     </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="assets/app/post_process" method="post">
                                    <input type="hidden" name="postId" value="<?php echo $_GET['q']; ?>">
                                    <textarea name="comment" placeholder="Add Comment Here...." class="form-control" style="height: 250px;"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addComment" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        
                        <?php
                            $q = $_GET['q'];
                            $sql = "SELECT * FROM tbl_comments WHERE post_id = '$q' ORDER BY date_created DESC";
                            $query = mysqli_query($connectDB,$sql);
                            while($row = mysqli_fetch_assoc($query)){
                                $uid = $row['userid'];
                                
                                $user = getValue($connectDB,"full_name,prof_pic","users","id",$uid);
                                
                        ?>
                        <div class="position-relative mb-3">
                           <?php 
                                if (isset($_SESSION['id'])) {
                                    if ($row['userid'] == $_SESSION['id']) {
                                        $cid = $row['id'];
                                      echo " <a href=\"assets/app/post_process?delComment=$cid\" class=\"position-absolute btn btn-danger end-0 top-0\">
                                      <i class=\"fas fa-trash\"></i>
                                  </a>";
                                    }
                                }
                           ?>
                            <div class="d-flex align-items-center gap-3">
                            <img src="assets/img/avatars/<?php echo $user['prof_pic']; ?>" width="70" height="70" class="rounded-circle">
                            <h4><?php echo ucwords($user['full_name']); ?></h4>
                            </div>
                            <p class="fs-5">
                                <?php echo $row['comment']; ?>
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>