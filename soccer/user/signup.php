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

      echo "<script>alert('User Already Exist')</script>";
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

if (isset($_POST['alert'])) {
  echo "<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('myForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Display SweetAlert confirmation
            swal({
                title: 'Are you sure?',
                text: 'Do you really want to submit this form?',
                icon: 'warning',
                buttons: ['Cancel', 'Yes, submit!'],
                dangerMode: true,
            }).then((willSubmit) => {
                if (willSubmit) {
                    // If the user clicks 'Yes, submit!' continue with form submission
                    this.submit();
                }
            });
        });
    });
</script>
)";
}
?>

<!-- DOM -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Admin
    </title>
    <!-- Bootstrap CDN File Link -->
    <?php include('../bootstrap/bootstrap-cdn.html') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
</head>

<body>

    <!-- Navbar page -->
    <section>
        <?php include('navbar.html') ?>
    </section>


    <!-- SignUp Form -->
    <section>
        <div class="container-sm mt-5 bg-dark p-5 mb-5">
            <div class="text-light text-center d-flex justify-content-center p-5">
                <h3>Sign Up</h3>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <!-- <div class="text-center"> -->
                <center>
                    <div class="mb-3">

                        <input type="text" class="form-control w-25" placeholder="Username" name="u_name" required>

                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control w-25" placeholder="Email" name="u_email" required>
                        <p class="text-danger fw-bold" style="display:none;" id="error_msg">*Invalid Email Address</p>
                    </div>
                    <div class="mb-3">

                        <input type="password" class="form-control w-25" placeholder="Password" name="u_password"
                            required>
                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control w-25" placeholder="Phone Number" name="u_contact"
                            required>
                    </div>
                    <div class="mb-3">

                        <input type="file" class="form-control w-25" name="u_profile" required>
                    </div>

                </center>
                <!-- </div>         -->
                <center>
                    <input type="submit" class="btn btn-outline-light" name="btn_submit" value="Sign Up">
                </center>


                <center>
                    <div class="mb-3 mt-5 p-1">
                        <p><a href="login.php" class="text-primary fw-bold text-decoration-underline">Already have
                                account</a></p>
                    </div>
                </center>
            </form>

            <form method="post">
                <center>
                    <input type="submit" class="btn btn-outline-warning" name="submit" value="Alert">
                </center>

            </form>
        </div>

    </section>



    <!-- Footer page -->
    <section>
        <?php include('footer.php') ?>
    </section>
</body>

</html>