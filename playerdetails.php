<?php
include("connection.php");
$get_team_id = $_GET['id'];



$select_query_team = "SELECT * FROM `players` INNER JOIN `team` ON players.team_id = team.t_id WHERE p_id = '$get_team_id'";
$select_query_run = mysqli_query($conn , $select_query_team);
$fetch_team_array = mysqli_fetch_array($select_query_run);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Team Details</title>

    <style>
        /* .colss{
            margin-top: 50px;

        } */
    </style>
</head>
<body>
<div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <?php include("navbar.php"); ?>
        <div class="hero mt-5">

            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-6 text-center">
         <img src="./admin/<?php echo $fetch_team_array['p_pic']?>" alt="" width="500px" style="height:400px;" >
            
        </div>
      <div class="col-lg-6 text-center">
        <div class="form-group ">
         <label for="exampleInputEmail1" class = "">Player Name</label>
         <h4><?php echo $fetch_team_array['p_name'];?></h4>
        </div>
        <div class="form-group">
          <label">Jersy</label>
          <h4><?php echo $fetch_team_array['team_id'];?></h4>  
        </div>
        <div class="form-group">
          <label">Team</label>
          <h4><?php echo $fetch_team_array['t_name'];?></h4>  
        </div>
        <div class="form-group">
          <label>Player Acheivements</label>
          <?php
          if ($fetch_team_array['p_achievement'] == 0) {
            echo "<h3>-----</h3>";
          }
          else{
           $player_id = $fetch_team_array['p_id'];
           $query = "SELECT * FROM `match_schedule` WHERE `player_of_match`='$player_id'";
           $query_run = mysqli_query($conn,$query);
           while($fetch = mysqli_fetch_array($query_run)){
           $team1 = $fetch['team_1'];
           $team2 = $fetch['team_2'];
           $league = $fetch['m_league_id'];
           $for_team1 = "SELECT * FROM `team` WHERE `t_id`='$team1'";
           $for_team1_run = mysqli_query($conn , $for_team1);
           $fetch_team1 = mysqli_fetch_array($for_team1_run);
           $for_team2 = "SELECT * FROM `team` WHERE `t_id`='$team2'";
           $for_team2_run = mysqli_query($conn , $for_team2);
           $fetch_team2 = mysqli_fetch_array($for_team2_run); 
           $for_league = "SELECT * FROM `leagues` WHERE `l_id`='$league'";
           $for_league_run = mysqli_query($conn , $for_league);
           $fetch_league = mysqli_fetch_array($for_league_run); 
           
           echo "<li class='text-white' >Player of the match in " . $fetch_team1['t_name'] ." Vs " .$fetch_team2['t_name'] . " of League " . $fetch_league['l_name'] ."</li>" ;   
           }
        }
           ?>  
            
        </div>
      </div>
        
    
      
                </div>
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