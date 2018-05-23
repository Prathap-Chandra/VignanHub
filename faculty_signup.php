<?php
if(isset($_POST["register"])){
echo $username=$_POST["username"];
echo $email=$_POST["email"];
echo $degree=$_POST["degree"];
echo $dob=$_POST["dob"];
echo $doj=$_POST["doj"];
echo $experience=$_POST["experience"];
echo $ra=$_POST["ra"];
echo $journals=$_POST["journals"];
echo $password=$_POST["password"];
include('conn.php');
  if(!empty($_FILES['image']['tmp_name'])&&file_exists($_FILES['image']['tmp_name'])){
  $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $query=mysqli_query($conn,"insert into faculty_signup values('','$username',
    '$email','$degree','$dob','$doj','$experience','$ra','$journals','$password','$image')");
      if ($query) {
      header("Location: faculty_login.php");
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
      var date_input=$('input[name="dob"]'); //our date input has the name "date"
      var container=$('.container form').length>0 ? $('.container form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
    $(document).ready(function(){
      var date_input=$('input[name="doj"]'); //our date input has the name "date"
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
        <input type="text" class="form-control input" name="username" placeholder="Enter Username" >
      </div>
      <div class="form-group">
        <input type="email" class="form-control input" name="email" placeholder="Enter Email Id" >
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="degree" placeholder="Your Degree's  Ex: B.tech,M.tech etc.," >
      </div>
      <div class="form-group"> <!-- Date input -->
        <input class="form-control"  name="dob" placeholder="Date of Birth" type="text"/>
      </div>
      <div class="form-group"> <!-- Date input -->
        <input class="form-control"  name="doj" placeholder="Date of Joining" type="text"/>
      </div>
      <div class="form-group">
        <input type="number" max="60" class="form-control input" name="experience" placeholder="Years of Experience" >
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="ra" placeholder="Research Area (optional)">
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="journals" placeholder="No.of journals Published (optional)">
      </div>
      <div class="form-group">
        <input type="password" class="form-control input" name="password" placeholder="Choose a Strong Password"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="form-group">
        <input type="file"  name="image"  >
      </div>
      <div class="form-group">
        <center><button type="submit" name="register" class="btn btn-default">Register</button></center>
      </div>
    </form>
    <center>
      <a href="faculty_login.php" style="text-decoration:none; color:#ffffff;">Login for VignanHub</a><br><br>
      <a href="index.php" style="text-decoration:none; color:#ffffff;">Home</a>
    </center>

</div>
</div>
</body>
</html>
