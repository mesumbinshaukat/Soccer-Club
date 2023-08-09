<?php 


   include("../connection.php");

   $select_query_league = "SELECT * FROM `leagues`";
   $run_query =  mysqli_query($conn , $select_query_league ) ;
   
   if(isset($_POST['submit_button'])){
        $team_name = $_POST['team_name'];

        $players_count = $_POST['players_count'];
        $team_logo = $_FILES['team_logo']['name'];
        $team_logo_tmp = $_FILES['team_logo']['tmp_name'];
        $team_logo_path = '../team logo'.$team_logo;
        move_uploaded_file($team_logo_path,$img_logo_tmp);


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
    <h2 class="text-center pt-5 pb-5 text-light ">Add Team</h2>
<div class="container d-flex justify-content-center">
<form method="POST" enctype="multipart/form-data">
<div class="mb-3">
  <input type="text" class="form-control " name="team_name" placeholder="Enter team name">
</div>
<div class="mb-3">
    <input type="file" class="form-control " name="team_logo" placeholder="Enter Player logo">
</div>
<div class="mb-3">
    <input type="number" max="14" class="form-control " name="players_count" placeholder="Enter Players count">
</div>

<div class="mb-3">
   <select name="league_name" class="form-control">
    <?php while($league_data= mysqli_fetch_array($run_query)){?>
        <option value="<?php echo $league_data['l_id']; ?>"><?php echo $league_data['l_name']; ?></option>
        <?php }?>
   </select>
</div>
<div class="mb-3">
    <input type="number" max="14" class="form-control " name="players_count" placeholder="Enter Players count">
</div>
<div class="mb-3">
    <input type="number" max="14" class="form-control " name="players_count" placeholder="Enter Players count">
</div>


<div class="mb-3">
    <input type="submit" class="btn btn-success" name="submit_button" value="Add team">
</div>
</form>
</div>
</body>
</html>