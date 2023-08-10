<?php
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}
include('../connection.php');
$get_id = $_GET['id'];
$get_team1 = $_GET['team1'];
$get_team2 = $_GET['team2'];
$select_query = "SELECT * FROM `match_schedule` WHERE match_id = '$get_id'";
$select_query_run = mysqli_query($conn , $select_query);
$fetch_query = mysqli_fetch_all($select_query_run);


if (isset($_POST['btn_update'])) {
   $team1_goals = $_POST['team1_goals'];     
   $team2_goals = $_POST['team2_goals'];    
   $player_of_the_match = $_POST['player_of_the_match'];

   $update_query = "UPDATE `match_schedule` SET `m_status`='2' ,`team_1_goals`='$team1_goals',`team_2_goals`='$team2_goals',`player_of_match`='$player_of_the_match' WHERE `match_id` = '$get_id'";
   $update_query_run = mysqli_query($conn , $update_query);
   if($update_query_run){
    echo "<script>alert('schedule updated');
    window.location.href='notifications.php'
    </script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    body {
        background-color: #252525;
        color: white;
    }
    </style>
</head>

<body>
    <div id="mySidebar" class="sidebar">
        <?php include('navbar.php') ?>
    </div>
    <div id="main">
        <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span>

        <h1 class="text-center mt-5">UPDATE SCHEDULE</h1>

        <div class="container me-5 mt-5 ">

            <form method="post">


                <div class="mb-3">
                    <label>Team 1 Goals</label>
                    <input type="number" min="0" class="form-control" name="team1_goals"
                        placeholder="Goals Score By <?php echo $get_team1 ?>">
                </div>
                <div class="mb-3">
                    <label>Team 2 Goals</label>
                    <input type="number" min="0" class="form-control" name="team2_goals"
                        placeholder="Goals Score By <?php echo $get_team2 ?>">
                </div>
                <div class="mb-3">
                    <label>Player of the Match</label>
                    <select name="player_of_the_match" class="form-control form-select">
                        <option value="" disabled selected hidden>Select Above</option>
                        <?php
        $select_player_query = "SELECT * FROM `players` ";
        $query_run = mysqli_query($conn , $select_player_query);
        while($player = mysqli_fetch_array($query_run)){?>
                        <option value="<?php echo $player['p_id'];?>"><?php echo $player['p_name'];?></option>
                        <?php } ?>
                    </select>

                </div>



                <input type="submit" class="btn btn-success" value="After Match Update" name="btn_update">
            </form>
        </div>
    </div>
</body>

</html>