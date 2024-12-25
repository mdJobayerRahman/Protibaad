<?php include '../includes/connection.php';?>
<?php
include 'functions.php';
session_start();

$pdo = pdo_connect_mysql();
$stmt = $pdo->query('SELECT p.*, GROUP_CONCAT(pa.title ORDER BY pa.id) AS answers FROM polls p LEFT JOIN poll_answers pa ON pa.poll_id = p.id GROUP BY p.id');
$polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?= template_header('Polls') ?>

<div class="content home">
    <h2>Polls</h2>
    <?php if ($_SESSION["role"] == 'admin') { ?>
        <a href="create.php" class="create-poll">Create Poll</a>
    <?php } ?>

    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Answers</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll) : ?>
                <tr>
                    <td><?= $poll['id'] ?></td>
                    <td><?= $poll['title'] ?></td>
                    <td><?= $poll['answers'] ?></td>
                    <td class="actions">
                        <a href="vote.php?id=<?= $poll['id'] ?>" class="view" title="View Poll"><i class="fas fa-eye fa-xs"></i></a>
                        <?php if ($_SESSION["role"] == 'admin') { ?>
                            <a href="delete.php?id=<?= $poll['id'] ?>" class="trash" title="Delete Poll"><i class="fas fa-trash fa-xs"></i></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3> Protibaad <img src="../image/fev.png" alt="Image"> </h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, saepe.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i>999 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> 01320001299 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> protibaad@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Madani Avenue, Dhaka-1212 </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> blogs </a>
        </div>

        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <input type="email" placeholder="your email" class="email">
            <input type="submit" value="subscribe" class="btn">

        </div>

    </div>

    <div class="credit"> @ <span> Team Protibaad </span> | all rights reserved </div> -->
      <?php
// session_start();
// fetch query
function fetch_data(){
    include 'includes/connection.php';

    $sql = "SELECT * FROM missings";
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
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

        </tr>';
    if(count($fetchData)>0){
        $sn=1;
        foreach($fetchData as $data){
            echo "<tr> 
          <td>".$data['id']."</td>

          <td>".$data['posted_at']."</td>
          <td><img src=".$data['image']." height='50' width='50'alt=''> </td>
          <td><a href='missing_details.php?id=".$data['id']."'>Details</a></td>
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



</section> 