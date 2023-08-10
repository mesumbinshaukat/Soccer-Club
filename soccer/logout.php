<?php
session_start();
// session_unset($_SESSION['u_email']);
// session_unset($_SESSION['u_pass']);
// session_unset($_SESSION['u_name']);
// session_unset();
session_destroy();
// session_unset($_SESSION['u_email']);
// session_unset($_SESSION['u_pass']);
// session_unset($_SESSION['u_name']);

header("location:index.php");
exit();

?>