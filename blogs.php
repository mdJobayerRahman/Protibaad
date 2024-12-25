<?php include 'includes/connection.php';?>

<?php

//if (!isset($_SESSION['username'])) {
//    header("Location: welcome.php");
//}

session_start();
$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);
?>


<?php include('includes/user_header.php') ?>

    <!-- header section starts  -->

    <?php include('includes/user_navbar.php') ?>


    <!-- features section starts  -->

    <section class="features margin-top" id="features">

        <h1 class="heading"> <span style="color:#172260;">Blogs</span> </h1>
        <?php if($_SESSION["role"] == 'admin'){ ?>
            <a class="btn btn-primary post-btn" href="blog_create.php">Post A Blog</a>
            <a class="btn btn-primary post-btn" href="blog_list.php">Blog List</a>
        <?php } ?>
        <div class="box-container">
            <?php while($row =  mysqli_fetch_array($result)) { ?>
            <div class="box">
                <?php if($row['image']) { ?>
                    <img src="<?php echo $row['image']?> " alt="">
                <?php } else { ?>
                    <img src="image/fev.png" alt="">
                <?php } ?>
                <h3>Title: <?php echo $row['title']; ?></h3>
                <p>Date: <?php echo $row['posted_at']; ?></p>
                <a href="blog_details.php?id=<?php echo $row['id']; ?>" class="btn">Read More</a>
            </div>
            <?php } ?>
        </div>

         <br><br><br>

        
        <div class="t1">
        <table>
            <tr>
            <th>Title</th>
            <th>Date</th>
            </tr>

            <tbody id="data"></tbody>
        </table>
        
        <script>
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "ajax/blogajax.php", true);
            ajax.send();
        
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    console.log(data);
        
                    var html = "";
                    for(var a = 0; a < data.length; a++) {
                        var Title = data[a].title;
                        var Description = data[a].description;
                        var Date = data[a].posted_at;
        
                        html += "<tr>";
                            html += "<td>" + Title + "</td>";
                            html += "<td>" + Description + "</td>";
                            html += "<td>" + Date + "</td>";
                        html += "</tr>";
                    }
                    document.getElementById("data").innerHTML += html;
                }
            };
        </script>
        </div>

        <br><br><br>

    </section>

    <?php include('includes/user_footer.php') ?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>