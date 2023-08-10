<?php session_start();

// $u_email = $_SESSION['u_email'];
// $u_pass = $_SESSION['u_pass'];
// $u_name = $_SESSION['u_name'];

// echo "<script>alert('$u_email')</script>";
// echo "<script>alert('$u_pass')</script>";
// echo "<script>alert('$u_name')</script>";

?>

<style>
#sign_up {
    background: rgb(2, 255, 205);
    background: linear-gradient(90deg, rgba(2, 255, 205, 1) 0%, rgba(13, 161, 154, 1) 53%, rgba(0, 174, 209, 1) 100%);
}
</style>

<header class="site-navbar py-4" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="index.html">
                    <img src="images/logo.png" alt="Logo">
                </a>
            </div>
            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                        <li><a href="matches.php" class="nav-link">Matches</a></li>
                        <li><a href="players.php" class="nav-link">Players</a></li>
                        <li><a href="news.php" class="nav-link">News</a></li>
                        <li><a href="contact.php" class="nav-link">Contact</a></li>
                        <?php if (isset($_SESSION['u_email']) && isset($_SESSION['u_pass']) && isset($_SESSION['u_name'])) { ?>
                        <li><a href="logout.php" class="nav-link" style="color:red; font-weight:bold; ">Log Out</a></li>
                        <?php } else {
                        ?>
                        <li><a href="./user/signup.php" class="nav-link" style="color:black; font-weight:bold; "
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