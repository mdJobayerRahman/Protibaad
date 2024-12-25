<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_del = "SELECT * FROM `missings` WHERE `id`='$id'";
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
        <h1 class="heading"> <span>Missing Details</span> </h1>
        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result)) { ?>
            <div class="box">
                <?php if($row['image']) { ?>
                    <img src="<?php echo $row['image']?> " alt="">
                <?php } else { ?>
                    <img src="image/fev.png" alt="">
                <?php } ?>
                <h3>Title: <?php echo $row['name']; ?></h3>
                <p>Age: <?php echo $row['age']; ?></p>
                <p>Description: <?php echo $row['description']; ?></p>
                <p>Concern Person Contact Number: <?php echo $row['concern_contact']; ?></p>
                <p>Date: <?php echo $row['posted_at']; ?></p>
            </div>
            <?php } ?>
        </div>


        <?php 
    // pass web-site url
    $site_url  = "https://www.prothomalo.com/world/europe/%E0%A6%B0%E0%A7%81%E0%A6%B6-%E0%A6%AC%E0%A6%BE%E0%A6%B9%E0%A6%BF%E0%A6%A8%E0%A7%80%E0%A6%95%E0%A7%87-%E0%A6%B0%E0%A7%81%E0%A6%96%E0%A6%A4%E0%A7%87-%E0%A6%87%E0%A6%89%E0%A6%95%E0%A7%8D%E0%A6%B0%E0%A7%87%E0%A6%A8%E0%A7%87-%E0%A6%AB%E0%A6%BF%E0%A6%A8%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B8-%E0%A6%98%E0%A7%8B%E0%A6%B8%E0%A7%8D%E0%A6%9F-%E0%A6%AA%E0%A6%BE%E0%A6%A0%E0%A6%BE%E0%A6%9A%E0%A7%8D%E0%A6%9B%E0%A7%87-%E0%A6%AF%E0%A7%81%E0%A6%95%E0%A7%8D%E0%A6%A4%E0%A6%B0%E0%A6%BE%E0%A6%B7%E0%A7%8D%E0%A6%9F%E0%A7%8D%E0%A6%B0";
    // post title
    $site_title  = "Protibaad";
?>


<div id="button_share">
    

    
    <!-- Email Social Media -->
    <a href="mailto:?Subject=<?=$site_title?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?=$site_url?>">
        <img src="" alt="Email" />
    </a>
 
    <!-- Facebook Social Media -->
    <a href="http://www.facebook.com/sharer.php?u=<?=$site_url?>" target="_blank">
        <img src="" alt="Facebook" />
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