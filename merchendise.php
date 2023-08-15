<?php 
  include('connection.php');
  // session_start();
  // session_destroy();

  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/football.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

    <?php include('./bootstrap/bootstrap-cdn.html')?>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body style="background-color:#222831;">
<div class="site-wrap">
         <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <?php
         include("navbar.php");
        //  print_r($_SESSION['items']);

          ?>
        <div class="hero overlay" style="background-image: url('images/_124431292_best-0821-6.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 ml-auto">
                        <h1 class="text-white">MARCHANDISE</h1>
                      
                        <!-- <div id="date-countdown"></div> -->
                        <p>
                            <a href="#card_div" class="btn btn-primary btn-sm fw-bold py-3 px-4 mr-3">View Merchandise</a>
                            <a href="#" class="more light"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div> 

<section >

  <div class="container w-50">
<h2 class="text-center text-light fw-bold mb-4 mt-5">Select Catgeories</h2>
    
<div class="dropdown text-center ">
  <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
     Categories
  </button>
  <ul class="dropdown-menu dropdown-menu-dark w-100 text-center" aria-labelledby="dropdownMenuButton2">
    <li><a href="merchendise.php#card_div" class="dropdown-item">View All</a></li>
      <?php
      $select = "SELECT * FROM `product_category`";
$select_run = mysqli_query($conn,$select);
      
      while($fetch_categories = mysqli_fetch_array($select_run)){?>
    <li><a class="dropdown-item" href="merchendise.php?id=<?php echo $fetch_categories['c_id']?>#card_div"><?php echo $fetch_categories['c_name']?></a></li>
    
    <?php }?>
  </ul>
    
      
</div>




 
</div>

  <div class="container  my-5" id="card_div">
  

    <div class="row">
      <?php if(!isset($_GET['id']) ){

$select_categories = "SELECT * FROM `marchandise`";
$select_categories_run = mysqli_query($conn,$select_categories);
 while( $fetch = mysqli_fetch_array($select_categories_run)){
?>
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card px-4 border-dark shadow-0 mb-4 mb-lg-0" >
      <div class="mask px-2" style="height: 20px;">
        
      </div>
      <a href="product_details.php?id=<?php echo $fetch['p_id'] ?>" class="">
        <img src="./admin/<?php echo $fetch['p_image']?>" style="height: 285px;" class="card-img-top rounded-2" />
      </a>
      <div class="card-body d-flex flex-column pt-3 border-top">
        <a href="#" class="nav-link fs-4 text-capitalize fw-bold text-dark"><?php echo $fetch['p_name']?></a>
        <div class="price-wrap mb-2">
          <strong class=" ">RS <?php echo $fetch['p_price']?></strong> 
          <del class="">RS<?php echo $fetch['p_price'] * 2?></del>
        </div>
        <div class="card-footer  align-items-end pt-3 px-0 pb-0 mt-auto">
          <form action="addtocart.php" method = "post">
             <input type="hidden" name="pr_pic" value="<?php echo $fetch['p_image'] ?>">
             <input type="hidden" name="pr_id" value="<?php echo $fetch['p_id'] ?>">
             <input type="hidden" name="pr_name" value="<?php echo $fetch['p_name'] ?>">
             <input type="hidden" name="pr_price" value="<?php echo $fetch['p_price'] ?>">
             <div class="d-flex justify-content-center" >

               <button type="submit" class="btn btn-dark w-100 " name="submit_btn">Add to Cart</button>&nbsp;
               <!-- <a type="submit" class="btn btn-dark">Buy Now</a> -->
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
<?php }}else{
  $id = $_GET['id'];
$select_categories_id2 = "SELECT * FROM `marchandise` WHERE `p_cat` = '$id'";
$select_categories_id_run2 = mysqli_query($conn,$select_categories_id2);
while( $fetch2 = mysqli_fetch_array($select_categories_id_run2)){
?>
 <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
      <div class="mask px-2" style="height: 20px;">
        
      </div>
      <a href="product_details.php?id=<?php echo $fetch2['p_id'] ?>" class="">
        <img src="./admin/<?php echo $fetch2['p_image']?>" style="height: 225px;" class="card-img-top rounded-2" />
      </a>
      <div class="card-body d-flex flex-column pt-3 border-top">
        <a href="#" class="nav-link fw-bold"><?php echo $fetch2['p_name']?></a>
        <div class="price-wrap mb-2">
          <strong class="">$<?php echo $fetch2['p_price']?></strong>
          <del class="">$<?php echo $fetch2['p_price'] * 2?></del>
        </div>
        <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
        <form action="addtocart.php" method = "post">
             <input type="hidden" name="pr_pic" value="<?php echo $fetch2['p_image'] ?>">
             <input type="hidden" name="pr_id" value="<?php echo $fetch['p_id'] ?>">
             <input type="hidden" name="pr_name" value="<?php echo $fetch2['p_name'] ?>">
             <input type="hidden" name="pr_price" value="<?php echo $fetch2['p_price'] ?>">
             <div class="d-flex justify-content-center" >

<button type="submit" class="btn btn-dark w-100 " name="submit_btn">Add to Cart</button>&nbsp;
<!-- <a type="submit" class="btn btn-dark">Buy Now</a> -->
</div>
          </form>
        </div>
      </div>
    </div>
  </div>  
      <?php }}?>
     
      
      
    </div>
  </div>
</section>


</div>
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
</body>
</html>




