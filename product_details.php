<?php
include('connection.php');
session_start();
$get_id_details = $_GET['id'];
$select = "SELECT * FROM `marchandise` WHERE `p_id` = '$get_id_details'";
$select_run = mysqli_query($conn, $select);
$fetch_array_details = mysqli_fetch_array($select_run);


if (isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])) {
    $id = $_SESSION['u_id'];
    $select_query = "SELECT * FROM `user` WHERE `u_id` = '$id'";
    $run_select_query = mysqli_query($conn, $select_query);

    if ($run_select_query) {
        $fetch_details = mysqli_fetch_assoc($run_select_query);
        $fetch_u_id = $fetch_details['u_id'];

        $_SESSION['user_id'] = $fetch_u_id;
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        
        body {
            overflow-x: hidden;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        img {
            max-width: 100%;
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px;
            }
        }

        .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block;
        }

        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0;
        }

        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0;
        }

        .tab-content {
            overflow: hidden;
        }

        .tab-content img {
            width: 500px;
            height: 400px;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        .card {
            width: 120rem;
            margin-top: 100px;
            background: #fff;
            padding: 3em;
            line-height: 1.5em;
        }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;

            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title,
        .price,
        .sizes,
        .colors {
            text-transform: UPPERCASE;
            font-weight: bold;

        }

        .checked,
        .price span {
            color: #000;
        }

        .product-title,
        .rating,
        .product-description,
        .price,
        .vote,
        .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            margin-top: 50px;
        }

        .size {
            margin-right: 10px;
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart,
        .like {
            background: #428BCA;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: lightblue;
            border: 2px solid #fff;
            border-radius: 6px;
            color: black;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }


        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>
</head>

<body>

    <header class="site-navbar py-4" role="banner">
        <div class="container-fluid">
            <div class="d-flex align-items-center ">
            
                <div class="ml-auto" style="margin-top:20px;">
                    <nav class="site-navigation position-relative text-right " role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block" style="margin-right:280px">
                       
                       <li style="margin-right:80px"> <a href="index.php" class="nav-link" >
                        <img src="images/logo.png"  alt="Logo">
                         </a>
                         </li>
                            <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                            <li><a href="matches.php" class="nav-link">Matches</a></li>
                            <li><a href="players.php" class="nav-link">Players</a></li>
                            <li><a href="teams.php" class="nav-link">Teams</a></li>
                            <li><a href="news.php" class="nav-link">News</a></li>
                            <li><a href="feedback.php" class="nav-link">Feedback</a></li>
                            <li><a href="merchendise.php" class="nav-link">Shop</a></li>
                            <?php if (isset($_SESSION['u_email']) && isset($_SESSION['u_pass']) && isset($_SESSION['u_name'])) { ?>
                                <li><a href="user/profile.php?id=<?php echo $_SESSION['user_id']; ?>" class="nav-link"
                                        style="color:white; font-weight:bold; ">Profile</a></li>
                                <li><a href="logout.php" class="nav-link" style="color:red; font-weight:bold; ">Log Out</a>
                                </li>
                            <?php } else {
                                ?>
                                <li><a href="./user/signup.php" class="nav-link btn btn-primary" style=" font-weight:bold; "
                                        id="sign_up">Sign
                                        Up</a></li>
                                <?php
                            } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    

    <div class="hero mt-5">

        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row ">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img
                                        src="./admin/<?php echo $fetch_array_details['p_image'] ?>" />
                                </div>

                            </div>


                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title" style="color:black;">
                                <?php echo $fetch_array_details['p_name'] ?>
                            </h3>

                            <p class="product-description" style="color:black;">a vibrant tapestry of team loyalty and athletic fashion, serves as a dynamic symbol of the global passion for the beautiful game.
                            </p>
                            <h4 class="price" style="color:black ;"> Price: <span>RS
                                    <?php echo $fetch_array_details['p_price'] ?>
                                </span></h4>
                            <p class="vote" style="color:black;"><strong>91%</strong> of buyers enjoyed this product!
                                <strong>(87
                                    votes)</strong></p>


                            <form action="addtocart.php" method="post">
                                <input type="hidden" name="pr_pic" value="<?php echo $fetch_array_details['p_image'] ?>">
                                <input type="hidden" name="pr_id" value="<?php echo $fetch_array_details['p_id'] ?>">
                                <input type="hidden" name="pr_name" value="<?php echo $fetch_array_details['p_name'] ?>">
                                <input type="hidden" name="pr_price" value="<?php echo $fetch_array_details['p_price'] ?>">
                                <div class="action">
                                    <button type="submit" class="btn btn-dark add-to-cart " name="submit_btn" type="button">Buy Now</button>

                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.mb.YTPlayer.min.js"></script>
<script src="js/main.js"></script>

<script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.414/build/spline-viewer.js"></script>

</html>