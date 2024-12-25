<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();

if (isset($_POST['submit'])) {
    if($_POST['name'] && $_POST['age'] && $_POST['description'] && $_POST['concern_contact']) {
        if(!empty($_FILES["image"]["name"]))
        {
            $target_dir = "uploads/missing/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
   // echo "<script>alert('Sorry, your file was not uploaded.')</script>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    //  echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
                }
            }
        }
        $name = $_POST['name'];
        $age = $_POST['age'];
        $description = $_POST['description'];
        $image = $target_dir.$_FILES["image"]["name"];
        $concern_contact = $_POST['concern_contact'];
        $posted_by = $_SESSION['id'];
        $time=time();
        $posted_at = date("Y-m-d H:i:s",$time);
        $sql = "INSERT INTO missings (name, age, description, concern_contact, posted_by, posted_at, image)
					VALUES ('$name', '$age', '$description', '$concern_contact', '$posted_by', '$posted_at', '$image')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Thanks! Missing report posted successfully.')</script>";
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
            <h1 class="heading"> <span>Post A Missing Report</span> </h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" required>
                </div>
                <div class="form-group">
                    <label for="description">Description <span style="color: red">*</span></label>
                    <textarea rows="5" class="form-control" id="description" name="description" placeholder="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image  <span style="color: red">*</span></label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="form-group">
                    <label for="concern_contact">Concern Person Contact Number <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="concern_contact" name="concern_contact" placeholder="Concern Person Contact" required>
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