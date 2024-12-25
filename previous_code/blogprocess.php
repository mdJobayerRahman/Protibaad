<?php 

include 'config.php';

error_reporting(0);

session_start();

// blog process

if (isset($_SESSION['username'])) {
	$title = $_GET['title'];
	$description = $_GET['description'];
    $image="<img src=\"blogimage/img.png\" width=\"96\" height=\"65\" >";


    // $time = $_GET['appt'];
    // $date = $_GET['trip-start'];

    // echo $_FILES['p_image'];
    // $img_name=$p_image['name'];

    // echo $img_name;
    // $img_tmp_path=$p_image['tmp_name'];
    // echo $img_tmp_path;
    // $img_dst_path="blogimage/$img_name";
    // echo $img_name;

    // move_uploaded_file($img_tmp_path,$img_dst_path);
    
    // echo $img_dst_path;

    
	
    $sql = "INSERT INTO blog (title, description, image) VALUES ('$title', '$description', '$image')";
	$result = mysqli_query($conn, $sql);
    
	?>		
    <script>location.assign("admin.php");</script>
    <?php
}
else{
    echo "<script>alert('Database Error');</script>";
}
	


?>