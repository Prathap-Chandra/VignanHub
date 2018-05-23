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
$query=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
if(is_resource($query)){
  while($row=mysqli_fetch_array($query)){
     $faculty_username=$row["username"];
     $email=$row["email"];
     $degree=$row["degree"];
     $dob=$row["dob"];
     $doj=$row["doj"];
     $experience=$row["experience"];
     if($row["ra"]!=''){
       $ra=$row["ra"];
     }
     if($row["journals"]){
       $journals=$row["journals"];
     }
  }
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
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="logo.png" type="icon">
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
input.hidden {
position: absolute;
left: -9999px;
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

#profile-image1 {
cursor: pointer;

width: 100px;
height: 100px;
border:2px solid #03b1ce ;}
.tital{ font-size:16px; font-weight:500;}
.bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}
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


<br><br><br>
<div class="container">
	<div class="row">


       <div class="col-md-8 ">
<div class="panel panel-default">
  <div class="panel-heading"><h4><?php
   $query=mysqli_query($conn,"select * from ");
  ?></h4></div>
   <div class="panel-body">
    <div class="box box-info">
      <div class="box-body">
        <div class="col-sm-6">
          <div  align="center">
            <!-- <img  src="images/chris.jpg" id="profile-image1" class="img img-responsive"> -->
            <?php
             $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
             while($row=mysqli_fetch_array($res))
             {
              echo '<img style="border-radius:50%; padding-top:0px;" id="profile-image1" class="img img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" height="400px" width="100%;"/>';
             }
            ?>
            <input id="profile-image-upload" class="hidden" type="file">
            <div style="color:#999;" >click here to change profile image</div>
                <!--Upload Image Js And Css-->
            </div>
            <br>
            <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h2 style="color:#00b1b1;"><?php echo $faculty_username; ?></h2></span>
              <!-- <span><p>Dean</p></span> -->
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">


<div class="col-sm-5 col-xs-6 tital " >Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $faculty_username; ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Degrees:</div><div class="col-sm-7">
  <?php
   $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
   while($row=mysqli_fetch_array($res))
   {
    echo $row["degree"];
   }
  ?>
</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div>
<div class="col-sm-7">
  <?php
   $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
   while($row=mysqli_fetch_array($res))
   {
    echo $row["dob"];
   }
  ?>
</div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div>
<div class="col-sm-7">
  <?php
   $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
   while($row=mysqli_fetch_array($res))
   {
    echo $row["doj"];
   }
  ?>
</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Experience:</div>
<div class="col-sm-7">
  <?php
   $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
   while($row=mysqli_fetch_array($res))
   {
    echo $row["experience"];
   }
  ?>
</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Research Area:</div>
<div class="col-sm-7">
  <?php
   $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
   while($row=mysqli_fetch_array($res))
   {
    echo $row["ra"];
   }
  ?>
</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >No.of Journals Published:</div>
<div class="col-sm-7">
  <?php
   $res=mysqli_query($conn,"select * from faculty_signup where username='$faculty_username'");
   while($row=mysqli_fetch_array($res))
   {
    echo $row["journals"];
   }
  ?>
</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>


    </div>
    </div>
</div>
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});
              </script>

   </div>
</div>

</body></html>
