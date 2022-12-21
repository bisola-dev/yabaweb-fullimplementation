<?php include_once("connection.php");

session_start();

//Global variable for date
date_default_timezone_set('Africa/Lagos');
$date_reg= date('M j, Y h:i a', time());
$tstamp= time();

//generate random numbers
$dkode = rand(10000, 99999); 

//if register button is clicked
if (isset($_POST["register"])){
 // $emal=mysqli_real_escape_string($conn,trim($_POST['emal']));
    $emal = trim(strip_tags($_POST["emal"]));
    $fon = trim(strip_tags($_POST["fon"]));
    $fulln = trim(strip_tags($_POST['fulln']));
    $pwd = trim(strip_tags($_POST["pwd"]));
    $rpwd = trim(strip_tags($_POST["rpwd"]));
    $prog = trim(strip_tags($_POST["prog"]));
    $schol = trim(strip_tags($_POST["schol"]));
    $course = trim(strip_tags($_POST["course"]));
    $mkode = trim(strip_tags($_POST["mkode"]));
    $dkode = trim(strip_tags($_POST["dkode"]));

     //add a key to the password and hash it
    $dopwd = 'kokoro'.$pwd;
    $hpwd = md5($pwd);

    $query2 = mysqli_query($conn, "SELECT * FROM applicants WHERE emal='$emal' || fon ='$fon'" );
$num_rows = mysqli_num_rows($query2);

    // check for empty field  
  if($emal == ""  || $fon == "" || $fulln == "" || $pwd == "" || $rpwd == "" || $prog == "" || $course == "" || $mkode == "") 
    //Be sure that all the fields are filled then proceed
  {
    $reportalert = '<script type="text/javascript">
        alert("You have to fill in ALL the fields correctly to proceed.");
        window.location.href="register.php";
                 </script>';
  }

  //checking for at least 6 characters in the password
      else if (strlen($pwd) < 6)
    {
    $reportalert =  '<script type="text/javascript">
        alert("Your password must be at least 6 characters");
        window.location.href="register.php";
        </script>';
        }

 //checking if password and repeat password are the same
      else if ($pwd != $rpwd)
    {
    $reportalert =  '<script type="text/javascript">
        alert("Your password and repeat password are not the same. Please retry.");
        window.location.href="register.php";
        </script>';
         
        }

    //check the validity of the email  
      else if(!filter_var($emal, FILTER_VALIDATE_EMAIL))
       {
        $reportalert ='<script type="text/javascript">
        alert("The email provided is invalid, please retry.");
        window.location.href="register.php";
        </script>';
          
            }
  
     //validating the phone number
   else if ( (strlen($fon) < 11) || (!(is_numeric ($fon))) )
    {
    $reportalert =  '<script type="text/javascript">
        alert("The phone number is invalid, please type correct GSM numbers and length.");
        window.location.href="register.php";
        </script>';
         
        }    
 //Check if account already exists
  else if (mysqli_num_rows($query2) > 0){ 
   
  $reportalert='<script type="text/javascript">
       $report alert("This account already exist");
       window.location.href="register.php";
        </script>';
         
     }

   
    else {   

     $loga = mysqli_query($conn, "INSERT INTO logger (uzer, activity, timereg) 
        VALUES ('$emal', 'Registered as fresh applicant', '$date_reg')"); 

      $insert= "INSERT INTO applicants (fulln, emal, fon, pwd, hpwd, prog, dreg) VALUES ('$fulln', '$emal', '$fon', '$pwd', '$hpwd', '$prog', '$date_reg')";


      if (mysqli_query($conn, $insert)) {

       /* $reportalert= '<script type="text/javascript">
        alert("The account was successfully created");
        window.location.href:"applicantlogin.php";
        </script>';  */
        header("Location:regsuccess.php");

}
    
     else{
  $reportalert='<script type="text/javascript">
        alert("Your registration is NOT successful, please retry.")
        window.Location.href="register.php";
        </script>';

        //header("Location:index.php");
      
       // $report = "<a href='adminlogin.php'>click here </a> to retry"; 
        }
  }
}


      if (!empty($reportalert)){echo $reportalert;}


      /*
        $exi = mysqli_query($conn, "SELECT * FROM applicants  WHERE emal = '$emal' OR fon = '$fon'");
            
     //admin mail doesnt exist  
            if (mysqli_num_rows($exi) == 1)
            {
            $reportalert =  '<script type="text/javascript">
        alert("This account already exists, please login to the account or create your own account");
        </script>';
          $report = //"This account already exists, please login to the account or create your own account.";
          "<a href='register.php'>click here </a> to retry" ;
         }

     // Mail does not exist
             if (mysqli_num_rows($exi) == 0)
      { $new = mysqli_query($conn, "INSERT INTO applicants (fulln, emal, fon, pwd, hpwd, grog, dreg) VALUES ('$fulln', '$emal', '$fon', '$pwd', '$hpwd', '$prog', '$date_reg')");

     $reportalert='<script type="text/javascript">
        alert("The account was successfully created")</script>';

$report = //"The account was successfully created." 
"<a href='login.php'> click here </a> to login."; 

      //        confirm_query($new);

     // $new2 = mysqli_query("INSERT INTO sfmyexam (emal, exlame, dreg, subjsel, selink) 
       // VALUES ('$emal', 'jamb', '$date_reg', 0, 'selectjamb.php')"); 
         //     confirm_query($new2);    
  
*/

?>
 

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Register now : BOS Academy</title>
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
                <a href="index.php" class="btn btn-add">Back to Home Page</a> <a><?php if (!empty($report)){echo $report;} ?></a>
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
                                    <label>Email Address</label>
                                    <input type="text" value="" id="email" class="form-control" name="emal">
                                 </div>
                                <div class="form-group col-lg-6">
                                    <label>Full Name</label>
                                    <input type="text" value="" id="username" class="form-control" name="fulln">
                                    
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label>Phone Number</label>
                                    <input type="text" value="" id="username" class="form-control" name="fon">
                                     
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" value="" id="password" class="form-control" name="pwd">
                                    
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" value="" id="repeatpassword" class="form-control" name="rpwd">
                                  </div>

                                 <div class="form-group col-lg-6">
                                 <label>Select Programme</label>
                                 <select type="text" name="prog" class="form-control">
                                     <option value="select">Click to select</option>
                                    <option value="ND Full Time">ND Full Time</option>
                                    <option value="ND Part Time">ND Part Time</option>
                                    <option value="HND Full Time">HND Full Time</option>
                                    <option value="HND Part Time">HND Part Time</option>
                                  </select>
                              </div>

                                  <div class="form-group col-lg-6">
                                 <label>Select School</label>
                                 <select type="text" name="schol" class="form-control" >
                                     <option value="select">Click to select</option>
                                    <option value="School of Management"><a href="schol.php"></a>School of Management</option>
                                    <option value="School of Technology">School of Technology</option>
                                    
                                  </select>
                              </div>

                                  <div class="form-group col-lg-6">
                                 <label>Select Course</label>
                                 <select type="text" name="course" class="form-control">
                                     <option value="select">Click to select</option>
                                     <?php 
                                $query = mysqli_query($conn, "SELECT smbs FROM courses");
 
                                       while ($row=mysqli_fetch_assoc($query)) {
                                                  $business = $row['smbs'];
                                                  echo $business;
                                      ?>
                                    
                                    <option value="<?php echo $business;?>"><?php echo $business;?></option>
                                      <?php } ?>
                                  </select>
                                  </div>

 
                                  <div class="form-group col-lg-6">
                                    <input type="hidden" value="<?php echo $dkode;?>" name="dkode">
                                    <label>Are you human? Type the number shown below </label>
                                    <input type="text" value="" class="form-control" name="mkode" placeholder="<?php echo $dkode;?>">
                                     
                                </div>
                              
                            </div>
                            <div>
                                <button type="submit" name="register" class="btn btn-add">Register</button> 
                                <br/>
                                <br/>
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
    