<?php 
session_start();
include_once "connection.php";

if (isset($_POST['submit'])){
    $usemail = trim(strip_tags($_POST['usemail']));
    $hash = trim(strip_tags($_POST["hash"]));

    $hpwd = md5($hash);

    if($usemail == "" || $hash == ""){
    $reportalert="<script type ='text/javascript'>
  alert('Please fill correctly');
  </script>";
  
      $report="<a href='adminlogin.php'>click here </a>to retry ";
     
  }
    else if(!filter_var($usemail,FILTER_VALIDATE_EMAIL)){
        $reportalert ='<script type="text/javascript">
        alert("The email provided is invalid, please retry.");
        window.location.href="adminlogin.php";
        </script>';
          //$report = "<a href='adminlogin.php'>click here </a> to retry "; 

    }

    else {
      //selecting database
$db= mysqli_select_db($conn, $dbname);


//sql query to fetch info. of registered user and finds user match.  
$saka = mysqli_query($conn, "SELECT * FROM adminlogin WHERE usemail ='$usemail' AND hash = '$hpwd' limit 1");

while ($row=mysqli_fetch_assoc($saka)) {
     $usemail = $row['usemail'];
     $fulln=$row['fulln'];
            
}

$rows = mysqli_num_rows($saka);
if ($rows == 1){

 
 $reportalert= '<script type="text/javascript">
        alert("Congratulations! You have successfully logged in");
        window.location.href="adminhome.php";
        </script>';


    // header("Location:adminhome.php");
        //$report = "<a href='adminhome.php'> Click here </a> to continue ";

     $sesmail = $_SESSION['usemail'] = $usemail;
     $sesfulln = $_SESSION['fulln'] = $fulln;
}

else{
  $reportalert='<script type="text/javascript">
        alert("The username or password provided is invalid, please retry.")
        window.location.href="adminlogin.php";
        </script>';

        //header("Location:index.php");
      
       // $report = "<a href='adminlogin.php'>click here </a> to retry"; 
        }
    }
}



 ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Admin Login : BOS Academy</title>

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
                <a href="index.php" class="btn btn-add">Back to Home Page </a>

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
                                <h3>Admin Login</h3> 
                                <small><strong>Please enter your email and password to login. </strong></small>
                                    <?php if (!empty($reportalert)){echo $reportalert;}?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="loginForm" novalidate>
                            <div class="form-group">
                                
                                <label class="control-label" for="email">Email Address</label>
                                <input type="text" title="Please enter your email" required="" value="" name="usemail" id="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="hash" id="password" class="form-control">
                               
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-warning">Login</button>

                                <br />
                                <br />
                                  
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
<?php mysqli_close($conn); ?>