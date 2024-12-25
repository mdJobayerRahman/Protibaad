<?php

session_start();

if ($_SESSION['username'] == 'admin') {
    header("Location: admin.php");
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

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <img src="image/fev.png" alt="Image"> Protibaad </a>

        <nav class="navbar">
            <a href="#">home</a>
            <a href="crimealertview.php">Crime Alert</a>
            <a href="missingentry.php">Missing Report</a>
            <a href="#">News</a>
            <a href="#">Criminal Records</a>
            <a href="blogentry.php">blogs</a>
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

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>"দুর্নীতি মুক্ত<span> সমাজ </span> গড়ে তুলুন"</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam libero nostrum veniam facere tempore nisi.</p>
            <a href="#" class="btn">Read More</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- features section starts  -->

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

    <!-- features section ends -->


    <!-- categories section starts  -->

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

    <!-- categories section ends -->


    <!-- blogs section starts  -->

    <section class="blogs" id="blogs">

        <h1 class="heading"> our <span>blogs</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="blogimage/img.png" alt="Image">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by Admin </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>Blog 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <img src="blogimage/img1.png" alt="Image">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>Blog 2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="box">
                <img src="blogimage/img2.png" alt="Image">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    </div>
                    <h3>Blog 3</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

    </section>

    <!-- blogs section ends -->

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