<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'HOME | PECULIAR CONCEPTS INTERNATIONAL';
 // if session is not set this will redirect to login page
 if($_SESSION['user']=="" ) {
  header("Location: sign-up.php");
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

    $id = $_SESSION['user'];

    $result = db_query("SELECT * FROM users WHERE Username = '$id'");

    $row = mysqli_fetch_array($result);

    // $display = $row['Profilepic'];
    // $descrip = $row['Description'];
 // select loggedin users detail
 // $res=mysql_query("SELECT * FROM users WHERE userUsername=".$_SESSION['user']);
 // $userRow=mysql_fetch_array($res);
  }
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
      h3,h4,h6,h5 {
        color: #777;
      }
      header {
        margin-top: 10px;
        background: #fff;
      }
       .img-responsive, .thumbnail a > img, .thumbnail > img {
        display: block;
        max-width: 100%;
        height: 100px;
      }
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
        width: 120%;
        margin: auto; 
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
              <li class="active dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="about-us.php" data-toggle="tooltip" data-placement='bottom' title="About Us">About Us</a></li>
                </ul>
              </li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Profile">Profile</a></li>
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
              <li><a href="contact-us.php" data-toggle="tooltip" data-placement='bottom' title="Contact Us">Contact Us</a></li>              
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
            <!-- Courses -->
        <div class="col-md-4">
          <div class="profile-sidebar">
            <h4 style="background: rgb(114, 105, 101) none repeat scroll 0% 0%; color: rgb(255, 255, 255);">Upcoming Events</h4><hr>

            <!-- start of upcoming events calender -->
            <div class="custom-highlight2">
            <!-- first  line -->
              <div style="line-height: 140%;">
                <a href="#" target="_self"><span style="font-size:16px;"><strong style="line-height: 140%;"><span style="color: rgb(255, 140, 0);">Peculiar Concepts International Skill Acquisition Training &nbsp;Programme</span></strong></span></a>
              </div>
              <div style="line-height:140%;">
                <div style="line-height: 140%;">
                  &nbsp;
                </div>
                <div style="line-height: 140%;">
                  <a href="#" target="_self"><span style="font-size:16px;"><strong><span style="color:#ff8c00;">&nbsp; Tailoring&nbsp; </span></strong> </span></a></div>
                <div style="line-height: 140%;">
                  &nbsp;</div>
              </div>
              <div style="line-height: 140%;">
                <a href="#" target="_self"><img alt="" src="images/tailoring.jpg" style="width: 149px; height: 91px; margin-left: 10px; margin-right: 10px; float: left;"></a><span style="line-height: 16.8px;">30 Jan - 3, Feb</span><span style="line-height: 16.8px;">, 2017</span>
              </div>
              <div style="line-height: 140%;">
                <p>
                  <strong style="line-height: 16.8px;">F</strong><strong style="line-height: 16.8px;">e</strong><strong style="line-height: 16.8px;">e:</strong><span style="line-height: 16.8px;">&nbsp;N10, 500</span></p>
                <p>
                  <span style="line-height: 16.8px;"><span style="font-size:20px;"><span style="font-size:12px;"><em><span style="font-size:12px;">I<em>ncludes training manual &amp; materials</em></span></em></span></span></span></p>
              </div>
              <!-- end of first line -->
              <!-- second line -->

              <div style="line-height:140%;">
                <div style="line-height: 140%;">
                  &nbsp;
                </div>
                <div style="line-height: 140%;">
                  <a href="#" target="_self"><span style="font-size:16px;"><strong><span style="color:#ff8c00;">&nbsp; Catering&nbsp; </span></strong> </span></a></div>
                <div style="line-height: 140%;">
                  &nbsp;</div>
              </div>
              <div style="line-height: 140%;">
                <a href="#" target="_self"><img alt="" src="images/catering.jpg" style="width: 149px; height: 91px; margin-left: 10px; margin-right: 10px; float: left;"></a><span style="line-height: 16.8px;">30 Jan - 3, Feb</span><span style="line-height: 16.8px;">, 2017</span>
              </div>
              <div style="line-height: 140%;">
                <p>
                  <strong style="line-height: 16.8px;">F</strong><strong style="line-height: 16.8px;">e</strong><strong style="line-height: 16.8px;">e:</strong><span style="line-height: 16.8px;">&nbsp;N10, 500</span></p>
                <p>
                  <span style="line-height: 16.8px;"><span style="font-size:20px;"><span style="font-size:12px;"><em><span style="font-size:12px;">I<em>ncludes training manual &amp; materials</em></span></em></span></span></span></p>
              </div>
              <!-- end of second line -->
            
              <!-- third line -->

              <div style="line-height:140%;">
                <div style="line-height: 140%;">
                  &nbsp;
                </div>
                <div style="line-height: 140%;">
                  <a href="#" target="_self"><span style="font-size:16px;"><strong><span style="color:#ff8c00;">&nbsp; Bead Making&nbsp; </span></strong> </span></a></div>
                <div style="line-height: 140%;">
                  &nbsp;</div>
              </div>
              <div style="line-height: 140%;">
                <a href="#" target="_self"><img alt="" src="images/bead.jpg" style="width: 149px; height: 91px; margin-left: 10px; margin-right: 10px; float: left;"></a><span style="line-height: 16.8px;">30 Jan - 3, Feb</span><span style="line-height: 16.8px;">, 2017</span>
              </div>
              <div style="line-height: 140%;">
                <p>
                  <strong style="line-height: 16.8px;">F</strong><strong style="line-height: 16.8px;">e</strong><strong style="line-height: 16.8px;">e:</strong><span style="line-height: 16.8px;">&nbsp;N10, 500</span></p>
                <p>
                  <span style="line-height: 16.8px;"><span style="font-size:20px;"><span style="font-size:12px;"><em><span style="font-size:12px;">I<em>ncludes training manual &amp; materials</em></span></em></span></span></span></p>
              </div>
              <!-- end of third line -->
              <!-- click for more -->
              <p style="line-height: 16.8px;">
              &nbsp;
              </p>
              <p style="line-height: 16.8px;">
                &nbsp;
              </p>
              <p style="line-height: 16.8px;">
                <a href="courses.php" target="_self"><em>Click to view our full training calender</em></a></p>
              <p style="line-height: 16.8px;">
                &nbsp;
              </p>
            </div>
            <!-- end of click for more -->
            <!-- end of upcoming calender -->
          </div>
        </div>
        <!-- carousel sliders -->
        <div class="col-md-8">
          <div class="">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">

                <div class="item active">
                  <img src="images/hom1.jpg" alt="tunnel" width="320" height="120">
                  <div class="carousel-caption">
                    <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                  </div>
                </div>

                <div class="item">
                  <img src="images/hom2.jpg" alt="tunnel" width="320" height="120">
                  <div class="carousel-caption">
                    <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                  </div>
                </div>
              
                <div class="item">
                  <img src="images/hom3.jpg" alt="bag" width="320" height="120">
                  <div class="carousel-caption">
                    <p>Beatiful flowers in Kolymbari, Crete.</p>
                  </div>
                </div>

                <div class="item">
                  <img src="images/hom4.jpg" alt="Taloring" width="320" height="120">
                  <div class="carousel-caption">
                    <p>Beatiful flowers in Kolymbari, Crete.</p>
                  </div>
                </div>

                <div class="item">
                  <img src="images/hom5.jpg" alt="Taloring" width="320" height="120">
                  <div class="carousel-caption">
                    <p>Beatiful flowers in Kolymbari, Crete.</p>
                  </div>
                </div>

                <div class="item">
                  <img src="images/hom6.jpg" alt="Taloring" width="320" height="120">
                  <div class="carousel-caption">
                    <p>Beatiful flowers in Kolymbari, Crete.</p>
                  </div>
                </div>
            
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div><br><br>
          <!-- End of slider carousel -->
          <div class="row">
            <div class="col-md-4">
              <div class="profile-sidebar">
                
              </div>              
            </div>

            <div class="col-md-4">
              <div class="profile-sidebar">
                
              </div>              
            </div>

            <div class="col-md-4">
              <div class="profile-sidebar">
                
              </div>              
            </div>

          </div>
        </div>
      </div>
    </div>


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
<?php ob_end_flush(); ?>