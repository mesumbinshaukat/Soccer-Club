<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}
.hello {
  padding-top: 30px;
padding-left: 20px;
}
.sidenav a {
  
  padding: 10px 10px 14px 18px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <img src="../images/logo.png" class="hello mb-5" alt="">
  <a style="font-size: medium;" href="notifications.php">Notifications</a>
  <a style="font-size: medium;" href="add_leagues.php">Add Leagues</a>
  <a style="font-size: medium;" href="addteam.php">Add Teams</a>
  <a style="font-size: medium;" href="schedule.php">Schedule</a>
  <a style="font-size: medium;" href="addplayers.php">Add Players</a>
  <a style="font-size: medium;" href="add_marchendise.php">Add Marchendise</a>
  <a style="font-size: medium;" href="marchendise_category.php">Add Marchendise Category</a>

  
  </div>


   
</body>
</html> 