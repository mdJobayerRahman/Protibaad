<?php include('includes/connection.php'); ?>
<?php include('dashboard/includes/adminheader.php');  ?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}


$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);
?>


<?php include('includes/user_header.php') ?>

<!-- header section starts  -->

<?php include('includes/user_navbar.php') ?>


<?php
$id = $_GET['catid'];
$sql = "SELECT * FROM `q_category` WHERE q_category_id=$id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $catname = $row['q_category_name'];
    $catdesc = $row['q_category_des'];
}

?>

<?php
$showAlert = false;
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    // Insert into thread db
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];

    if (isset($_SESSION['id'])) {
        $userid = $_SESSION['id'];
    }


    // $sno = $_POST['sno']; 

    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`,`thread_date`, `thread_user_id`) 
        VALUES ( '$th_title', '$th_desc', '$id', current_timestamp(), '$userid' )";
    $result = mysqli_query($conn, $sql);
    $showAlert = true;
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
    }
}
?>
<!-- Category container starts here -->
<div class="container my-4" style="padding-top: 80px; background-color:white">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo $catname; ?> Discussion Session</h1>
        <p class="lead"> <?php echo $catdesc; ?></p>
        <hr class="my-4">
        <p>No Spam / Advertising / Self-promote in the forums is not allowed. Do not
            post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
            questions. Remain respectful of other members at all times.</p>
        <a class="btn btn-success btn-lg" href="#" role="button" style="background-color: #333;">Learn more</a>
    </div>
</div>



<div class="container">
    <h1 class="py-2" style="color:#333;">Start a Discussion</h1>
    <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
        <div class="form-group" style="color:#333;">
            <label for="exampleInputEmail1" style="font-size:15px" style="color:#333;">Problem Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted" style="color:#333;">Keep your title as short and crisp as
                possible</small>
        </div>


        <div class="form-group" style="color:#333;">
            <label for="exampleFormControlTextarea1" style="font-size:15px">Ellaborate your Problem</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success" style="background-color: #333;">Submit</button>
    </form>
</div>


<div class="container mb-5" id="ques" style="padding-top: 20px;">
    <h1 class="py-2" style="color:#333;"> Questions</h1>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_time = $row['thread_date'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT * FROM `users` WHERE id='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result);


        echo '<div class="media my-3" style="background: #DAF7A6; padding: 10px">
        <div class="media-body">' .
            '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . ' </a></h5>
           ' . $desc . ' </div>' .
            '</div>';
    }
    // echo var_dump($noResult);
    if ($noResult) {
        echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container" style="color: black;">
                        <p class="display-4" >No Question Found</p>
                        <p class="lead"> Be the first person to ask a question</p>
                    </div>
                 </div> ';
    }
    ?>
    <br>
    <br>
    <br>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<?php include('includes/user_footer.php') ?>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>

</html>