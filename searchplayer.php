<?php
include('connection.php');
    $search = $_POST['search_word'];
    $search_player_query = "SELECT * FROM `players` WHERE p_name LIKE '%$search%'";
    $search_player_query_run = mysqli_query($conn ,$search_player_query);


?>

<div class="col-12 title-section">
      <h2 class="heading mt-5">Search Results</h2>
    </div>



                <?php while ($player = mysqli_fetch_array($search_player_query_run)) { ?>


                  <div class="col-lg-3 mb-4" >
  
                      <div class="card bg-dark " >
                          <a href="playerdetails.php?id=<?php echo $player['p_id'];?>"><img
                                  src="./admin/<?php echo $player['p_pic'];?>" class="card-img-top" style="height:180px;width:100%; "></a>
                          <div class="card-body">
  
  
                              <a href="playerdetails.php?id=<?php echo $player['p_id'];?>">
                                  <h4 class="card-title text-center fs-6">
                                      <?php echo $player['p_name'] ?>
                                  </h4>
                              </a>
                          </div>
                      </div>
                  </div>
                  <?php } ?>