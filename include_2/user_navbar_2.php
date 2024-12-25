<header class="header">

    <a href="#" class="logo"> <img src="../image/fev.png" alt="Image"> Protibaad </a>

    <nav class="navbar" style="margin-bottom: 0px; min-height: 0px;">
        <a href="../welcome.php">home</a>
        <a href="../crimes.php">Crime Alert</a>
        <a href="../missings.php">Missing Report</a>
        <a href="../blogs.php">Blogs</a>
        <a href="../buddy.php">Opinion Section</a>
        <a href="index.php">Poll</a>

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
        <a href="../profile.php"> <?php echo "<h1> " . $_SESSION['username'] . "</h1>"; ?>
        </a>
        <div class="welcome">
            <a style="font-size: 25px;" href="../logout.php">Logout</a>
        </div>
    </form>

</header>