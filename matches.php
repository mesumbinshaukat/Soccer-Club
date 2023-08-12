<?php
include('connection.php');
$selecting_last_played_match = "SELECT * FROM `match_schedule` where `m_status` = 2  ORDER BY `match_id` DESC";
$selecting_last_played_match_run = mysqli_query($conn, $selecting_last_played_match);
$fetching_array = mysqli_fetch_array($selecting_last_played_match_run);
$team1 = $fetching_array['team_1'];


$select_team1_name = "SELECT * FROM `team` WHERE t_id = '$team1' ";
$select_match1 = mysqli_query($conn, $select_team1_name);
$fetcharrayteam1 = mysqli_fetch_array($select_match1);

$team2 = $fetching_array['team_2'];


$select_team2_name = "SELECT * FROM `team` WHERE t_id = '$team2' ";
$select_match2 = mysqli_query($conn, $select_team2_name);
$fetcharrayteam2 = mysqli_fetch_array($select_match2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Soccer</title>
    <meta charset="utf-8">
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
                    <div class="col-lg-5 mx-auto text-center">
                        <h1 class="text-white">Matches</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae
                            pariatur.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex team-vs">
                        <span class="score">
                            <?php echo $fetching_array['team_1_goals'];?> -
                            <?php  echo $fetching_array['team_2_goals'];    ?>
                        </span>
                        <div class="team-1 w-50">
                            <div class="team-details w-100 text-center">
                                <img src="./admin/<?php echo $fetcharrayteam1['t_logo'] ?>" alt="Image"
                                    class="img-fluid mb-2" style="height:100px;">
                                <h3>
                                    <?php echo $fetcharrayteam1['t_name'];?><span>
                                        <?php if ( $fetching_array['team_1_goals'] >  $fetching_array['team_2_goals']) {
                                   ?> (win)


                                        <?php }elseif( $fetching_array['team_1_goals'] ==  $fetching_array['team_2_goals']) { ?>
                                        (Drawn)
                                        <?php } else{ ?>
                                        (loss)
                                        <?php }?>
                                    </span>
                                </h3>
                                <?php 
                                 
                                 $select_player_team_1 = "SELECT *  FROM `players` WHERE team_id = '$team1' LIMIT 4";
                                 $fetch_select_team_1 = mysqli_query($conn , $select_player_team_1);
                                
                                 
                                 ?>


                                <ul class="list-unstyled">
                                    <?php while ( $fetch_query_player = mysqli_fetch_array($fetch_select_team_1)) { ?>
                                    <li>
                                        <?php echo $fetch_query_player['p_name'];?>(
                                        <?php echo $fetch_query_player['p_id']?>)
                                    </li>
                                    <?php  }?>

                                </ul>
                            </div>
                        </div>
                        <div class="team-2 w-50">
                            <div class="team-details w-100 text-center">
                                <img src="./admin/<?php echo $fetcharrayteam2['t_logo'];  ?>" alt="Image"
                                    class="img-fluid mb-2" style="height:100px;">
                                <h3>
                                    <?php echo $fetcharrayteam2['t_name'];?><span>
                                        <?php if ( $fetching_array['team_2_goals'] >  $fetching_array['team_1_goals']) {
                                    ?> (win)


                                        <?php }elseif( $fetching_array['team_2_goals'] ==  $fetching_array['team_1_goals']) { ?>
                                        (Drawn)
                                        <?php }else{ ?>
                                        (loss)

                                        <?php }?>
                                    </span>
                                </h3>
                                <?php 
                                 
                                 $select_player_team_2 = "SELECT *  FROM `players` WHERE team_id = '$team2' LIMIT 4";
                                 $fetch_select_team_2 = mysqli_query($conn , $select_player_team_2);
                                
                                 
                                 ?>


                                <ul class="list-unstyled">
                                    <?php while ( $fetch_query_player_2 = mysqli_fetch_array($fetch_select_team_2)) { ?>
                                    <li>
                                        <?php echo $fetch_query_player_2['p_name'];?> (
                                        <?php echo $fetch_query_player_2['p_id'] ?>)
                                    </li>
                                    <?php  }?>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="site-section bg-dark">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="widget-next-match">
                            <div class="widget-title">
                                <h3>Next Match</h3>
                            </div>
                            <div class="widget-body mb-3">
                                <div class="widget-vs">
                                    <div
                                        class="d-flex align-items-center justify-content-around justify-content-between w-100">
                                        <div class="team-1 text-center">
                                            <img src="images/logo_1.png" alt="Image">
                                            <h3>Football League</h3>
                                        </div>
                                        <div>
                                            <span class="vs"><span>VS</span></span>
                                        </div>
                                        <div class="team-2 text-center">
                                            <img src="images/logo_2.png" alt="Image">
                                            <h3>Soccer</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center widget-vs-contents mb-4">
                                <h4>World Cup League</h4>
                                <p class="mb-5">
                                    <span class="d-block">December 20th, 2020</span>
                                    <span class="d-block">9:30 AM GMT+0</span>
                                    <strong class="text-primary">New Euro Arena</strong>
                                </p>
                                <div id="date-countdown2" class="pb-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 title-section">
                        <h2 class="heading">Played Match</h2>
                    </div>
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">Match</th>
      <th scope="col">Teams</th>
      <th scope="col">Team 1</th>
      <th scope="col">Team 2</th>
    </tr>
  </thead>
  <tbody>

<?php
$var_1 =1 ;
$select_recently_match = "SELECT * FROM `match_schedule` WHERE m_status = 2";
$select_query_run = mysqli_query($conn , $select_recently_match);
while($recently_data = mysqli_fetch_array($select_query_run)){
   
    
    
   

    
    ?>
    <tr>
      <th scope="row"><?php echo $var_1++ ?></th>
      <td><?php
 $team_one = $recently_data['team_1'];
$select_111 = "SELECT * FROM `team` WHERE t_id = '$team_one'";
$s_q_r = mysqli_query($conn , $select_111);
$sq_fetch_ = mysqli_fetch_array($s_q_r);

$team_two = $recently_data['team_2'];
$select_two = "SELECT * FROM `team` WHERE t_id = '$team_two'";
$s_q_r_2 = mysqli_query($conn , $select_two);
$sq_fetch_2 = mysqli_fetch_array($s_q_r_2);
      
      
      
      echo $sq_fetch_['t_name'];?> VS  <?php  echo $sq_fetch_2['t_name'];    ?></td>
      <td><?php echo $recently_data['team_1_goals']?></td>
      <td><?php echo $recently_data['team_2_goals']?></td>
    </tr>
<?php }?>
  </tbody>
</table>
                </div>
            </div>
        </div>

        <div class="container site-section">
            <div class="row">
                <div class="col-6 title-section">
                    <h2 class="heading">Upcoming Matches</h2>
                </div>

        <div class="col-lg-6 mb-4">
            <div class="bg-light p-4 rounded">
              <div class="widget-body">
                <div class="widget-vs">
                  <div class="d-flex align-items-center justify-content-around justify-content-between w-100">
                    <div class="team-1 text-center">
                      <img src="images/logo_1.png" alt="Image">
                      <h3>Football League</h3>
                    </div>
                    <div>
                      <span class="vs"><span>VS</span></span>
                    </div>
                    <div class="team-2 text-center">
                      <img src="images/logo_2.png" alt="Image">
                      <h3>Soccer</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center widget-vs-contents mb-4">
                <h4>World Cup League</h4>
                <p class="mb-5">
                  <span class="d-block">December 20th, 2020</span>
                  <span class="d-block">9:30 AM GMT+0</span>
                  <strong class="text-primary">New Euro Arena</strong>
                </p>
              </div>
            </div>
        </div>


            </div>
            <div class="row">

            </div>
        </div>
        <?php include('footer.html') ?>
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
        data-cf-beacon='{"rayId":"7f3e127a7fff3e2f","version":"2023.7.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>