<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="icon" href="logo.png" type="icon">
<title>VignanHub</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
body{
  background-image: url('images/done.jpg');
  background-position:top;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: cover;
}
blockquote {
    font-family: Georgia, serif;
    font-size: 32px;
    font-style: italic;
    margin: 0.25em 0;
    padding: 0.35em 40px;
    line-height: 1.45;
    position: relative;
    color: #383838;
		background-color: #ffffff;
		opacity: 0.4;
		padding: 40px;
		border-radius: 10px;
}

blockquote:before {
    display: block;
    padding-left: 10px;
    content: "\201C";
    font-size: 80px;
    position: absolute;
    left: -20px;
    top: -20px;
    color: #7a7a7a;
}

blockquote cite {
    color: #999999;
    font-size: 14px;
    display: block;
    margin-top: 5px;
}

blockquote cite:before {
    content: "\2014 \2009";
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
      <a class="navbar-brand" id="heading" href="#"><img src="logo.png" style="width:30px; height:30px; padding-bottom:5px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!-- <li><a href="faculty_homepage.php">Home</a></li> -->
        <li><a href="#">VignanHub</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculty<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="faculty_signup.php">Signup</a></li>
            <li><a href="faculty_login.php">Login</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="student_signup.php">Signup</a></li>
            <li><a href="student_login.php">Login</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Recruiters<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="recruiter_signup.php">Signup</a></li>
            <li><a href="recruiter_login.php">Login</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Parents<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="arents_signup.php">Signup</a></li>
            <li><a href="parents_login.php">Login</a></li>
          </ul>
        </li>
        <li><a href="profiles.php">Profiles</a></li>
        <li><a href="newsfeed.php">News Feed</a></li>
        <li><a href="material.php">Tutorials</a></li>
      </ul>
    </div>
  </div>
</nav>

<br><br><br><br><br>
<div class="container">
  <blockquote class="blockquote-reverse">
    <p>A man who has never gone to school may steal from a freight car;
			 but if he has a university education, he may steal the whole railroad.</p>
    <footer> Theodore Roosevelt</footer>
  </blockquote>
</div>

</body>
</html>
