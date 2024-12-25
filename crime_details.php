<?php include 'includes/connection.php';?>

<?php

function str_openssl_dec($str, $iv){
    $key='progga1234567890#%$%$#$%$';
    $chiper="AES-128-CTR";
    $options=0;
    $str=openssl_decrypt($str, $chiper, $key, $options, $iv);
    return $str;
 
 }

session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_del = "SELECT * FROM `crimes` WHERE `id`='$id'";
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
        <h1 class="heading"> <span>Crime Details</span> </h1>
        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result)) { 
                $iv=$row['iv'];
                $title=$row['title'];
                $description=$row['description']; 
                $location=$row['location'];;
                $iv=hex2bin($iv);
                $title=str_openssl_dec($title, $iv);
                $description= str_openssl_dec($description, $iv);
                $location= str_openssl_dec($location, $iv);
                
                ?>
            <div class="box">
                <?php if($row['image']) { ?>
                    <img src="<?php echo $row['image']?> " alt="">
                <?php } else { ?>
                    <img src="image/fev.png" alt="">
                <?php } ?>
                <h3> <?php echo $title ?></h3>
                <p><?php echo$description ?></p>
                <p>Location: <?php echo $location ?></p>
                <p>Date: <?php echo $row['posted_at']; ?></p>
            </div>
            <?php } ?>
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