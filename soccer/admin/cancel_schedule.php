<?php
include('../connection.php');
$getid = $_GET['id'];

$delete_query = "DELETE FROM `match_schedule` WHERE `match_id` = '$getid'";
$delete_query_run = mysqli_query($conn,$delete_query);

if($delete_query_run){ 
    header('location:notifications.php');
}


?>