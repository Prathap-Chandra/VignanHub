<?php
session_start();
if(isset($_SESSION["faculty_username"])){
session_destroy();
header("Location: faculty_login.php");
}
else{
  header("Location: faculty_login.php");
}
?>
