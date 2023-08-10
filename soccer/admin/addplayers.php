<?php
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}
include('../connection.php');
$select_query = "SELECT * FROM `team`";
$select_query_run = mysqli_query($conn,$select_query);
if(isset($_POST['Add_player_button'])){

$player_name = $_POST['player_name'];
$player_team = $_POST['player_team'];
$player_pic = $_FILES['player_photo']['name'];
$player_pic_tmp = $_FILES['player_photo']['tmp_name'];
$player_pic_path = "player_photo/" . date('Y-m-d-H-s') . $player_pic;
move_uploaded_file($player_pic_tmp , $player_pic_path);

$insert_query = "INSERT INTO `players`( `p_name`, `p_pic`, `team_id`) VALUES
 ('$player_name','$player_pic_path','$player_team')";
$insert_query_run = mysqli_query($conn , $insert_query);
if($insert_query_run){
   echo "<script>alert('Player Added')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Players</title>
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
<h1 class="text-center mt-5">ADD PLAYER</h1>
<div class="container mt-3 me-5">
<form method="post" enctype="multipart/form-data">
   <div class="container">
  <div class="mb-3">
    <label>Player Name</label>
    <input type="text" class="form-control" name="player_name">
  </div>
  <div class="mb-3">
    <label >Player Photo</label>
    <input type="file" class="form-control" name="player_photo">
  </div>
  <div class="mb-3">
    <label>Select Team</label>
    <select name="player_team" class="form-select form-control" >
    <option value="" disabled selected hidden >Select Team</option>

        <?php while($teams = mysqli_fetch_array($select_query_run)) {?>
        <option  value="<?php echo $teams['t_id']?>"><?php echo $teams['t_name']?></option>
        <?php }?>
    </select>
  </div>
  <div class="mb-3">
        <input type="submit" class="btn btn-success" name="Add_player_button" value="Add Player">
  </div>

</form>
</div>
</div>
        </div>


</body>
</html>