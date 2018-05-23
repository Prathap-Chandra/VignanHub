<?php
include('conn.php');
if(isset($_POST["register"])){
$username=$_POST["username"];
$rollno=$_POST["rollno"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$intern=$_POST["intern"];
$dept=$_POST["dept"];
$batch=$_POST["batch"];
$password=$_POST["password"];
$x=implode($_POST['check_list']);
$skills= explode(", ",$x);
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$query=mysqli_query($conn,"insert into student_signup values('','$username','$rollno','$email','$dob','$intern','$dept','$batch','$skills','$password','$image')");
if($query){
  header("Location: student_login.php");
}else{
  echo '<br> <center><div class="alert alert-info alert-dismissible"  style="width:70%; background-color:#3B5998; color:#ffffff;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>'.mysqli_errno($conn).mysqli_error($conn).'!!!</strong>
            </div></center>';
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
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
        <input type="text" class="form-control input" name="username" placeholder="Enter Username" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control input" name="rollno" placeholder="Enter ID" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control input" name="email" placeholder="Enter Email Id" required>
      </div>
      <div class="form-group"> <!-- Date input -->
        <input class="form-control"  name="dob" placeholder="Date of Birth" type="text" required/>
      </div>
      <div class="form-group">
       <select class="selectpicker show-tick show-menu-arrow bs-select-hidden" name="intern" data-style="btn-default" title="Select Department" data-width="" required><option class="bs-title-option" value="">Any Previous Intern Experience?</option>
        <option>Yes</option>
        <option>No</option>
       </select>
     </div>
      <div class="form-group">
       <select class="selectpicker show-tick show-menu-arrow bs-select-hidden" name="dept" data-style="btn-default" title="Select Department" data-width="" required><option class="bs-title-option" value="">Select Department</option>
        <option>Computer Science &amp; Engineering</option>
        <option>Civil Engineering</option>
        <option>Mechanical Engineering</option>
        <option>Electronics &amp; Communication Engineering</option>
        <option>Electrical &amp; Electronics Engineering</option>
        <option>Electronics &amp; Instrumentation Engineering</option>
       </select>
     </div>
     <div class="form-group">
      <select class="selectpicker show-tick show-menu-arrow bs-select-hidden" name="batch" data-style="btn-default" title="Select Department" data-width="" required><option class="bs-title-option" value="">Select Batch</option>
       <option>2014-2018</option>
       <option>2015-2019</option>
       <option>2016-2020</option>
       <option>2017-2021</option>
       <option>2018-2022</option>
       <option>2019-2023</option>
       <option>2020-2024</option>
       <option>2021-2025</option>
       <option>2022-2026</option>
       <option>2023-2027</option>
       <option>2024-2028</option>
       <option>2025-2029</option>
       <option>2026-2030</option>
      </select>
    </div>
    <div class="form-group">
    <label class="heading">Select Your Technical Exposure:</label>
     <input type="checkbox" name="check_list[]" value="C/C++,"><label>C/C++</label>
     <input type="checkbox" name="check_list[]" value="PHP,"><label>PHP</label>
     <input type="checkbox" name="check_list[]" value="Java,"><label>Java</label>
     <input type="checkbox" name="check_list[]" value="HTML/CSS,"><label>HTML/CSS</label>
     <input type="checkbox" name="check_list[]" value="Bootstrap,"><label>Bootstrap</label>
     <input type="checkbox" name="check_list[]" value="Ajax,"><label>Ajax</label>
     <input type="checkbox" name="check_list[]" value="Perl,"><label>Perl</label>
     <input type="checkbox" name="check_list[]" value="Databases,"><label>Databases</label>
     <input type="checkbox" name="check_list[]" value="UNIX/LINUX,"><label>UNIX/LINUX</label>
     <input type="checkbox" name="check_list[]" value="Networks,"><label>Networks</label>
     <input type="checkbox" name="check_list[]" value="Hacking,"><label>Hacking</label>
     <input type="checkbox" name="check_list[]" value="Aurdino,"><label>Aurdino</label>
     <input type="checkbox" name="check_list[]" value="MachineLearning,"><label>MachineLearning</label>
     <input type="checkbox" name="check_list[]" value="Robotics,"><label>Robotics</label>
     <input type="checkbox" name="check_list[]" value="IOT,"><label>IOT</label>
     <input type="checkbox" name="check_list[]" value="CloudComputing"><label>CloudComputing</label>
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

    <center>
      <span>Already Resgistered?</span><br>
      <a href="student_login.php" style="text-decoration:none; color:white;">Login Here</a><br><br>
      <a href="index.php" style="text-decoration:none; color:#ffffff;">Home</a>
    </center>

</div>
</div>
</body>
</html>
