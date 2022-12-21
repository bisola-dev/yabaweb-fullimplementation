<?php 


                  $num= 1;
                  $query1 = "SELECT * FROM [student].[dbo].[courses] 
                  where A_SessionID = $activesesionid AND SemesterID= $activesemestaid 
                  AND ProgrammeTypeID= $progtyppe AND ProgrammeID= $programu AND LevelID= $levely";
                  $user_query1 = sqlsrv_query($conn, $query1);
                  $num_row1 = sqlsrv_has_rows($user_query1);
                  while ( $row2 = sqlsrv_fetch_array($user_query1)) {
                    $rid= $row2['ID'];
                    $costitle= $row2['CourseTitle'];
                    $cosunit= $row2['CourseUnit'];
                    $coscode= $row2['CourseCode'];
                    $chead= $row2['CosHeadId'];
               

 ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>