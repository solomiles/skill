<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'Admin | PECULIAR CONCEPTS INTERNATIONAL';
  $saved = "";
  $error = false;
  $today_date = date('D, M Y');
 // if session is not set this will redirect to login page
 if($_SESSION['admin']=="" ) {
  header("Location: pci-admin.php");
 } else {
    $now = time();
    if ($now > $_SESSION['expire']) {
      session_destroy();
      header('Location: pci-admin.php');
    }
    else {
      function db_query($query){ 
   $connection = db_connect();
   $result = mysqli_query($connection,$query);
    return $result;
  }  
// select loggedin users detail
    $id = $_SESSION['admin'];

    // $courses = '1';
    // $result = db_query("SELECT * FROM courses WHERE name = '$id'");

    // $row = mysqli_fetch_array($result);

    
    }
  }
  #code to fetch users
  $rest = db_query("SELECT * FROM users ");
  $result = db_query("SELECT * FROM courses");
  

  if (isset($_POST['btn-send'])) {
      # code...
      $courses = trim($_POST['courses']);
      $courses = strip_tags($courses);
      $courses = htmlspecialchars($courses);

      $amount = trim($_POST['amount']);
      $amount = strip_tags($amount);
      $amount = htmlspecialchars($amount);

      $date = trim($_POST['date']);
      $date = strip_tags($date);
      $date = htmlspecialchars($date);

      if (empty($courses)) {
       $error = true;
       $saved = "Please select a course.";
      } 

      elseif (empty($amount)) {
       $error = true;
       $saved = "Please set amount.";
      } 

      elseif (empty($date)) {
       $error = true;
       $saved = "Please set date.";
      } 
      else {
      $result = db_query("UPDATE courses SET Name = '$courses', Amount = '$amount', Dates = '$date' WHERE Name = '$courses'");
      // ("INSERT INTO courses(Name,Amount,Dates) VALUES('$courses','$amount','$date')");

      // $row = mysqli_fetch_array($result);

      // echo $row;
      // exit();

      if ($result == 1) {
        # code...
        $saved = 'Courses Set Successful';
      } else {

        $saved = 'Courses Set Unsuccessful';
      }

    }
  }

    if(isset($_POST['Submit'])){
        // $id = $_SESSION['admin'];
        $name = $_FILES["image"] ["name"];

        $type = $_FILES["image"] ["type"];
        $size = $_FILES["image"] ["size"];
        $temp = $_FILES["image"] ["tmp_name"];
        $error = $_FILES["image"] ["error"];
        $path = 'images/sliders/'. $name;


       

        if (!$name){
          $saved = "Error uploading file! No file selected.Please Select a file";
        }else{
            if($size > 100000) //conditions for the file
            {
              $saved = "Format is not allowed or file size is too big!";
            }
            else
            {
            move_uploaded_file($temp, $path);

            $result =  db_query("INSERT INTO slider(image) VALUES ('$name') ");

            if ($result === true) {
              # code...
              $saved = 'saved Successfully';
            } else{

              $saved = 'Unsuccessful';
            }

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
    <!-- css for data table -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" >
    <!-- css for file upload -->
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" >
    <!-- css for date picker -->
    <link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" >
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" >
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
              <li class=""><a href="#" data-toggle="tooltip" data-placement='bottom' title="Contact Us">Contact Us</a></li>              
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
      <div class="">

        <!-- contact form -->
        <div class="col-md-12 col-sm-12">
          <div class="col-md-12">
            <div class="well">
              <h3>Peculiar Concepts ADMIN Page</h3>
              <div class="alert alert-danger alert-dismissable">WARNING!!! Please Make Sure You Understand What you Are About To Do <?php echo $saved; ?></div><hr>
                <div class="row"> <!-- start of to edit courses -->
                  <div class="col-md-6 col-sm-6">  
                    <div class="">
                      <h5><strong>Edit Courses</strong></h5>
                    </div><br>
                    <p class="alert-success"><?php echo $saved; ?></p>
                    
                    <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="upload" method="post">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Select Course:</label>
                        <div class="col-lg-9">
                          <select name="courses" class="form-control" placeholder="Select course" >
                            <option></option>
                            <?php while ( $row = mysqli_fetch_array($result)) {
                              # code...
                            echo "
                            <option>{$row['Name']}</option>
                            \n";
                          }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Set amount:</label>
                        <div class="col-lg-9">
                          <input class="form-control" type="text" name="amount" placeholder="set amount" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Set Date:</label>
                        <div class="hero-unit col-lg-9 ">
                          <input class="form-control" id="example1" name="date" placeholder="eg: 04,feb - 10,feb 2017" type="text" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                          <button type="submit" name="btn-send" class="btn btn-primary btn-md">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div> <!-- end of edit course -->
                <br>
                <div class="row"> <!-- start of edit upcoming events -->
                  <div class="col-md-6 col-sm-6">
                    <div class="well">
                      <h5><strong>Add Upcoming Events</strong></h5>
                      <p class="alert-warning">photo size of not more than 500kb!!!</p><br>
                      <form enctype='multipart/form-data' role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                          <label class="col-md-6 control-label">Upload posters/fliers :</label>
                          <div class="col-md-6">
                            <!-- <input type="file" class="form-control" name="image"> -->
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                <div>
                                  <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image"></span>
                                  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-6 control-label"></label>
                          <div class="col-md-6">
                            <button type="submit" value="submit" class="btn btn-primary" name="Submit">Upload</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- table to display list of active users -->
                
                  <h3><u>List of registered users and details</u></h3><br>
                  <div class="row">
                    <div class="col-sm-12">
                    <div  class="panel panel-success"> 
                    <!--table to display users -->
                    <div class="panel-heading">
                      DataTable Displaying Users
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-responsive table-hover table-bordered table-striped table-condensed" id="dataTables-example">
                          <thead>
                            <tr>
                              <th>s/n</th>
                              <th>Username</th>
                              <th>Fullname</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>State</th>
                              <th>Country</th>
                              <th>Phone</th>
                              <th>Date Registered</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $count=0;
                              while( $row = mysqli_fetch_array( $rest ) ){ $count++;
                                echo
                                "<tr >
                                  <td>$count</td>
                                  <td>{$row['Username']}</td>
                                  <td>{$row['Name']}</td>
                                  <td>{$row['Email']}</td>
                                  <td>{$row['Gender']}</td>
                                  <td>{$row['Description']}</td>
                                  <td>{$row['Country']}</td>
                                  <td>{$row['Phone']}</td>
                                  <td>{$row['Dateregister']}</td>
                                </tr>\n";
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    </div> <!-- end of table table to users -->
                  </div>
                </div>
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
    <!-- js for file upload -->
    <script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <!-- js for date picker -->
    <script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/daterangepicker/moment.min.js"></script>
    <!-- js for data table -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
       $(document).ready(function () {
           $('#dataTables-example').dataTable();
       });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/friendzone.js"></script>`
    <script type="text/javascript">
      // When the document is ready
    </script>

  </body>
</html>
<?php ob_end_flush() ?>