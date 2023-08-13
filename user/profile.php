<?php 
session_start();
include('../connection.php');
$id = $_GET['id'];

$select_query = "SELECT * FROM `user` WHERE `u_id`=' $id'";
$run_select_query = mysqli_query($conn, $select_query);

if($run_select_query){

$fetch_details = mysqli_fetch_assoc($run_select_query);

$fetch_user_name = $fetch_details['u_name'];
$fetch_user_password = $fetch_details['u_password'];
$fetch_user_profile_pic = $fetch_details['u_profile'];
$fetch_user_contact = $fetch_details['u_contact'];
$fetch_user_email = $fetch_details['user_email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile: <?php echo $fetch_user_name; ?></title>

    <style>
    body {
        background: #eee;
    }

    .card {
        border: none;

        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
    }

    .card:before {

        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #E1BEE7;
        transform: scaleY(1);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:after {

        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #8E24AA;
        transform: scaleY(0);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:hover::after {
        transform: scaleY(1);
    }


    .fonts {
        font-size: 11px;
    }

    .social-list {
        display: flex;
        list-style: none;
        justify-content: center;
        padding: 0;
    }

    .social-list li {
        padding: 10px;
        color: #8E24AA;
        font-size: 19px;
    }
    </style>

    <?php include('../bootstrap/bootstrap-cdn.html');?>
</head>

<body>

    <section>
        <?php include('navbar.html');?>
    </section>

    <section>
        <div class="container mt-5 mb-lg-5 mb-md-2 mb-sm-1 mb-1">

            <div class="row d-flex justify-content-center">

                <div class="col-md-7">

                    <div class="card p-3 py-4">

                        <div class="text-center">
                            <img src="user_profile_pic/<?php echo $fetch_user_profile_pic;?>" width="25%"
                                class="border border-success border-dark">
                        </div>

                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0"><?php echo $fetch_user_name;?></h5>


                            <div class="px-4 mt-1">
                                <p>Email: <b><?php echo $fetch_user_email?></b></p>
                                <p>Phone Number: <b><?php echo $fetch_user_contact?></b></p>
                                <?php $pass = $_SESSION['u_pass'];
                        ?>

                                <p>Password: <b>
                                        <?php 
                        
                        for ($i=0; $i <  strlen($pass); $i++) { 
                            // echo  "*";
                            echo "*";
                            
                        }?>
                                    </b>
                                </p>
                            </div>



                            <div class="buttons">

                                <button class="btn btn-dark px-4"><a href="edit_profile.php?id=<?php echo $id?>"
                                        class="text-decoration-none text-light" target="_blank">Edit
                                        Profile</a></button>
                                <button class="btn btn-success px-4 ms-3"><a href="history.php?id=<?php echo $id; ?>"
                                        class="text-decoration-none text-light" target="_blank">Purchasing
                                        History</a></button>
                            </div>


                        </div>




                    </div>

                </div>

            </div>

        </div>
    </section>

    <section class="mt-lg-5 mt-md-2 mt-sm-1 mt-1">
        <?php include('footer.php');?>
    </section>

</body>

</html>

<?php }?>