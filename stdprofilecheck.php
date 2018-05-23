<?php
session_start();
include('conn.php');
if(isset($_SESSION['rec_username']))
{
    $rec_username=$_SESSION['rec_username'];
}
else{
    header("Location: recruiter_login.php");
}
?>
<?php
$term=$_SESSION['srch-term'];
?>
<?php
if(isset($_POST['search'])){
$term=$_POST["srch-term"];
$query=mysqli_query($conn,"select * from student_signup where username='$term'");
if($query){
  $_SESSION["srch-term"]=$term;
   header("Location: stdprofilecheck.php");
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
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
.navbar-inverse{
	background-color:#3b5998;
	border:0px;
	border-radius:0px;
}
#heading{
	color: white;
}
.navbar-collapse .navbar-brand {
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
.container{
	width:100%;
}
.box{
   width:100%;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   padding:8px 20px 8px 20px;;
   margin-top:0;
   margin-right:auto;
   margin-bottom:0;
   margin-left:auto;
  }
#exampleTextarea{
	resize:none;
	//background-image:url("wide2.jpg");
}
@media  screen and (max-width: 700px) {
    .container{
	   width:100%;
    }
}
#imgfile{
	border:0px;
	background-color:green;
	color:white;
	border-radius:5px;
	padding:10px 6px 10px 6px ;
}

hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
.tabledesign{
	cell-padding:20px;
}
  .first{
  position:absolute;
  width:10%;
  }
  .first li{
  padding-right:10px;
  }
  .second{
  position:relative;
  margin-left:14%;
  width:40%;
  }
  @media  screen and (max-width: 800px) {
     .first{
     width:25%;
    }
    .second{
     margin-left:30%;
     width:60%;
    }
	.container{
		width:100%;
	}
}
.row {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

@media screen{
.row {
 margin-left:0px;
 margin-right:0px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

imgaging{
width:100%;
height:100%;
object-fit:cover;
}
}
 .username{
	font-size:25px;
	padding-top:15px;
	padding-left:15px;
}
.username:hover{
	text-decoration:none;
}
.createdon{
	font-size:15px;
	padding-right:10px;
}
input.hidden {
position: absolute;
left: -9999px;
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
  <br>
<nav class="navbar navbar-inverse navbar-fixed-top" style="height:5px;">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="heading" href="rec_profile.php"><?php echo $rec_username; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="rec_homepage.php">Home</a></li>
        <li><a href="rec_profile.php" style="padding-top:10px;">
          <?php
           // $query=mysqli_query($conn,"select * from student_signup where username='$username'");
           $res=mysqli_query($conn,"select * from recruiter_signup where username='$rec_username'");
           while($row=mysqli_fetch_array($res))
           {
           echo '<img style="border-radius:50%; padding-top:0px;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="30" width="30"/>';
           }
          ?>
        </a></li>
        <li><a href="rec_private_posts.php">Your Posts</a></li>
        <li><a href="students_data.php">Students</a></li>
        <li><a href="rec_view_results.php">Results</a></li>
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
        <li><a href="rec_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br>



<div class="container">
  <div class="jumbotron">

<div class="container">
	<div class="row">

       <div class="col-md-10 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >Student Profile</h4></div>
   <div class="panel-body">

    <div class="box box-info">

            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center">   <?php
                        $res=mysqli_query($conn,"select * from student_signup where username='$term'");
                        while($row=mysqli_fetch_array($res))
                        {
                         echo '<img style="border-radius:50%; padding-top:0px;" id="profile-image1" class="img img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="400px" width="100%;"/>';
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
            <h4 style="color:#00b1b1;">
            <?php
             $query=mysqli_query($conn,"select * from student_signup where username='$term'");
             if($query){
               while($row=mysqli_fetch_array($query)){
                 echo $row["username"];
               }
             }
            ?>
          </h4></span>

            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">


<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7 col-xs-6 ">
  <?php
   $query=mysqli_query($conn,"select * from student_signup where username='$term'");
   if($query){
     while($row=mysqli_fetch_array($query)){
       echo $row["email"];
     }
   }
  ?>
</div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Rollno :</div><div class="col-sm-7">
  <?php
   $query=mysqli_query($conn,"select * from student_signup where username='$term'");
   if($query){
     while($row=mysqli_fetch_array($query)){
       echo $row["rollno"];
     }
   }
  ?>
</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7">
  <?php
   $query=mysqli_query($conn,"select * from student_signup where username='$term'");
   if($query){
     while($row=mysqli_fetch_array($query)){
       echo $row["dob"];
     }
   }
  ?>
</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Internship Experience :</div><div class="col-sm-7">
  <?php
   $query=mysqli_query($conn,"select * from student_signup where username='$term'");
   if($query){
     while($row=mysqli_fetch_array($query)){
       echo $row["interns"];
     }
   }
  ?>
</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Department:</div><div class="col-sm-7">
  <?php
   $query=mysqli_query($conn,"select * from student_signup where username='$term'");
   if($query){
     while($row=mysqli_fetch_array($query)){
       echo $row["dept"];
     }
   }
  ?>
</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Batch:</div><div class="col-sm-7">
  <?php
   $query=mysqli_query($conn,"select * from student_signup where username='$term'");
   if($query){
     while($row=mysqli_fetch_array($query)){
       echo $row["batch"];
     }
   }
  ?>
</div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Skills:</div><div class="col-sm-7">
  <?php
   $query=mysqli_query($conn,"select * from student_signup where username='$term'");
   if($query){
     while($row=mysqli_fetch_array($query)){
       echo $row["skills"];
     }
   }
  ?>
</div>

 <div class="clearfix"></div>
<div class="bot-border"></div>



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


</div>
</div>
</body>
</html>
