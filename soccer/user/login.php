<?php
include("../connection.php");
session_start();

if(isset($_POST['btn_submit']))
{
    $u_email = $_POST['u_email'];
    $u_pass = $_POST['u_pass'];

    $select_query = "SELECT * FROM `user` WHERE `u_email` = '$u_email'";

    $run_select_query = mysqli_query($conn, $select_query);

    if($run_select_query){
        $fetch_user_details = mysqli_fetch_assoc($run);
        $fetch_email = $fetch_user_details['u_email'];
        $fetch_pass = $fetch_user_details['u_pass'];
        $fetch_pass = $fetch_user_details['u_name'];
        
        if($u_email == $fetch_email && $fetch_pass == $u_pass){
            ?>

            <style>
                #err_msg{
                    display:none !important;
                }
            </style>
<?php
            $_SESSION['u_email'] = $u_email;
            $_SESSION['u_pass'] = $u_pass;
            $_SESSION['u_name'] = $u_name;

            if(header("location:../index.php")){
                exit();
            }
        }else{
            ?>

            <style>
                #err_msg{
                    display:block !important;
                }
            </style>
<?php
        }

    }else{
        die("<p class='text-danger'>Error!</p>" . "<br/><br/>" . "<p class='text-dark fs-2'><a href='../index.php' class='text-dark text-decoration-underline'>Go To Home Page</a></p>");
        // exit();
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Soccer Club</title>
    <?php include("../bootstrap/bootstrap-cdn.html")?>
</head>
<body>
    <section class="mt-5">
        <div class="container-sm bg-dark bg-gradient p-5">
            <h1 class="text-light text-center pb-lg-5">Log In</h1>
        <form method="POST">
            <center>
  <div class="mb-3">
    <input type="email" class="form-control w-25" name="u_email" placeholder="Email" required>
  </div>
  <div class="mb-3">

    <input type="password" class="form-control w-25" name="u_pass" placeholder="Password" required>
  </div>
  <div class="mb-3">

    <p class="text-danger fw-bold text-decoration-underline" style="display:none;" id="err_msg">*Invalid Credentials</p>
  </div>
  
  <input type="submit" name="btn_submit" value="Log In" class="btn btn-outline-success">
</center>

<center>
<div class="mb-3 mt-5 p-1">
  <p><a href="login.php" class="text-danger  fw-bold text-decoration-underline">Create Account</a></p>
</div>
</center>
</form>
        </div>
    </section>
</body>
</html>