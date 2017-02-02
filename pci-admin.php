<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

if ( isset($_SESSION['user'])) {
  // header("location: index.php");
 }

 $error = false;
 $title = 'PCI | Admin-Signup';
 $errMSG='';

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $regusername = trim($_POST['regusername']);
  $regusername = strip_tags($regusername);
  $regusername = htmlspecialchars($regusername);
  
  $regpass = trim($_POST['regpass']);
  $regpass = strip_tags($regpass);
  $regpass = htmlspecialchars($regpass);
  
  $regcpass = trim($_POST['regcpass']);
  $regcpass = strip_tags($regcpass);
  $regcpass = htmlspecialchars($regcpass);
  
  // basic username validation
  if (empty($regusername)) {
   $error = true;
   $regusernameError = "Please enter your username.";
  } else if (strlen($regusername) < 3) {
   $error = true;
   $regusernameError = "userame must have at least 3 characters.";
  }
  
   // password validation
  if (empty($regpass)){
   $error = true;
   $regpassError = "Please enter password.";
  } else if(strlen($regpass) < 6) {
   $error = true;
   $regpassError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $regpass);
   // echo $password;

  
   // password validation
  if ($regpass != $regcpass){
   $error = true;
   $regcpassError = "Password and Confirm Password doesn't match.";
  }
  // password encrypt using SHA256();
  // $password = hash('sha256', $regcpass);
  
  
  //basic email validation
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);
  // if (empty($regemail))
  //  {
  //  $error = true;
  //  $regemailError = "Please enter valid email address.";
  // } else {
  //  // check email exist or not
  //  $query = "SELECT userEmail FROM users WHERE userEmail='$regemail'";
  //  $result = db_query($query);
  //  $count = db_query_num_rows($result);
  //  if($count!=0){
  //   $error = true;
  //   $regemailError = "Provided Email is already in use.";
  //  }
  // }
  return $result;
}

  $result = db_query("INSERT INTO admin(Username,Password) VALUES('$regusername','$password')");
  
 if ($result === true) {
  $errMSG = "success! you may login now";

  // header("Location: login.php");
  // echo $errTyp;
  // echo $errMSG;
 }
  else {
  $errMSG = "Something went wrong, try again later..."; 
 } 
  
 }

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
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);//ending the session in 2
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
</head>

<body>
  <div class="container">
  <header><img src="images/skill102.jpg" alt="company logo" class="img-rounded img-responsive" height="100" width=""><h3><a>Welcome To Peculiar Concepts International <em>Skils Acquisition Website</em></h3></a></header>
  <div class="login-wrap">
	<div class="login-html"><h2 style="color: red;">Admin Login !!! out of bound</h2>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
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
      
			<div class="sign-up-htm">
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
			</div>
		</div>
	</div>
</div>
  
  <script src="js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
