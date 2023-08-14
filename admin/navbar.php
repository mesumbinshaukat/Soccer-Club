<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>

</head>
<body>

<!-- <div id="main"> -->
    

<!-- <span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; </span> -->


<div >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <img  src="../images/logo.png" class="hello mb-4  ms-4 mt-5" alt="">
  <a style="font-size: medium;" href="notifications.php">Notifications</a>
  <a style="font-size: medium;" href="schedule.php">Schedule</a>
  <a style="font-size: medium;" href="add_leagues.php">Add Leagues</a>
  <a style="font-size: medium;" href="addteam.php">Add Teams</a>
  <a style="font-size: medium;" href="addplayers.php">Add Players</a>
  <a style="font-size: medium;" href="showteams.php">Show Team</a>
  <a style="font-size: medium;" href="showplayers.php">Show Players</a>
  <a style="font-size: medium;" href="add_marchendise.php">Add Marchendise</a>
  <a style="font-size: medium;" href="marchendise_category.php">Add Marchendise Category</a>
  <a style="font-size: medium; color:white;font-weight:bold;" href="logout.php">Logout</a>
</div>
<!-- </div> -->
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>


</body>
</html>

