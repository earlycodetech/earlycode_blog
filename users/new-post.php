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
                    <h2 class="mt-4">New Post</h2>

                    <form action="../assets/app/post_process" onsubmit="confirm('Are you sure?')" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label>Title:</label>
                                <input type="text" name="title" id="" class="form-control rounded-0" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Post Image:</label>
                                <input type="file" name="image" class="form-control rounded-0" required>
                            </div>

                            <div class="col-12 my-3">
                                <textarea name="article" id="editor1" style="height: 300px;"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" name="addNewPost" class="btn btn-primary rounded-0">
                                    Add Post
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </main>
            <!-- Footer -->
            <!-- <script src="../assets/lib/ckeditor5-build-classic/ckeditor.js"></script> -->
            <!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script> -->
            <script src="../assets/lib/ckeditor/ckeditor.js"></script>

            <?php require "../assets/modules/dashfoot.php"; ?>
            <!-- <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script> -->
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </div>
    </div>
</body>

</html>