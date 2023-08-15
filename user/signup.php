<?php
// Database Connection
include("../connection.php");

// Session Start
session_start();

// Check if user is already login
if (isset($_SESSION['u_email']) && isset($_SESSION['u_pass']) && isset($_SESSION['u_name'])) {
  header("location:../index.php");
  exit();
}

// SignUp Logic
if (isset($_POST['btn_submit'])) {


  $regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  $u_name = $_POST['u_name'];
  $u_email = $_POST['u_email'];
  $u_password = $_POST['u_password'];
  $u_contact = $_POST['u_contact'];
  $u_profile_name = $_FILES['u_profile']['name'];
  $u_profile_tmp_name = $_FILES['u_profile']['tmp_name'];
  $pass_hash = password_hash($u_password, PASSWORD_DEFAULT);

  if (preg_match($regex_email, $u_email)) {

?>
<style>
#error_msg {
    display: none !important;
}
</style>

<?php

    $select_user_data = "SELECT * FROM `user` WHERE `user_email` = '$u_email'";

    $run_select_query = mysqli_query($conn, $select_user_data);

    $fetch_user_detail = mysqli_fetch_assoc($run_select_query);

    $fetch_email = $fetch_user_detail['user_email'];

    if ($fetch_email != $u_email) {
      //   $insert_query = "INSERT INTO `user`(`u_name`, `user_email`, `u_password`, `u_profile`, `u_contact`) VALUES
      //   ('$u_name', '$u_email', '$pass_hash','$u_profile_name','$u_contact')";

      //  $query_run = mysqli_query($conn, $insert_query);

      // if($query_run){
      $location = "user_profile_pic/" . $u_profile_name;
      move_uploaded_file($u_profile_tmp_name, $location);
      header('location:otp_mail.php?user_name=' . $u_name . '&u_email=' . $u_email . '&u_pass=' . $pass_hash . '&u_number=' . $u_contact . '&u_pic=' . $u_profile_name);
      exit();
      // }else{
      //  echo "<script>alert('Not Working')</script>";

      // }

    } else {

    ?>

<style>
#user_already_exist {
    display: block !important;
}
</style>

<?php
    }
  } else {


    ?>

<style>
#error_msg {
    display: block !important;
}
</style>
<?php
    echo "<script>alert('Invalid Email')</script>";
  }
}


?>

<!-- DOM -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Soccer Club
    </title>

    <!-- Bootstrap CDN File Link -->
    <?php include('../bootstrap/bootstrap-cdn.html') ?>

</head>

<body class="bg-dark">

    <!-- Navbar page -->
    <section>
        <?php include('navbar.html') ?>
    </section>


    <!-- SignUp Form -->
    <section>
        <div class="container-sm mt-3 bg-dark p-5 mb-5">
            
            <h1 class="text-light text-center pb-lg-5">Sign Up</h1>
                <form method="POST" enctype="multipart/form-data">
                <!-- <div class="text-center"> -->
                <center>
                    <div class="mb-3">

                        <input type="text" class="form-control w-50" placeholder="Username" name="u_name" required>

                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control w-50" placeholder="Email" name="u_email" required>
                        <p class="text-danger fw-bold" style="display:none;" id="error_msg">*Invalid Email Address</p>
                    </div>
                    <div class="mb-3">

                        <input type="password" class="form-control w-50" placeholder="Password" name="u_password"
                            required>
                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control w-50" placeholder="Phone Number" name="u_contact"
                            required>
                    </div>
                    <div class="mb-3">

                        <input type="file" class="form-control w-50" name="u_profile" required>
                    </div>
                    <div class="mb-3">

                        <p class="text-danger fw-bold" style="display:none;" id="user_already_exist">User Already Exist
                        </p>
                    </div>

                </center>
                <!-- </div>         -->
                <center>
                    <input type="submit" class="btn fw-bold w-25 btn-outline-light mt-3" name="btn_submit" value="Sign Up">
                </center>


                <center>
                    <div class="mb-3 mt-5 p-1">
                        <p><a href="login.php" class="text-primary fw-bold text-decoration-underline">Already have
                                account</a></p>
                    </div>
                </center>
            </form>


        </div>


    </section>



    <!-- Footer page -->
    <section>
        <?php include('footer.php') ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>