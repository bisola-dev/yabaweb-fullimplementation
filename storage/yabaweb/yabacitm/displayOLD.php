<?php 
  include_once("connection.php");
  include_once("session.php");
  $activesemestaid= $_SESSION['semid'];
  $activesesionid= $_SESSION['sesid'];
  $sesparay = $_SESSION['parai'];
  $joiny = "index1.php?parai=".$sesparay;
  $ridd= $_GET['mid'];
  $nameId= $_GET['nameId'];     
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body>
 			<div class="table-responsive">
              <h4 style="text-align: center; color: green">
                <strong style="text-align:center">COURSE HEAD</strong>
              </h4>
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover" border="1px" align="center">
                  <thead>
                    <tr class="info">
                      <th>S/N</th>
                      <th>Course title</th>
                      <th>Course code</th>
                      <th>Course unit</th>
                      <th>level</th>
                      <th>CourseHead ID</th>
                      <th>Coursehead Name</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                        $numz= 1;
                      $query2 = "SELECT * FROM [student].[dbo].[courses] 
                      where A_SessionID = $activesesionid AND SemesterID= $activesemestaid 
                      AND ID= $ridd";

                      $user_query2 = sqlsrv_query($conn, $query2);
                      $num_row2 = sqlsrv_has_rows($user_query2);
                      while ( $rom = sqlsrv_fetch_array($user_query2)) {
                        $costitu= $rom['CourseTitle'];
                        $cosunet= $rom['CourseUnit'];
                        $coskode= $rom['CourseCode'];
                        $levu= $rom['LevelID'];
                        $chead= $rom['CosHeadId'];
                        ?>

                        <?php 
                        $query3 = "SELECT  a.staffid, a.fname, b.id
                        FROM [Staff].[dbo].[Info] as a inner join erp.dbo.users as b
                        on a.staffid = b.staffid where id = $nameId";
                        $user_query3 = sqlsrv_query($conn, $query3);
                        $num_row3 = sqlsrv_has_rows($user_query3);
                        while ( $row = sqlsrv_fetch_array($user_query3)) {
                          $fulname= $row['fname'];
                          $id= $row['id'];
                         ?>                    
                     <tr>
                      <td><?php echo $numz;?></td>
                      <td><?php echo $costitu;?></td>
                      <td><?php echo $coskode;?></td>
                      <td><?php echo $cosunet;?></td>
                      <td><?php echo $levu;?></td>
                      <td><?php echo $chead;?></td>
                      <td><?php echo $fulname; ?></td>
                    </tr>
                      <?php $numz++;
                      } }
                    ?>
                  </tbody>
                </table>  
                <br>
                <button class=""><a href="<?php echo $joiny; ?>">Back</a></button>
                        
              </body>
              </html>

