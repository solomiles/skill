<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'Admin | PECULIAR CONCEPTS INTERNATIONAL';
  $saved = "";
 // if session is not set this will redirect to login page
 if($_SESSION['admin']=="" ) {
  header("Location: pci-admin.php");
 }
  function db_query($query){ 
   $connection = db_connect();
   $result = mysqli_query($connection,$query);
    return $result;
  }  
// select loggedin users detail
    $id = $_SESSION['admin'];

    $result = db_query("SELECT * FROM users WHERE Username = '$id'");

    $row = mysqli_fetch_array($result);


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
    <link rel="shortcut icon" href="" type="image/x-icon" />
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
        background-color: #fff;
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
      h4,h6,h5,h3 {
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
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Profile">Profile</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Tutorials">Tutorials</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill Aquisition<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses.php" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="course_outline.php" data-toggle="tooltip" data-placement='bottom' title="Course Outline">Course Outline</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="font-size: 17px;">
              <li class="active"><a href="#" data-toggle="tooltip" data-placement='bottom' title="Contact Us">Contact Us</a></li>              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?php echo $id; ?><span class="caret"></span></a>
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
              <li><a href="#">Profile</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Tutorials">Tutorials</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill Acquisition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
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
              <h3>Peculiar Concepts ADMIN Page</h3>
              <div class="alert alert-danger alert-dismissable">WARNING!!! Please Make Sure You Understand What you Are To Do</div><hr>
              
                <div class="">
                  <h5><strong>Edit Courses</strong></h5>
                </div><br>
                <p class="alert-success"><?php echo $saved; ?></p>
                
                <form class="form-horizontal" role="form" action="" name="upload" method="">
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Select Course:</label>
                    <div class="col-lg-8">
                      <select name="courses" class="form-control">
                        <option></option>
                        <option value="Tailoring">Tailoring</option>
                        <option value="Bridal Makeover">Bridal Makeover</option>
                        <option value="Ankara Craft">Ankara Craft</option>    
                        <option value="Soap Making">Soap Making</option>
                        <option value="Bead Making">Bead Making</option>
                        <option value="Paint Production">Paint Production</option>
                        <option value="Skin Care">Skin Care</option>
                        <option value="Hat Making">Hat Making</option>
                        <option value="Catering">Catering</option>
                        <option value="Events Management And Decoration">Events Management And Decoration</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Set amount:</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="email" placeholder="set amount" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Set Date:</label>
                    <div class="hero-unit col-lg-8 ">
                      <input class="form-control" id="example1" type="text" >
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-lg-3 control-label">Message:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" type="text" name="message">  </textarea>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <button type="submit" name="btn-send" class="btn btn-primary btn-lg" value="Send">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            
          </div>
          
        </div>
      </div>
    </div>


    <!-- end of container -->
    </div>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.fa.min.js" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/friendzone.js"></script>`
    <script type="text/javascript">
      // When the document is ready
    </script>

  </body>
</html>
<?php ob_end_flush() ?>