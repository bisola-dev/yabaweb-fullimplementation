<?php

session_start();

include_once "connection.php";

if (isset($_POST['submit'])){
    $usmal = trim(strip_tags($_POST['usmal']));
    $pwd = trim(strip_tags($_POST['pwd']));

    
    $hpawd = md5($pwd);

    if($usmal == "" || $pwd == ""){
    $reportalert="<script type ='text/javascript'>
    alert('Please fill correctly');
    window.location.href='applicantlogin.php';
     </script>";
  
    //  $report="<a href='applicantlogin.php'>click here </a>to retry ";
     }
  
    else if(!filter_var($usmal,FILTER_VALIDATE_EMAIL)){
        $reportalert ='<script type="text/javascript">
        alert("The email provided is invalid, please retry.");
        window.location.href="applicantlogin.php";
        </script>';
          //$report = "<a href='adminlogin.php'>click here </a> to retry "; 

    }

    else {
      //selecting database
$db= mysqli_select_db($conn, $dbname);


//sql query to fetch info. of registered user and finds user match.  
$saka = mysqli_query($conn, "SELECT * FROM applicants WHERE emal ='$usmal' AND hpwd = '$hpawd' limit 1");

while ($row=mysqli_fetch_assoc($saka)) {
    $usemail = $row['emal'];
    $fulln = $row['fulln'];
    $id = $row['id'];
    $prog = $row['prog'];
    $course= $row['course']; 

            
}

$rows = mysqli_num_rows($saka);
if ($rows == 1){

 
 $reportalert= '<script type="text/javascript">
        alert("Congratulations! You have successfully logged in");
        window.location.href="home.php";
        </script>';
  
     $sesmail = $_SESSION['emal'] = $usemail;
     $sesfulln = $_SESSION['fulln'] = $fulln;
     $seid = $_SESSION['id'] = $id;
     $sesprog = $_SESSION['prog'] = $prog;
     $sescourse = $_SESSION['course'] = $course; 

}

else{
  $reportalert='<script type="text/javascript">
        alert("The username or password provided is invalid, please retry.");
        window.location.href="applicantlogin.php";
        </script>';

        //header("Location:index.php");
      
       // $report = "<a href='adminlogin.php'>click here </a> to retry"; 
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
        <title>Applicant Login : BOS Academy</title>

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
                                <h3>Applicant Login</h3> 
                                <small><strong>Please enter your email and password to login. </strong></small>
                                    <?php if (!empty($reportalert)){echo $reportalert;}?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="loginForm" novalidate>
                            <div class="form-group">
                                
                                <label class="control-label" for="email">Email Address</label>
                                <input type="text" title="Please enter your email" required="" value="" name="usmal" id="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="pwd" id="password" class="form-control">
                               
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-warning">Login</button>

                                <br/>
                                <br/>
                                <a href="forgot.php">FORGOT password? click here</a>
                                <br/>
                                 <br/>
                                  <a href="register.php">Register if you do not have an account yet</a>
                                  
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