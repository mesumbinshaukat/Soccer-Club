<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header('location:login.php');

}
include('../connection.php');
$select_query = "SELECT * FROM `match_schedule`  INNER JOIN `team` ON (match_schedule.team_1 = team.t_id)";
$select_query_run = mysqli_query($conn, $select_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
            <h1 class="text-center mb-4">Matches</h1>

            <table class="table table-dark table-bordered">
                <tr>
                    <th>TEAMS</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>Match Situations</th>

                </tr>
                <?php
                while ($notification = mysqli_fetch_array($select_query_run)) {

                    $date_now = date("Y-m-d");
                    $tabl_date = $notification['date'];
                    if (strtotime($date_now) >= strtotime($tabl_date)) {
                        if (empty($notification['team_1_goals'] && $notification['team_2_goals'])) {

                            ?>

                            <tr>
                                <td>
                                    <?php $team__1 = $notification['team_1'];
                                    $selectss = "SELECT * FROM `team` WHERE t_id = '$team__1' ";
                                    $s_q = mysqli_query($conn, $selectss);
                                    $fetch = mysqli_fetch_array($s_q);

                                    $team__2 = $notification['team_2'];
                                    $selectss1 = "SELECT * FROM `team` WHERE t_id = '$team__2' ";
                                    $s_q1 = mysqli_query($conn, $selectss1);
                                    $fetch1 = mysqli_fetch_array($s_q1);

                                    echo $fetch['t_name'] ?> Vs
                                    <?php echo $fetch1['t_name'];

                                    ?>
                                </td>
                                <td>
                                    <?php echo $notification['date'] ?>
                                </td>
                                <td>
                                    <?php echo $notification['time'] ?>
                                </td>
                                <td>
                                    <a href="update_schedule.php?id=<?php echo $notification['match_id'] ?>&team1=<?php echo $fetch['t_name'] ?>&team1_id=<?php echo $fetch['t_id'] ?>&team2_id=<?php echo $fetch1['t_id'] ?>&team2=<?php echo $fetch1['t_name'] ?>"
                                        class="btn btn-success">Played</a>
                                    <a href="delay_schedule.php?id=<?php echo $notification['match_id'] ?>&team1=<?php echo $fetch['t_name'] ?>&team2=<?php echo $fetch1['t_name'] ?>"
                                        class="btn btn-success">Delay</a>
                                    <a href="cancel_schedule.php?id=<?php echo $notification['match_id'] ?>&team1=<?php echo $fetch['t_name'] ?>&team2=<?php echo $fetch1['t_name'] ?>"
                                        class="btn btn-success">Cancel</a>
                                </td>
                            </tr>

                        <?php }

                    }
                } ?>
            </table>
        </div>
    </div>
</body>

</html>