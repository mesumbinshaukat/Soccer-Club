<?php 
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}


   include("../connection.php");

   

   
   if(isset($_POST['submit_button'])){
        $team_name = $_POST['team_name'];
        $players_count = $_POST['players_count'];
        $team_league = $_POST['league_name'];
        $team_logo = $_FILES['team_logo']['name'];
        $team_logo_tmp = $_FILES['team_logo']['tmp_name'];
        $team_logo_path = 'team_logo/' . date('Y-m-d-H-s') . $team_logo;
        move_uploaded_file($team_logo_tmp,$team_logo_path);

       $insert_query = "INSERT INTO `team`(`t_name`, `t_logo`, `t_players_count`, `league_id`) VALUES
        ('$team_name','$team_logo_path','$players_count', '$team_league')";
        $insert_query_run = mysqli_query($conn,$insert_query);
        if($insert_query_run){
          echo "<script>alert('worked')</script>";
        }
   }

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Add team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      body{
        background-color: #252525;
      }
    </style>
</head>
<body>
<div id="mySidebar" class="sidebar">
    <?php include('navbar.php') ?>
    
</div>
  <div id="main">
  <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span> 


    <h1 class="text-center pt-5 pb-5 text-light ">Add Team</h1>
<div class="container me-5">
<form method="POST" enctype="multipart/form-data">
<div class="mb-3">
  <input type="text" class="form-control " name="team_name" placeholder="Enter team name">
</div>
<div class="mb-3">
    <input type="file" class="form-control " name="team_logo" placeholder="Enter Player logo">
</div>
<div class="mb-3">
    <input type="number" min="12" max="16" class="form-control " name="players_count" placeholder="Enter Players count ( 12 - 16 )">
</div>




                <select name="league_name" id="" class="form-control form-select">
                    <?php
                $league_query = "SELECT * FROM `leagues`";
                $league_query_run = mysqli_query($conn, $league_query);
                while ($league = mysqli_fetch_array($league_query_run)) {

                    ?>
                    <option value="<?php echo $league['l_id'] ?>"><?php echo $league['l_name']; ?></option>
                    <?php } ?>
                </select>









<div class="mb-3">
    <input type="submit" class="btn btn-success" name="submit_button" value="Add team">
</div>
</form>
</div>
    </div>
</body>
</html>