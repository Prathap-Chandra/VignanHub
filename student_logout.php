<?php
session_start();
if(isset($_SESSION["std_username"])){
session_destroy();
header("Location: student_login.php");
}
else{
  header("Location: student_login.php");
}
?>
