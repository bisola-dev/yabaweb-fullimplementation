<?php 
session_start();
include_once("connection.php");

$query6 = "SELECT * FROM [student].[dbo].[a_session] where CurrentSession = 1 ";
$user_query6 = sqlsrv_query($conn, $query6);
$sesionid = "";
    if (sqlsrv_has_rows($user_query6)>0){ 

      while ( $row2 = sqlsrv_fetch_array($user_query6)) 
      {
        $sesion= $row2['Session'];
        $sesionid= $row2['SessionID'];
      }

$_SESSION['sesid']=$sesionid;

}
  else{
    echo "failed";
}


$query5 = "SELECT TOP 1 * FROM [student].[dbo].[semester] where CurrentFTSemester = 1 OR CurrentPTSemester = 1";
$user_queryy = sqlsrv_query($conn, $query5);
$semestaid="";
if (sqlsrv_has_rows($user_queryy)>0)
{
  while ( $row2 = sqlsrv_fetch_array($user_queryy)) {
  $semesta= $row2['Semester'];
  $semestaid= $row2['SemesterID'];
  }
      //echo "success";
  $_SESSION['semid']=$semestaid;
}
else{
echo "fail";
}

 ?>
 