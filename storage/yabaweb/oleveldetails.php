<?php 
session_start();
   
 $sesmail = $_SESSION['emal'];
$sesfulln = $_SESSION['fulln'];

include_once "connection.php";


date_default_timezone_set('Africa/Lagos');
$dreg= date('M j, Y h:i a', time());

$dkode=rand(10000, 99999);

//echo $dkode;

if (isset($_POST['submit'])){
   //mysqli_real_escape_string($con,$_POST["pass1"]);
      $sitting = trim(strip_tags($_POST['sit']));
      $examtype1 = trim(strip_tags($_POST['examtype1']));
      $examtype2 = trim(strip_tags($_POST['examtype2']));
      $examsesion1 = trim(strip_tags($_POST['examsesion1']));
      $examsesion2 = trim(strip_tags($_POST['examsesion2']));
      $examnum1 = trim(strip_tags($_POST['examnum1']));
      $examnum2 = trim(strip_tags($_POST['examnum2']));
      $examyea1 =trim(strip_tags($_POST['examyea1']));
      $examyea2 =trim(strip_tags($_POST['examyea2']));
      $subject1 = trim(strip_tags($_POST['subject1']));
      $grading1 = trim(strip_tags($_POST['grading1']));
      $subject2 = trim(strip_tags($_POST['subject2']));
      $grading2 = trim(strip_tags($_POST['grading2']));
      $subject3 = trim(strip_tags($_POST['subject3']));
      $grading3 = trim(strip_tags($_POST['grading3']));
      $subject4 = trim(strip_tags($_POST['subject4']));
      $grading4 = trim(strip_tags($_POST['grading4']));
      $subject5 = trim(strip_tags($_POST['subject5']));
      $grading5 = trim(strip_tags($_POST['grading5']));
      $subject6 = trim(strip_tags($_POST['subject6']));
      $grading6 = trim(strip_tags($_POST['grading6']));
      $subject7 = trim(strip_tags($_POST['subject7']));
      $grading7 = trim(strip_tags($_POST['grading7']));
      $subject8 = trim(strip_tags($_POST['subject8']));
      $grading8 = trim(strip_tags($_POST['grading8']));
      $subject9 = trim(strip_tags($_POST['subject9']));
      $grading9 = trim(strip_tags($_POST['grading9']));

   if($sitting == "" || $examnum1 == "" || $examyea1== "" ||$examtype1 == ""|| $subject1== "" || $grading1== ""|| $subject2 == ""|| $grading2== ""||$subject3== "" || $grading3== ""||$subject4== "" || $grading4== ""||$subject5 == "" || $grading5 == ""){
   
  $reportalert="<script type ='text/javascript'>
  alert('please do not submit empty form.')
  window.location.href='olevelreg1.php';
  </script>";

   }else {         

      $lintin = mysqli_query($conn, "INSERT INTO examdetails (sittings, examtype1, examtype2, examsesion1, examsesion2, examyea1, examyea2, examnum1, examnum2, dreg, aplikantmail, fullname) VALUES('$sitting','$examtype1','$examtype2', '$examsesion1', '$examsesion2', '$examyea1', '$examyea2', '$examnum1', '$examnum2','$dreg','$sesmail', '$sesfulln')");

         
  $new = mysqli_query($conn, "SELECT * FROM subgrade WHERE aplikantmail ='$sesmail'");
 while ($row=mysqli_fetch_assoc($new)) {
    $resultid = $row['id'];
}
     
                       
                            
 $newme = mysqli_query($conn, "INSERT INTO subgrade (resultid,subject1,gradn1,subject2,gradn2,subject3,gradn3, subject4,gradn4,subject5,gradn5,subject6,gradn6,subject7,gradn7,subject8,gradn8,subject9,gradn9) VALUES ('$resultid', '$subject1','$grading1', '$subject2','$grading2','$subject3','$grading3','$subject4','$grading4','$subject5','$grading5', '$subject6','$grading6', '$subject7','$grading7', '$subject8','$grading8', '$subject9','$grading9')");

 //VALUES('$plicantid','$subject1','$grading1')");

  $reportalert="<script type ='text/javascript'>
                      alert('data submitted successfully');
                      window.location.href='oleveldetails.php';
                         </script>"; 
               }
            }
         
      



      
