<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_del = "SELECT * FROM `blogs` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql_del);
    if (!$result == TRUE) {
        echo "<script>alert('Something went wrong.')</script>";
    }
} else{
    echo "<script>alert('Something went wrong.')</script>";
    header("Location: welcome.php");
}
?>


<?php include('includes/user_header.php') ?>

    <!-- header section starts  -->

    <?php include('includes/user_navbar.php') ?>


    <!-- features section starts  -->

    <section class="features margin-top" id="features">
        <h1 class="heading"> <span>Blog Details</span> </h1>
        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result)) { ?>
            <div class="box">
                <?php if($row['image']) { ?>
                    <img src="<?php echo $row['image']?> " alt="">
                <?php } else { ?>
                    <img src="image/fev.png" alt="">
                <?php } ?>
                <h3>Title: <?php echo $row['title']; ?></h3>
                <p>Description: <?php echo $row['description']; ?></p>
                <p>Date: <?php echo $row['posted_at']; ?></p>
            </div>
            <?php } ?>
        </div>


        <?php 
    // pass web-site url
    $site_url  = "http:///blog";
    // post title
    $site_title  = "Protibaad";
?>

<div id="button_share">
   
    <!-- Email Social Media -->
    <a href="mailto:?Subject=<?=$site_title?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?=$site_url?>">
        <img src="" alt="Email share link" />
    </a>
 
    <!-- Facebook Social Media -->
    <a href="http://www.facebook.com/sharer.php?u=<?=$site_url?>" target="_blank">
        <img src="" alt="Facebook share link" />
    </a>
    
    <!-- Google+ Social Media -->
    <a href="https://plus.google.com/share?url=<?=$site_url?>" target="_blank">
        <img src="" alt="Google share link" />
    </a>
    
    <!-- LinkedIn Social Media -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$site_url?>" target="_blank">
        <img src="" alt="LinkedIn share link" />
    </a>
    


</div>


    </section>

    <!-- features section ends -->


    <!-- footer section starts  -->

    <?php include('includes/user_footer.php') ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>