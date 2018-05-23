<?php
session_start();
include('conn.php');
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
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
    $query=mysqli_query($conn,"insert into sample_image_table(postuser,content,times,privacy,image) values('$username','$content',NOW(),'$privacy','$image')");
  }
  else{
    $query=mysqli_query($conn,"insert into sample_image_table(postuser,content,times,privacy) values('$username','$content',NOW(),'$privacy')");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
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

img{
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
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="heading" href="feditprofile.php">Prathap Chandra</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="faculty_home.php">Home</a></li>
        <li><a href="faculty_home.php">
        <?php
        echo "image";
        ?>
        </a></li>
        <li><a href="conduct_test.php">Conduct Test</a></li>
        <li><a href="faculty_previous_tests.php">Previous Test</a></li>
        <li><a href="view_results.php">Results</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<div class="container">
<!-- create post -->
<div class="container box">
 <h3 align="center"><center>Create Post</center></h3><br />
  <form action="postcontent.php" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <textarea name="content" class="form-control" id="exampleTextarea" rows="6"></textarea>
   </div>
	 <div class="col-lg-6 col-sm-6 col-12">
     <select class="selectpicker show-tick show-menu-arrow bs-select-hidden" name="privacy" data-style="btn-primary" title="Whom do you want to see Your posts" data-width="auto" required><option class="bs-title-option" value="">Privacy</option>
           <option class="glyphicon glyphicon-globe">Public</option>
           <option class="fa fa-group">Private</option>
           <option class="glyphicon glyphicon-lock">OnlyMe</option>
     </select>
    <label class="btn btn-primary">Browse&hellip; <input type="file" name="pictures" style="display:none;"></label>
		<input type="submit" name="posting" class="btn btn-info" value="Post" />
   </div>
  </form>
</div><!-- End of container box-->
<br>
</div><!-- End of container -->
<br>
<div class="row" >
  <div class="col-md-5" >
<?php
$i=0;
while($i<5){
echo '
    <div class="thumbnail" >
	  <a style="text-decoration:none;" class="text-left username" href="profile.php" target="_blank">Prathap Chandra</a>
	  <p class="text-right createdon">6th june 1997</p><hr style="border-top: dashed 1px;" />
	    <div class="caption">
        Hello wolrd this is a sample post
      </div>
      <a href="" target="_blank">
        <img src="images/pranav.jpg" alt="Lights" style="width:100%; height:400px;">
      </a>
    </div>';
$i++;
}
?>
</div>
</div>
</body>
</html>


















<?php
session_start();
include('conn.php');
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
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
    $query=mysqli_query($conn,"insert into sample_image_table(postuser,content,times,privacy,image) values('$username','$content',NOW(),'$privacy','$image')");
  }
  else{
    $query=mysqli_query($conn,"insert into sample_image_table(postuser,content,times,privacy) values('$username','$content',NOW(),'$privacy')");
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
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="faculty_profile.php"><?php echo $username; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="faculty_homepage.php">Home</a></li>
        <li><a href="faculty_profile.php">
        <?php
         // $query=mysqli_query($conn,"select * from faculty_signup where username='$username'");
         $res=mysqli_query($conn,"select * from faculty_signup where username='$username'");
         while($row=mysqli_fetch_array($res))
         {
         echo '<img style="border-radius:50%; padding-top:0px;" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" height="30" width="30"/>';
         }
        ?>
        </a></li>
        <li><a href="conduct_test.php">Test</a></li>
        <li><a href="faculty_previous_tests.php">Previous</a></li>
        <li><a href="view_results.php">Results</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="faculty_logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br>
<div class="container">
  <center><h2>Let People Know What You Think</h2></center>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <textarea class="form-control textbox" style="resize:none" rows="5" name="content" placeholder="Let People Know What You Think" id="content" required></textarea>
    </div>
    <center>
    <div>
      <div class="form-group">
        <select class="selectpicker show-tick show-menu-arrow bs-select-hidden" name="privacy" data-style="btn-primary" title="Whom do you want to see Your posts" data-width="auto" required><option class="bs-title-option" value="">Privacy</option>
              <option class="glyphicon glyphicon-globe">Public</option>
              <option class="fa fa-group">Private</option>
              <option class="glyphicon glyphicon-lock">OnlyMe</option>
        </select>
          <!-- <span class="btn btn-primary btn-file">
          Browse <input type="file" name="mypics">
          </span> -->
          <label class="btn btn-primary">
              Browse&hellip; <input name="image" type="file" style="display: none;">
          </label>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    <center>
    </div>
  </form>
      <hr style="border: 1px solid black;">

  <div class="container print">

          <?php
          $query=mysqli_query($conn,"select * from sample_image_table order by times desc");
          while($row=mysqli_fetch_array($query)){
          if(!empty($row['image'])){
            echo '  <div class="row">
                <div class="col-md-4">
                  <div class="thumbnail">
            <a style="text-decoration:none;" class="text-left username" href="faculty_profile.php" target="_blank">'.$row['postuser'].'</a>
            <p class="text-right createdon">'.$row['times'].'</p><hr style="border-top: dashed 1px;" />
           <div class="caption">
              <p>'.$row["content"].'</p>
           </div>
           <a href="1.jpg" target="_blank">
            <img style="object-fit:cover;" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"  alt="Lights" style="width:100%; height:400px;">
           </a></div>
         </div>
       </div>';
          }else{
            echo '
            <div class="row">
                <div class="col-md-4" style="background-color:#ffffff; border-radius:5px;">
                <a style="text-decoration:none; padding-top:8px;" class="text-left username" href="faculty_profile.php" target="_blank">'.ucfirst($row['postuser']).'</a>
                <p class="text-right createdon">'.$row['times'].'</p><hr style="border-top: dashed 1px;" />
             <blockquote  class="blockquote-reverse">
              <p class="text-left text-primary" style="padding:8px;">'.$row["content"].'</p>
              <footer>'.ucfirst($row['postuser']).'</footer>
             </blockquote></div></div><br>';
          }
          }
          ?>
  </div>
</body>
</html>
