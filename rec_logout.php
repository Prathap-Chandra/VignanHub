<?php
session_start();
if(isset($_SESSION["rec_username"])){
session_destroy();
header("Location: recruiter_login.php");
}
else{
  header("Location: recruiter_login.php");
}
?>
