<?php 
  include_once("connection.php");  
  include_once("session.php");
  $activesemestaid= $_SESSION['semid'];
  $activesesionid= $_SESSION['sesid'];

  $progtyppe = $_GET['progtyppe'];
  $programu = $_GET['programu'];
  $levely = $_GET['levely'];

    if(isset($_POST['update'])){
      $rowid = $_POST['roid'];
      $coshead = $_POST['coshead'];

      $tsql = "UPDATE [student].[dbo].[courses] SET CosHeadId = $coshead
      WHERE ID= $rowid "; 

      /* Execute the query. */   
      if (sqlsrv_query($conn, $tsql)) {  
        echo "<script type='text/javascript'>
        alert('Operation successful');
        </script>";   

        // echo "Statement executed.\n";  
        } else {  
        echo "Error in statement execution.\n";  
            die(print_r(sqlsrv_errors(), true));  
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
  <?php  
  $query8 = "SELECT * FROM [student].[dbo].[programme] WHERE ProgrammeID = $programu";
  $user_query8 = sqlsrv_query($conn, $query8);
  while ($row2 = sqlsrv_fetch_array($user_query8)) {
  $programm= $row2['Programme'];

  $query7 = "SELECT * FROM [student].[dbo].[programme_type] WHERE ProgrammeTypeID = $progtyppe";
    $user_query7 = sqlsrv_query($conn, $query7);
  while ($row = sqlsrv_fetch_array($user_query7)) {
      $progtypee= $row['ProgrammeType'];

  $query9 = "SELECT * FROM [student].[dbo].[level] WHERE LevelID = $levely";
  $user_queri9 = sqlsrv_query($conn, $query9);
  while ( $row9 = sqlsrv_fetch_array($user_queri9)) {
  $levul= $row9['Level'];
      ?>
  <div class="container" >
   <b style="text-align: center;"><?php echo $programm.' '.$levul.' '.'('.$progtypee.')' ; ?></b>
  </div>
<?php }}} ?>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="">
      <div class="row">
        <div class="col-sm-12">
          <div class="">
            <div class="">
            <div class="table-responsive">
              <div class="">
               <button class=""><a href="index.php" class="btn-add">Back to HomePage</a></button>

                 <strong style="text-align: center;">Click <span style="color: green">select</span> to choose course head</strong>
              </div>
              <form method="post">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover" border="1px">
                  <thead>
                    <tr class="info">
                      <th>S/N</th>
                      <th>Course title</th>
                      <th>Course code</th>
                      <th>Course unit</th>
                      <th>RowID</th>
                      <th>Course head</th>
                      <th>Select</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
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
                       // $level1= $row2['LevelID'];
                        $rid= $row2['ID'];
                        $chead= $row2['CosHeadId'];
                    ?>
                    <tr>
                      <td><?php echo $num;?></td>
                      <td><?php echo $costitle;?></td>
                      <td><?php echo $coscode;?></td>
                      <td><?php echo $cosunit;?></td>
                      <td><?php echo $rid;?></td>
                      <td> <?php 
                      if ($chead != 0) {             
                        $query3 = "SELECT  a.staffid, a.fname, b.id
                        FROM [Staff].[dbo].[Info] as a inner join erp.dbo.users as b
                        on a.staffid = b.staffid where id = $chead";
                        $user_query3 = sqlsrv_query($conn, $query3);
                        $num_row3 = sqlsrv_has_rows($user_query3);
                        while ( $row = sqlsrv_fetch_array($user_query3)) {
                          $fulname= $row['fname'];
                          $id= $row['id'];
                          echo $fulname;
                          }}?>       
                       </td>
                     <td><button type="button" class="btn btn-add btn-sm cosUpdate">select</i></button></td>
                    </tr>
                    <?php $num++; 
                      }
                    ?>
                  </tbody>
                </table>           
              </form>
              <button class=""><a href="index.php" class="btn-add">Back to HomePage</a></button>
            </div> 
          </div>
        </div>
      </div>
    </section>

    <!-- /.content -->


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
                    <input type="text" name="proname" id="ctitu" class="form-control" disabled>
                  </div>
                  <!-- Text input-->
                  <div class="col-md-6 form-group">
                    <label class="control-label">Course Code</label>
                    <input type="text" name="probrand" id="ccode" class="form-control" disabled>
                  </div>
                  <!-- Text input-->
                  <div class="col-md-6 form-group">
                    <label class="control-label">Course Unit</label><br>
                    <input type="text" name="prospec" id="cunit" class="form-control" disabled>
                  </div>
                  <!-- Text input-->
                  <div class="col-md-6 form-group">
                    <label class="control-label">ID</label>
                    <input type="text" name="roid" id="cid" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Course Head</label>
                    <select type="text" name="coshead" class="form-control">
                      <option value="select">Click to select</option>
                      <?php 
                        //$query = "SELECT * FROM [erp].[dbo].[Users]";
                        $query = "SELECT  a.staffid, a.fname + ' ('+ b.uname +')' as user_detail, b.id
                        FROM [Staff].[dbo].[Info] as a inner join erp.dbo.users as b
                        on a.staffid = b.staffid ORDER BY user_detail ASC";
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
        $('#ctitu').val(data[1]);
        $('#ccode').val(data[2]);
        $('#cunit').val(data[3]);
        $('#cid').val(data[4]);
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

 