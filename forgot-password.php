<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';
$error = false;
 $title = 'PCI | Forgot Password';
 $errMSG='';
 $errMSGS = '';

if ($_SESSION['forgot']=="" ) {
  header("location: forgotpassword.php");
 } 
 
 $id = $_SESSION['forgot'];

 

// this section is for sign in
 if( isset($_POST['btn-signin']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  $cpass = trim($_POST['cpass']);
  $cpass = strip_tags($cpass);
  $cpass = htmlspecialchars($cpass);
  // prevent sql injections / clear user invalid inputs
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);

  if(empty($pass)){
   $error = true;
   $errMSG = "Please enter new password.";
  }
  
  if(empty($cpass)){
   $error = true;
   $errMSG = "Please Confirm your password.";
  }  
 return $result;
}
  if ($pass != $cpass) {
    # code...
    $errMSG = "Password didnt Match!!!";
  } elseif (strlen($pass) < 8) {
    # code...
    $error = true;
    $errMSG = "Password must have at least 8 characters.";
  } else  {
 
  // if there's no error, continue to login
  if (!$error) {
   
   // $password = hash('sha256', $lgpass); // password hashing using SHA256

  $password = hash('sha256', $pass); // password hashing using SHA256
  
   $result = db_query("UPDATE users SET Password = '$password' WHERE Username ='$id' "); 
   // if uname/pass correct it returns must be 1 row
  
   if($result == 1 ) {
    
    $errMSGS = " changed! click to login";
      // header("location: sign-up.php");
    }
   //  // echo "login";
   // }
    else {
    $errMSG = "Unsuccessful, Try again...";
    // echo $errMSG;
   }
    
  }
  
 }
}

?>



<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?> </title>
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
    .login-wrap{
  width:100%;
  margin:auto;
  max-width:525px;
  min-height:620px;
  </style>
</head>

<body>
  <div class="container">
  <header><img src="images/skill102.jpg" alt="company logo" class="img-rounded img-responsive" height="100" width=""><h3><a>Welcome To Peculiar Concepts International <em>Skills Acquisition Website</em></h3></a></header><br>
  <div class="login-wrap">
  <div class="login-html"><h2 style="color: red;">Password Recovery<a href="sign-up.php"><?php echo $errMSGS; ?></a>  <?php echo $errMSG; ?></h2>
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Security check</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <div class="sign-in-htm">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <div class="group">
            <label for="user" class="label">locked user</label>
            <input id="user" value="<?php echo $id; ?>"   type="text"  class="input" disabled="">
          </div>
          <div class="group">
            <label for="user" class="label">New password</label>
            <input id="user" name="pass" placeholder="Enter New password" type="password" data-type="password" class="input" required>
          </div>
          <div class="group">
            <label for="pass" class="label">Confirm New Password</label>
            <input id="pass" name="cpass" placeholder="Confirm New password" type="password" class="input" data-type="password" required>
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked required>
            <label for="check"><span class="icon"></span> Accept Terms of Service</label>
          </div>
          <div class="group">
            <button type="submit" name="btn-signin" class="btn btn-primary btn-lg" style="border: none;
              padding: 15px 20px ;
              border-radius: 25px;">Submit
            </button>
          </div>
        </form>
      </div>
      <br>
    </div>
  </div>
</div>
  
  <script src="js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
