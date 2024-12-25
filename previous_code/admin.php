<?php
//Jubayer
//Siam edited
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protibaaad</title>
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
                    
/*

                    .text{
                        height: 25px;
                        border-radius: 5px;
                        padding: 2px;
                        border: solid thin #aaa;
                        width: 90%;
                    }

                    .header {
                      background-color: #333;
                      overflow: hidden;
                    }

                    .header left {
                      float: left;
                      color: #f2f2f2;
                      text-align: center;
                      padding: 14px 16px;
                      text-decoration: none;
                      font-size: 30px;
                    }

                    .header right {
                      float: right;
                      color: #f2f2f2;
                      text-align: center;
                      padding: 14px 16px;
                      text-decoration: none;
                      font-size: 20px;
                    }
 */

                </style>


</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <img src="image/fev.png" alt="Image"> Protibaad </a>

        <nav class="navbar">
            <a href="admin.php">home</a>
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
       
                   <br>   <br>   <br>   <br>   <br>   <br>  
                <h1> Crime Alert </h1>

                <br>   <br>

                    <table id="ptable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Crime Title</th>
                                <th>Crime Type</th>
                                <th>Crime Description</th>
                                <th>Location</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Action</th>

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
                                            <td colspan="7">No Crime Alert </td>
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
                                            <td><?php echo $row['description'] ?></td>
                                            <td><?php echo $row['location'] ?></td>
                                            <td><?php echo $row['time']?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><br><?php echo $row['status'] ?>
                                            <br><br>
                                                    <input type="button" id="button" value="APPROVE" onclick="approveAlert(<?php echo $row['id'] ?>);">
                                                    <br><br>
                                                    <input type="button" id="button" value="DELETE" onclick="deleteAlert(<?php echo $row['id'] ?>);">
                                                    <br><br>
                                            </td>

                            
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
<!-- 
                <script>
                    function home(){
                        location.assign('home.php');   ///default GET method
                    }
                    function logout(){
                        location.assign('logout.php');   ///default GET method
                    }

                    function profile(){
                        location.assign('profile.php');   ///default GET method
                    }

                    function uploadfn(){
                        location.assign('upload.php');
                    }

                    function cart(){
                        location.assign('cart.php');
                    }

                    function deletefn(pid){

                        location.assign('delete.php?prodid='+pid);
                    }

                    function gotocart(pid, high){
                        var amount = prompt("Enter the amount: ");
                        if (amount != "" && amount <= high){
                            location.assign('gotoCart.php?prodid='+pid+'&amount='+amount+'&high='+high);
                        }
                        else{
                            alert("Please enter a value less than "+high);
                        }
                    }

                    function notification(){
                        location.assign('notification.php');
                    }

                    function orderhistory(){
                        location.assign('orderhistory.php');
                    }

                    function myproduct()
                    {
                        location.assign('myproduct.php');
                    }

                    function product_entry(){
                location.assign('product_entry.php');
              }

              function allBid(){
                location.assign('b_bidRoom_All.php');
              }

              function update_data(p_id){
                location.assign('product_update.php?p_id='+p_id);
              }

              function delete_data(p_id){
                location.assign('product_delete.php?p_id='+p_id);
              }


                </script> -->


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


    <!-- header section ends -->

    <!-- home section starts  

   

    <section class="home" id="home">


        <div class="content">

        <h3>Crime Alert</h3>

            
            <form method=get action=crimealertprocess.php>

            <input type=hidden name=id value=''> <br><br>

            <p>

            Crime Title: <input type=text name=title value=''> <br><br>

            

            Crime Type: <input type=text name=type value=''> <br><br>

            

            Crime Description: <textarea type=text name=description value=''></textarea> <br><br>

            

            Location: <input type=text name=location value=''> <br><br>

            Time: <input type="time" id="appt" name="appt"> <br><br>

            Date: <input type="date" id="start" name="trip-start"
                    value="2018-07-22"
                    min="2018-01-01" max="2018-12-31"> <br><br> 


            

            <input type=submit value=Update> 

            </p>

            </form>
        </div>

    </section>

     home section ends -->

    <!-- features section starts  

    <section class="features" id="features">

        <h1 class="heading"> <span>Trending</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>Protibaad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>Protibaad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
                <a href="#" class="btn">read more</a>
            </div>
            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>Protibaad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
                <a href="#" class="btn">read more</a>
            </div>

        </div>

    </section>

   features section ends -->


    <!-- categories section starts 

    <section class="categories" id="categories">

        <h1 class="heading"> Current <span>News</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="">
                <h3>TItle</h3>
                <p>Details</p>
                <a href="#" class="btn">Read More</a>
            </div>

        </div>

    </section>

    categories section ends -->


    <!-- blogs section starts  

    <section class="blogs" id="blogs">

        <h1 class="heading"> our <span>blogs</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="image/fev.png" alt="Image">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by Admin </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="Image">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <img src="image/fev.png" alt="Image">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

    </section>

     blogs section ends -->

    <!-- footer section starts  -->

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







