<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header('location:login.php');
}
include('../connection.php');
$get_id = $_GET['id'];
$select_playerofthematch ="SELECT * FROM `match_schedule` WHERE `match_id` = '$get_id'";
$select_query_run = mysqli_query($conn , $select_playerofthematch);
$fetching_array_for_player = mysqli_fetch_array($select_query_run); 

if (isset($_POST['updated'])) {
   $player_of_the_match =$_POST['player_of_the_match'];
   $update_query = "UPDATE `match_schedule` SET `player_of_match`=' $player_of_the_match' WHERE `match_id` = '$get_id'";
   $update_query_run = mysqli_query($conn , $update_query);
   header('location:notifications.php');
   
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

        .abc {
            display: flex;
        }

        .abcd {
            display: flex;
            justify-content: space-evenly;

        }
    </style>
</head>

<body>
    <div id="mySidebar" class="sidebar">
        <?php include('navbar.php') ?>
    </div>
    <div id="main">
        <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span>

        <h1 class="text-center mt-5">PLAYER OF THE MATCH</h1>

        <div class="container me-5 mt-5 ">

            <form method="post">
        




        <div class="mb-3" id="playerdiv">
            <label>Player of the Match</label>
            <select name="player_of_the_match" class="form-control form-select">
                <option value="" disabled selected hidden>Select Above</option>
                <?php 
                  if ($fetching_array_for_player['team_1_goals'] > $fetching_array_for_player['team_2_goals']) {
                    $won_team = $fetching_array_for_player['team_1'];
                    $select_query = "SELECT * FROM `players` WHERE `team_id` = '$won_team' " ;
                    $query_run_team1 = mysqli_query($conn , $select_query);
                    

                     while ($player = mysqli_fetch_array($query_run_team1)) { ?>
                <option value="<?php echo $player['p_id']; ?>">
                    <?php echo $player['p_name']; ?>
                </option>
                  <?php }}elseif ($fetching_array_for_player['team_1_goals'] < $fetching_array_for_player['team_2_goals']) {
                    $wining_team = $fetching_array_for_player['team_2'];
                    
                    $select_query_2 = "SELECT * FROM `players` WHERE `team_id` = '$wining_team' ";
                    $query_run_team2 = mysqli_query($conn , $select_query_2);
                    
                    while($team_player = mysqli_fetch_array($query_run_team2)){
                   ?>
                                   <option value="<?php echo $team_player['p_id']; ?>">
                    <?php echo $team_player['p_name']; ?>
                </option>
                <?php }}?>
            </select>

        </div>



        <input type="submit" class="btn btn-success" value="After Match Update" name="updated" >
        </form>
    </div>
    </div>
    <script>

    </script>
</body>


</html>