?>

<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRM Admin Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
   <!--preloader-->
     <?php if (!empty( $reportalert)){echo $reportalert;}  ?> 
      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="index-2.html" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="assets/dist/img/mini-logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="assets/dist/img/logo.png" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
               <a href="#search"><span class="pe-7s-search"></span></a>
               <div id="search">
                  <button type="button" class="close">×</button>
                  <form>
                     <input type="search" value="" placeholder="Search.." />
                     <button type="submit" class="btn btn-add">Search...</button>
                  </form>
               </div>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- Orders -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown"> 
                        <i class="pe-7s-cart"></i>
                        <span class="label label-primary">5</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li >
                                    <!-- start Orders -->
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/basketball-jersey.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>polo shirt</h4>
                                       <p><strong>total item:</strong> 21
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/shirt.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Kits</h4>
                                       <p><strong>total item:</strong> 11
                                       </p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/football.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Football</h4>
                                       <p><strong>total item:</strong> 16
                                       </p>
                                    </a>
                                 </li>
                                 <li class="nav-list">
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/shoe.png" class="img-thumbnail" alt="User Image">
                                       </div>
                                       <h4>Sports sheos</h4>
                                       <p><strong>total item:</strong> 10
                                       </p>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Messages -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <!-- start message -->
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Ronaldo</h4>
                                       <p>Please oreder 10 pices of kits..</p>
                                       <span class="badge badge-success badge-massege"><small>15 hours ago</small>
                                       </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Leo messi</h4>
                                       <p>Please oreder 10 pices of Sheos..</p>
                                       <span class="badge badge-info badge-massege"><small>6 days ago</small>
                                       </span>   
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left" >
                                          <img src="assets/dist/img/avatar3.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Modric</h4>
                                       <p>Please oreder 6 pices of bats..</p>
                                       <span class="badge badge-info badge-massege"><small>1 hour ago</small>
                                       </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar4.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Salman</h4>
                                       <p>Hello i want 4 uefa footballs</p>
                                       <span class="badge badge-danger badge-massege">
                                       <small>6 days ago</small>
                                       </span>  
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="border-gray">
                                       <div class="pull-left">
                                          <img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                                       </div>
                                       <h4>Sergio Ramos</h4>
                                       <p>Hello i want 9 uefa footballs</p>
                                       <span class="badge badge-info badge-massege"><small>5 hours ago</small>
                                       </span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Notifications -->
                     <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-bell"></i>
                        <span class="label label-warning">7</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-green"></i>Change Your font style</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-red"></i>
                                    check the system ststus..</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-yellow"></i>
                                    Add more admin...</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-yellow"></i>
                                    Add more admin...</a>
                                 </li>
                                 <li><a href="#" class="border-gray">
                                    <i class="fa fa-dot-circle-o color-violet"></i> Add more clients and order</a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Tasks -->
                     <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-note2"></i>
                        <span class="label label-danger">6</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-success pull-right">50%</span>
                                       <h3><i class="fa fa-check-circle"></i> Theme color should be change</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-warning pull-right">90%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix Error and bugs</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-danger pull-right">80%</span>
                                       <h3><i class="fa fa-check-circle"></i> Sidebar color change</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#" class="border-gray">
                                       <span class="label label-info pull-right">30%</span>   
                                       <h3><i class="fa fa-check-circle"></i> font-family should be change</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <!-- Task item -->
                                    <a href="#"  class="border-gray">
                                       <span class="label label-success pull-right">60%</span>
                                       <h3><i class="fa fa-check-circle"></i> Fix the database Error</h3>
                                    </a>
                                 </li>
                                 <li>
                                    <!-- Task item -->
                                    <a href="#"  class="border-gray">
                                       <span class="label label-info pull-right">20%</span>
                                       <h3><i class="fa fa-check-circle"></i> data table data missing</h3>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <!-- Help -->
                     <li class="dropdown dropdown-help hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-settings"></i></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.html">
                              <i class="fa fa-line-chart"></i> Networking</a>
                           </li>
                           <li><a href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a></li>
                           <li><a href="#"><i class="fa fa-bar-chart"></i> Settings</a></li>
                           <li><a href="login.html">
                              <i class="fa fa-wifi"></i> wifi</a>
                           </li>
                        </ul>
                     </li>
                     <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/dist/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="profile.html">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li>
                           <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li>
                           <li><a href="login.html">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
       <?php require_once("sidebar.php"); ?> 
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>O level Registration</h1>
                  <small><?php echo $sesfulln;?>, Please carefully fill the correct details</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="clist.html">
                              <i></i><?php echo $sesfulln; ?>, Please carefully fill the correct details </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="">
                              <div class="form-group">
                                 <label>Number of sittings</label>
                                 <select class="form-control" name="sit" required="sit">
                                    <option value="">Click to select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                 </select>
                              </div>
                              <div class="form-group col-lg-6">
                                   <label>Exam Type1</label>
                                 <select type="text" name="examtype1" class="form-control" required="examtype1">
                                    <option value="select">Click to select</option>
                                    <option value="WAEC">WASSCE</option>
                                    <option value="NECO">NECO</option>
                                    <option value="NABTEB">NABTEB</option>
                                 </select>
                                  </div> 
                                  <div class="form-group col-lg-6">
                                   <label>Exam Type2</label>
                                 <select type="text" name="examtype2" class="form-control">
                                    <option value="nil">Click to select</option>
                                    <option value="WAEC">WASSCE</option>
                                    <option value="NECO">NECO</option>
                                    <option value="NABTEB">NABTEB</option>
                                 </select>
                                  </div> 
                                  <div class="form-group col-lg-6">
                                   <label>Exam session/month1</label>
                                 <select type="text" name="examsesion1" class="form-control">
                                    <option value="select">Click to select</option>
                                    <option value="May/June">May/June</option>
                                    <option value="Oct/Nov">Oct/Nov</option>
                                    <option value="Sept/Oct">Sept/Oct</option>
                                 </select>
                                  </div> 
                                  <div class="form-group col-lg-6">
                                   <label>Exam session/month2</label>
                                 <select type="text" name="examsesion2" class="form-control">
                                    <option value="nil">Click to select</option>
                                    <option value="May/June">May/June</option>
                                    <option value="Oct/Nov">Oct/Nov</option>
                                    <option value="Sept/Oct">Sept/Oct</option>
                                 </select>
                                  </div> 
                                  <div class="form-group col-lg-6">
                                    <label>Exam Year1</label>
                                 <select type="text" name="examyea1" class="form-control">
                                    <option value="select">Click to select</option>
                                    <?php 
                                       $reggy = mysqli_query($conn,"SELECT * FROM exam_year");
                                      while ($row=mysqli_fetch_assoc($reggy)) {
                                      $regit = $row['year'];

                                     ?>
                                    <option value="<?php echo $regit; ?>"><?php echo $regit; ?></option>
                                    <?php } ?>
                                 </select> 
                                  </div> 
                                  <div class="form-group col-lg-6">
                                    <label>Exam Year2</label>
                                 <select type="text" name="examyea2" class="form-control">
                                    <option value="nil">Click to select</option>
                                    <?php 
                                       $reggy = mysqli_query($conn,"SELECT * FROM exam_year");
                                      while ($row=mysqli_fetch_assoc($reggy)) {
                                      $regit = $row['year'];

                                     ?>
                                    <option value="<?php echo $regit; ?>"><?php echo $regit; ?></option>
                                    <?php } ?>
                                 </select> 
                                  </div> 
                                  <div class="form-group col-lg-6">
                                   <label>Exam Registration number1</label>
                                 <input type="text" class="form-control" name="examnum1" placeholder="Enter registration number" >
                                  </div> 
                                  <div class="form-group col-lg-6">
                                   <label>Exam Registration number2</label>
                                 <input type="text" class="form-control" name="examnum2" placeholder="Enter registration number" >
                                  </div> 
                                  <br> <br> 

                              <div class="header-title">
                                <h4 align="center"><b> Select your Subjects and Grades</b></h4>
                               </div>

                              <div class="row">
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject1" class="form-control">
                                     <option value="select">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading1" class="form-control">
                                    <option value="select">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject2" class="form-control">
                                     <option value="select">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading2" class="form-control">
                                    <option value="select">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject3" class="form-control">
                                     <option value="select">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading3" class="form-control">
                                    <option value="select">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject4" class="form-control">
                                     <option value="select">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading4" class="form-control">
                                    <option value="select">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject5" class="form-control">
                                     <option value="select">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading5" class="form-control">
                                    <option value="select">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject6" class="form-control">
                                     <option value="select">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading6" class="form-control">
                                    <option value="nil">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject7" class="form-control">
                                     <option value="nil">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading7" class="form-control">
                                    <option value="nil">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject8" class="form-control">
                                     <option value="nil">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading8" class="form-control">
                                    <option value="nil">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Subject</label>
                                    <select type="text" name="subject9" class="form-control">
                                     <option value="nil">Click to select</option>
                                    <?php 
                                     $subjek = mysqli_query($conn,"SELECT * FROM subject");
                                      while ($row=mysqli_fetch_assoc($subjek)) {
                                      $sub = $row['subjects'];                                                      
                                     ?> 
                                    <option value="<?php echo $sub; ?>"><?php echo $sub ?></option>
                                    <?php } ?>
                                  </select>
                                 </div> 
                                <div class="form-group col-lg-6">
                                 <label>Grade</label>
                                 <select type="text" name="grading9" class="form-control">
                                    <option value="nil">Click to select</option>
                                    <?php 
                                       $gradey=mysqli_query($conn, "SELECT * FROM grade");
                                       while ($mam = mysqli_fetch_assoc($gradey)) {
                                          $funmy= $mam['grades'];
                                     ?>
                                    <option value="<?php echo $funmy; ?>"><?php echo $funmy; ?></option>
                                 <?php } ?>
                                 </select>
                                 </div>
                                    <br/> <br/>
                               <div>
                              <button type="submit" name="submit" class="btn btn-warning">SUBMIT</button>    
                               </div>
                           </form>
                        </div>
                        <?php  
                        /* <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-borderedtable-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>S/N</th>
                                       <th>EXAMTYPE</th>
                                       <th>EXAMNO</th>
                                       <th>EXAMYEAR</th>
                                       <th>SUBJECT</th>
                                       <th>GRADE</th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>
                                      <?php 

                                     $count = 1;
                                     $daddy = mysqli_query($conn, "SELECT * FROM examdetails WHERE aplikantid='$sesmail'");
                                    while ($row = mysqli_fetch_assoc($daddy)) {
                                       $id = $row['id'];
                                       $examtype=$row['examtype'];
                                       $examyear=$row['examyear'];
                                       $examnum=$row['examnum'];
                                       $subject = $row['subject'];
                                       $grade = $row['gradn'];
                                    ?>
                                    <tr>
                                       <td><?php echo $count;?></td>
                                       <td><?php echo $examtype;?></td>
                                       <td><?php echo $examyear;?></td>
                                       <td><?php echo $examnum;?></td>
                                       <td><?php echo $subject;?></td>
                                       <td><?php echo $grade;?></td>
                                          
                                       <td><form method="POST" action="" >
                            <input type="hidden"  value= "<?php echo $id;?>" name="otherid">
                              <p><input type="submit" name="edit" value="Edit"> </p>
 
                                     </form></td>
                                    </tr>
                                    <?php $count++;} ?>
                                 </tbody>
                              </table>
                               </div> */
                               ?>             
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
   </body>

<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
</html>

