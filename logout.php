<?php
session_start();
setcookie('username', '', time() -10);
session_destroy();
header('location: login.php');
exit;


 ?>
