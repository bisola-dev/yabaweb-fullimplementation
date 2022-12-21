<?php 
session_start();
include_once("connection.php");

$dkode = rand(10000, 99999);      
 

  if(isset($_POST["submit"])){
    $coopnamey = mysqli_real_escape_string($conn, trim(strip_tags($_POST["coopnamex"])));
    $coopaddy = mysqli_real_escape_string($conn, trim(strip_tags($_POST["coopaddyx"])));
    $adname = mysqli_real_escape_string($conn, trim(strip_tags($_POST['adname'])));
    $regbyy = mysqli_real_escape_string($conn, trim(strip_tags($_POST["regbyy"])));
    $admaily = mysqli_real_escape_string($conn, trim(strip_tags($_POST["admail"])));
    $adfone = mysqli_real_escape_string($conn, trim(strip_tags($_POST["adfon"])));
    $pwd = mysqli_real_escape_string($conn, trim(strip_tags($_POST["adpwd"])));
    $mkode = mysqli_real_escape_string($conn, trim(strip_tags($_POST["mkode"])));
    $dkode = mysqli_real_escape_string($conn, trim(strip_tags($_POST["dkode"])));

     //add a key to the password and hash it
    $keypwd ='BIYIYAK'.$pwd;
    $hpazz = md5($keypwd);

    $segelo = mysqli_query($conn, "SELECT * FROM admcoop WHERE admemal='$ademaily' || admfon ='$adfone'" );
      $num_rows = mysqli_num_rows($segelo);

    // check for empty field  
  if($coopnamey == ""  || $coopaddy == "" || $adname == "" || $regbyy == "" || $admaily == "" || $adfone == "" || $pwd == "" || $mkode == "") 
    //Be sure that all the fields are filled then proceed
  {
    echo "<script type='text/javascript'>
        alert('You have to fill in ALL the fields correctly to proceed.'');
                 </script>";
  }

  //checking for at least 6 characters in the password
      else if (strlen($pwd) < 8)
    {
      echo "<script type='text/javascript'>
        alert('Your password must be at least 8 characters.');
                 </script>";
  }

    //check the validity of the email  
      else if(!filter_var($admaily, FILTER_VALIDATE_EMAIL))
       {
        echo "<script type='text/javascript'>
        alert('The email provided is invalid, please retry.');
                 </script>";
          
            }
  
     //validating the phone number
   else if ( (strlen($adfone) < 11) || (!(is_numeric ($adfone))) )
    {
      echo "<script type='text/javascript'>
        alert('The phone number is invalid, please type correct phone number');
                 </script>";         
        }    
        //Check if account already exists
      else if (mysqli_num_rows($segelo) > 0){ 
        echo "<script type='text/javascript'>
        alert('This account already exist, 
       please register another email and phone number');
                 </script>";  
   
     }

   
    else {   

     $loga = mysqli_query($conn, "INSERT INTO logger (uzer, activity, timereg) VALUES ('$emal', 'Registered as fresh applicant', '$date_reg')"); 

      $getin = mysqli_query($conn, "INSERT INTO admcoop (coopname, coopaddy, 'admfulln', regby, admemal, admfon, hpazz, dreg) VALUES ('$coopnamey', '$coopaddy', '$adname', '$regbyy', '$admaily', '$adfone', '$hpazz',  '$date_reg')");

         echo "<script type='text/javascript'>
            alert('Congratulations! You have successfully logged in');
             window.location.href='adminlogin.php';
             </script>";


                    }
                  } 


?>
 

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Register now : Coop App</title>
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
                <a href="index.php" class="btn btn-add">Back to Home Page</a> 
            </div>
            <div class="container-center lg">
             <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data correctly.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="loginForm" novalidate>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Cooperative Name</label>
                                    <input type="text" value="" id="coopname" class="form-control" name="coopnamex">
                                    
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cooperative Address</label>
                                    <input type="text" value="" id="email" class="form-control" name="coopaddyx">
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label>Admin Name</label>
                                    <input type="text" value="" id="username" class="form-control" name="adname">
                                     
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Registered by</label>
                                    <input type="text" value="" id="name" class="form-control" name="regbyy">
                                    
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>admin Email</label>
                                    <input type="text" value="" id="email" class="form-control" name="admail">
                                    
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Admin Phone number</label>
                                    <input type="text" value="" id="phone" class="form-control" name="adfon">
                                  </div>
                                <div class="form-group col-lg-6">
                                    <label>Admin Password</label>
                                    <input type="password" value="" id="password" class="form-control" name="adpwd">
                                  </div>
                                  <div class="form-group col-lg-6">
                                    <input type="hidden" value="<?php echo $dkode;?>" name="dkode">
                                    <label><small>Are you human? Type the number shown below <?php echo $dkode;?></small></label>
                                    <input type="text" value="" class="form-control" name="mkode" placeholder="<?php echo $dkode;?>">   
                                </div>
                            </div>
                            <div>
                             <button type="submit" name="submit" class="btn btn-add">Register</button>  <br/> <br/>
                                <a href="login.php">Login if you already have an account</a>
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

<!-- Mirrored from thememinister.com/crm/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
</html>
<?php  mysqli_close($conn); ?>
    