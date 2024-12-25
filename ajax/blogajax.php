<?php
$conn = mysqli_connect("localhost", "root", "", "protibaad");
$result = mysqli_query($conn, "SELECT * FROM blogs");
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
 
echo json_encode($data);
exit();