<?php 
  include_once("connection.php");  
  include_once("session.php");

  $alok = $_COOKIE["e1234r5678p"];
  $user_name_explode = explode("!", $_COOKIE['administrativeName']);
  $_SESSION['user_name'] = base64_decode(base64_decode(base64_decode($user_name_explode[0])));
  $user = $_SESSION['user_name'];
  // get the pasword
  $uPassword_explode = explode("!", $_COOKIE['uPassword']);
  $_SESSION['user_password'] = base64_decode(base64_decode(base64_decode($uPassword_explode[0])));
  
  if (isset($user)) :
    $query_nn = "SELECT * FROM erp.dbo.Users WHERE Uname = '$user'";

    $user_query = sqlsrv_query($conn, $query_nn);
    $num_row = sqlsrv_fetch_array($user_query, SQLSRV_FETCH_ASSOC);
    $code = $num_row["id"];
    $query = "SELECT * FROM erp.dbo.UserPreviledges WHERE Userid = '$code' AND  Activityid = '2071' ";
    $us_query = sqlsrv_query($conn, $query);
    $num = sqlsrv_fetch_array($us_query, SQLSRV_FETCH_ASSOC);
    if ($num > 0) :
      //var_dump($stmt);
      if ($chk === false) {
          die(print_r(sqlsrv_errors(), true));
      } else { }  

      $activesemestaid= $_SESSION['semid'];
      $activesesionid= $_SESSION['sesid'];
      
?>
<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/view-tsaction.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:46 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>yabatech coursehead</title> 
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
  <!-- dataTables css -->
  <link href="assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
  <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
</head>
<body class="hold-transition sidebar-mini">
  <!--preloader-->
  <!-- Site wrapper -->
  <!-- =============================================== -->
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="container" >
    <h4 style="text-align: center;"><b>MERGE COURSE-HEAD</b></h4>
  </div>
    <section class="">
      <div class="row">
        <div class="col-sm-12">
          <div class="">
            <div class="">
              <form method="GET" action="merger.php" >
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label>Programmes Type</label>
                    <select type="text" name="progtyppe" class="form-control">
                      <option value="select">Click to select</option>
                      <?php 
                        $query3 = "SELECT * FROM [student].[dbo].[programme_type]";
                        $user_query3 = sqlsrv_query($conn, $query3);
                        $num_row3 = sqlsrv_has_rows($user_query3);
                        while ( $row2 = sqlsrv_fetch_array($user_query3)) {
                        $progtype= $row2['ProgrammeType'];
                        $progtypeid= $row2['ProgrammeTypeID'];
                      ?>
                      <option value="<?php echo $progtypeid; ?>"><?php echo $progtype;?></option>
                      <?php 
                       } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Programmes</label>
                    <select type="text" name="programu" class="form-control">
                      <option value="select">Click to select</option>
                      <?php 
                        $query2 = "SELECT * FROM [student].[dbo].[programme]";
                        $user_query2 = sqlsrv_query($conn, $query2);
                        $num_row2 = sqlsrv_has_rows($user_query2);
                        while ( $row2 = sqlsrv_fetch_array($user_query2)) {
                        $program= $row2['Programme'];
                        $programid= $row2['ProgrammeID'];
                      ?>
                      <option value="<?php echo $programid; ?>"><?php echo $program; ?></option>
                      <?php 
                        } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Level</label>
                    <select type="text" name="levely" class="form-control">
                      <option value="select">Click to select</option>
                      <?php 
                        $queryx = "SELECT * FROM [student].[dbo].[level]";
                        $user_queri = sqlsrv_query($conn, $queryx);
                        $num_roww = sqlsrv_has_rows($user_queri);
                        while ( $row2 = sqlsrv_fetch_array($user_queri)) {
                        $levilid= $row2['LevelID'];
                        $level= $row2['Level'];
                      ?>
                      <option value="<?php echo $levilid; ?>"><?php echo $level; ?></option>
                      <?php 
                        } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-12"> 
                    <button type="submit" name="displayy" class="btn btn-success">DISPLAY COURSES</button>
                  </div> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  

  <!-- /. customer modal-->
  <!-- /.content-wrapper -->
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
  <!-- table-export js -->
  <script src="assets/plugins/table-export/tableExport.js" type="text/javascript"></script>
  <script src="assets/plugins/table-export/jquery.base64.js" type="text/javascript"></script>
  <script src="assets/plugins/table-export/html2canvas.js" type="text/javascript"></script>
  <script src="assets/plugins/table-export/sprintf.js" type="text/javascript"></script>
  <script src="assets/plugins/table-export/jspdf.js" type="text/javascript"></script>
  <script src="assets/plugins/table-export/base64.js" type="text/javascript"></script>
  <!-- dataTables js -->
  <script src="assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
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
<!-- Mirrored from thememinister.com/crm/view-tsaction.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:46 GMT -->
</html>
<?php endif; endif; ?>
 