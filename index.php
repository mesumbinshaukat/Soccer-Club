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
    <link rel="icon" type="image/png" href="images/football.png" />
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
        <?php include("navbar.php"); ?>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 ml-auto">
                        <h1 class="text-white">Soccer</h1>
                        <p>we aim to blend tradition with innovation, fostering a powerhouse of talent that transcends borders.</p>
                        <!-- <div id="date-countdown"></div> -->
                        <p>
                            <a href="merchendise.php" class="btn btn-primary py-3 px-4 mr-3">View Merchandise</a>
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

       
        <div class="site-section bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="widget-next-match">
                            <?php
                            $selecting_next_match = "SELECT * FROM `match_schedule` INNER JOIN `leagues` ON match_schedule.m_league_id = leagues.l_id  WHERE `m_status` = 0   ORDER BY `date` ";
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
                                <!-- <div id="date-countdown2" class="pb-1"></div> -->
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
$league_id_one = $fetching_array['m_league_id'];
$select_teams = "SELECT * FROM `team` WHERE league_id = '$league_id_one'  ORDER BY `total_win` DESC ,`total_lost` ASC, `total_drawn` DESC" ;
$se_q = mysqli_query($conn ,$select_teams);
$select_teams_for_league_name = "SELECT * FROM `leagues` WHERE `l_id` = '$league_id_one'" ;
$se_q2 = mysqli_query($conn ,$select_teams_for_league_name);
$fetch_league = mysqli_fetch_array($se_q2);



?>



                    <div class="col-lg-6">
                        <h2 class="text-center mb-3"><?php echo $fetch_league['l_name'] ?></h2>
                        <div class="widget-next-match">
                            <table class="table custom-table">
                                <thead>
                                    <tr class = "text-center">
                                        <th>Rank</th>
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
                                    
                                    <tr class = "text-center">
                                    <td><?php echo $em_nar++   ?></td>
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
                        <h2 class="heading">Players</h2>
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


                <?php  
                $select_query = "SELECT * FROM `players`";
                $s_q_ = mysqli_query($conn ,$select_query);
                
                while ($fetchallss = mysqli_fetch_array($s_q_)) {
                 ?>
               
                
                    <div class="item">
                        <div class="video-media">
                            <img src="./admin/<?php echo $fetchallss['p_pic'] ?>" alt="Image" class="img-fluid h-100" style="height:400px">
                            
                            <a href="playerdetails.php?id=<?php echo $fetchallss['p_id'];?>" class="d-flex play-button align-items-center">
                               
                            <div class="caption">
                                    <h3 class="m-0"><?php echo $fetchallss['p_name'] ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                    <?php } ?>
                   
                </div>
            </div>
        </div>
      
            <script>
fetch('./news.json')
.then(res => res.json())
.then(data =>{
    // console.log(data);
    for (let index = 0; index < 3; index++) {
         element = data[index];
        //  console.log(element);
         document.getElementById('test').innerHTML +=
                "<div class='col-lg-4 mb-4'><div class='custom-media d-block' ><div class='img mb-4'><a href='./articles/newsrelated.php?index=" +
                index + "'><img src='" + element['image'] + "' alt='Image' class='img-fluid'></a>" +
                "<div class='text'><span class='meta'>" + element['published_at'] +
                "</span> <h3 class='mb-4'><a href='./articles/newsrelated.php?index=" + index + "'>" + element[
                    'title'] +
                "</a></h3> <p><a href='./articles/newsrelated.php?index=" + index +
                "'>Read more</a></p></div></div>";
        
    }
});
</script>

<div class="container site-section">
        <div class="row">
            <div class="col-6 title-section">
                <h2 class="heading">Latest News</h2>
            </div>
        </div>

        <div class="row" id="test">


        </div>
    </div>
                 
               
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

    <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.414/build/spline-viewer.js"></script>

</body>

</html>