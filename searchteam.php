<?php
include('connection.php');
    $search = $_POST['search_word'];
    $search_query = "SELECT * FROM `team` WHERE t_name LIKE '%$search%'";
    $search_query_run = mysqli_query($conn ,$search_query);


?>

<div class="col-12 title-section">
      <h2 class="heading mt-5">Search Results</h2>
    </div>


  <?php
  while ($team_data = mysqli_fetch_array($search_query_run)) { ?>
          <div class="col-lg-3 mb-4">
            <div class="bg-light p-4 rounded">
              <div class="widget-body">
                <div class="widget-vs">
                  <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="team-1 text-center">
                    <a href="team_details.php?id=<?php echo $team_data['t_id'];?>"><img src="./admin/<?php echo $team_data['t_logo'];?>" alt="Image" style="height:100px;"></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center widget-vs-contents mb-4">
               <a href="team_details.php?id=<?php echo $team_data['t_id'];?>"> <h4><?php echo $team_data['t_name'] ?></h4> </a> 
              </div>
            </div>
          </div>

  <?php } ?>
