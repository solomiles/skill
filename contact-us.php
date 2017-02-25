<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'Contact-us | PECULIAR CONCEPTS INTERNATIONAL Skill ACQUISITION TRAINING PROGRAM';
  $delivery = "";
  $today_date = date('D, M Y');
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
    $name = $row['Profilepic'];

  }
}
  if(isset($_POST['btn-send'])){
    $to = "osaighesolomon@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $subject2 = "Your Copy of your" . $_POST['subject'];
    $message = $fullname . " " . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $fullname . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    $result = mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    $delivery = "Mail Sent. Thank you " . $fullname . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }

    
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
      h4,h6,h5 {
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
  <body><div class="container" style="background: rgba(218, 216, 215, 0.78) none repeat scroll 0% 0%; ">
    <header id="topofpage">
      <img src="images/skill102.jpg" class="img-rounded img-responsive" height="100" width=""><span class="btn-success" style="margin-left: 10px;"><?php echo $today_date; ?></span>
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
            <a class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement='bottom'  title="WELCOME">WELCOME</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style="font-size: 17px;">
              <li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="about-us.php" data-toggle="tooltip" data-placement='bottom' title="About Us">About Us</a></li>
                </ul>
              </li>
              <li><a href="profile.php" data-toggle="tooltip" data-placement='bottom' title="Profile">Profile</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Tutorials">Tutorials</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill and Aquisition<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses.php" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="course_outline.php" data-toggle="tooltip" data-placement='bottom' title="Course Outline">Course Outline</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="font-size: 17px;">
              <li class="active"><a href="" data-toggle="tooltip" data-placement='bottom' title="Contact Us">Contact Us</a></li>
              <li><span> <img src="images/users/<?php echo $name; ?>" class=" pics img-responsive" alt="profile picture"></span>  </li>
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
            <h4>PCI Wonderfull Mum</h4><hr>
            <nav>
            <ul class="nav">
              <li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="about-us.php">About us</a></li>
                </ul>
              </li>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Tutorials">Tutorials</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill and Acquisition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses.php" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="course_outline.php" data-toggle="tooltip" data-placement='bottom' title="Course Outline">Course Outline</a></li>
                </ul>
              </li>
              <li class="active" style="background: rgb(233, 239, 236) none repeat scroll 0% 0%;"><a href="#">Contact Us</a></li>
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
          <div class="col-md-12">
            <div class="well">
              <h4>Contact Us</h4><hr>
              <div>
                <p class="text"><span class="glyphicon glyphicon-home"></span> <span class="glyphicon glyphicon-chevron-right"></span> Address:<span style="color: #134B92; font-size: 17px;"> 4, marly close, Aiyetoro Ijanikin Lagos.</span></p>
                <p class="text"><span class="glyphicon glyphicon-envelope"></span> <span class="glyphicon glyphicon-chevron-right"></span> Email: <span style="color: #134B92; font-size: 17px;"> pci.wonderfulmum@yahoo.com</span></p>
                <p class="text"><span class="glyphicon glyphicon-phone"></span> <span class="glyphicon glyphicon-chevron-right"></span> Phone: <span style="color: #134B92; font-size: 17px; font-size: 17px;">09064333281 <br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>&nbsp;&nbsp;&nbsp;&nbsp;</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #134B92; font-size: 17px;">&nbsp;</span> 08162463230</span></p>
              </div><br><br>
              
                <div class="">
                  <h5><strong><u> Send us feedback</u></strong></h5>
                </div><br><br>
                <p class="alert-success"><?php echo $delivery; ?></p>
                <br><br>
                <form class="form-horizontal" role="form" action="" name="upload" method="post">
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Full Name:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="fullname" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Subject:</label>
                    <div class="col-lg-8">
                    <input class="form-control" type="text" name="subject" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Message:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" type="text" name="message" required>  </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <button type="submit" name="btn-send" class="btn btn-primary btn-lg" value="Send">Send</button>
                    </div>
                  </div>
                </form>
              </div>
            
          </div>
          
        </div>
      </div>
    </div>

      <?php include ('footer.html');
      ?>
    <!-- end of container -->
    </div>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/friendzone.js"></script>`
    <script>
     
    </script>

  </body>
</html>
<?php ob_end_flush() ?>