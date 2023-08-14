<?php 
session_start();
 include("../connection.php");
 $select_query = "SELECT * FROM `admin`";
 $select_query_run = mysqli_query($conn,$select_query);       
 $fetch = mysqli_fetch_array($select_query_run);
 
 if(isset($_POST['login_btn'])){
 $username = $_POST['username'];
 $password = $_POST['pass'];

   if($fetch['user_name'] == $username && $fetch['password'] == $password){
    $_SESSION['admin_loggedin'] = True; 
     header('location:index.php');
   }
   else{
     echo"<script>alert('username and password is not correct plz Try again')</script>";
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
    <title>Log In | Admin
    </title>
    <?php include('../bootstrap/bootstrap-cdn.html')?>
    <style>
                body{
            background-color: #252525;
            color:white;
        }
    </style>
</head>
<body>
  
<div class="container w-50">
<h1 class = "mt-5 mb-5 text-center" >Login</h1>

<form action="" method = "post" >
        <div class="mb-3 ">
<label for="">Admin User Name </label>
<input type="text" name ="username"  class="form-control">
</div>
<div class="mb-3 ">
<label>Admin Password</label>
<input type="password" name="pass" class="form-control ">
<div>
<div class="mb-3">
<input type= "submit" value="Login"  name="login_btn" class="btn btn-success mt-3">
</div>
 </form>



</div>



</body>
</html>