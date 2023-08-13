<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header('location:login.php');

}
include('../connection.php');

if (isset($_POST['submit_btn'])) {
    $status_query = "SELECT * FROM `match_schedule` WHERE `m_status` = 2";
    $status_query_run = mysqli_query($conn, $team_query);
    while ($data = mysqli_fetch_array($team_query_run)) {
        $team1 = $data['team_1'];
        $team2 = $data['team_2'];
        $insert_team1 = "";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Add Leagues</title>

    <style>
        body {
            /* background-color: #252525; */
            /* color: white; */
        }
    </style>
</head>

<body>
    <div id="mySidebar" class="sidebar">
        <?php include('navbar.php') ?>

    </div>
    <div id="main">
        <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span>


        <h1 class="text-center mt-5 ">ADD LEAGUE NAME</h1>
        <div class="container mt-5 me-5">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="">Select Team For Statistics</label>
                    <select name="team1_id" class="form-control form-select">
                        <option value="" disabled selected hidden>Select Team</option>
                        <?php
                        $status_query = "SELECT * FROM `match_schedule` WHERE `m_status` = 2 ";
                        $status_query_run = mysqli_query($conn, $status_query);

                        
                        
                        while ($fetch = mysqli_fetch_array($status_query_run)) {
                            $team1 = $fetch['team_1'];
                            $team2 = $fetch['team_2'];
                            $status_query1 = "SELECT * FROM `team` WHERE `t_id` = '$team1' ";
                            $status_query_run1 = mysqli_query($conn, $status_query1);
                            $fetch1 = mysqli_fetch_array($status_query_run1);
                            $status_query2 = "SELECT * FROM `team` WHERE `t_id` = '$team2'  ";
                            $status_query_run2 = mysqli_query($conn, $status_query2);
                            $fetch2 = mysqli_fetch_array($status_query_run2);
                            if ($fetch1['t_id'] != $fetch2['t_id']) {
                                ?>

                                <option value="<?php echo $fetch1['t_id'] ?>"><?php echo $fetch1['t_name'] ?></option>
                                <option value="<?php echo $fetch2['t_id'] ?>"><?php echo $fetch2['t_name'] ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Select League For Team</label>
                    <select name="team1_id" class="form-control form-select">
                        <option value="" disabled selected hidden>Select Team</option>

                        <?php
                        $league_query = "SELECT * FROM `leagues`";
                        $league_query_run = mysqli_query($conn, $league_query);
                        while ($leagues = mysqli_fetch_array($league_query_run)) {

                            ?>
                            <option value="<?php echo $leagues['l_id']; ?>"><?php echo $leagues['l_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Select League For Team</label>
                    <select name="team1_id" class="form-control form-select">
                        <option value="" disabled selected hidden>Select Team</option>

                        <?php
                        $league_query = "SELECT * FROM `leagues`";
                        $league_query_run = mysqli_query($conn, $league_query);
                        while ($leagues = mysqli_fetch_array($league_query_run)) {

                            ?>
                            <option value="<?php echo $leagues['l_id']; ?>"><?php echo $leagues['l_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit_btn" class="btn btn-success" value="Add League">
                </div>
            </form>
        </div>
    </div>
</body>

</html>