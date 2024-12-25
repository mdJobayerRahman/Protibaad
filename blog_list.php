<?php include 'includes/connection.php';?>

<?php

if(!$_SESSION['role'] == 'admin'){
   header("Location: welcome.php");
}

session_start();

$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   $sql_del = "DELETE FROM `blogs` WHERE `id`='$id'";
   $result_del = mysqli_query($conn, $sql_del);
   if ($result_del == TRUE) {
       echo "<script>alert('Record deleted successfully.')</script>";
   }else{
       echo "<script>alert('Something went wrong.')</script>";
   }
}
?>

<?php include('includes/user_header.php') ?>


<!-- header section starts  -->

<?php include('includes/user_navbar.php') ?>


<!-- features section starts  -->
<div class="container">
    <div class="login-card user-panel-card margin-top" style="justify-content: center";>
        <h1 class="heading"> <span>All Blogs</span> </h1>
<!--        <button id="showData">Show User Data</button>-->
        <div id="table-container"></div>
    </div>
</div>


<!-- features section ends -->


<!-- footer section starts  -->

<?php include('includes/user_footer.php') ?>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    // $(document).on('click','#showData',function(e){
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