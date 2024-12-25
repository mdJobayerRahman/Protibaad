<?php include 'includes/connection.php';?>

<?php

//if(!$_SESSION['role'] == 'admin'){
//    header("Location: welcome.php");
//}

session_start();

$sql = "SELECT * FROM missings";
$result = mysqli_query($conn, $sql);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql_del = "DELETE FROM `missings` WHERE `id`='$id'";
    $result_del = mysqli_query($conn, $sql_del);
    if ($result_del == TRUE) {
        echo "<script>alert('Record deleted successfully.')</script>";
    }else{
        echo "<script>alert('Something went wrong.')</script>";
    }
}

if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $sql_approve = "UPDATE `missings` SET `approve_status`='1' WHERE `id`='$id'";
    $result_approve = mysqli_query($conn, $sql_approve);
    if ($result_approve == TRUE) {
        echo "<script>alert('Record Approved successfully.')</script>";
      header('Location=missing_list.php');
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
        <h1 class="heading"> <span>All Missing Reports</span> </h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row =  mysqli_fetch_array($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['posted_at']; ?></td>
                    <td>
                        <?php if($row['image']) { ?>
                            <img src="<?php echo $row['image']?> " height="50" width="50" alt="">
                        <?php } else { ?>
                            <img src="image/fev.png" alt="" height="50" width="50">
                        <?php } ?>
                    </td>
                    <td>
                        <a class="btn btn-info" href="missing_list.php?delete=<?php echo $row['id']; ?>">Delete</a>
                        <?php if($row['approve_status'] == '1') { ?>
                            <h3>Approved</h3>
                        <?php } else { ?>
                            <a class="btn btn-info" href="missing_list.php?approve=<?php echo $row['id']; ?>">Approve</a>
                        <?php } ?>
                        <a class="btn btn-info" href="missing_details.php?id=<?php echo $row['id']; ?>">Details</a>
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
<script src="js/script.js"></script>

</body>

</html>