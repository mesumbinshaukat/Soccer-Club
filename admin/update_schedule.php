<?php
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header('location:login.php');
}
include('../connection.php');
$get_id = $_GET['id'];
$get_team1 = $_GET['team1'];
$get_team2 = $_GET['team2'];
$get_team1_id = $_GET['team1_id'];
$get_team2_id = $_GET['team2_id'];
$select_query = "SELECT * FROM `match_schedule` WHERE match_id = '$get_id'";
$select_query_run = mysqli_query($conn, $select_query);
$fetch_query = mysqli_fetch_all($select_query_run);


if (isset($_POST['btn_update'])) {
    $team1_goals = $_POST['team1_goals'];
    $team2_goals = $_POST['team2_goals'];
    if ($team1_goals > $team2_goals) {

        $update_query = "UPDATE `match_schedule` SET `m_status`='2' ,`team_1_goals`='$team1_goals',`team_2_goals`='$team2_goals',`won_team`='$get_team1_id',`lost_team`='$get_team2_id' WHERE `match_id` = '$get_id'";
        $update_query_run = mysqli_query($conn, $update_query);
        if ($update_query_run) {
            echo "<script>alert('schedule updated');
        </script>";
            header('location:playerofthematch.php?id=' . $get_id);
        }
    } elseif ($team2_goals > $team1_goals) {
        $update_query = "UPDATE `match_schedule` SET `m_status`='2' ,`team_1_goals`='$team1_goals',`team_2_goals`='$team2_goals',`won_team`='$get_team2_id',`lost_team`='$get_team1_id' WHERE `match_id` = '$get_id'";
        $update_query_run = mysqli_query($conn, $update_query);
        if ($update_query_run) {
            echo "<script>alert('schedule updated');
         </script>";
            header('location:playerofthematch.php?id=' . $get_id);
        }
    } elseif ($team2_goals == $team1_goals) {
        $update_query = "UPDATE `match_schedule` SET `m_status`='2' ,`team_1_goals`='$team1_goals',`team_2_goals`='$team2_goals',`drawn`='draw' WHERE `match_id` = '$get_id'";
        $update_query_run = mysqli_query($conn, $update_query);
        if ($update_query_run) {
            echo "<script>alert('schedule updated')</script>";
            header('location:playerofthematch.php?id=' . $get_id);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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

        <h1 class="text-center mt-5">UPDATE SCHEDULE</h1>

        <div class="container me-5 mt-5 ">

            <form method="post">


                <div id="hide">
                    <div class="mb-3">
                        <label>Team 1 Goals</label>
                        <input required type="number" min="0" class="form-control" name="team1_goals" placeholder="Goals Score By <?php echo $get_team1 ?>">
                    </div>
                    <div class="mb-3">
                        <label>Team 2 Goals</label>
                        <input required type="number" min="0" class="form-control" name="team2_goals" placeholder="Goals Score By <?php echo $get_team2 ?>">
                    </div>
                </div>

                <input type="submit" value="Update Button " class="btn btn-success" name="btn_update">



            </form>
            </script>
</body>


</html>