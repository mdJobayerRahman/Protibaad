<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #000000; color:white">


    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>
        <a class="navbar-brand" href="index">Learn & Share</a>

    </div>

    <ul class="nav navbar top-nav">

        <?php if ($_SESSION['role'] == 'admin') {
        ?>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="user" class="collapse">
                    <li>
                        <a href="./users.php">View All Users</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-file-text"></i> My Account <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts" class="collapse">
                    <li>
                        <a href="./viewprofile.php?name=<?php echo $_SESSION['username']; ?>"> View Profile</a>
                    </li>
                    <li>
                        <a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>">Edit Profile</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="alerts.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Crime Alert</span>
                </a>
            </li>
           
             <li>
                <a href="adminblog.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Blog</span>
                </a>
            </li>


       

       <?php } else { ?>

            <li>
                <a href="javascript:;" class="dropdown-toggle" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-file-text"></i> My Account <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts" class="collapse">
                    <li>
                        <a href="./viewprofile.php?name=<?php echo $_SESSION['username']; ?>"> View Profile</a>
                    </li>
                    <li>
                        <a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>">Edit Profile</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-users"></i> My Notes <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="user" class="collapse">
                    
                    <li>
                        <a href="./notes.php">View All Notes</a>
                    </li>
                    <li>
                        <a href="./uploadnote.php">Upload Note</a>
                    </li>
                    
               

                </ul>
            </li>

            <li>
                <a href="buddy.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Q-Budddy</span>
                </a>
            </li>
            <li>
                <a href="quiz.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Quiz</span>
                </a>
            </li>
            <li>
                <a href="learnfeed.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Learn Feed</span>
                </a>
            </li>
            <li>
                <a href="ebook.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">E-book</span>
                </a>
            </li>
            <li>
                <a href="blog.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Blog</span>
                </a>
            </li>
          
            <li>
                <a href="../simulation/index.html" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Simulation</span>
                </a>
            </li>



        <?php } ?>


        <!-- search -->
        <!-- <li>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</li> -->
        <!-- search -->
     
        <li class="dropdown">
            <a  href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>"><i class="fa fa-fw fa-user"></i> Account</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>



    </ul>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">



    </div>
</nav>