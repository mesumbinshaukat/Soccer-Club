<?php session_start();

if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<style>
    body{
        background-color:#252525;
    }
</style>
<body>
   
<div id="mySidebar" class="sidebar">
    <?php include('navbar.php') ?>
    
</div>
  <div id="main">
  <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span> 
  <div class="container ">
  <h1 class="text-center mb-4 text-light ">Latest User Feedbacks</h1>
  
  <table class="table table-dark table-bordered mt-5">
    <thead>
  
      <tr>
          <th scope="col">User Name</th>
          <th scope="col">User Email</th>
          <th scope="col">User Reviews</th>
          <th scope="col">User Messages</th>
  
      </tr>
    </thead>
    <tbody>
    <?php
      include('../connection.php');
      $select_feedback_query = "SELECT * FROM `feedback` ORDER BY `id` DESC LIMIT 10";
      $query_run = mysqli_query($conn , $select_feedback_query);
      while($feedback_review = mysqli_fetch_array($query_run)){
      ?>
      <tr>
        <th scope="row"><?php echo $feedback_review['u_name']?></th>
        <th><?php echo $feedback_review['u_email']?></th>
        <th><?php echo $feedback_review['u_review']?></th>
        <th><?php echo $feedback_review['u_message']?></th>
  
  
      </tr>
      <?php }?>
  
    </tbody>
  </table>
  </div>
</div>
</body>
</html>