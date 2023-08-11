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
        <?php include("navbar.php"); ?>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 ml-auto">
                        <h1 class="text-white">Soccer</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae
                            pariatur.</p>
                        <div id="date-countdown"></div>
                        <p>
                            <a href="#" class="btn btn-primary py-3 px-4 mr-3">View Merchandise</a>
                            <a href="#" class="more light"></a>
                        </p>
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

        <div class="latest-news">
            <div class="container">
                <div class="row">
                    <div class="col-12 title-section">
                        <h2 class="heading">Latest News</h2>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-md-4">

                        <div class="post-entry">
                            <a href="index.php">
                                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="caption">
                                <div class="caption-inner">
                                    <!-- <h3 class="mb-3">Romolu to stay at Real Nadrid?</h3> -->
                                    <!-- <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="images/person_1.jpg" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div> -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="post-entry">
                            <a href="#">
                                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="caption">
                                <!-- <div class="caption-inner">
                  <h3 class="mb-3">Kai Nets Double To Secure Comfortable Away Win</h3>
                  <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="images/person_1.jpg" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div>
                </div> -->
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="post-entry">
                            <a href="#">
                                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="caption">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="site-section bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="widget-next-match">
                            <?php
                            $selecting_next_match = "SELECT * FROM `match_schedule` INNER JOIN `leagues` ON match_schedule.m_league_id = leagues.l_id  WHERE `m_status` = 0   ORDER BY `match_id` DESC ";
                            $selecting_next_match_run = mysqli_query($conn, $selecting_next_match);
                            $fetching_next_match_array = mysqli_fetch_array($selecting_next_match_run);

                            $next_team1 = $fetching_next_match_array['team_1'];
                            $select_next_team1_name = "SELECT * FROM `team` WHERE t_id = '$next_team1' ";
                            $select_next_match1 = mysqli_query($conn, $select_next_team1_name);
                            $fetcharrayteam1 = mysqli_fetch_array($select_next_match1);

                            $next_team2 = $fetching_next_match_array['team_2'];
                            $select_next_team2_name = "SELECT * FROM `team` WHERE t_id = '$next_team2' ";
                            $select_next_match2 = mysqli_query($conn, $select_next_team2_name);
                            $fetcharrayteam2 = mysqli_fetch_array($select_next_match2);


                            ?>

                            <?php if (empty($fetching_next_match_array['team_1_goals'])) { ?>
                                <div class="widget-title">
                                <h3>Next Match</h3>
                            </div>
                            <div class="widget-body mb-3">
                                <div class="widget-vs">
                                    <div
                                        class="d-flex align-items-center justify-content-around justify-content-between w-100">
                                        <div class="team-1 text-center">
                                            <img src=" ./admin/<?php echo $fetcharrayteam1['t_logo']?>" alt="Image"
                                                style="height:100px;" class="mb-2">
                                            <h3>
                                                <?php echo $fetcharrayteam1['t_name']; ?>
                                            </h3>
                                        </div>
                                        <div>
                                            <span class="vs"><span>VS</span></span>
                                        </div>
                                        <div class="team-2 text-center">
                                            <img src="./admin/<?php echo $fetcharrayteam2['t_logo'];?>" alt="Image"
                                                style="height:100px;" class="mb-2">
                                            <h3>
                                                <?php echo $fetcharrayteam2['t_name'];?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center widget-vs-contents mb-4">
                                <h4>
                                    <?php echo $fetching_next_match_array['l_name'];?>
                                </h4>
                                <p class="mb-5">
                                    <span class="d-block">
                                        <?php echo $fetching_next_match_array['date'];?>
                                    </span>
                                    <span class="d-block">
                                        <?php echo $fetching_next_match_array['time'];?>
                                    </span>
                                    <strong class="text-primary">
                                        <?php echo $fetching_next_match_array['Location'];?>
                                    </strong>
                                </p>
                                <div id="date-countdown2" class="pb-1"></div>
                            </div>
                            </div>
</div>

                            <?php     } else { ?>


                                <div class="widget-title mb-3">
                                <h3>Next Match</h3>
                            </div>

                            <div class="text-center widget-vs-contents mb-4">
                                <h4>
                                    No Match
                                </h4>

                            </div>
                            </div>
</div>
<?php   }?>

                    
                            
<?php
$select_teams = "SELECT * FROM `team`  ORDER BY `total_win` DESC" ;
$se_q = mysqli_query($conn ,$select_teams);




?>



                    <div class="col-lg-6">
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
                                       
                                <?php $em_nar = 1; 
                                 while ($fetchalls = mysqli_fetch_array($se_q)) {
                                    ?>
                                    
                                    <tr>
                                    <td><?php echo $em_nar++ ?></td>
                                    <td><?php echo $fetchalls['t_name'] ?></td>
                                    <td><?php echo $fetchalls['total_win'] ?></td>
                                    <td><?php echo $fetchalls['total_drawn'] ?></td>
                                    <td><?php echo $fetchalls['total_lost'] ?></td>
                                    <td><?php echo ($fetchalls['total_win'] * 2) + ($fetchalls['total_drawn'])  ?></td>

                                    
                                    </tr>

                                    <?php      } ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-6 title-section">
                        <h2 class="heading">Videos</h2>
                    </div>
                    <div class="col-6 text-right">
                        <div class="custom-nav">
                            <a href="#" class="js-custom-prev-v2"><span class="icon-keyboard_arrow_left"></span></a>
                            <span></span>
                            <a href="#" class="js-custom-next-v2"><span class="icon-keyboard_arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="owl-4-slider owl-carousel">
                    <div class="item">
                        <div class="video-media">
                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                            <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center"
                                data-fancybox>
                                <span class="icon mr-3">
                                    <span class="icon-play"></span>
                                </span>
                                <div class="caption">
                                    <h3 class="m-0">Dogba set for Juvendu return?</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="video-media">
                            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                            <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center"
                                data-fancybox>
                                <span class="icon mr-3">
                                    <span class="icon-play"></span>
                                </span>
                                <div class="caption">
                                    <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="video-media">
                            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                            <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center"
                                data-fancybox>
                                <span class="icon mr-3">
                                    <span class="icon-play"></span>
                                </span>
                                <div class="caption">
                                    <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="video-media">
                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                            <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center"
                                data-fancybox>
                                <span class="icon mr-3">
                                    <span class="icon-play"></span>
                                </span>
                                <div class="caption">
                                    <h3 class="m-0">Dogba set for Juvendu return?</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="video-media">
                            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                            <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center"
                                data-fancybox>
                                <span class="icon mr-3">
                                    <span class="icon-play"></span>
                                </span>
                                <div class="caption">
                                    <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="video-media">
                            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                            <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center"
                                data-fancybox>
                                <span class="icon mr-3">
                                    <span class="icon-play"></span>
                                </span>
                                <div class="caption">
                                    <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container site-section">
            <div class="row">
                <div class="col-6 title-section">
                    <h2 class="heading">Latest News</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="custom-media d-flex">
                        <div class="img mr-4">
                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="text">
                            <span class="meta">May 20, 2020</span>
                            <h3 class="mb-4"><a href="#">News 1</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora
                                dolorem.</p>
                            <p><a href="#">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="custom-media d-flex">
                        <div class="img mr-4">
                            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="text">
                            <span class="meta">May 20, 2020</span>
                            <h3 class="mb-4"><a href="#">News 2</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora
                                dolorem.</p>
                            <p><a href="#">Read more</a></p>
                        </div>
                    </div>
                </div>
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

    <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.414/build/spline-viewer.js"></script>

</body>

</html>