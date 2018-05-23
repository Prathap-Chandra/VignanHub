<?php
if(isset($_POST["register"])){
include('conn.php');
$username=$_POST["username"];
$email=$_POST["email"];
$company=$_POST["company"];
$industry=$_POST["industry"];
$experience=$_POST["experience"];
$title=$_POST["title"];
$skills=$_POST["skills"];
$description=$_POST["description"];
$applyby=$_POST["applyby"];
$password=$_POST["password"];
  if(!empty($_FILES['image']['tmp_name'])&&file_exists($_FILES['image']['tmp_name'])){
  $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $query=mysqli_query($conn,"insert into recruiter_signup values('','$username',
    '$email','$company','$industry','$experience','$title','$skills','$description','$outcome','$applyby','$password','$image')");
      if ($query) {
      header("Location: recruiter_login.php");
      } else {
       echo "Error:<br>".mysqli_error($conn);
      }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="logo.png" type="icon">
  <title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <script>
    $(document).ready(function(){
      var date_input=$('input[name="applyby"]'); //our date input has the name "date"
      var container=$('.container form').length>0 ? $('.container form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
 </script>
  <style>
  .container{
    width:85%;
  }
  .jumbotron{
    background-color: #3B5998;
  }
  body{
    color:#ffffff;
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

<div class="container"><br><br>
  <div class="jumbotron">
    <center><h1>Signup</h1></center><br><br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
      <div class="form-group">
        <input type="text" class="form-control input" name="username" placeholder="Enter Name" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control input" name="email" placeholder="Enter Email Id" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="company" placeholder="Enter Company" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="industry" placeholder="Enter Your Industry" required>
      </div>
      <div class="form-group">
        <input type="number" max="50" class="form-control input" name="experience" placeholder="Experience" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="title" placeholder="Enter Title of the job" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="skills" placeholder="Enter skills that you want to have in students" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="description" placeholder="Describe The work you offer in few words" required>
      </div>
      <div class="form-group"> <!-- Date input -->
        <input class="form-control"  name="applyby" placeholder="Last Date Of Submission" type="dob" required/>
      </div>
      <div class="form-group">
        <input type="password" class="form-control input" name="password" placeholder="Choose a Strong Password"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      </div>
      <div class="form-group">
        <input type="file"  name="image" required>
      </div>
      <div class="form-group">
        <center><button type="submit" name="register" class="btn btn-default">Register</button></center>
      </div>
    </form>
    <div>
    <center>
      <span>Already Resgistered?</span><br>
      <a href="recruiter_login.php" style="text-decoration:none; color:#ffffff;">Login Here</a><br><br>
      <a href="index.php" style="text-decoration:none; color:#ffffff;">Home</a>
    </center>
    <div>

</div>
</div>
</body>
</html>
