<?php
session_start();
session_unset();

$destroy = session_destroy();
if($destroy){
header('location:login.php');
}
?>