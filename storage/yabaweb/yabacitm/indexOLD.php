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

      if(isset($_POST['update'])){
        $rowid = $_POST['roid'];

        $head = "SELECT * FROM [student].[dbo].[courses] 
        WHERE ID= $rowid";
         $dammy = sqlsrv_query($conn, $head);
        $num = sqlsrv_has_rows($dammy);
        while ( $row = sqlsrv_fetch_array($dammy)) {
          $cheadId= $row['CosHeadId'];
        
          if(!empty($cheadId)) {
              echo (header("Location: response.php"));

              $sesHeadId = $_SESSION['cosh'] = $cheadId;
              $sesrowid = $_SESSION['id'] = $rowid;
          }
          else{
          
            $coshead = $_POST['coshead'];
            /* Set up the parameterized query. */  
            $tsql = "UPDATE [student].[dbo].[courses] SET CosHeadId = $coshead
            WHERE A_SessionID = $activesesionid AND SemesterID= $activesemestaid 
            AND ID= $rowid ";
            $linkcos = 'display.php?mid='.$rowid.'&nameId='.$coshead;

            /* Assign literal parameter values.  */ 
            $result = sqlsrv_query($conn, $tsql);
             var_dump($tsql);
             die(); 

            /* Execute the query.   
            if (sqlsrv_query($conn, $tsql)) {  
              
                 echo "<script type='text/javascript'>
              alert('Operation successful');
              window.location.href='$linkcos';
              </script>";   

              // echo "Statement executed.\n";  
            } else {  
              echo "Error in statement execution.\n";  
              die(print_r(sqlsrv_errors(), true));  
            }*/   
          }
        }
      }
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
  <?php if (!empty($reportalert)){echo $reportalert;} ?>
  <!-- Site wrapper -->
  <!-- =============================================== -->
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="">
      <div class="row">
        <div class="col-sm-12">
          <div class="">
            <div class="">
              <form method="POST" action="" >
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
            <?php
              if (isset($_POST['displayy'])){
                $progtyppe = $_POST['progtyppe'];
                $programu = $_POST['programu'];
                $levely = $_POST['levely'];
            ?>                            
            <style type="text/css">
              tr:hover{background-color: #D8DA5C  }
              h4 {text-align: center; color: green}
            </style>
            <div class="table-responsive">
              <h4>
                <strong>Click select to choose course head </strong>
              </h4>
              <form method="post">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover" border="1px">
                  <thead>
                    <tr class="info">
                      <th>S/N</th>
                      <th>Course title</th>
                      <th>Course code</th>
                      <th>Course unit</th>
                      <th>level</th>
                      <th>Row ID</th>
                      <th>Select</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if($progtyppe == "" || $programu== "" || $levely == ""): ?>
                        echo "<script type ='text/javascript'>
                          alert('please do not submit empty form.')
                        </script>";
                        <?php
                      endif;
                      $num= 1;
                      $query1 = "SELECT * FROM [student].[dbo].[courses] 
                      where A_SessionID = $activesesionid AND SemesterID= $activesemestaid 
                      AND ProgrammeTypeID= $progtyppe AND ProgrammeID= $programu AND LevelID= $levely";
                      $user_query1 = sqlsrv_query($conn, $query1);
                      $num_row1 = sqlsrv_has_rows($user_query1);
                      while ( $row2 = sqlsrv_fetch_array($user_query1)) {
                        $costitle= $row2['CourseTitle'];
                        $cosunit= $row2['CourseUnit'];
                        $coscode= $row2['CourseCode'];
                        $level1= $row2['LevelID'];
                        $rid= $row2['ID'];
                    ?>
                    <tr>
                      <td><?php echo $num;?></td>
                      <td><?php echo $costitle;?></td>
                      <td><?php echo $coscode;?></td>
                      <td><?php echo $cosunit;?></td>
                      <td><?php echo $level1;?></td>
                      <td><?php echo $rid;?></td>
                      
                      <td><button type="button" class="btn btn-add btn-sm cosUpdate">select</i></button></td>
                    </tr>
                    <?php $num++; 
                      }
                    ?>
                  </tbody>
                </table>           
              </form>
            </div>
            <?php         
              }  
            ?> 
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- /. customer modal-->
  <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3><i class="fa fa-user m-r-5"></i>Select Coursehead</h3>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form class="form-vertical" method="POST" action="">
                <fieldset>
                  <!-- Text input-->
                  <input type="hidden" name="proid" id="pid">
                  <div class="col-md-6 form-group">
                    <label class="control-label">Course title</label>
                    <input type="text" name="proname" id="pname" class="form-control" disabled>
                  </div>
                  <!-- Text input-->
                  <div class="col-md-6 form-group">
                    <label class="control-label">Course Code</label>
                    <input type="text" name="probrand" id="pbrand" class="form-control" disabled>
                  </div>
                  <!-- Text input-->
                  <div class="col-md-6 form-group">
                    <label class="control-label">Course Unit</label><br>
                    <input type="text" name="prospec" id="pspec" class="form-control" disabled>
                  </div>
                  <!-- Text input-->
                  <div class="col-md-6 form-group">
                    <label class="control-label">Level </label>
                    <input type="text" name="proprice" id="pprice" class="form-control" disabled>
                  </div>
                  <!-- Text input-->
                  <div class="col-md-6 form-group">
                    <label class="control-label">ID</label>
                    <input type="text" name="roid" id="pqty" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Course Head</label>
                    <select type="text" name="coshead" class="form-control">
                      <option value="select">Click to select</option>
                      <?php 
                        //$query = "SELECT * FROM [erp].[dbo].[Users]";
                        $query = "SELECT  a.staffid, a.fname + ' ('+ b.uname +')' as user_detail, b.id
                        FROM [Staff].[dbo].[Info] as a inner join erp.dbo.users as b
                        on a.staffid = b.staffid";
                        $user_query = sqlsrv_query($conn, $query);
                        $num_row = sqlsrv_has_rows($user_query);
                        while ( $row = sqlsrv_fetch_array($user_query)) {
                          $uname= $row['user_detail'];
                          $id= $row['id'];
                      ?>
                      <option value="<?php echo $id; ?>"><?php echo $uname; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-12"> 
                    <div class="col-md-6" >
                      <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
                    </div> 
                    <div class="col-md-6">
                      <button type="submit" name="update" class="btn btn-success pull-left">UPDATE</button>
                    </div>  
                    
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
    endif; endif;
  ?>
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
  <script>
    $(document).ready(function(){
      $('.cosUpdate').on('click', function(){
        //$('#dataTableExample1 tbody').on('click', 'tr', function(){
        $('#customer1').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
        return $(this).text();
        }).get();
        console.log(data);
        $('#pid').val(data[0]);
        $('#pname').val(data[1]);
        $('#pbrand').val(data[2]);
        $('#pspec').val(data[3]);
        $('#pprice').val(data[4]);
        $('#pqty').val(data[5]);
        });
        $('.delepro').on('click', function(){
          $('#customer2').modal('show');
          $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();
        console.log(data);
        $('#did').val(data[0]);
      });
    });
  </script>
</body>
<!-- Mirrored from thememinister.com/crm/view-tsaction.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:46 GMT -->
</html>

 