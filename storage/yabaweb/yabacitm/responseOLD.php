<?php 
 include_once("connection.php");
 include_once("session.php");

$sesHeadId = $_SESSION['cosh'];
$sesrowid = $_SESSION['id'];

$query5 = "SELECT  a.staffid, a.fname, b.id
    FROM [Staff].[dbo].[Info] as a inner join erp.dbo.users as b
    on a.staffid = b.staffid where id = $sesHeadId";
    $user_query5 = sqlsrv_query($conn, $query5);
    $num_row5 = sqlsrv_has_rows($user_query5);
    while ( $row = sqlsrv_fetch_array($user_query5)) {
      $fulname= $row['fname'];
      $id= $row['id'];
    }
    
 ?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>response</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Font Awesome 4.7.0 -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- socicon css -->
        <link href="assets/socicon/social.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="container-center">
            <div class="lock-wrapper-page ">
                <div class="form-group">
                   <h4><p id="demo">COURSE HEAD EXISTS</p></h4>
                    <div class="input-group m-t-20">
                        <span class="input-group-btn"> 
                            <button onclick="myFunction()" class="btn btn-add">Click here to view Course Head</button> 
                        </span> 
                    </div>
                    <div class="">
                    <a href="index.php" class="">Back to Home Page</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script>
            function myFunction() {
              document.getElementById("demo").innerHTML = "<?php echo $fulname; ?>";
            }
            </script>
    </body>

<!-- Mirrored from thememinister.com/crm/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
</html>