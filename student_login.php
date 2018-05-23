<?php
session_start();
include('conn.php');
if(isset($_POST["click"])){
$std_username=$_POST["username"];
$password=$_POST["password"];
$check_user="select * from student_signup where username='$std_username' and password='$password'";
$run=mysqli_query($conn,$check_user);
if(mysqli_num_rows($run)>0)
{
    $_SESSION['std_username']=$std_username;
    echo "<script>window.open('student_homepage.php','_self')</script>";
    //here session is used and value of $user_email store in $_SESSION.
}
else
    echo "<script>alert('Email or password is incorrect!')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="logo.png" type="icon">
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
  <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <style>
  .container{
    width:85%;
  }
  .jumbotron{
    background-color: #3B5998;
  }
  h1{
  	font-family: Tahoma;
  	font-style: normal;
  	font-variant: normal;
  	font-weight: 500;
  	line-height: 26.4px;
    color:#ffffff;
  }
  </style>
</head>
<body>

<div class="container"><br><br><br><br><br>
  <div class="jumbotron">
    <center><h1 style="color:#ffffff; font-family: Tahoma; font-weight: 500;">Login</h1></center><br><br>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="username" placeholder="Enter Username" >
      </div>
      <div class="form-group">
        <input type="password" class="form-control input-lg" name="password" placeholder="Enter Password"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="form-group">
        <center><button type="submit" name="click" class="btn btn-default">Login</button></center>
      </div>
    </form>
    <center>
      <a href="student_signup.php" style="text-decoration:none; color:#ffffff;">Signup for VignanHub</a><br><br>
      <a href="index.php" style="text-decoration:none; color:#ffffff;">Home</a>
    </center>
</div>
</div>
</body>
</html>
