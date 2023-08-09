<?php include('../connection.php');
$get_id = $_GET['id'];
$select_query = "SELECT * FROM `match_schedule` WHERE match_id = '$get_id'";
$select_query_run = mysqli_query($conn , $select_query);
$fetch_query = mysqli_fetch_all($select_query_run);

if (isset($_POST['update_btn'])) {
   $m_status = $_POST['m_status'];     
   $team1_goals = $_POST['team1_goals'];     
   $team2_goals = $_POST['team2_goals'];    
   $player_of_the_match = $_POST['player_of_the_match'];

   $update_query = "UPDATE `match_schedule` SET `m_status`='$m_status',`team_1_goals`='$team1_goals',`team_2_goals`='$team2_goals',`player_of_match`='$player_of_the_match' WHERE `t_id` = '$get_id'";
   $update_query_run = mysqli_query($conn , $update_query);
   if($update_query_run){
    echo "<script>alert('schedule updated')</script>";
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
       body{
            background-color: #252525;
            color:white;
        }
    </style>
</head>
<body>
<?php include('navbar.php') ?>

<h1 class="text-center mt-5">UPDATE SCHEDULE</h1>
 
    <div class="container me-5 mt-5 ">
        
<form method="post">
  <div class="mb-3">
    <label >Match Status</label>
    <select name="m_status" id="">
      <option value="2">Match Completed</option>
      <option value="1">Match Delayed</option>
      <option value="0" onclick="functionhide()">Match Drawn/Cancelled</option>


    </select>
  </div>
  <div id="hide">
  <div class="mb-3">
    <label >Team 1 Goals</label>
    <input type="number" min="0" class="form-control" name="team1_goals" placeholder="GOALS SCORE BY TEAM 1">
  </div>
  <div class="mb-3">
    <label >Team 2 Goals</label>
    <input type="number" min="0" class="form-control" name="team2_goals" placeholder="GOALS SCORE BY TEAM 2">
  </div>
  <div class="mb-3">
    <label >Player of the Match</label>
    <select name="player_of_the_match" id="">
        <?php
        $select_player_query = "SELECT * FROM `players` ";
        $query_run = mysqli_query($conn , $select_player_query);
        while($player = mysqli_fetch_array($query_run)){?>
    <option value="<?php echo $player['p_id'];?>"><?php echo $player['p_name'];?></option>
    <?php } ?>
    </select>
    
  </div>
  </div>

  
  <input type="submit" class="btn btn-success" value="Update" name="btn_update">
</form>
</div>

<script>
  function functionhide() {
     document.getElementById("hide") = style.display.none;
  }
</script>
</body>
</html>