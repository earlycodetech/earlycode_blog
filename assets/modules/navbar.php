<?php
    require_once "assets/modules/sessions.php";
?>
<section class="bg-dark pt-3"> 
        <?php
            $news = getValue($connectDB,'post_id','breaking_news','id','1');
            $brkNews = getValue($connectDB,'title,post_id','tbl_posts','post_id',$news['post_id'])
        ?>
        <a href="post?q=<?php echo $news['post_id']; ?>" class="text-white text-decoration-none">
            <marquee behavior="scroll" direction="left" scrollamount="7">
                <b>Breaking News: </b>
                 <?php
                    $sql = "SELECT title FROM tbl_posts ORDER BY date_created DESC LIMIT 2";
                    $query = mysqli_query($connectDB,$sql);
                    while($brkNews = mysqli_fetch_assoc($query)){
                        echo ucwords($brkNews['title'])." | "; 
                    }
                     
                ?>
            </marquee>
        </a>
</section>
<section>
    <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="index">
            <img src="assets/img/logo.png" alt="logo" height="70"> Earlycode Blog
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="index">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="our-posts">Latest Posts</a>
            </li>
            <li class="nav-item">
                <?php if (!isset($_SESSION['id'])) {?>
                <a class="nav-link active text-light" aria-current="page" href="register">Register / Login <i class="fa fa-sign-in-alt"></i></a>
                <?php }else{
                     $user = getValue($connectDB,"full_name","users","id",$_SESSION['id']);
                       
                ?>
                    <a class="nav-link active text-light" aria-current="page" href="users/dashboard"><?php echo ucwords($user['full_name']);   ?></a>
                <?php } ?>
            </li>
            <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li> -->
           
            <style></style>
        </ul>
        <form action="our-posts" method="get" class="d-flex">
                <input type="text" name="q" placeholder="Search..." class="form-control bg-transparent text-white rounded-0">
                <button class="btn btn-outline-light  rounded-0">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    </nav>
</section>