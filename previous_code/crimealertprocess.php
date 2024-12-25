<?php 

include 'config.php';

error_reporting(0);

session_start();
//new


if (isset($_SESSION['username'])) {
	$title = $_GET['title'];
	$type = $_GET['type'];
	$description = $_GET['description'];
    $location = $_GET['location'];
    // $time = $_GET['appt'];
    //// $date = $_GET['trip-start'];
    // $date = $_GET['trip-start'];
    //new chng

    echo $location;
	
    $sql = "INSERT INTO crimealert (title, type, description, location) VALUES ('$title', '$type', '$description', '$location')";
	$result = mysqli_query($conn, $sql);

    echo $username;
	?>		
    <script>location.assign("welcome.php");</script>
    <?php
}
else{
    echo "<script>alert('Database Error');</script>";
}
	


?>
