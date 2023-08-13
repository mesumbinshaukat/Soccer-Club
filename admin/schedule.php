<?php
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}
include('../connection.php');
if (isset($_POST['submit_btn'])) {
    $team1 = $_POST['team1_id'];
    $team2 = $_POST['team2_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $league = $_POST['league'];
    if ($team1 != $team2) {
        $insert_query = "INSERT INTO `match_schedule`(`team_1`, `team_2`, `date`, `time`,`Location`,`m_league_id`) VALUES
         ('$team1','$team2','$date','$time','$location','$league')";
        $insert_query_run = mysqli_query($conn, $insert_query);
        if ($insert_query_run) {

            echo "<script>alert('Schedule inserted')</script>";
        }
    } else {
        echo "<script>alert('Teams should be different')</script>";
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
    <title>Set Schedule</title>
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
        <div class="container me-5 mt-3">
            <h1 class="text-center mb-2">Schedule</h1>
            <form method="post">
                <label for="">League</label>
                <select name="league" id="" class="form-control form-select">
                    <?php
                $league_query = "SELECT * FROM `leagues`";
                $league_query_run = mysqli_query($conn, $league_query);
                while ($league = mysqli_fetch_array($league_query_run)) {

                    ?>
                    <option value="<?php echo $league['l_id'] ?>"><?php echo $league['l_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="">TEAM 1</label>
                <select name="team1_id" id="" class="form-control form-select">
                    <option value="" disabled selected hidden>Select Team one</option>

                    <?php
                $teamone_query = "SELECT * FROM `team`";
                $teamone_query_run = mysqli_query($conn, $teamone_query);
                while ($data1 = mysqli_fetch_array($teamone_query_run)) {

                    ?>
                    <option value="<?php echo $data1['t_id']; ?>"><?php echo $data1['t_name']; ?></option>
                    <?php } ?>
                </select>
                <label class="" for="">TEAM 2</label>
                <select name="team2_id" id="" class="form-control form-select">
                    <option value="" disabled selected hidden>Select Team two</option>

                    <?php
                $teamtwo_query = "SELECT * FROM `team`";
                $teamtwo_query_run = mysqli_query($conn, $teamtwo_query);
                while ($data2 = mysqli_fetch_array($teamtwo_query_run)) {

                    ?>
                    <option value="<?php echo $data2['t_id']; ?>"><?php echo $data2['t_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="">Scheduled Date </label>
                <input type="date" class="form-control" name="date">
                <label for="">Scheduled Time </label>
                <input type="time" class="form-control" name="time">
                <label for="">Location</label>
                <select name="location" class="form-control form-select" id="">
                    <option value="" disabled selected hidden>Select Location</option>
                    <optgroup label="Spain">
                        <option value="old-trafford">Old Trafford (Manchester)</option>
                        <option value="anfield">Anfield (Liverpool)</option>
                        <option value="wembley">Wembley Stadium (London)</option>
                    </optgroup>
                    <optgroup label="Italy">
                        <option value="san-siro">San Siro (Milan)</option>
                        <option value="juventus-stadium">Allianz Stadium (Turin)</option>
                        <option value="stadio-olimpico">Stadio Olimpico (Rome)</option>
                    </optgroup>
                    <optgroup label="Germany">
                        <option value="allianz-arena">Allianz Arena (Munich)</option>
                        <option value="signal-iduna-park">Signal Iduna Park (Dortmund)</option>
                    </optgroup>
                    <optgroup label="Japan">
                        <option value="national-stadium">National Stadium (Tokyo)</option>
                        <option value="saitama-stadium">Saitama Stadium 2002 (Saitama)</option>
                    </optgroup>
                    <optgroup label="Russia">
                        <option value="luzhniki">Luzhniki Stadium (Moscow)</option>
                        <option value="krestovsky">Krestovsky Stadium (Saint Petersburg)</option>
                    </optgroup>
                </select>


                <input type="submit" class="mt-2 btn btn-success" value="Submit" name="submit_btn"
                    class="btn btn-success">
            </form>
        </div>
    </div>
    </div>
</body>

</html>