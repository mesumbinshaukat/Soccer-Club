<?php 
    include("../connection.php");
    if(isset($_POST['submit_button'])){
        $get_id = $_GET['id'];
        $new_date = $_POST['new_date'];
        $new_time = $_POST['new_time'];
        $update_query = "UPDATE `match_schedule` SET `date`='$new_date',`time`='$new_time' WHERE `match_id` = '$get_id'";
        $update_query_run = mysqli_query($conn,$update_query);
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
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delay Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
       body{
            background-color: #252525;
            color:white;
        }
    </style>
</head>
<body>
<div id="mySidebar" class="sidebar">
    <?php include('navbar.php') ?>
    
</div>
<div id="main">
        <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span>

    <h2 class="text-center mb-5 mt-5">Delay Schedule</h2>
    <div class="container w-75">
    <form action="" method="post">
        <div class="mb-3">
        <label for="" class="mb-2">Change Date</label>
        <input type="date" class="form-control" name="new_date">
        </div>
        <div class="mb-3">
        <label for="" class="mb-2">Change Time</label>
        <input type="time" class="form-control" name="new_time">
        </div>
        <div class="mb-3">
            <input type="submit" name="submit_button" value="Update" class="btn btn-success">
        </div>
    </form>
    </div>
    </div>
</body>
</html>