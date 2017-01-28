<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'Course-outline | PECULIAR CONCEPTS INTERNATIONAL';
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
      /*css for scrollspy*/
      .bod {
      position: relative;
      }
      ul.nav-pills {
      
      position: fixed;
      }
      div.col-sm-9 div {
          height: auto;
          font-size: 18px;
      }
      #section1 ,#section6 {color: #fff; background-color: #1E88E5; padding-left: 10px; padding-top: 10px;}
      #section2 ,#section7 {color: #fff; background-color: #673ab7; padding-left: 10px; padding-top: 10px;}
      #section3 ,#section8 {color: #fff; background-color: #ff9800; padding-left: 10px; padding-top: 10px;}
      #section4 ,#section9 {color: #fff; background-color: #00bcd4; padding-left: 10px; padding-top: 10px;}
      #section5 ,#section10 {color: #fff; background-color: #009688; padding-left: 10px; padding-top: 10px;}
      
      @media screen and (max-width: 510px) {
        #section1, #section2, #section3, #section4, #section5, #section6, #section7, #section8, #section9, #section10  {
          margin-left: 50px;
        }
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
              <li class="dropdown active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill and Aquisition<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses.php" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#" data-toggle="tooltip" data-placement='bottom' title="Course Outline">Course Outline</a></li>
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
              <li class="dropdown" style="background: rgb(233, 239, 236) none repeat scroll 0% 0%;"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Skill and Acquisition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="courses.php" data-toggle="tooltip" data-placement='bottom' title="Courses"><span class="glyphicon glyphicon-book"></span> Courses</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="active" ><a href="#" data-toggle="tooltip" data-placement='bottom' title="Course Outline">Course Outline</a></li>
                </ul>
              </li>
              <li><a href="contact-us.php">Contact Us</a></li>
              <!-- <li><a href="#">Skin Care</a></li>
              <li><a href="#">Taloring</a></li>
              <li><a href="#">Hat Making</a></li>
              <li><a href="#">Catering</a></li>
              <li><a href="#">Events Management And Decoration</a></li> -->
            </ul></nav>
          </div>
        </div>
        <!-- course outline -->
        <div class="col-md-9">
          <div class="col-md-12">
            <div class="well">
              <div class="bod" data-spy="scroll" data-target="#myScrollspy" data-offset="20">
                <div class="">
                  <div class="row">
                    <nav class="col-sm-4" id="myScrollspy">
                      <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#section1" data-toggle="tooltip" data-placement='bottom' title="Bridal Makeover">Bridal Makeover</a></li>
                        <li><a href="#section2" data-toggle="tooltip" data-placement='bottom' title="Ankara Craft">Ankara Craft</a></li>
                        <li><a href="#section3" data-toggle="tooltip" data-placement='bottom' title="Soap Making">Soap Making</a></li>
                        <li><a href="#section4" data-toggle="tooltip" data-placement='bottom' title="Bead Making">Bead Making</a></li>
                        <li><a href="#section5" data-toggle="tooltip" data-placement='bottom' title="Paint Production">Paint Production</a></li>
                        <li><a href="#section6" data-toggle="tooltip" data-placement='bottom' title="Skin Care">Skin Care</a></li>
                        <li><a href="#section7" data-toggle="tooltip" data-placement='bottom' title="Tailoring">Tailoring</a></li>
                        <li><a href="#section8" data-toggle="tooltip" data-placement='bottom' title="Hat Making">Hat Making</a></li>
                        <li><a href="#section9" data-toggle="tooltip" data-placement='bottom' title="Catering">Catering</a></li>
                        <li><a href="#section10" data-toggle="tooltip" data-placement='bottom' title="Events">Events Management And Decoration</a></li>
                        <!-- <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#section41">Section 4-1</a></li>
                            <li><a href="#section42">Section 4-2</a></li>                     
                          </ul>
                        </li> -->
                      </ul>
                    </nav>
                    <div class="col-sm-8">
                    <!-- first section -->
                      <div id="section1">    
                        <h1><u>Bridal Makeover</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Prepping of the face</p>
                          <p>⦁ Making eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Eyebrow shaping and drawing<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Applying of gel, liquid and kohl eyeliners
                          </p>
                          <p>⦁ Creative classics<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Modern Smokey eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Mineral makeup<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Bridal makeup
                          </p>
                          <p>⦁ Perfecting and sculpting the face<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Understanding skin tones<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Highlighting and contouring<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Application of foundation, powders and concealer
                          </p>
                          <p>⦁ Lipstick application</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of first section -->

                      <!-- second section -->
                      <div id="section2">    
                        <h1><u>Ankara Craft</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Bags<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Clutch bag<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Tote bag<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Purse
                          </p>
                          <p>⦁ Accessories<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Bangles<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Earring<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Belt<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Note Pad
                          </p>
                          <p>⦁ Shoes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Slippers<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Cover Shoe<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Making of Heels
                          </p>
                          <br>
                        </div>
                      </div>
                      <!-- end of second section -->

                      <!-- third section -->
                      <div id="section3">    
                        <h1><u>Soap Making</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Making of Liquid soap</p>
                          <p>⦁ Making of Shampoo</p>
                          <p>⦁ Making of Izal</p>
                          <p>⦁ Making of Bleach</p>
                          <p>⦁ Making of Air freshener</p>
                          <p>⦁ Making of Antiseptic</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of third section -->

                      <!-- fourth section -->
                      <div id="section4">    
                        <h1><u>Bead Making</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Mat making</p>
                          <p>⦁ Pineapple spiral</p>
                          <p>⦁ Abuja connection</p>
                          <p>⦁ Wirework and lots more</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of fourth section -->

                      <!-- fifth section -->
                      <div id="section5">    
                        <h1><u>Paint Production</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Text coat</p>
                          <p>⦁ Emulsion</p>
                          <p>⦁ Chalk making</p>
                          <p>⦁ Oil paint e.t.c</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of fifth section -->

                      <!-- sixth section -->
                      <div id="section6">    
                        <h1><u>Organic Skin Care</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Whitening cream</p>
                          <p>⦁ Half caste cream and soap</p>
                          <p>⦁ Egyptian milk face cream</p>
                          <p>⦁ Snow white cream</p>
                          <p>⦁ Moroccan soap</p>
                          <p>⦁ Whitening soap</p>
                          <p>⦁ Hot chocolate cream</p>
                          <p>⦁ Half caste oil</p>
                          <p>⦁ Knuckles remover</p>
                          <p>⦁ Sun burn cream</p>
                          <p>⦁ Facial cleanser e.t.c</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of sixth section -->

                      <!-- seventh section -->
                      <div id="section7">    
                        <h1><u>Tailoring</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Prepping of the face</p>
                          <p>⦁ Making eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Eyebrow shaping and drawing<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Applying of gel, liquid and kohl eyeliners
                          </p>
                          <p>⦁ Creative classics<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Modern Smokey eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Mineral makeup<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Bridal makeup
                          </p>
                          <p>⦁ Perfecting and sculpting the face<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Understanding skin tones<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Highlighting and contouring<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Application of foundation, powders and concealer
                          </p>
                          <p>⦁ Lipstick application</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of seventh section -->

                      <!-- eighth section -->
                      <div id="section8">    
                        <h1><u>Hat Making</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Prepping of the face</p>
                          <p>⦁ Making eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Eyebrow shaping and drawing<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Applying of gel, liquid and kohl eyeliners
                          </p>
                          <p>⦁ Creative classics<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Modern Smokey eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Mineral makeup<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Bridal makeup
                          </p>
                          <p>⦁ Perfecting and sculpting the face<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Understanding skin tones<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Highlighting and contouring<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Application of foundation, powders and concealer
                          </p>
                          <p>⦁ Lipstick application</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of eighth section -->

                      <!-- ninth section -->
                      <div id="section9">    
                        <h1><u>Catering</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Snacks making<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Meat Pie<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Buns<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Puff Puff<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Sausage Roll
                          </p>
                          <p>⦁ Cake  making</p>
                          <p>⦁ Sugar craft and many more</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of ninth section -->

                      <!-- tenth section -->
                      <div id="section10">    
                        <h1><u>Events Management And Decoration</u></h1>
                        <div style="margin-left: 20px; margin-bottom: 20px;">
                          <p>⦁ Prepping of the face</p>
                          <p>⦁ Making eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Eyebrow shaping and drawing<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Applying of gel, liquid and kohl eyeliners
                          </p>
                          <p>⦁ Creative classics<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Modern Smokey eyes<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Mineral makeup<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Bridal makeup
                          </p>
                          <p>⦁ Perfecting and sculpting the face<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Understanding skin tones<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Highlighting and contouring<br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;- </span>Application of foundation, powders and concealer
                          </p>
                          <p>⦁ Lipstick application</p>
                          <br>
                        </div>
                      </div>
                      <!-- end of tenth section -->

                    </div>
                  </div>
                </div>
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
<?php ob_end_flush() ?>