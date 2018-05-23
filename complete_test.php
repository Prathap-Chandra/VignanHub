<?php
session_start();
include('conn.php');
include('UserInfo.php');
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
$query=mysqli_query($conn,"select * from faculty_signup where username='$term'");
if($query){
   header("Location: std_profilecheck.php");
}
}
?>
<?php
$topic=$_SESSION["topic"];
$query=mysqli_query($conn,"select * from questions where topic='$topic'");
while($row=mysqli_fetch_array($query)){
  $faculty=$row["faculty"];
     $top=$row["topic"];
     $times=$row["times"];
     $q1=$row["q1"];
     $q11=$row["q1o1"];
     $q12=$row["q1o2"];
     $q13=$row["q1o3"];
     $q14=$row["q1o4"];
     $q1c=$row["q1oc"];
     $q2=$row["q2"];
     $q21=$row["q2o1"];
     $q22=$row["q2o2"];
     $q23=$row["q2o3"];
     $q24=$row["q2o4"];
     $q2c=$row["q2oc"];
     $q3=$row["q3"];
     $q31=$row["q3o1"];
     $q32=$row["q3o2"];
     $q33=$row["q3o3"];
     $q34=$row["q3o4"];
     $q3c=$row["q3oc"];
}
?>
<?php
if(isset($_POST["submit"])){
$topic=$_SESSION["topic"];
$q=mysqli_query($conn,"select * from student_signup where username='$std_username'");
while($row=mysqli_fetch_array($q)){
$rollno=$row["rollno"];
$dept=$row["dept"];
$batch=$row["batch"];
}
$count=0;
$query=mysqli_query($conn,"select * from questions where topic='$topic'");
while($row=mysqli_fetch_array($query)){
$q1c=$row['q1oc'];
$q2c=$row['q2oc'];
$q3c=$row['q3oc'];
$faculty=$row['faculty'];
$time=$row["times"];
}
if($_POST['q1o']==$q1c) $count++;
if($_POST['q2o']==$q2c) $count++;
if($_POST['q3o']==$q3c) $count++;
$marks=$count*5;
$rollno=strtoupper($rollno);
$ip=UserInfo::get_ip();
$device=UserInfo::get_device();
$os=UserInfo::get_os();
$browser=UserInfo::get_browser();
$query=mysqli_query($conn,"insert into results values('','$std_username','$rollno','$dept','$batch',
'$topic','$faculty','$time','$count','$marks','$ip','$device','$os','$browser',NOW())");
if($query){
    echo "<script>alert('Congo for Attempting The Test Successfully!')</script>";
}else{
    echo "<script>alert('An Error Occurred!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="logo.png" type="icon">
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="texteditor.js"></script>
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
.jumbotron{
  background-color: #ffffff;
}
.lines{
  color:black;
   border: 0.8px solid black;
}
@media  screen and (max-width: 700px) {
  .navbar{
    background-color:#3b5998;


  }
  .navbar-inverse{
  	background-color:#3b5998;
  	border:0px;
  	border-radius:0px;
  }
  #heading{
    background-color:#3b5998;
  	color: white;
  }
  .navbar-collapse .navbar-brand {
    background-color:#3b5998;
    color: white;
  }
  .navbar-collapse .navbar-brand:hover,
  .navbar-collapse .navbar-brand:focus {
    background-color:#3b5998;
    color: white;
  }
  /* Link */
  .navbar-collapse .navbar-nav > li > a {
    background-color:#3b5998;
    color: white;
  }
  .navbar-collapse .navbar-nav > li > a:hover,
  .navbar-collapse .navbar-nav > li > a:focus {
    background-color:#3b5998;
    color: white;
  }
  .navbar-form .navbar-left .input-group .input-group-sm{
    background-color:#3b5998;
    color: white;
  }
  .navbar-form .navbar-left .input-group .input-group-sm .form-control{
    background-color:#3b5998;
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
          <li><a href="attend_test.php">Attend Tests</a></li>
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
<br><br><br><br>

<div class="container">
  <div class="jumbotron">
  <blockquote>
    <h3>Conducted By</h3>
    <footer><?php echo $faculty; ?>&nbsp;&nbsp;<b>&#58;</b>&nbsp;&nbsp;<cite title="Source Title"><?php echo  $times; ?></cite></footer>
  </blockquote>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <hr class="lines">

    <div class="form-group">
      <label><?php echo $q1; ?></label>
      <div class="form-inline">
      <input class="form-control" placeholder="Enter 1st Option" id="ex3" value="<?php echo $q11; ?>" name="q1o" type="radio">
      <label><?php echo $q11; ?></label><br>
      <input class="form-control" placeholder="Enter 2nd Option" id="ex3" value="<?php echo $q12; ?>" name="q1o" type="radio">
      <label><?php echo $q12; ?></label><br>
      <input class="form-control" placeholder="Enter 3rd Option" id="ex3" value="<?php echo $q13; ?>" name="q1o" type="radio">
      <label><?php echo $q13; ?></label><br>
      <input class="form-control" placeholder="Enter 4th Option" id="ex3" value="<?php echo $q14; ?>" name="q1o" type="radio">
      <label><?php echo $q14; ?></label><br>
      </div>
    </div>

    <hr class="lines">

    <div class="form-group">
      <label><?php echo $q2; ?></label>
      <div class="form-inline">
      <input class="form-control" placeholder="Enter 1st Option" id="ex3" name="q2o" value="<?php echo $q21; ?>" type="radio">
      <label><?php echo $q21; ?></label><br>
      <input class="form-control" placeholder="Enter 2nd Option" id="ex3" name="q2o" value="<?php echo $q22; ?>" type="radio">
      <label><?php echo $q22; ?></label><br>
      <input class="form-control" placeholder="Enter 3rd Option" id="ex3" name="q2o" value="<?php echo $q23; ?>" type="radio">
      <label><?php echo $q23; ?></label><br>
      <input class="form-control" placeholder="Enter 4th Option" id="ex3" name="q2o" value="<?php echo $q24; ?>" type="radio">
      <label><?php echo $q24; ?></label><br>
      </div>
    </div>
    <hr class="lines">
    <div class="form-group">
      <label><?php echo $q3; ?></label>
      <div class="form-inline">
      <input class="form-control" placeholder="Enter 1st Option" id="ex3" name="q3o" value="<?php echo $q31; ?>" type="radio">
      <label><?php echo $q31; ?></label><br>
      <input class="form-control" placeholder="Enter 2nd Option" id="ex3" name="q3o" value="<?php echo $q32; ?>" type="radio">
      <label><?php echo $q32; ?></label><br>
      <input class="form-control" placeholder="Enter 3rd Option" id="ex3" name="q3o" value="<?php echo $q33; ?>" type="radio">
      <label><?php echo $q33; ?></label><br>
      <input class="form-control" placeholder="Enter 4th Option" id="ex3" name="q3o" value="<?php echo $q34; ?>" type="radio">
      <label><?php echo $q34; ?></label><br>
      </div>
    </div>
    <hr class="lines">

<div class="col-xs-5 col-xs-offset-5">
        <button type="submit" name="submit" class="btn btn-info">Submit</button>
    </div>
<br>
  </form>
</div>
</div>

</body>
</html>
