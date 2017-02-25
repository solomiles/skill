<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

if ( isset($_SESSION['user'])) {
  header("location: index.php");
 }

 $error = false;
 $title = 'PCI | Forgot Password';
 $errMSG='';
 $errMSGs = '';

 

// this section is for sign in
 if( isset($_POST['btn-signin']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  // $lgpass = trim($_POST['lgpass']);
  // $lgpass = strip_tags($lgpass);
  // $lgpass = htmlspecialchars($lgpass);
  // prevent sql injections / clear user invalid inputs
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);

  if(empty($email)){
   $error = true;
   $errMSG = "Please enter your Email.";
  }
  
  // if(empty($lgpass)){
  //  $error = true;
  //  $lgpassError = "Please enter your password.";
  // }  
  return $result;
}
  // if there's no error, continue to login
  if (!$error) {
   
   // $password = hash('sha256', $lgpass); // password hashing using SHA256

  
  
   $result = db_query("SELECT Email FROM users WHERE Email ='$email' "); 
   // if uname/pass correct it returns must be 1 row
  
   if($result == 1 ) {
    $row = mysqli_fetch_array($result);
    $_SESSION['forgoted'] = $row['Email'];
    $_SESSION['start'] = time();//taking login time
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);//ending the session in 2
    // if ($row['Admin'] == 1) {
    //   header('location: admin.php');
    // } else {
      header("location: forgot-pass.php");
    }
   //  // echo "login";
   // }
    else {
    $errMSGs = "Email not Registered, Try again...";
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
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
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
	<div class="login-html"><h2 style="color: red;">Password Recovery <?php echo $errMSGs; ?></h2>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Security check</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  				<div class="group">
  					<label for="user" class="label">Email</label>
  					<input id="user" name="email" placeholder="Enter Email Used In Signing up" type="email" class="input" required>
  				</div>
  				<!-- <div class="group">
  					<label for="pass" class="label">Password</label>
  					<input id="pass" name="lgpass" type="password" class="input" data-type="password" required>
  				</div> -->
  				<div class="group">
  					<input id="check" type="checkbox" class="check" checked required>
  					<label for="check"><span class="icon"></span> Accept Terms of Service</label>
  				</div>
  				<div class="group">
            <button type="submit" name="btn-signin" class="btn btn-primary btn-lg" style="border: none;
              padding: 15px 20px;
              border-radius: 25px;">Submit
            </button>
          </div>
        </form>
			</div>
      
		</div>
	</div>
</div>
  
  <script src="js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
