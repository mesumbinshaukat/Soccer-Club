<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Soccer </title>
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

    <style>
        body {
            overflow-x: hidden;
        }
    </style>
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
        <?php include('navbar.html') ?>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mx-auto text-center">
                        <h1 class="text-white">The Great Soccer Leagues</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae
                            pariatur.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- END section -->

        <div class="container mb-3">
            <div class="row">
                <div class="col-lg-6">
                    <?php 
                    $select_query = "SELECT * FROM `leagues_statistics` INNER JOIN `team` ON (leagues_statistics.team_id = team.t_id)";
                    $select_query_run = mysqli_query($conn , $select_query);
                    while ($leagues_stats = mysqli_fetch_array($select_query_run) ) {
              
                    ?>
                    <h2 class="text-center fw-bolder p-4">World Cup</h2>
                    <div class="widget-next-match">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>P</th>
                                    <th>Team</th>
                                    <th>W</th>
                                    <th>D</th>
                                    <th>L</th>
                                    <th>PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><strong class="text-white"><?php echo $leagues_stats['t_name'] ?></strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>


        <?php include('footer.php') ?>

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
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');
        </script>
        <script defer
            src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
            integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
            data-cf-beacon='{"rayId":"7f3e12882ae93e2f","version":"2023.7.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
            crossorigin="anonymous"></script>
</body>

</html>