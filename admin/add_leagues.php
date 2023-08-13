<?php
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}
include('../connection.php');
if (isset($_POST['submit_btn'])) {
    $league_name = $_POST['league_name'];
    $league_logo = $_FILES['league_pic']['name'];
    $league_logo_tmp = $_FILES['league_pic']['tmp_name'];
    $league_logo_path = "league_logo/" . date('Y-m-d-H-s') . $league_logo;
    move_uploaded_file($league_logo_tmp, $league_logo_path);
    $insert_query = "INSERT INTO `leagues`(`l_name`, `l_logo`) VALUES ('$league_name' , '$league_logo_path')";
    $insert_query_run = mysqli_query($conn, $insert_query);
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


    <h1 class="text-center mt-5 ">ADD LEAGUE NAME</h1>
    <div class="container mt-5 me-5">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="">ADD LEAGUE NAME</label>
                <input type="text" name="league_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">ADD LEAGUE LOGO</label>
                <input type="file" name="league_pic" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" name="submit_btn" class="btn btn-success" value="Add League">
            </div>
        </form>
    </div>
    </div>
</body>

</html>