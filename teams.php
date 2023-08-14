<?php
include('connection.php');
$selecting_last_played_match = "SELECT * FROM `match_schedule` where `m_status` = 2  ORDER BY `match_id` DESC";
$selecting_last_played_match_run = mysqli_query($conn, $selecting_last_played_match);
$fetching_array = mysqli_fetch_array($selecting_last_played_match_run);
$team1 = $fetching_array['team_1'];


$select_team1_name = "SELECT * FROM `team` WHERE t_id = '$team1' ";
$select_match1 = mysqli_query($conn , $select_team1_name);
$fetcharrayteam1 = mysqli_fetch_array($select_match1);

$team2 = $fetching_array['team_2'];


$select_team2_name = "SELECT * FROM `team` WHERE t_id = '$team2' ";
$select_match2 = mysqli_query($conn , $select_team2_name);
$fetcharrayteam2 = mysqli_fetch_array($select_match2);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Soccer</title>
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
        <?php include("navbar.php"); ?>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 ml-auto">
                        <h1 class="text-white">Soccer Teams</h1>
                        <p>We compete with other teams, using our skills and teamwork to achieve success and make our supporters proud.</p>
                        <!-- <div id="date-countdown"></div> -->
                        <p>
                            <!-- <a href="#" class="btn btn-primary py-3 px-4 mr-3">View Merchandise</a> -->
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
<?php 
$select_query =  "SELECT * FROM `team`";
$select_query_teams_run = mysqli_query($conn , $select_query);
?>


<div class="container">
    <div class="col-12 title-section pt-5">
      <h2 class="heading mt-5">Teams</h2>
    </div>
    <div class="text-center mb-5">
      <input type="search" name="searchfield" id="forsearch" onkeyup="searchfunction()" class="form-control" placeholder="Search Team">
    </div>
        <div class="row" id="show_team"></div>
        <div class="row" id="hide">



          <?php while ($team = mysqli_fetch_array($select_query_teams_run)) { ?>

          
          <div class="col-lg-3 mb-4">
            <div class="bg-light p-4 rounded ">
              <div class="widget-body">
                <div class="widget-vs">
                  <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="team-1 text-center">
                    <a href="team_details.php?id=<?php echo $team['t_id'];?>"><img src="./admin/<?php echo $team['t_logo'];?>" alt="Image" style="height:100px;"></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center widget-vs-contents mb-4">
               <a href="team_details.php?id=<?php echo $team['t_id'];?>"> <h4><?php echo $team['t_name'] ?></h4> </a> 
              </div>
            </div>
          </div>
          <?php } ?>
         


                </div>
            </div>
        </div>

        <!-- <div class="container site-section">
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
        </div> -->

        <?php include('footer.php')?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<script>
    function searchfunction() {
        $("#hide").hide();
       var word =  $("#forsearch").val();
      $.ajax({
        url: "searchteam.php",
        type: "POST",
        data: {
          search_word: word,
        },
        // cache: false,
        success: function(Result) {


          $("#show_team").html(Result);


        }
      });

    }
</script>
</body>

</html>