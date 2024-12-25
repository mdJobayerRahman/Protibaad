<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

function str_openssl_enc($str, $iv){
    $key='progga1234567890#%$%$#$%$';
    $chiper="AES-128-CTR";
    $options=0;
    $str=openssl_encrypt($str, $chiper, $key, $options, $iv);
    return $str;
 
 }

session_start();

if (isset($_POST['submit'])) {
    $image_path = null;
    if($_POST['title'] && $_POST['description'] && $_POST['location']) {
        if(!empty($_FILES["image"]["name"]))
        {
            $target_dir = "uploads/crime/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $image_path = $target_dir.$_FILES["image"]["name"];
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }


            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<script>alert('Sorry, your file was not uploaded.')</script>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    //  echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
                }
            }
        }
        $iv=openssl_random_pseudo_bytes(16);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $image_path;
        $location = $_POST['location'];

        $title=str_openssl_enc($title, $iv);
        $description=str_openssl_enc($description, $iv);
        $location=str_openssl_enc($location, $iv);

	    $iv=bin2hex($iv);

        $posted_by = $_SESSION['id'];
        $time=time();
        $posted_at = date("Y-m-d H:i:s",$time);
        $sql = "INSERT INTO crimes (title, description, location, posted_at, iv, image, user_id )
					VALUES ('$title', '$description', '$location', '$posted_at', '$iv','$image',  '$posted_by')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Thanks! Crime posted successfully.')</script>";
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }
    else {
        echo "<script>alert('Woops! Fill up the required fields.')</script>";
    }

}
?>

<?php include('includes/user_header.php') ?>


<!-- header section starts  -->

<?php include('includes/user_navbar.php') ?>


<!-- features section starts  -->
<div class="container">
    <div class="margin-top">
        <div class="login-card user-panel-card" style="justify-content: center";>
            <h1 class="heading"> <span>Post A Crime</span> </h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description <span style="color: red">*</span></label>
                    <textarea rows="5" class="form-control" id="description" name="description" placeholder="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image (Optional)</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="location">Location <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
                </div>
                <button name="submit" class="btn btn-success post-btn">Submit</button>
            </form>
        </div>
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