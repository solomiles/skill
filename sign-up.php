<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

if ( isset($_SESSION['user'])) {
  header("location: index.php");
 }

 $error = false;
 $title = 'PCI | Signup';
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
  
  $regemail = trim($_POST['regemail']);
  $regemail = strip_tags($regemail);
  $regemail = htmlspecialchars($regemail);
  
  $regfullname = trim($_POST['regfullname']);
  $regfullname = strip_tags($regfullname);
  $regfullname = htmlspecialchars($regfullname);
  
  $regphone = trim($_POST['regphone']);
  $regphone = strip_tags($regphone);
  $regphone = htmlspecialchars($regphone);

  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);
  
  // basic username validation
  if (empty($regusername)) {
   $error = true;
   $errMSG = "Please enter your username.";
  } else if (strlen($regusername) < 7) {
   $error = true;
   $errMSG = "userame must have at least 7 characters.";
  }
  
   // password validation
  if (empty($regpass)){
   $error = true;
   $errMSG = "Please enter password.";
  } else if(strlen($regpass) < 6) {
   $error = true;
   $errMSG = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $regpass);
   // echo $password;

  
   
 
  // password encrypt using SHA256();
  // $password = hash('sha256', $regcpass);
  
  
  //basic email validation
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);
  if (empty($regemail))
   {
   $error = true;
   $errMSG = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT Email FROM users WHERE Email='$regemail'";
   $result = db_query($query);
   $count = mysqli_fetch_array($result);
   if($count!=0){
    $error = true;
    $errMSG = "Provided Email is already in use.";
   }
  }
  return $result;
}
  
    // basic name validation
  // if (empty($regfullname)) {
  //  $error = true;
  //  $errMSG = "Please enter your full name.";
  // } else if (strlen($regfullname) < 7) {
  //  $error = true;
  //  $regfullError = "full name must have at least 7 characters.";
  // } else if (!preg_match("/^[a-zA-Z ]+$/",$regfullname)) {
  //  $error = true;
  //  $errMSG = "full name must contain alphabets and space.";
  // }
  
    // basic gender validation
  // if (empty($gender)) {
  //  $error = true;
  //  $errMSG = "Please input your phone number.";
  // }

  // if (empty($regphone)) {
  //  $error = true;
  //  $errMSG = "Please input your phone number.";
  // }

  $today_date = Date('Y-m-d');
  // die($today_date);
  
    $rest = db_query("SELECT * FROM users  ");
    $check = mysqli_fetch_array($rest);
    $checkemail = $check['Email'];
    $checkuser = $check['Username'];
    if ($checkemail === $regemail) {
      # code...
      $errMSG = 'Email already in use';
    } elseif ($checkuser === $regusername) {
      # code...
      $errMSG = 'Username already in use';
    } elseif ($regpass != $regcpass) { // password validation
      # code...
      $errMSG = "Password and Confirm Password doesn't match.";
    } elseif (strlen($regfullname) < 7) {
      # code...
      $errMSG = "full name must contain alphabets and space.";
    }  
     else if(strlen($regpass) < 8) {
     $error = true;
     $errMSG = "Password must have at least 8 characters.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/",$regfullname)) {
      # code...
      $error = true;
      $errMSG = "full name must contain alphabets and space.";
    } else  {

    $result = db_query("INSERT INTO users(Username,Password,Email,Name,Phone,Gender,Dateregister) VALUES('$regusername','$password','$regemail','$regfullname','$regphone','$gender','$today_date')");
    
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
  
   $result = db_query("SELECT Username, Password FROM users WHERE Username='$lgusername' AND Password='$password'"); 
   // if uname/pass correct it returns must be 1 row
  
   if($result == 1 ) {
    $row = mysqli_fetch_array($result);
    $_SESSION['user'] = $row['Username'];
    $_SESSION['start'] = time();//taking login time
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60 * 60);//ending the session in 4 hours
    // if ($row['Admin'] == 1) {
    //   header('location: admin.php');
    // } else {
      header("location: index.php");
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
  <header><img src="images/logo.png" alt="company logo" class="img-rounded img-responsive" height="100" width="">
  <div class="container-fluid"><h3><a href="">Welcome To Peculiar Concepts International <em>Skills Acquisition Website</em></a></h3></div></header><br>
  <div class="login-wrap">
	<div class="login-html"><p style="color: #ECFFFF;">Don't have an account? <label for="tab-2" style="color: red;"> Sign Up For Free now!</a></p>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"> &nbsp;Sign Up</label>
		<div class="login-form"><p class="alert-danger"><?php echo $errMSG; ?></p><br><br>
			<div class="sign-in-htm">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  				<div class="group">
  					<label for="user" class="label">Username</label>
  					<input id="user" name="lgusername" placeholder="Enter your username" type="text" class="input" required>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Password</label>
  					<input id="pass" name="lgpass" type="password" placeholder="Enter your password" class="input" data-type="password" required>
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
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="forgotpassword.php">Forgot Password?</a>
				</div>
			</div>
      
			<div class="sign-up-htm">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  				<div class="group">
  					<label for="user" class="label">Username</label>
  					<input id="user" name="regusername" placeholder="Enter Username" type="text" class="input" required>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Password</label>
  					<input id="pass" name="regpass" type="password" placeholder="Enter password" class="input" data-type="password" required>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Repeat Password</label>
  					<input id="pass" type="password" name="regcpass" placeholder="Repeat password" class="input" data-type="password" required>
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Email Address</label>
  					<input id="pass" name="regemail" type="email" placeholder="Enter email eg: example@mail.com" class="input" required>
  				</div>
          <div class="group">
            <label for="pass" class="label">Fullname</label>
            <input id="pass" name="regfullname" type="text" placeholder="Enter Fullname" class="input" required>
          </div>
          <div class="group login-group-checkbox">
            <label for="pass" class="label male">Male</label>
            <input id="pass" name="gender" value="male" type="radio" class="input label-2" style="margin-left: -150px;" >

            <label for="pass" class="label female">Female</label>
            <input id="pass" name="gender" value="female" type="radio" class="input label-3" style="margin-left: 150px;" >

          </div>
          <div class="group">
            <label for="pass" class="label">Phone</label>
            <input id="pass" name="regphone" type="text" placeholder="phone number" class="input" required>
          </div>
  				<div class="group">
  					<button type="submit" name="btn-signup" class="btn btn-primary btn-lg" style="border: none;
              padding: 15px 20px;
              border-radius: 25px;">Sign Up
            </button>
  				</div>
        </form>
				<!-- <div class="hr"></div> -->
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
  
  <script src="js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
