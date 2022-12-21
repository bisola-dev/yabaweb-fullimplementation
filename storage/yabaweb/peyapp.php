<?php
session_start();
$sesmail = $_SESSION['usemail'];
$sesfulln = $_SESSION['fulln'];


include_once "connection.php";
                           

if (isset($_POST['submit'])){
   $sesion = mysqli_real_escape_string($conn, $_POST['sesion']);
   $closindate = mysqli_real_escape_string($conn, $_POST['closindate']);
   $fee = mysqli_real_escape_string($conn, $_POST['fee']);

   echo $sesion.''.$closindate.''.$fee;

   $boom = mysqli_query($conn, "SELECT * FROM app WHERE sesion = '$sesion'");
   $baba = mysqli_num_rows($boom);
   

   if($sesion == ""  || $closindate == "" || $fee == "") {
      $reportalert = '<script type="text/javascript">
        alert("PLease fill all the fields correctly to proceed.");
        window.location.href="peyapp.php";
                 </script>';
  }

else if (strlen($sesion) > 12){
          $reportalert='<script type="text/javascript">
        alert("The session is incorrect, please retry.");
         window.location.href="peyapp.php";
        </script>';

       } 
    

  else if ($baba > 0){ 
// do not insert
         $reportalert = "<script type ='text/javascript'>
          alert('this session already exist');
          window.location.href='peyapp.php';
             </script>";
  
} 

  else{
        $iroko = "INSERT INTO app (sesion, closindate, fee ) VALUES ('$sesion','$closindate','$fee')";

     
if (mysqli_query($conn, $iroko)) {

     $reportalert='<script type="text/javascript">
        alert("The account was successfully created")
        window.location.href="peyapp.php";
        </script>';

          }

           else{
       $reportalert='<script type="text/javascript">
        alert("The account is unsuccessful")
        window.location.href="adminhome.php";
        </script>';

        //header("Location:index.php");
       // $report = "<a href='adminlogin.php'>click here </a> to retry"; 
        }

      }
   }

 

   $ball = mysqli_query($conn, "SELECT * FROM app");

if (!empty($reportalert)){echo $reportalert;}
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
                  
               </div>
               
               </div>
            </nav>
         </header>
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
        <?php require_once("adminsidebar.php") ?>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Application Payment </h1>
                  <small></small>
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
                                
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method = "post" action = "">
                              <div class="form-group">
                                 <label>Academic Session</label>
                                 <input type="text" name="sesion" class="form-control" placeholder="Enter session details" required>
                              </div>
                               
                              <div class="form-group">
                                 <label>Closing Date</label>
                                 <input type="date" name="closindate" class="form-control" placeholder="Enter closing date details" required>
                              </div>
                           
                             <div class="form-group">
                                 <label>Application Fee ₦ </label>
                                 <input type="number" name="fee" class="form-control" placeholder="Enter Application fee details" required>
                              </div>
                           
                              <div>
                                <button type="submit" name="submit" class="btn btn-warning">Submit</button>                  
                             </div>
                          </form>
                          </div>
                             <br>
                             
                              <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>S/N</th>
                                       <th>Academic Session</th>
                                       <th>Closing Date</th>
                                       <th>Application Fee ₦</th>
                                       <th>Current Session</th>
                                       <th>Edit</th>     
                                    </tr>
                                 </thead>
                                 <tbody>

                                    <?php 
                                    while ($row = mysqli_fetch_assoc($ball)) {
                                        $id = $row['id'];
                                       $acadses = $row['sesion'];
                                       $cdate = $row['closindate'];
                                       $afee = $row['fee'];
                                       $csesion = $row['csesion'];
                                    ?>
                                    <tr>
                                       <th><?php echo $id;?></th>
                                       <th><?php echo $acadses; ?></th>
                                       <th><?php echo $cdate; ?></th>
                                       <th><?php echo $afee; ?></th>
                                       <th><?php echo $csesion; ?></th>
                           <th>
                           <form method="post" action="editpeyapp.php">  
                           <input type="hidden" name="candid" value="<?php echo $id;?>"> 
                           <button type ="submit" name="submit" class="btn btn-primary">EDIT</button>
                           </form>
                           </th>
                           </tr>   
                        </tbody>
                     <?php } ?>
                        
                        </table>
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

