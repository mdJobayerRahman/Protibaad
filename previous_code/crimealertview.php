<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
// view

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protibaad</title>
    <link rel="icon" type="image" href="image/icon.png">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/welcome.css">

    <style>

               

                 .text{

                            height: 20px;
                            border-radius: 5px;
                            padding: 2px;
                            border: solid thin #aaa;
                            width: 80%;
                        }

                        #button{

                            padding: 10px;
                            width: 120px;
                            color: white;
                            background-color: FireBrick;
                            border: none;
                        }


                        #box{

                            background-color: AliceBlue;
                            margin: auto;
                            width: 200px;
                            padding: 10px;
                        }


                    #ptable{
                        width: 100%;
                        border: 1px solid blue;
                        border-collapse: collapse;
                    }

                    #ptable th, #ptable td{
                        border: 1px solid blue;
                        border-collapse: collapse;
                        text-align: center;
                    }

                    #ptable tr:hover{
                        background-color: bisque;
                    }

                    table {
                        color:red;font-size:15px;
                    }
                    

                </style>


</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <img src="image/fev.png" alt="Image"> Protibaad </a>

        <nav class="navbar">
            <a href="welcome.php">home</a>
            <a href="crimealertview.php">Crime Alert</a>
            <a href="#">Missing Report</a>
            <a href="#">News</a>
            <a href="#">Criminal Records</a>
            <a href="adminblog.php">blogs</a>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
        </div>


        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <form action="" class="login-form">
            <?php echo "<h1> " . $_SESSION['username'] . "</h1>"; ?>
            <div class="welcome">
                <a style="font-size: 25px;" href="logout.php">Logout</a>
            </div>
        </form>

    </header>

    <?php

session_start();

//

if(
    isset($_SESSION['username'])
    
    && !empty($_SESSION['username'])
   
){
    ///already logged in user

    $username = $_SESSION['username'];

    ?>

    


    
   
       
                   <br>   <br>   <br>   <br>   <br>  
                 <h2>Crime Alert Entry: <a href="crimealertentry.php">Create Blog </a>   </h2><br><br>  
                <h1> Crime Alert </h1>

                <br>   <br>

                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Status</th>
                                

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            try{
                                ///PDO = PHP Data Object
                                $conn=new PDO("mysql:host=localhost:3306;dbname=protibaad;","root","");
                                ///setting 1 environment variable
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                ///mysql query string
                                $mysqlquery="SELECT * FROM crimealert";

                                $returnobj=$conn->query($mysqlquery);
                                $returntable=$returnobj->fetchAll();




                                if($returnobj->rowCount()==0){
                                    ?>
                                        <tr>
                                            <td colspan="5">No Blogs </td>
                                        <tr>
                                    <?php
                                }


                                else{
                                    foreach($returntable as $row){
                                        ?>

                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['title'] ?></td>
                                            <td><?php echo $row['type'] ?></td>
                                            <td><?php echo $row['location'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                            
                                        </tr>

                                        <?php
                                    }
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="6">No values found</td>
                                    <tr>
                                <?php
                            }


                            ?>

                        </tbody>
                    </table>
                </div>

               <br>   <br>   <br>   <br>   <br>   <br>   <br>

               <script>
                        function approveAlert(id){
                        location.assign('approve_alert.php?id='+id);
                    }

                    function deleteAlert(id){
                        location.assign('delete_alert.php?id='+id);
                    }
               </script>

        </html>

    <?php
}
else{
     ?>
        <script>alert("login first!");
        location.assign("login.php");</script>
    <?php
}


?>



    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3> Protibaad <img src="image/fev.png" alt="Image"> </h3>
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

        <div class="credit"> @ <span> Team Protibaad </span> | all rights reserved </div>



    </section>

    <!-- footer section ends -->


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>







