<?php include 'includes/connection.php'; ?>
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
$id = $_GET['threadid'];
$sql = "SELECT * FROM `threads` WHERE thread_id=$id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
}

?>

<?php
$showAlert = false;
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    //Insert into comment db
    $comment = $_POST['comment'];
    if (isset($_SESSION['id'])) {
        $userid = $_SESSION['id'];
    }

    // $sno = $_POST['sno']; 
    $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) 
        VALUES ('$comment', '$id', '$userid', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    $showAlert = true;
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background-color: #333;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
    }
}
?>


<!-- Category container starts here -->
</br>
</br>
</br>
</br>
<div class="container my-4" style="background-color: #fff;">
    <div class="jumbotron" style="padding-top: 100px;">
        <h1 class="display-4"><?php echo $title; ?></h1>
        <p class="lead"> <?php echo $desc; ?></p>
        <hr class="my-4">
        <p style="color: #333; font-weight: 100;"> No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
        <!-- <p>Posted by: <em><?php echo $posted_by; ?></em></p> -->
    </div>
</div>



<div class="container" style="color:#333;">
    <h1 class="py-2">Post a Comment</h1>
    <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" style="font-size: 15px">Type your comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <!-- <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '"> -->
        </div>
        <button type="submit" class="btn btn-success" style="background-color: #333;">Post Comment</button>
    </form>
</div>




<div class="container mb-5" id="ques" style="padding-top:30px;" >
    <h1 class="py-2" style="color:#333;">Discussions</h1>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id ";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $thread_user_id = $row['comment_by'];

        $sql2 = "SELECT * FROM `users` WHERE id='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
       // $image = $row2['image'];
        echo '<div class="media my-3"style="background: #DAF7A6; padding: 5px">

            <div class="media-body"style="font-size: 15px">
            <p class="font-weight-bold my-0">' . $row2['username'] . ' at ' . $comment_time . '</p> ' . $content . '
            </div>
        </div>';
    }
    // echo "this is good";
    // echo var_dump($noResult);
    if ($noResult) {
        echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Comments Found</p>
                        <p class="lead"> Be the first person to comment</p>
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