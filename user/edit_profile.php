<?php
session_start();
include('../connection.php');

$id = $_GET['id'];

if(isset($_POST['btn_update'])){
    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $u_password = $_POST['u_password'];
    $u_number = $_POST['u_number'];
    $password_hash = password_hash($u_password, PASSWORD_DEFAULT);

    if(preg_match($regex_email, $u_email))
    {
        $update_query = "UPDATE `user` SET `u_name`='$u_name',`u_password`='$password_hash', `u_contact`='$u_number',`user_email`='$u_email' WHERE `u_id` = '$id'";
        $run_update_query = mysqli_query($conn, $update_query);
    
        if($run_update_query){
            header("location:profile.php?id=" . $id);
            exit();
        }else{
            die("Invalid Data Inserted. Go profile page: <a href='profile.php' target='_parent'>Profile</a>");
            
        }
    }else{
        ?>
<style>
#email_err{
    display:block;
}
</style>

<?php
    }
    
    


}


$select_user_query = "SELECT * FROM `user` WHERE `u_id` = '$id'";

$run_select_user_query = mysqli_query($conn, $select_user_query);

if($run_select_user_query)
{

    $fetch_user_details = mysqli_fetch_assoc($run_select_user_query);
    $fetch_id = $fetch_user_details['u_id'];
    $fetch_name = $fetch_user_details['u_name'];
    $fetch_password = $fetch_user_details['u_password'];
    $fetch_contact = $fetch_user_details['u_contact'];
    $fetch_email = $fetch_user_details['user_email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | User : <?php echo $_SESSION['u_name'];?></title>
    <?php include('../bootstrap/bootstrap-cdn.html');?>
</head>
<body>

<section>
    <?php include('navbar.html');?>
</section>

    <section class="mt-5">
        <h1 class="text-center text-dark m-5">Edit Profile Credentials</h1>
    <form method="post">
        <div class="container mt-5">
            <div class="mb-3">
                <label class="form-label">
                    
                </label>
              <input type="text" class="form-control text-success fw-bold" value="<?php echo "ID: 
". $fetch_id?>" disabled>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="u_name" placeholder="Name" value="<?php echo $fetch_name?>">
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="u_email" placeholder="Email" value="<?php echo $fetch_email?>">
              <p class="text-danger fw-bold" style="display:none;" id="email_err">*Invalid Email</p>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="u_password" placeholder="Password" value="<?php echo $_SESSION['u_pass'];?>">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="u_number" placeholder="Contact Number" value="<?php echo $fetch_contact?>">
            </div>
            <input type="submit" value="Update" name="btn_update" class="btn btn-warning">

        </div>
</form>
    </section>

    <section class="mt-5">
        <?php include('footer.php');?>
    </section>
</body>
</html>

<?php }?>