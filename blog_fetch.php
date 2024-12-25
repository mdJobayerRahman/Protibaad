
<?php
session_start();
// fetch query
function fetch_data(){
    include 'includes/connection.php';

    $sql = "SELECT * FROM blogs";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;

    }else{
        return $row=[];
    }
}
$fetchData= fetch_data();
show_data($fetchData);
function show_data($fetchData){
    echo '<table border="1" class="table">
        <tr>
             <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
        </tr>';
    if(count($fetchData)>0){
        $sn=1;
        foreach($fetchData as $data){
            echo "<tr> 
          <td>".$data['id']."</td>
          <td>".$data['title']."</td>
          <td>".$data['posted_at']."</td>
          <td><img src=".$data['image']." height='50' width='50'alt=''> </td>
          <td><a href='blog_list.php?delete=".$data['id']."'>Delete</a></td>
          <td><a href='blog_details.php?id=".$data['id']."'>Details</a></td>
   </tr>";

            $sn++;
        }
    }else{

        echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>";
    }
    echo "</table>";
}
?>