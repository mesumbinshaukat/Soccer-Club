<?php
include("connection.php");
if(isset($_POST['submit_btn'])){
    $username = $_POST['user_name'];
    $useremail = $_POST['user_email'];
    $usermessage = $_POST['message'];
    $userreview = $_POST['review'];

    $insert_feedback = "INSERT INTO `feedback`(`u_name`, `u_email`, `u_review`, `u_message`) VALUES ('$username','$useremail','$userreview ','$usermessage')";

    $insert_query_run = mysqli_query($conn , $insert_feedback);
    if($insert_query_run){
        echo "<script>alert('Message Sent')</script>";
        header('location:index.php');
    }


}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <?php include('navbar.php') ?>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 mx-auto text-center">
                        <h1 class="text-white">Feedback</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-6 title-section">
                        <h2 class="heading">Feedback</h2>
                    </div>
                    <div class="col-lg-7">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text"  name="user_name" class="form-control " placeholder="Name"  style="background:transparent; " value="<?php
                                if(isset($_SESSION['u_name'])){
                                $name = $_SESSION['u_name']; echo $name; }
                                else{
                                    echo "unknown user";    
                                }
                                ?>">

                            </div>
                            <div class="form-group">
                                <input type="text" name="user_email" class="form-control " placeholder="Email" 
                                style="background:transparent;" value="<?php
                                if(isset($_SESSION['u_email'])){
                            $email = $_SESSION['u_email']; echo $email; }
                                else{
                                    echo "anonymous";}?>" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="review" class="form-control" placeholder="Your Reviews" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" cols="30" rows="4"
                                    placeholder="Write your Message..." required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary py-3 px-5" value="Submit Feedback" name="submit_btn">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 ml-auto">
                        <div class="col-6 title-section">
                            <h2 class="heading">Contact us</h2>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <strong class="text-white d-block">Address</strong>
                                 Karachi, Pakistan
                            </li>
                            <li class="mb-2">
                                <strong class="text-white d-block">Email</strong>
                                <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=GTvVlcRwQZlfqkCWpbgqJLZgRqKZCpsNWdZBlXCSlMLnspjhmgZBLfhsmrbbwNCrRxzrsZDmjhkMM" target="_blank"><span >info@worldoftech.company</span></a>
                            </li>
                            <li class="mb-2">
                                <strong class="text-white d-block">
                                    Phone
                                </strong>
                                <a href="tel:03220275616">+92 322 027 5616</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"7f3e129188573e2f","version":"2023.7.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>