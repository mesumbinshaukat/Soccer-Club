<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header('location:login.php');

}
include('../connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
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
        <div class="container me-5 mt-5">
            <h1 class="text-center mb-4">Players</h1>

            <table class="table table-dark table-bordered">
                <tr>
                    <th>Jersey No.</th>
                    <th>Player Name</th>
                    <th>Team Name</th>
                    <th></th>

                </tr>
            
<?php 

$select_player_query = "SELECT * FROM `players` INNER JOIN `team` ON players.team_id = team.t_id";
$select_query_run = mysqli_query($conn , $select_player_query);
while($player_data = mysqli_fetch_array($select_query_run)){
?>
                <tr>
                    <td><?php echo $player_data['p_id']?></td>
                    <td><?php echo $player_data['p_name']?></td>
                    <td><?php echo $player_data['t_name']?></td>
                    <td class="text-center">
                    <a href="delete_player.php?id=<?php echo $player_data['p_id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
<?php } ?>

            </table>
        </div>
    </div>
</body>

</html>