<?php
$conn=mysqli_connect("localhost","root","","innovative");
if(!$conn){
  echo "<center>An error occured ".mysqli_error($conn)."</center>";
}
?>
