<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'Profile | PECULIAR CONCEPTS INTERNATIONAL';
  $delivery = "";
 // if session is not set this will redirect to login page
 if($_SESSION['user']=="" ) {
  header("Location: index.php");
 }else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            header('Location: sign-up.php');
        }
        else { //Starting this else one [else1]
  function db_query($query){ 
   $connection = db_connect();
   $result = mysqli_query($connection,$query);
    return $result;
  }  
// select loggedin users detail
    $id = $_SESSION['user'];

    $result = db_query("SELECT * FROM users WHERE Username = '$id'");

    $row = mysqli_fetch_array($result);

   $fname = $row['Name'];
  $email = $row['Email'];
  $description = $row['Description'];
  $country = $row['Country'];
  $phone = $row['Phone'];
  $errMSG='';

//  if(isset($_POST['upload'])) {
//   $regfullname = $_POST['fullname'];
//   $regemail  = $_POST['email'];
//   $description   = $_POST['description'];
//   $phone = $_POST['phone'];
// }
if( isset($_POST['btn-update']) ) {
  


 $fullname = trim($_POST['fullname']);
  $fullname = strip_tags($fullname);
  $fullname = htmlspecialchars($fullname);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $description = trim($_POST['description']);
  $description = strip_tags($description);
  $description = htmlspecialchars($description);

  $country = trim($_POST['country']);
  $country = strip_tags($country);
  $country = htmlspecialchars($country);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
  

          // $username = $object['username'];
          // $fname  = $object['fullname'];
          // $email  = $object['email'];
          // $descrip  = $object['description'];
          // $phone  = $object['phone'];
        

  $result = db_query("UPDATE users SET Name = '$fullname', Email = '$email', Description = '$description', Country = '$country', Phone = '$phone'  WHERE Username = '$id'");
  if ($result == 1) {
    $errMSG = " Records Updated!";
  }
  else {
    $errMSG = "Something went wrong, try again later..."; 
  } 
}


$id = $_SESSION['user'];

$result = db_query("SELECT * FROM users WHERE Username = '$id'");

$row = mysqli_fetch_array($result);

$display = $row['Profilepic'];

if(isset($_POST['Submit'])){
        $id = $_SESSION['user'];
        $name = $_FILES["image"] ["name"];
        $type = $_FILES["image"] ["type"];
        $size = $_FILES["image"] ["size"];
        $temp = $_FILES["image"] ["tmp_name"];
        $error = $_FILES["image"] ["error"];
        $path = 'images/users/'. $name;


       

        if ($error > 0){
            die("Error uploading file! Code $error.");
        }else{
            if($size > 1000) //conditions for the file
            {
            die("Format is not allowed or file size is too big!");
            }
            else
            {
            move_uploaded_file($temp, $path);

            $result =  db_query("UPDATE users SET Profilepic = '$name' WHERE Username = '$id'");
            }
            
        } 
        // if ($result == 1) {
        //   # code... 
        //   $row = mysqli_fetch_array($result);
        //   $display = $row['Profilepic'];

        // }

          
      }
      
//
      if (isset($_POST['btn-reset'])) {
        # code...
        header('Location: index.php');
      }

  }
}

    // $display = $row['Profilepic'];
    // $descrip = $row['Description'];
 
 // $res=mysql_query("SELECT * FROM users WHERE userUsername=".$_SESSION['user']);
 // $userRow=mysql_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="images/skill102.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- main css for friendzone -->
    <!-- <link href="css/solomonproject.min.css" rel="stylesheet" type="text/css"> -->
    
    <link rel="stylesheet" type="text/css" href="css/friendzone.css">

    <style type="text/css">
      body {
        background: RGBA(221, 216, 208, 0.38);
      }
      /* Profile sidebar */
      .profile-sidebar {
        padding: 5px 5px 0;
        background: #fff;
      }
      .navbar-default {
        background-color: #010;
        border-color: rgba(249, 244, 244, 0.03);
      }
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
        width: 35%;
        margin: auto;
      }
      .well {
        background-color: #fff;
      }
      h3,h4,h6,h5 {
        color: #777;
      }
      header {
        margin-top: 10px;
        background: #fff;
      }
       .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {
        display: block;
        max-width: 100%;
        height: 100px;
      }
      .pics {
        height: 45px;
        width: 40px;
        border: 1px solid;
        border-radius: 50%;
      }

    </style>
   
  </head>
  <body><div class="container" style="background: rgba(218, 216, 215, 0.78) none repeat scroll 0% 0%; margin-top: 25px;">
    <header>
      <img src="images/skill102.jpg" class="img-rounded img-responsive" height="100" width="">
    </header>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" data-toggle="tooltip" data-placement='bottom'  title="WELCOME">WELCOME</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style="font-size: 17px;">
              <li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="about-us.php" data-toggle="tooltip" data-placement='bottom' title="About Us">About Us</a></li>
                </ul>
              </li>
              <li class="active"><a href="#" data-toggle="tooltip" data-placement='bottom' title="Profile">Profile</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Tutorials">Tutorials</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill Aquisition<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses.php" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="course_outline.php" data-toggle="tooltip" data-placement='bottom' title="Course Outline">Course Outline</a></li>
                </ul>
              </li>
              <!-- <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Contact Us">Contact Us</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right" style="font-size: 17px;">
              <li><a href="contact-us.php" data-toggle="tooltip" data-placement='bottom' title="Contact Us">Contact Us</a></li>  
              <li><span><img src="images/users/<?php echo $display; ?>" class=" pics img-responsive" alt="profile picture"></span>  </li>          
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $id; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php" data-toggle="tooltip" data-placement='bottom' title="Logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </div>
    </nav>

    <div class="row">
      <div class="col-md-12">
            <!-- side navigation -->
        <div class="col-md-3">
          <div class="profile-sidebar">
            <h4> PCI Wonderful Mum</h4><hr>
            <nav>
            <ul class="nav">
              <li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="about-us.php">About us</a></li>
                </ul>
              </li>
              <li class="active" style="background: rgb(233, 239, 236) none repeat scroll 0% 0%;"><a href="#">Profile</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Tutorials">Tutorials</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill Acquisition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses.php" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="course_outline.php" data-toggle="tooltip" data-placement='bottom' title="Course Outline">Course Outline</a></li>
                </ul>
              </li>
              <li class=""><a href="contact-us.php">Contact Us</a></li>
              <!-- <li><a href="#">Skin Care</a></li>
              <li><a href="#">Taloring</a></li>
              <li><a href="#">Hat Making</a></li>
              <li><a href="#">Catering</a></li>
              <li><a href="#">Events Management And Decoration</a></li> -->
            </ul></nav>
          </div>
        </div>
        <!-- contact form -->
        <div class="col-md-9 col-sm-9">
          <div class="row">
            <div class="col-sm-12">
              <div class="profile-sidebar">
                <h3 style="padding: 0 10px 0;">Edit Profile</h3><br>
              </div><br>
            </div>
          </div>
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
            <form  method="post" enctype='multipart/form-data'>
              <div class="text-center profile-sidebar"><div class="profile-userpic">

                <img src="images/users/<?php echo $display; ?>" class="avatar img-responsive" alt="profile picture"></div>
                <h6>Upload a different photo...</h6>
                
                <input type="file" class="form-control" name="image"><br>
                <button id="upload" type="submit" name="Submit" class="btn btn-primary" value="Change profile picture">Change profile picture</button><br><br>
                </form>
              </div>
            </div>
            
            
            <!-- edit form column -->
            <div class="col-md-8 personal-info profile-sidebar">
              <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a> 
                <i class="fa fa-coffee"></i>
                Please edit your information below ----><strong class="alert-success"> <?php echo $errMSG; ?></strong>
              </div>
              <h3>Personal info</h3>
              
              <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="upload" method="post">
                <div class="form-group">
                  <label class="col-lg-3 control-label">Full Name:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="fullname" value="<?php echo $fname; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Email:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">State/Region:</label>
                  <div class="col-lg-8">
                  <input class="form-control" type="text" name="description" value="<?php echo $description; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Country:</label>
                  <div class="col-lg-8">
                  <input class="form-control" type="text" name="country" value="<?php echo $country; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Phone no:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="col-md-8">
                    <button type="submit" name="btn-update" class="btn btn-primary" value="Save Changes">SAVE</button>
                    <span></span>
                    <input type="submit" class="btn btn-danger" name="btn-reset" value="Cancel">
                  </div>
                </div>
              </form>
            </div>
          </div>
        <hr>

        </div>          
        </div>
      </div>
    </div>


    <!-- end of container -->
    </div>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/friendzone.js"></script>`
    <script>
     
    </script>

  </body>
</html>
<?php ob_end_flush() ?>