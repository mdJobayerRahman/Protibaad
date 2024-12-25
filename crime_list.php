<?php include 'includes/connection.php';?>

<?php

//if(!$_SESSION['role'] == 'admin'){
//    header("Location: welcome.php");
//}

session_start();

$sql = "SELECT * FROM crimes";
$result = mysqli_query($conn, $sql);

?>

<?php include('includes/user_header.php') ?>


<!-- header section starts  -->

<?php include('includes/user_navbar.php') ?>


<!-- features section starts  -->
<div class="container">
    <div class="login-card user-panel-card margin-top" style="justify-content: center";>
        <h1 class="heading"> <span>All Crimes</span> </h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Location</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody >
            <?php while($row =  mysqli_fetch_array($result)) { ?>
                <tr >
                    <td ><?php echo $row['title']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['posted_at']; ?></td>
                    <td>
                        <?php if($row['image']) { ?>
                            <img src="<?php echo $row['image']?> " height="50" width="50" alt="">
                        <?php } else { ?>
                            <img src="image/fev.png" alt="" height="50" width="50">
                        <?php } ?>
                    </td>
                    <td>
                        <a class="btn btn-info" href="crime_details.php?id=<?php echo $row['id']; ?>">Decrypt</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<!-- features section ends -->


<!-- footer section starts  -->

<?php include('includes/user_footer.php') ?>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script >
     $(document).ready(function (){
        $.ajax({
            type: "GET",
            url: "blog_fetch.php",
            dataType: "html",
            success: function(data){
                $("#table-container").html(data);

            }
        });
    });
</script>

</body>

</html>