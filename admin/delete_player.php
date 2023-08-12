<?php
include("../connection.php");
$get_id =  $_GET['id'];
$delete_query = "DELETE FROM `players` WHERE `p_id` = '$get_id'";
$run_query= mysqli_query($conn , $delete_query);
if($run_query){
    header("location:showplayers.php");
}
?>