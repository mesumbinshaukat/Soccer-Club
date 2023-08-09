<?php
include('../connection.php');
$select_query = "SELECT * FROM `match_schedule`  INNER JOIN `team` ON (match_schedule.team_1 = team.t_id)";
$select_query_run = mysqli_query($conn, $select_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
         body{
            background-color: #252525;
            color:white;
       }    
    </style>
</head>
    
<body>
    <div>
        <?php include('navbar.php') ?>
    </div>
    <div class="container me-5 mt-5">
        <h1 class="text-center mb-4" >Matches</h1>
        <table class="table table-dark table-bordered">
            <tr>
                <th>TEAMS</th>
                <th>DATE</th>
                <th>TIME</th>
                <th>Match Update (After played)</th>

            </tr>
        <?php
        while ($notification = mysqli_fetch_array($select_query_run)) {
 
            $date_now = date("Y-m-d"); 
            $tabl_date = $notification['date'];
            if ( strtotime($date_now) >= strtotime($tabl_date)  ) {
             
                
                
                
                ?>

                <tr>
                    <td>    
                        <?php    $team__1 = $notification['team_1'];
                $selectss = "SELECT * FROM `team` WHERE t_id = '$team__1' ";
                $s_q = mysqli_query($conn , $selectss);
                $fetch = mysqli_fetch_array($s_q);

                $team__2 = $notification['team_2'];
                $selectss1 = "SELECT * FROM `team` WHERE t_id = '$team__2' ";
                $s_q1 = mysqli_query($conn , $selectss1);
                $fetch1 = mysqli_fetch_array($s_q1);

                echo $fetch['t_name'] ?> Vs <?php echo $fetch1['t_name'];
                        
                        ?>
                    </td>
                    <td>
                        <?php echo $notification['date'] ?>
                    </td>
                    <td>
                        <?php echo  $notification['time'] ?>
                    </td>
                    <td>
                        <a href="update_schedule.php?id=<?php echo $notification['match_id'] ?>&team1=<?php echo $fetch['t_name']?>&team2=<?php echo $fetch1['t_name']?>" class="btn btn-success">Update</a>     
                    </td>
                </tr>
                
                <?php }} ?>
            </table>
    </div>
</body>

</html>