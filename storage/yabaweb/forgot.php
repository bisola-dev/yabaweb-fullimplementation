<?php 
include_once "connection.php";
session_start();

if (isset($_POST["retrieve"])) {
    $emal = trim(strip_tags($_POST["emal"]));
    $fon = trim(strip_tags($_POST["fon"]));
    $prog = trim(strip_tags($_POST["prog"]));


if ($emal=="" || $fon== "" || $prog== "") { 
   $reportalert="<script type ='text/javascript'>
  alert('Please fill ALL field correctly to continue');
  window.location.href='forgot.php';
  </script>";
  
}

  else {

//sql query to fetch info. of registered user and finds user match.  
$find = mysqli_query($conn, "SELECT * FROM applicants WHERE emal='$emal'");
   // AND fon='$fon' AND prog='$prog'");

while ($row=mysqli_fetch_assoc($find)) {
     $emal_db = $row['emal'];
     $pwd_db = $row['pwd']; 
            

$rows = mysqli_num_rows($find);
if ($rows == 1){

    $reportalert='<script type="text/javascript">
        alert("Retrieve password is successful.")
        </script>';
    $report= "Your password is: " .$pwd_db;
/*
    $message = "Please use this password to login " . $pwd_db;
    $headers = "From : talk2gbepat@gmail.com";
    if(mail($row, $subject, $message, $headers)){
    echo "Your Password has been sent to your email id";
     */
        }
   
        else{
            $reportalert='<script type="text/javascript">
        alert("Failed to retrieve password.")
        window.Location.href="forgot.php";
        </script>';

        //header("Location:index.php");
          }
        }
    }
}



if (!empty($reportalert)){echo $reportalert;}

 ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Forgot Password : BOS Academy</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="back-link">
                <a href="index.php" class="btn btn-add">Back to Home Page</a>  <strong><?php if (!empty($report)){echo $report;} ?></strong>
            </div>
            <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Forgot Password?</h3>
                                <small><strong>Please provide the required details to retrieve your password.</strong></small> 
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="loginForm" novalidate>
                            <div class="form-group">
                                
                                <label class="control-label" for="email">Email Address</label>
                                <input type="text" required="" value="" name="emal" id="email" class="form-control">
                                
                            </div>

                             <div class="form-group">
                                
                                <label class="control-label" for="phone">Phone number</label>
                                <input type="text" required="" value="" name="fon" id="text" class="form-control">
                                
                            </div>

                                 <div class="form-group">
                                 <label>Select Programme</label>
                                 <select class="form-control" name="prog">
                                     <option>Click to select</option>
                                    <option>ND Full Time</option>
                                    <option>ND Part Time</option>
                                    <option>HND Full Time</option>
                                    <option>HND Part Time</option>
                               </select>
                              </div>
 
                            <div>
                              <button type="submit" class="btn btn-danger" name="retrieve">Retrieve password</button>
                                <br />
                                <br />
                                <a href="register.php">Register if you do not have an account yet</a>
                                <br />
                                  <a href="applicant.php">Login to your account</a>
                            </div>
                        </form>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>

<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:07 GMT -->
</html>