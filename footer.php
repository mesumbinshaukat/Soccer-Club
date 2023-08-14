<?php include('connection.php');?>
<footer class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="site-logo pt-5">
            <a href="index.php">
                <img src="images/logo.png" alt="Logo">
            </a>
        </div>  
        </div>
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Pages</h3>
              <ul class="list-unstyled links">
                <li><a href="index.php">Home</a></li>
                <li><a href="matches.php">Matches</a></li>
                <li><a href="players.php">Players</a></li>
                <li><a href="teams.php">Teams</a></li>
                <li><a href="merchendise.php">Shop</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="feedback.php">Feedback</a></li>
              </ul>
            </div>
          </div>
        <div class="col-lg-3">
          <div class="widget mb-3">
            <h3>Merchandise</h3>
            <ul class="list-unstyled links">
              <?php 
               $select_products = "SELECT * FROM `product_category`";
               $select_products_run = mysqli_query($conn,$select_products);
               while($run = mysqli_fetch_array($select_products_run)) {
              ?>
              <li><a href="merchendise.php?id=<?php echo $run['c_id'];?>#card_div"><?php echo $run['c_name'];?></a></li>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="widget mb-3">
            <h3>Social</h3>
            <ul class="list-unstyled links">
              <li><a href="">Twitter</a></li>
              <li><a href="">Facebook</a></li>
              <li><a href="">Instagram</a></li>
              <li><a href=" ">Youtube</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-12">
          <div class=" pt-5">
            <p class="text-light">
              Copyright © <a href="index.php" target="_parent" class="text-light fw-bold text-decoration-none">Soccer Club</a> | Powered By <a href="https://worldoftech.company" target="_blank" class="fw-bold text-success text-decoration-none">World Of Tech</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>