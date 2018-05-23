<?php
session_start();
include('conn.php');
if(isset($_SESSION['std_username']))
{
    $std_username=$_SESSION['std_username'];
}
else{
    header("Location: student_login.php");
}
?>
<?php
if(isset($_POST['search'])){
$term=$_POST["srch-term"];
$query=mysqli_query($conn,"select * from student_signup where username='$term'");
if($query){
     $_SESSION["srch-term"]=$term;
   header("Location: std_profilecheck.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="logo.png" type="icon">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(function() {

// We can attach the `fileselect` event to all file inputs on the page
$(document).on('change', ':file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

// We can watch for our custom `fileselect` event like this
$(document).ready( function() {
    $(':file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
});

});
</script>
<style>
body {
  background-color:#e8eaed;
  margin:0px;
}
.navbar-brand, .navbar-nav,.active{
  color: white;
}
.navbar-inverse{
  background-color:#3b5998;
  border:0px;
  border-radius:0px;
  height:50px;
}
.navbar-collapse .navbar-brand .active {
    color: white;
}
.navbar-collapse .navbar-brand:hover,
.navbar-collapse .navbar-brand:focus {
    color: white;
}
/* Link */
.navbar-collapse .navbar-nav > li > a {
    color: white;
}
.navbar-collapse .navbar-nav > li > a:hover,
.navbar-collapse .navbar-nav > li > a:focus {
    color: white;
}
#heading{
	color: white;
}
.continer{
  width:65%;
}
@media  screen and (max-width: 700px) {
  .container{
   width:100%;
  }
}
.textbox{
font-size: 16px;
}

.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
.print{
width:100%;
margin-left:34%;
}
@media  screen and (max-width: 700px) {
.print{
width:100%;
margin-left:0%;
}
}
</style>
<style>
.table-responsive{
	width:60%;
	margin:auto;
}
@media  screen and (max-width: 700px){
.table-responsive{
	width:92%;
	margin:auto;
}
}
</style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" style="height:5px;">
    <div class="container-fluid" >
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" id="heading" href="student_profile.php"><?php echo $std_username; ?></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="student_homepage.php">Home</a></li>
          <li><a href="student_profile.php" style="padding-top:10px;">
            <?php
             // $query=mysqli_query($conn,"select * from faculty_signup where username='$username'");
             $res=mysqli_query($conn,"select * from student_signup where username='$std_username'");
             while($row=mysqli_fetch_array($res))
             {
             echo '<img style="border-radius:50%; padding-top:0px;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="30" width="30"/>';
             }
            ?>
          </a></li>
          <li><a href="student_private_posts.php">Your Posts</a></li>
          <li><a href="attend_test.php">Attend Test</a></li>
          <li><a href="student_previous_tests.php">Previous Test</a></li>
          <li><a href="student_view_results.php">Results</a></li>
        </ul>
        <form class="navbar-form navbar-left" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="input-group input-group-sm" style="max-width:360px; padding-top:2px;">
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" required>
              <div class="input-group-btn">
                <button class="btn btn-default" name="search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="student_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
<br>

<div clss="container">
<div class="table-responsive" >
  <br>
<table class="table table-condensed table-striped table-bordered table-hover tabledesign" style="cellpadding:10">
  <caption>
    <center><h1>Previous Tests</h1></center>
  </caption >
  <thead style="background-color:#ffffff;">
    <tr><th colspan="10"><center><b>Tests That You Conducted On Respective Dates</b></center></th></tr>
    <tr>
      <th scope="col"><center>Conducted By</center></th>
      <th scope="col"><center>Topic</center></th>
      <th scope="col"><center>Conducted On</center></th>
      <th scope="col"><center>Attempted On</center></th>
    </tr>
  </thead>

  <tbody style="background-color:#ffffff;">
<?php
$query=mysqli_query($conn,"select * from results where student_name='$std_username' ");
while($row=mysqli_fetch_array($query)){
  echo '
  <tr>
    <th scope="col"><center>'.$row['faculty'].'</center></th>
    <th scope="col"><center>'.$row['topic'].'</center></th>
    <th scope="col"><center>'.$row['conducted_on'].'</center></th>
    <th scope="col"><center>'.$row['attempted_on'].'</center></th>
  </tr>';
}
?>

  </tbody>
</table>
</div>
</div>
</body>
</html>
