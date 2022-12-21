<?php 
session_start();
include_once "connection.php";

    $mammee = mysqli_query($conn, "SELECT * FROM admcoop");
    while ($row=mysqli_fetch_assoc($mammee)) { 
    $coopid=$row['id'];
    $emally=$row['coopemal'];
       }

if (isset($_POST['submit'])){
    $coopnamex1 = mysqli_real_escape_string($conn, trim(strip_tags($_POST['coopnamex'])));
    $coopaddyx1 = mysqli_real_escape_string($conn, trim(strip_tags($_POST['coopaddyx'])));
    $coopfonx1 = mysqli_real_escape_string($conn, trim(strip_tags($_POST['coopfonx'])));
    $coopemalx1 = mysqli_real_escape_string($conn, trim(strip_tags($_POST['coopemalx'])));

    if($coopnamex1 == "" || $coopaddyx1 == ""|| $coopfonx1== "" || $coopemalx1 == ""){
    echo "<script type ='text/javascript'>
    alert('Please fill correctly');
    </script>";
     
  }
  else if ($coopemalx1==$emally) {
     echo "<script type ='text/javascript'>
    alert('This email has already been registered, Please use another one');
    </script>";
     
  }

    else if(!filter_var($coopemalx1, FILTER_VALIDATE_EMAIL)){
        echo "<script type ='text/javascript'>
        alert('The email provided is invalid, please retry');
        </script>";
    }

    $targetDir = "coopstore/";
    $fileName = basename($_FILES["cooplogox"]["name"]);
    $fileName = $tstamp.$fileName;
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if(!empty($_FILES["cooplogox"]["name"])){
  $reportalert = '<script type="text/javascript">
  alert("please upload you company logo");
   </script>';

          }else if ($fileType != ('png' || 'jpeg')) {
        echo "<script type='text/javascript'>
            alert('Invalid file type')
                </script>'";

          }else if (file_exists($targetFilePath)) {
            echo "<script type='text/javascript'>
            alert('file already exist')
                </script>";

          }else if ($_FILES["cooplogox"]["size"] > 500000) {
            echo "<script type='text/javascript'>
            alert('Sorry, your file is too large.')
                </script>";

        }if(move_uploaded_file($_FILES["cooplogox"]["tmp_name"], $targetFilePath)){

        $getin = mysqli_query($conn, "INSERT INTO admcoop (coopname, coopaddy, coopemal, coopfon, cooplogo, regby, hpazz, addemal, admfon, admfulln, dreg) VALUES ('$coopnamex1', '$coopaddyx1', '$coopemalx1', '$coopfonx1', '$fileName', '$seregby', '$hpazz', '$sesadmemal', '$sesadmfon', '$sesadmfulln', '$date_reg')");

             echo "<script type='text/javascript'>
                alert('Congratulations! You have successfully logged in');
                 window.location.href='adminhome.php';
                 </script>";
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
                                <h3>Create Account</h3> 
                                <small><strong>Please enter your email and password to login. </strong></small>
            
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="loginForm" novalidate>
                            <div class="form-group">
                                
                                <label class="control-label" for="name">Cooperative name </label>
                                <input type="text" title="Please enter your Cooperative Name" required="" placeholder="Please enter coop name" name="adnamex" id="name" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="address">Cooperative Address</label>
                                <input type="text" title="Please enter your Cooperative Address" placeholder="Please enter Address" required="" value="" name="coopaddyx" id="address" class="form-control">
                               
                            </div>
                            <label class="control-label" for="email">Cooperative Email</label>
                                <input type="text" title="Please enter your email" placeholder="Please enter email" required="" value="" name="coopemalx" id="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Cooperative Phone Number</label>
                                <input type="text" title="Please enter your coop phone number" placeholder="Please enter Phone number" required="" value="" name="coopfonx" id="phone" class="form-control">
                               
                            </div>
                            <label class="control-label" for="email">Cooperative Logo</label>
                                <input type="file" title="Please upload your logo" required="" value="" name="cooplogox" id="logo" class="form-control">
                                
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