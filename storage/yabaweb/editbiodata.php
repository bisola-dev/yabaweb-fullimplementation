<?php
session_start();

$sesmail = $_SESSION['emal'];
$sesfulln = $_SESSION['fulln'];


include_once "connection.php";

if (isset($_POST['submit'])){
 
   $fon = trim(strip_tags($_POST['fone']));
   $fulln = trim(strip_tags($_POST['ful']));
   $pwd = trim(strip_tags($_POST['paswd']));
   $rpwd = trim(strip_tags($_POST['rpwd']));
   $prog = trim(strip_tags($_POST['progr']));
   $course= trim(strip_tags($_POST['cours'])); 
   //$mkode = trim(strip_tags($_POST['mkode']));
   //$statuz = trim(strip_tags($_POST['statuz']));
  // $pix=trim(strip_tags($_POST['pix']));

   $hpwd=md5($pwd);



 if ((strlen($fon) < 11) || (!(is_numeric ($fon))) ){
         $reportalert='<script type="text/javascript">
        alert("The phone number is invalid, please retry.");
          window.location.href="editbiodata.php";
        </script>';

         } 

  else if(strlen($pwd)<6){
         $reportalert='<script type="text/javascript">
        alert("The password provided is less than five characters, please make sure your password is more than five characters.");
        window.location.href="editbiodata.php";
        </script>';
        
     }

     else { 
 

 $new = "UPDATE applicants SET fulln='$fulln', fon='$fon', pwd='$pwd', hpwd='$hpwd', prog='$prog',course='$course', WHERE emal ='$sesmail'"; 
 
if (mysqli_query($conn, $new)) {
  $reportalert='<script type="text/javascript">
        alert("Details successfully edited and saved.");
        window.location.href="home.php";
        </script>';
     }
  }
}

$sql = mysqli_query($conn, "SELECT * FROM applicants  where emal='$sesmail'");
while ($row=mysqli_fetch_assoc($sql)) {
      $fulln2 = $row['fulln'];
      $emal2 =$row['emal'];
      $fon2= $row['fon'];
      $pwd2 = $row['pwd'];
      $hpwd2=$row['hpwd'];
      $prog2 = $row['prog'];
      $course2 = $row['course'];
     // $dreg2 =$row['dreg'];
      //$pix2 = $row['pix'];
      //$statuz2=$row['statuz'];
     
               
   }


   if (!empty( $reportalert)){echo $reportalert;}

?>


<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>EDIT APPLICANTS DETAILS.
      </title>
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
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>

   <body class="hold-transition sidebar-mini">
   <!--preloader-->
     
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
                       
                 <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="imagez/<?php echo $pix ?>" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="viewprofile.php">
                              <i class="fa fa-user"></i> User Profile</a>
                           </li>
                           <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li>
                           <li><a href="logoutapplicant.php">
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
         <aside class="main-sidebar">
            <!-- sidebar -->
            
             <?php require_once("sidebar.php") ?>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
       
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1> Welcome, <?php echo $fulln2;?></h1>
                  <small>Please edit your biodata</small>
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
                              <a class="btn btn-add " href="profile.php"> 
                              <i class="fa fa-list"></i>  View Profile </a>  
                           </div>
                        </div>

                        <div class="panel-body">
                           <form action="" method="post" enctype="multipart/form-data">                              
                             <div class="form-group ">
                                    <label>Fullname</label>
                                    <input type="text" value="<?php echo $fulln2 ?>" id="username" class="form-control" name="ful">
                    
                                </div>

                                <div class="form-group ">
                                    <label>Email</label>
                                    <input type="text" value="<?php echo $emal2 ?>" id="email" class="form-control" name="emal" disabled>
                                  
                                </div>

                                 <div class="form-group ">
                                    <label>phone</label>
                                    <input type="text" value="<?php echo $fon2 ?>" id="phone no" class="form-control" name="fone">
                                  
                                </div>

                                 <div class="form-group" >
                                    <label>Course</label> <?php echo 'You selected'.' '.$course2;?> <br>
                                    <select class="form-control" name="cours">
                                    <option value="<?php echo $course2;?>"><?php echo $course2;?></option>  
                                     <?php 
                                     $queryt = mysqli_query($conn,"SELECT * FROM courses");
                                      while ($row=mysqli_fetch_assoc($queryt)) {
                                      $cuss = $row['courses'];                 
                                         ?>
                                    <option value="<?php echo $cuss;?>"><?php echo $cuss;?></option> 
                                      <?php } ?>
   
                                  </select>
                                      
                                  </div>

                                 <div class="form-group">
                                 <label>Select program</label> <?php echo 'You selected'.' '.$prog2;?> 
                                 <select class="form-control" name="progr">
                                     <option value="<?php echo $prog2;?>"><?php echo $prog2;?></option>
                                    <option value="ND full time">ND full time</option>
                                    <option value="ND part time">ND part time</option>
                                    <option value="HND full time">HND full time</option>
                                    <option value="HND part time">HND part time</option>
                                    
                                </select>
                              </div>

                                <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="text" title="Please enter your password" placeholder="******" required="" value="<?php echo $pwd2 ?>" name="paswd" id="password" class="form-control">
                               
                            </div>

                            <div>
                                <button type="submit" name="submit" class="btn btn-warning">UPDATE</button>

                                <br />
                                <br />
                                  
                            </div>
                           </form>
                        </div>
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

