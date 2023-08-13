<?php
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header('location:login.php');

}
include('../connection.php');
if(isset($_POST['cat_btn'])){
    $catname = $_POST['product_category'];
    $query_insert_category = "INSERT INTO `product_category`(`c_name`) VALUES ('$catname')";
    $query_run = mysqli_query($conn , $query_insert_category);
    if($query_run){
      echo "<script>alert('Category Added')</script>";  
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      body{
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
  <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span> <h1 class="text-center mb-3 mt-5 ">Product Categories</h1>
<div class="container me-5">
<form method="post">
  <div class="mb-3">
    <label>Product Category</label>
    <input type="text" class="form-control" name="product_category">
  </div>

  <input type="submit" class="btn btn-success" value="Add Category" name="cat_btn">
</form>
</div>
    </div>
</body>
</html>