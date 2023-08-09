<?php
include("../connection.php");

if(isset($_POST['btn_submit'])){


  $u_name = $_POST['u_name'];
  $u_email = $_POST['user_email'];
  $u_password = $_POST['u_password'];
  $u_contact = $_POST['u_contact'];
  $u_profile_name = $_FILES['u_profile']['name'];
  $u_profile_tmp_name = $_FILES['u_profile']['tmp_name'];
  $location = "user_profile_pic/" . $u_profile_name;
  move_uploaded_file($u_profile_tmp_name, $location);


  $select_user_data = "SELECT * FROM `user` WHERE `user_email` = '$u_email'";

  $run_select_query = mysqli_query($conn, $select_user_data);

  $fetch_user_detail = mysqli_fetch_assoc($run_select_query);

  $fetch_email = $fetch_user_detail['user_email'];

  if($fetch_email == $u_email){
    echo "<script>alert('User Already Exist')</script>";
  }
  else{
    $insert_query = "INSERT INTO `user`(`u_name`, `user_email`, `u_password`, `u_profile`, `u_contact`) VALUES
    ('$u_name', '$u_email', '$u_password','$u_profile_name','$u_contact')";
 
   $query_run = mysqli_query($conn, $insert_query);
 
    if($query_run){
     echo "<script>alert('Working')</script>";
    }else{
     echo "<script>alert('Not Working')</script>";
 
    }
  }

  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Admin
    </title>
    <?php include('../bootstrap/bootstrap-cdn.html')?>
</head>
<body>
    <section>
        <div class="container-sm mt-5 bg-dark p-5">
            <div class="text-light text-center d-flex justify-content-center p-5">
                <h3>Sign Up</h3>
            </div>
        <form method="POST" enctype="multipart/form-data">
    <!-- <div class="text-center"> -->
<center>
        <div class="mb-3">
          
          <input type="text" class="form-control w-25" placeholder="Username" name="u_name">
          
        </div>
        <div class="mb-3">
          
          <input type="text" class="form-control w-25" placeholder="Email" name="u_email">
          
        </div>
        <div class="mb-3">
          
          <input type="password" class="form-control w-25" placeholder="Password" name="u_password">
        </div>
        <div class="mb-3">
          
          <input type="text" class="form-control w-25" placeholder="Phone Number" name="u_contact">
        </div>
        <div class="mb-3">
          
          <input type="file" class="form-control w-25" name="u_profile">
        </div>

</center>
    <!-- </div>         -->
  <center>
<input type="submit" class="btn btn-outline-light" name="btn_submit">
</center>
</form>
        </div>
    
    </section>
</body>
</html>