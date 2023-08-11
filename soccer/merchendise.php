<?php 
  include('connection.php');
  session_start();
  // session_destroy();
  print_r($_SESSION['items']);
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<body class=" ">
<div class="site-wrap">
        <!-- <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <?php
        //  include("navbar.php");
          ?>
        <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 ml-auto">
                        <h1 class="text-white">Soccer</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae
                            pariatur.</p>
                        <div id="date-countdown"></div>
                        <p>
                            <a href="#" class="btn btn-primary py-3 px-4 mr-3">View Merchandise</a>
                            <a href="#" class="more light"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div> -->

<section >

  <div class="container w-50">
<h2 class="text-center text-light fw-bold mb-4 mt-5">Select Catgeories</h2>
    
<div class="dropdown text-center">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
     Categories
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
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
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
      <div class="mask px-2" style="height: 20px;">
        
      </div>
      <a href="#" class="">
        <img src="./admin/<?php echo $fetch['p_image']?>" style="height: 225px;" class="card-img-top rounded-2" />
      </a>
      <div class="card-body d-flex flex-column pt-3 border-top">
        <a href="#" class="nav-link fw-bold"><?php echo $fetch['p_name']?></a>
        <div class="price-wrap mb-2">
          <strong class=" ">$ <?php echo $fetch['p_price']?></strong> 
          <del class="">$<?php echo $fetch['p_price'] * 2?></del>
        </div>
        <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
          <form action="addtocart.php" method = "post">
             <input type="hidden" name="pr_pic" value="<?php echo $fetch['p_image'] ?>">
             <input type="hidden" name="pr_name" value="<?php echo $fetch['p_name'] ?>">
             <input type="hidden" name="pr_price" value="<?php echo $fetch['p_price'] ?>">
             <button type="submit" class="btn btn-success" name="submit_btn">Add to Cart</button>
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
      <a href="#" class="">
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
             <input type="hidden" name="pr_name" value="<?php echo $fetch2['p_name'] ?>">
             <input type="hidden" name="pr_price" value="<?php echo $fetch2['p_price'] ?>">
             <button type="submit" class="btn btn-success" name="submit_btn">Add to Cart</button>
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

</body>
</html>




