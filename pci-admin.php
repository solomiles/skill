<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

if ( isset($_SESSION['admin'])) {
  header("location: admin.php");
 }

 $error = false;
 $title = 'PCI | Admin-Signup';
 $errMSG='';

 

// this section is for sign in
 if( isset($_POST['btn-signin']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $lgusername = trim($_POST['lgusername']);
  $lgusername = strip_tags($lgusername);
  $lgusername = htmlspecialchars($lgusername);
  
  $lgpass = trim($_POST['lgpass']);
  $lgpass = strip_tags($lgpass);
  $lgpass = htmlspecialchars($lgpass);
  // prevent sql injections / clear user invalid inputs
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);

  if(empty($lgusername)){
   $error = true;
   $lgusernameError = "Please enter your username.";
  }
  
  if(empty($lgpass)){
   $error = true;
   $lgpassError = "Please enter your password.";
  }  
  return $result;
}
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $lgpass); // password hashing using SHA256

  
  
   $result = db_query("SELECT Username, Password FROM admin WHERE Username='$lgusername' AND Password='$password'"); 
   // if uname/pass correct it returns must be 1 row
  
   if($result == 1 ) {
    $row = mysqli_fetch_array($result);
    $_SESSION['admin'] = $row['Username'];
    $_SESSION['start'] = time();//taking login time
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);//ending the session in 2
    // if ($row['Admin'] == 1) {
    //   header('location: admin.php');
    // } else {
      header("location: admin.php");
    }
   //  // echo "login";
   // }
    else {
    $errMSG = "Incorrect Credentials, Try again...";
    // echo $errMSG;
   }
    
  }
  
 }
?>



<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?> </title>
  <link rel="shortcut icon" href="images/skill102.jpg" type="image/x-icon" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
    .login-wrap{
  width:100%;
  margin:auto;
  max-width:525px;
  min-height:550px;
  </style>
</head>

<body>
  <div class="container">
  <header><img src="images/skill102.jpg" alt="company logo" class="img-rounded img-responsive" height="100" width=""><h3><a>Welcome To Peculiar Concepts International <em>Skills Acquisition Website</em></h3></a></header><br>
  <div class="login-wrap">
	<div class="login-html"><h2 style="color: red;">Admin Login !!! out of bound  <?php echo $errMSG; ?></h2>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  				<div class="group">
  					<label for="user" class="label">Username</label>
  					<input id="user" name="lgusername" type="text" class="input" required>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Password</label>
  					<input id="pass" name="lgpass" type="password" class="input" data-type="password" required>
  				</div>
  				<div class="group">
  					<input id="check" type="checkbox" class="check" checked required>
  					<label for="check"><span class="icon"></span> Keep me Signed in</label>
  				</div>
  				<div class="group">
            <button type="submit" name="btn-signin" class="btn btn-primary btn-lg" style="border: none;
              padding: 15px 20px;
              border-radius: 25px;">Sign In
            </button>
          </div>
        </form>
			</div>
      
			<!-- <div class="sign-up-htm">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  				<div class="group">
  					<label for="user" class="label">Username</label>
  					<input id="user" name="regusername" type="text" class="input" required>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Password</label>
  					<input id="pass" name="regpass" type="password" class="input" data-type="password" required>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Repeat Password</label>
  					<input id="pass" type="password" name="regcpass" class="input" data-type="password" required>
  				</div>
  				<div class="group">
  					<button type="submit" name="btn-signup" class="btn btn-primary btn-lg" style="border: none;
              padding: 15px 20px;
              border-radius: 25px;">Sign Up
            </button>
  				</div>
        </form>
			</div> -->
		</div>
	</div>
</div>
  
  <script src="js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
