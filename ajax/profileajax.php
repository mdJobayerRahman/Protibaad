<?php
$conn = mysqli_connect("localhost", "root", "", "Protibaad");
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
 
echo json_encode($data);
exit();