<?php
session_start();
include('conn.php');
if(isset($_SESSION['faculty_username']))
{
    $faculty_username=$_SESSION['faculty_username'];
}
else{
    header("Location: faculty_login.php");
}
?>
<?php
if(isset($_POST['search'])){
$term=$_POST["srch-term"];
$query=mysqli_query($conn,"select * from faculty_signup where username='$term'");
if($query){
  $_SESSION["srch-term"]=$term;
   header("Location: profilecheck.php");
}
}
?>
<?php
if(isset($_POST["submit"])){
$topic=$_POST["topic"];
$q1=$_POST["q1"];
$q1o1=$_POST["q1o1"];
$q1o2=$_POST["q1o2"];
$q1o3=$_POST["q1o3"];
$q1o4=$_POST["q1o4"];
$q1oc=$_POST["q1oc"];

$q2=$_POST["q2"];
$q2o1=$_POST["q2o1"];
$q2o2=$_POST["q2o2"];
$q2o3=$_POST["q2o3"];
$q2o4=$_POST["q2o4"];
$q2oc=$_POST["q2oc"];

$q3=$_POST["q3"];
$q3o1=$_POST["q3o1"];
$q3o2=$_POST["q3o2"];
$q3o3=$_POST["q3o3"];
$q3o4=$_POST["q3o4"];
$q3oc=$_POST["q3oc"];

$faculty=$mail;
$sql="insert into questions values('','$faculty_username','$topic',NOW(),
'$q1','$q1o1','$q1o2','$q1o3','$q1o4','$q1oc',
'$q2','$q2o1','$q2o2','$q2o3','$q2o4','$q2oc',
'$q3','$q3o1','$q3o2','$q3o3','$q3o4','$q3oc')";
$res=mysqli_query($conn,$sql);
if(!$res)
   echo "<br>Error is :".mysqli_error($conn);
else {
  echo '<br><br> <center><div class="alert alert-info alert-dismissible"  style="width:70%; background-color:#3B5998; color:#ffffff;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Question Paper Prepared Successfully!!!</strong>
          </div></center>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="logo.png" type="icon">
  <title>Questions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  .jumbotron{
      height: auto;
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
        <a class="navbar-brand" id="heading" href="faculty_profile.php"><?php echo $faculty_username; ?></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="faculty_homepage.php">Home</a></li>
          <li><a href="faculty_profile.php" style="padding-top:10px;">
            <?php
             // $query=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
             $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
             while($row=mysqli_fetch_array($res))
             {
             echo '<img style="border-radius:50%; padding-top:0px;" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" height="30" width="30"/>';
             }
            ?>
          </a></li>
          <li><a href="faculty_private_posts.php">Your Posts</a></li>
          <li><a href="conduct_test.php">Conduct Test</a></li>
          <li><a href="faculty_previous_tests.php">Previous Test</a></li>
          <li><a href="faculty_view_results.php">Results</a></li>
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
          <li><a href="faculty_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br>

<div class="container" style="background-color:#ffffff;">
  <div class="jumbotron" >
    <blockquote>
      <h3>Conducted By</h3>
      <footer><cite title="Source Title"> <?php echo $faculty_username; ?></cite></footer>
    </blockquote>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

    <!-- <div class="form-group">
      <input type="text" class="form-control" id="usr" name="faculty" placeholder="Enter Your Name" required>
    </div> -->
    <hr class="lines">

    <div class="form-group">
      <input type="text" class="form-control" id="sub" name="topic" placeholder="Enter Topic Name" required>
    </div>
    <hr class="lines">

    <div class="form-group">
      <label>First Question</label>
      <input type="text" class="form-control" id="usr" name="q1" placeholder="Enter 1st Question" required><br>
      <div class="form-inline">
      <input class="form-control" placeholder="Enter 1st Option" id="ex3" name="q1o1" type="text" required><br>
      <input class="form-control" placeholder="Enter 2nd Option" id="ex3" name="q1o2" type="text" required><br>
      <input class="form-control" placeholder="Enter 3rd Option" id="ex3" name="q1o3" type="text" required><br>
      <input class="form-control" placeholder="Enter 4th Option" id="ex3" name="q1o4" type="text" required><br>
      <input class="form-control" placeholder="Enter Correction Option" id="ex3" name="q1oc" type="text" required><br>
      </div>
    </div>

    <hr class="lines">

<div class="form-group">
  <label>Second Question</label>
  <input type="text" class="form-control" id="usr" name="q2" placeholder="Enter 2nd Question" required><br>
  <div class="form-inline">
  <input class="form-control" placeholder="Enter 1st Option" id="ex3" name="q2o1" type="text" required><br>
  <input class="form-control" placeholder="Enter 2nd Option" id="ex3" name="q2o2" type="text" required><br>
  <input class="form-control" placeholder="Enter 3rd Option" id="ex3" name="q2o3" type="text" required><br>
  <input class="form-control" placeholder="Enter 4th Option" id="ex3" name="q2o4" type="text" required><br>
  <input class="form-control" placeholder="Enter Correction Option" id="ex3" name="q2oc"  type="text" required><br>
  </div>
</div>

    <hr class="lines">

<div class="form-group">
  <label>Third Question</label>
  <input type="text" class="form-control" id="usr" name="q3" placeholder="Enter 3rd Question" required><br>
  <div class="form-inline">
  <input class="form-control" placeholder="Enter 1st Option" id="ex3" name="q3o1" type="text" required><br>
  <input class="form-control" placeholder="Enter 2nd Option" id="ex3" name="q3o2" type="text" required><br>
  <input class="form-control" placeholder="Enter 3rd Option" id="ex3" name="q3o3" type="text" required><br>
  <input class="form-control" placeholder="Enter 4th Option" id="ex3" name="q3o4" type="text" required><br>
  <input class="form-control" placeholder="Enter Correction Option" id="ex3" name="q3oc"  type="text" required><br>
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
