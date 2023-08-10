<?php session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
</div>

</body>
</html>