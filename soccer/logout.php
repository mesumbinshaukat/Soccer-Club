<?php
session_unset($_SESSION['u_email']);
session_unset($_SESSION['u_pass']);
session_unset($_SESSION['u_name']);

header("location:index.php");
exit();

?>