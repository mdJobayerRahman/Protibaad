<header class="header" style="background-color: #FFF;">

    <a href="welcome.php" class="logo"> <img src="image/fev.png" alt="Image"> প্রতিবাদ </a>

    <nav class="navbar" style="margin-bottom: 0px; min-height: 0px; ">
        <a href="welcome.php">home</a>
        <?php if ($_SESSION["role"] == 'police') { ?>
            <a href="crime_list.php">Crime List</a>
        <?php } ?>
        <?php if ($_SESSION["role"] == 'user') { ?>
            <a href="crimes.php">Crime Alert</a>
        <?php } ?>

        <a href="missings.php">Missing Report</a>
        <a href="blogs.php">Blogs</a>
        
        <?php if ($_SESSION["role"] == 'user') { ?>
            <a href="buddy.php">Opinion Section</a>
        <?php } ?>
       
        <?php if ($_SESSION["role"] == 'user') { ?>
            <a href="poll/index.php">Poll</a>
        <?php } ?>

        <?php if ($_SESSION["role"] == 'admin') { ?>
            <a href="poll/index.php">Poll</a>
        <?php } ?>


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
        <a href="profile.php"> <?php echo "<h1> " . $_SESSION['username'] . "</h1>"; ?>
        </a>
        <div class="welcome">
            <a style="font-size: 25px;" href="logout.php">Logout</a>
        </div>
    </form>

</header>