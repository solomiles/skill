<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'Courses | PECULIAR CONCEPTS INTERNATIONAL';
 // if session is not set this will redirect to login page
 if($_SESSION['user']=="" ) {
  header("Location: index.php");
 }
  function db_query($query){ 
   $connection = db_connect();
   $result = mysqli_query($connection,$query);
    return $result;
  }  
  // select loggedin users detail

    $id = $_SESSION['user'];

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
    </style>
   
  </head>
  <body><div class="container" style="background: rgba(218, 216, 215, 0.78) none repeat scroll 0% 0%; margin-top: 25px;">
    <header>
      <img src="images/skill102.jpg" class="img-rounded img-responsive" height="80" width="">
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
                  <li><a href="about-us.php" data-toggle="tooltip" data-placement='bottom'  title="About Us">About Us</a></li>
                </ul>
              </li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom'  title="Profile">Profile</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom'  title="Tutorials">Tutorials</a></li>
              <li class="active dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill and Aquisition<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
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
    <!-- side bar -->
    <div class="row">
      <div class="col-md-12">
            <!-- Courses -->
        <div class="col-md-3">
          <div class="profile-sidebar">
            <h4 data-toggle="tooltip" data-placement='bottom' title="Courses">Courses</h4><hr>
            <ul class="nav">
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Bridal Makeover">Bridal Makeover</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Ankara Craft">Ankara Craft</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Soap Making">Soap Making</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Bead Making">Bead Making</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Paint Production">Paint Production</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Skin Care">Skin Care</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Tailoring">Tailoring</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Hat Making">Hat Making</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Catering">Catering</a></li>
              <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Events">Events Management And Decoration</a></li>
            </ul>
          </div>
        </div>
        <!-- upcoming events -->
        <div class="col-md-9">
          <div class="profile-sidebar">
            <h4>Upcoming Events</h4><hr>
          </div>
          <!-- first row -->
          <div class="row">

            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/tailoring.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Tailoring</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>
          
          
            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/bridal.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Bridal Makeover</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>

          
            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/bead.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Bead Making</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>

          </div><br>

          <!-- second row -->
          <div class="row">

            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/catering.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Catering</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>
          
          
            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/ankara.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Ankara Craft</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>

          
            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/eventdec.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Events Management</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>
            <!-- end of second row -->
          </div><br>

          <!-- thirh row -->
          <div class="row">

            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/hat.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Hat Making</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>
          
          
            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/skincare.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Skin Care</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>

          
            <div class="col-md-4">
              <div class="profile-sidebar">
                <p><strong><font color="#b22222" size="3"><span class="glyphicon glyphicon-time"></span> 30, Jan - 3, Feb, 2017</font></strong>
                </p>
                <p>
                  <a href="#" target="_self"><img alt="image" src="images/soap.jpg" class="img-rounded" style="width: 240px; height: 124px;"></a>
                </p>
                <p><span style="font-size: 16px;">Course:<span style="color: rgb(178, 34, 34);">Soap Making</span></span>
                </p>
                <p><span style="font-size: 16px;">Amount:</span>
                  <span style="color:#ff8c00;">
                    <strike><span style="font-size: 20px;"><strong>N</strong></span></strike>
                  </span>
                  <span style="font-size: 20px;">
                    <strong><span style="color:#ff8c00;">10,500</span></strong>
                  </span>
                </p>
                <p>
                  <em>
                    <span style="color: rgb(0, 0, 0);">
                      <span style="font-size: 14px;">
                        <strong>Includes training manual, practical materials &amp; certificate</strong>
                      </span>
                    </span>
                  </em>
                </p>
                <p>
                  <button type="button" class="btn btn-info btn-sm">view details</button>
                </p><br>

              </div>
            </div>
            <!-- end of third row -->
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
<?php ob_end_flush() ?>