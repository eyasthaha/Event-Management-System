<?php
session_start();
session_destroy();
header("Cache-Control: no-cache, must-revalidate");
header("Location:login.php");

?>
