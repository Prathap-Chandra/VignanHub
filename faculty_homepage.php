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
if(isset($_POST['submit']))
{
  $content=$_POST["content"];
  $privacy=$_POST["privacy"];
  if(!empty($_FILES['image']['tmp_name'])&&file_exists($_FILES['image']['tmp_name'])){
  $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $query=mysqli_query($conn,"insert into userposts(username,content,created_on,privacy,image) values('$faculty_username','$content',NOW(),'$privacy','$image')");
    if($query)
    echo '<br><br><br><br>
    <center>
    <div class="alert alert-danger alert-dismissible" style="background-color: #3b5998; color:#ffffff; width:60%;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Post Created Successfully!!!</strong>
    </div></center>';
    else
    echo '<br><br><br><br>
    <center>
    <div class="alert alert-danger alert-dismissible" style="background-color: #3b5998; color:#ffffff; width:60%;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>'.mysqli_error($conn).'!!!</strong>
    </div></center>';
  }
  else{
    $query=mysqli_query($conn,"insert into userposts(username,content,created_on,privacy) values('$faculty_username','$content',NOW(),'$privacy')");
    if($query)
    echo '<br><br><br><br>
    <center>
    <div class="alert alert-danger alert-dismissible" style="background-color: #3b5998; color:#ffffff; width:60%;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Post Created Successfully!!!</strong>
    </div></center>';
    else
    echo '<br><br><br><br>
    <center>
    <div class="alert alert-danger alert-dismissible" style="background-color: #3b5998; color:#ffffff; width:60%;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>'.mysqli_error($conn).'!!!</strong>
    </div></center>';
  }
}
?>
<?php
if(isset($_POST['search'])){
$term=$_POST["srch-term"];
$query=mysqli_query($conn,"select * from faculty_signup where username='$term'");
if($query){
   $_SESSION["srch-term"]=$term;
   // header("Location: profilecheck.php?id=$term");
    header("Location: profilecheck.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="icon" href="logo.png" type="icon">
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
	width:60%;
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
  <br>
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
           // $query=mysqli_query($conn,"select * from faculty_signup where username='$username'");
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
<br><br>
<div class="container">
<!-- create post -->
<div class="container box">
 <h3 align="center"><center>Create Post</center></h3><br />
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <textarea name="content" class="form-control" id="exampleTextarea" rows="6"></textarea>
   </div>
	 <div class="col-lg-6 col-sm-6 col-12">
     <select class="selectpicker show-tick show-menu-arrow bs-select-hidden" name="privacy" data-style="btn-primary" title="Whom do you want to see Your posts" data-width="auto" required><option class="bs-title-option" value="">Privacy</option>
           <option class="glyphicon glyphicon-globe">Public</option>
           <option class="glyphicon glyphicon-user">Private</option>
           <option class="glyphicon glyphicon-lock">OnlyMe</option>
     </select>
    <label class="btn btn-primary">Browse&hellip; <input type="file" name="image" style="display:none;"></label>
		<input type="submit" name="submit" class="btn btn-primary" value="Post" />
   </div>
  </form>
</div><!-- End of container box-->
<br>
</div><!-- End of container -->
<br>
<div class="row" >
  <div class="col-md-4" >
<?php
$query=mysqli_query($conn,"select * from userposts where privacy='Public' or privacy='Private' order by created_on desc");
while($row=mysqli_fetch_array($query)){
if(!empty($row['image'])){
  echo '
      <div class="thumbnail" >
       <a style="text-decoration:none;" class="text-left username" href="#" target="_blank">'.$row['username'].'</a>
       <p class="text-right createdon">'.$row['created_on'].'</p><hr style="border-top: dashed 1px;" />
       <div class="caption">'.$row['content'].'</div>
        <a href="1.jpg" target="_blank">
         <img class="imaging" style="object-fit:cover;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"  alt="Lights" style="width:100%; height:400px;">
        </a>
      </div>';
}else{
  echo '
      <div class="thumbnail" >
       <a style="text-decoration:none;" class="text-left username" href="#" target="_blank">'.$row['username'].'</a>
       <p class="text-right createdon">'.$row['created_on'].'</p><hr style="border-top: dashed 1px;" />
       <div class="caption">'.$row['content'].'</div>
      </div>';
   }
}

?>
</div>
</div>
</body>
</html>