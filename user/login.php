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


// LogIn Logic
if (isset($_POST['btn_submit'])) {
    $u_email = $_POST['u_email'];
    $u_pass = $_POST['u_pass'];

    $select_query = "SELECT * FROM `user` WHERE `user_email`='$u_email'";

    $run_select_query = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($run_select_query) > 0) {
        $fetch_user_details = mysqli_fetch_assoc($run_select_query);
        $fetch_email = $fetch_user_details['user_email'];
        $fetch_pass = $fetch_user_details['u_password'];
        $fetch_name = $fetch_user_details['u_name'];
        $fetch_id = $fetch_user_details['u_id'];

        if ($u_email == $fetch_email && password_verify($u_pass, $fetch_pass)) {

?>

<style>
#err_msg {
    display: none !important;
}
</style>
<?php

            $_SESSION['u_email'] = $fetch_email;
            $_SESSION['u_pass'] = $u_pass;
            $_SESSION['u_name'] = $fetch_name;
            $_SESSION['u_id'] = $fetch_id;

            header("location:../index.php");
            exit();
        } else {
        ?>

<style>
#err_msg {
    display: block !important;
}
</style>
<?php
        }
    } else {
        ?>
<style>
#err_msg {
    display: block !important;
}
</style>

<?php
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
    <title>Log In | Soccer Club</title>
    <!-- Bootstrap CDN File Link -->
    <?php include("../bootstrap/bootstrap-cdn.html") ?>
</head>

<body class="bg-dark">

    <!-- Navbar page -->
    <section>
        <?php include('navbar.html') ?>
    </section>

    <!-- LogIn Form -->
    <section class="mt-4">
        <div class="container-sm bg-dark p-5 mb-5">
            <h1 class="text-light text-center pb-lg-5">Log In</h1>
            <form method="POST">
                <center>
                    <div class="mb-3">
                        <input type="email" class="form-control w-50" name="u_email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">

                        <input type="password" class="form-control w-50" name="u_pass" placeholder="Password" required>
                    </div>
                    <div class="mb-3">

                        <p class="text-danger fw-bold text-decoration-underline" style="display:none;" id="err_msg">
                            *Invalid Credentials</p>
                    </div>

                    <input type="submit" name="btn_submit" value="Log In" class="btn w-25 mt-3 btn-outline-success">
                </center>

                <center>
                    <div class="mb-3 mt-5 p-1">
                        <p><a href="signup.php" class="text-danger  fw-bold text-decoration-underline">Create
                                Account</a></p>
                    </div>
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