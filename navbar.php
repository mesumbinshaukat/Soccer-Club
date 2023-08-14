<?php 
include('connection.php');
session_start();
if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']))
{
    $id = $_SESSION['u_id'];
    $select_query = "SELECT * FROM `user` WHERE `u_id` = '$id'";
    $run_select_query = mysqli_query($conn, $select_query);

    if($run_select_query)
    {
        $fetch_details = mysqli_fetch_assoc($run_select_query);
        $fetch_u_id = $fetch_details['u_id'];

        $_SESSION['user_id'] = $fetch_u_id;
    }

}



?>
<head>
<style>
    *{
         font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; 
    }
</style>

</head>

<header class="site-navbar py-4" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Logo">
                </a>
            </div>
            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="<?php
                if(!empty($_GET['home'])){
                            echo "active";
                        }
                        
                        ?>"><a href="index.php?home=home" class="nav-link">Home</a></li>
                        <li class="<?php
                        if (!empty($_GET['matches'])) {
                            echo "active";
                        }
                        ?>"><a href="matches.php?matches=matches" class="nav-link">Matches</a></li>
                        <li class="<?php
                        if (!empty($_GET['players'])) {
                            echo "active";
                        }
                        ?>"><a href="players.php?players=players" class="nav-link">Players</a></li>
                        <li class="<?php
                        if (!empty($_GET['teams'])) {
                            echo "active";
                        }
                        ?>"><a href="teams.php?teams=teams" class="nav-link">Teams</a></li>
                        <!-- <li><a href="teams.php" class="nav-link">Marchandise</a></li> -->
                        <li class="<?php
                        if (!empty($_GET['news'])) {
                            echo "active";
                        }
                        ?>"><a href="news.php?news=news" class="nav-link">News</a></li>
                        <li class="<?php
                        if (!empty($_GET['feedback'])) {
                            echo "active";
                        }
                        ?>"><a href="feedback.php?feedback=feedback" class="nav-link">Feedback</a></li>
                        <li class="<?php
                        if (!empty($_GET['marchandise'])) {
                            echo "active";
                        }
                        ?>"><a href="merchendise.php?marchandise=marchandise" class="nav-link">shop</a></li>

                        <?php if (isset($_SESSION['u_email']) && isset($_SESSION['u_pass']) && isset($_SESSION['u_name'])) { ?>
                        <li><a href="user/profile.php?id=<?php echo $_SESSION['user_id'];?>" class="nav-link" style="color:white; font-weight:bold; ">Profile</a></li>
                        <li><a href="logout.php" class="nav-link" style="color:red; font-weight:bold; ">Log Out</a></li>
                        <?php } else {
                        ?>
                        <li><a href="./user/signup.php" class="nav-link btn btn-primary" style=" font-weight:bold; "
                                id="sign_up">Sign
                                Up</a></li>
                        <?php
                        } ?>
                    </ul>
                </nav>
                <a href="#"
                    class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                        class="icon-menu h3 text-white"></span></a>
            </div>
        </div>
    </div>
</header>