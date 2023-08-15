<?php
include("connection.php");
$get_team_id = $_GET['id'];

$select_query_team = "SELECT * FROM `team` WHERE t_id = '$get_team_id'";
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
        .colss{
            margin-top: 50px;

        }
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







        
        <div class="hero mt-5" style="padding-top:100px;">

            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-6 text-center">
         <img src="./admin/<?php echo $fetch_team_array['t_logo']?>" alt="" class = "w-50">
            
        </div>
      <div class="col-lg-6 mt-5">

<div class="row">
<div class="col-lg-3">
<div class="form-group text-center">
         <label for="exampleInputEmail1" class = "mt-5">Team Name</label>
         <h4><?php echo $fetch_team_array['t_name'];?></h4>
        </div>
</div>
<div class="col-lg-3">
<div class="form-group text-center">
         <label for="exampleInputEmail1" class = "mt-5">Total win</label>
         <h4><?php echo $fetch_team_array['total_win'];?></h4>
        </div>
</div>
<div class="col-lg-3">
<div class="form-group text-center">
         <label for="exampleInputEmail1" class = "mt-5">Total lost</label>
         <h4><?php echo $fetch_team_array['total_lost'];?></h4>
        </div>
</div>
<div class="col-lg-3">
<div class="form-group text-center">
         <label for="exampleInputEmail1" class = "mt-5">Total draw</label>
         <h4><?php echo $fetch_team_array['total_drawn'];?></h4>
        </div>
</div>

      </div>



        
        
        
        
    


<!-- <div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="form-group ">
         <label for="exampleInputEmail1" class = "mt-5">Team Name</label>
         <h4></h4>
        </div>
    </div>
    <div class="col">
    <div class="form-group ">
         <label for="exampleInputEmail1" class = "mt-5">Total win</label>
         <h4></h4>
        </div>
    </div>
      </div>
  </div>
</div> -->

<!-- <div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="form-group ">
         <label for="exampleInputEmail1" class = "mt-5">Total lost</label>
         <h4></h4>
        </div>
    </div>
    <div class="col">
    <div class="form-group ">
         <label for="exampleInputEmail1" class = "mt-5">Total draw</label>
         <h4></h4>
        </div>
    </div>
  </div>
</div> -->
<hr>

<div class="container text-center">
  <div class="row">
    <div class="col">
    <div class="form-group">
          <label">Players</label>
          <h4><?php echo $fetch_team_array['t_players_count'];?></h4>  
        </div>

    </div>
  </div>
</div>





      </div>
        
    <div class="col-lg-12" >
    


    <table class="table table-dark table-bordered" style="margin-top:50px;">
  <thead>
    <tr class="text-center">
      <th scope="col">Player Name</th>
      <th scope="col">Jersey Number</th>
      <th scope="col">Player Achievement</th>
    </tr>
  </thead>
  <tbody>
   
        <?php $select_player_query = "SELECT * FROM `players` WHERE team_id = '$get_team_id'  ";
        $select_query_run = mysqli_query($conn , $select_player_query);
         while ($player = mysqli_fetch_array($select_query_run)) {?>
           <tr class="text-center" >
            <td scope="row"><a class="text-decoration-none" href="playerdetails.php?id=<?php echo $player['p_id']?>"><?php echo $player['p_name'];?></a></td>  
            <td class="text-center"><?php echo $player['p_id'];?></td>
            <td><?php if($player['p_achievement'] == 0){
              echo "No Acheivements";
            }else{
              $p_id = $player['p_id'];
              $query = "SELECT * FROM `match_schedule` WHERE `player_of_match`='$p_id'";
              // "SELECT @times = COUNT(DidWin) FROM ``
              // $team_1 = "SELECT * FROM `match_schedule` WHERE `match_id` = '$match_id'";
              $run = mysqli_query($conn,$query);
              $no = mysqli_num_rows($run);
              echo  $no . " times player of the match  <a href='playerdetails.php?id=" . $player['p_id'] . "'>(see details)</a>" ;
            }?></td>
            </tr>
        <?php }?>
    

        
  </tbody>
</table>
  
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